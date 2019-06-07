<?php

class Category
{
    /**
     * Возвращает Список категорий
    **/

    public static function index()
    {
        $stmt = Connection::query("SELECT * FROM categories ORDER BY id ASC");
        $categories = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $categories;
    }

    /**
     * Возвращает Список категорий,
     * у которых статус отображения = 1
     */

    public static function getActiveCategories()
    {
        $stmt = Connection::query("SELECT * FROM categories WHERE status = 1 ORDER BY id ASC");
        $categories = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $categories;
    }

    public static function store($opts)
    {
        $sql = "INSERT INTO categories (name, status) VALUES (?, ?)";
        $stmt = Connection::prepare($sql);
        $stmt->bindParam(1, $opts[0]);
        $stmt->bindParam(2, $opts[1]);
        $stmt->execute();
    }

    public static function update($id, $options)
    {
        $sql = "UPDATE categories
                SET
                    name = :name,
                    status = :status
                WHERE id = :id";
        $stmt = Connection::prepare($sql);
        $stmt->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $stmt->bindParam(':status', $options['status'], PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    /* Выбор категории по id  */
    public static function getCategoryById($id)
    {
        $stmt = Connection::prepare("SELECT * FROM categories  WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_BOTH);
    }

    public static function destroy($id)
    {
        $sql = "DELETE FROM categories WHERE id = :id";
        $stmt = Connection::prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
