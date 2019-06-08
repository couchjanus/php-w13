<?php
class Product
{
    //Количество отображаемых товаров по умолчанию
    const SHOW_BY_DEFAULT = 6;

    /**
     * Выводит список всех товаров
    */
    public static function index()
    {
        $stmt = Connection::query("SELECT * FROM products ORDER BY id ASC");
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    /**
     * Получаем последние товары
     *
     * @param int $page
     * @return array
     */
    public static function getLatestProducts($page = 1)
    {
        $limit = self::SHOW_BY_DEFAULT;

        //Задаем смещение
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $pdo = Connection::dbFactory(include DB_CONFIG_FILE);

        $sql = "SELECT id, name, price, is_new, description
                  FROM products
                    WHERE status = 1
                      ORDER BY id DESC
                        LIMIT :limit OFFSET :offset
                ";

        //Подготавливаем данные
        $stmt = Connection::query($sql);
        $stmt = Connection::prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        //Выполняем запрос
        $stmt->execute();
        //Получаем и возвращаем результат
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }

    /**
     * Добавление продукта
     *
     * @param $options - характеристики товара
     * @return int|string
     */
        /**
     * Добавление продукта
     *
     * @param $options - характеристики товара
     * @return int|string
     */
    public static function store($options)
    {
        $sql = "INSERT INTO products(
                name, slug, category_id, price, brand,
                description, is_new, status)
                VALUES (:name, :slug, :category_id, :price,
                :brand, :description, :is_new, :status)";
        
        $stmt = Connection::prepare($sql);
        
        $stmt->bindParam(':name', $options['name'], PDO::PARAM_STR);
  
        $slug = Slug::makeSlug($options['name'], array('transliterate' => true));
        $stmt->bindParam(':slug', $slug, PDO::PARAM_STR);
  
        $stmt->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $stmt->bindParam(':price', $options['price'], PDO::PARAM_INT);
        $stmt->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $stmt->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $stmt->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $stmt->bindParam(':status', $options['status'], PDO::PARAM_INT);
        $stmt->execute();
    }

    public static function lastId() 
    {
        $stmt = Connection::prepare("SELECT id FROM products ORDER BY id DESC LIMIT 1");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['id'];
    }

    /**
     * Общее кол-во товаров в магазине
     *
     * @return mixed
     */
    public static function getTotalProducts()
    {
        // Текст запроса к БД
        $sql = "SELECT count(id) AS count FROM products WHERE status=1 ";
        // Выполнение коменды
        $stmt = Connection::query($sql);
        // Возвращаем значение count - количество
        $row = $stmt->fetch();
        return $row['count'];
    }
    public static function getProducts()
    {
        $sql = "SELECT DISTINCT t1.*, t2.filename as picture
                FROM products t1
                JOIN pictures t2
                ON t2.resource = 'products' 
                AND t1.id = t2.resource_id
                GROUP BY id
            ";
    
        $stmt = Connection::query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getBySlug($id)
    {
        $stmt = Connection::prepare("SELECT t1.*, t2.filename as picture, t2.resource_id  as resource_id FROM products t1 JOIN pictures t2 ON t2.resource = 'products' AND t1.id = t2.resource_id WHERE t1.id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_BOTH);
    }

    public static function getProduct($id)
    {
        $stmt = Connection::prepare("SELECT t1.*, t2.filename as picture
        FROM products t1 
        LEFT OUTER JOIN pictures t2
        on t1.id=t2.resource_id 
        where t1.id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        $pictures = [];
        array_push($pictures, $res['picture']);
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($pictures, $row['picture']);
        }
        
        $res['picture'] = $pictures;
        return $res;
    }
  
}