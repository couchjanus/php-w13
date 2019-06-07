<?php

/**
 *Контроллер для просмотра и управления списком всех товаров, имеющихся в базе
*/
require_once realpath(MODELS.'Product.php');
require_once realpath(MODELS.'Category.php');

class ProductController extends Controller
{

    /**
     * Просмотр всех товаров
     * @return bool
    */
    public function index()
    {
        $products = Product::index();
        $data['products'] = $products;
        $data['title'] = 'Admin Product List Page ';
        $data['numRows'] = count($products);
        $this->_view->render('admin/products/index', $data);

    }

    /**
     * Добавление товара
     *
     * @return bool
    */
    public function create()
    {
        //Принимаем данные из формы
        if (isset($_POST) and !empty($_POST)) {

            $options['name'] = trim(strip_tags($_POST['name']));
            $options['price'] = trim(strip_tags($_POST['price']));
            $options['category_id'] = $_POST['category'];
            $options['brand'] = trim(strip_tags($_POST['brand']));
            $options['description'] = trim(strip_tags($_POST['description']));
            $options['is_new'] = trim(strip_tags($_POST['is_new']));
            $options['status'] = trim(strip_tags($_POST['status']));
            Product::store($options);

            Helper::redirect('/admin/products');
        }

        $data['title'] = 'Admin Product Add New Product ';
        $data['categories'] = Category::index();
        $this->_view->render('admin/products/create', $data);
    }

    /**
     * Редатирование товара
     *
     * @param $id
     * @return bool
    */
    public function edit($vars)
    {
        //Получаем информацию о выбранном товаре
        extract($vars);
        $product = Product::getById($id);

        //Принимаем данные из формы
        if (isset($_POST) and !empty($_POST)) {
            $options['name'] = trim(strip_tags($_POST['name']));
            $options['price'] = trim(strip_tags($_POST['price']));

            $options['brand'] = trim(strip_tags($_POST['brand']));
            $options['description'] = trim(strip_tags($_POST['description']));

            $options['category_id'] = $_POST['category_id'];
            $options['is_new'] = $_POST['is_new'];
            $options['status'] = $_POST['status'];

            Product::update($id, $options);
            Helper::redirect('/admin/products');
        }

        // var_dump($data['product']);
        $categories = Category::index();
        $title = 'Product Edit Page ';
        $this->_view->render('admin/products/edit', compact('categories', 'title', 'product'));
    }


    public function delete($vars)
    {
        extract($vars);

        if (isset($_POST['submit'])) {

            Product::destroy($id);
            Helper::redirect('/admin/products');

        } elseif (isset($_POST['reset'])) {
            Helper::redirect('/admin/products');
        }

        $title = 'Delete Product ';
        $product = Product::getById($id);
        $this->_view->render('admin/products/sdeletehow', compact('picture', 'title', 'product'));
    }

    public function show($vars)
    {
        extract($vars);
        $title = 'Show Product ';
        $product = Product::getById($id);
        $picture = Picture::getById($id, $this->_resource);
        $this->_view->render('admin/products/show', compact('picture', 'title', 'product'));
    }

}
