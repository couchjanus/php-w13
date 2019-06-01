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
}
