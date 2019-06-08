<?php

/**
 * Модель для работы с Picture
 * 
*/

class Picture
{
    public static function index() 
    {
        $sql = "SELECT * FROM pictures ORDER BY id ASC";
        $stmt = Connection::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function show($id)
    {
        $sql = "SELECT * FROM pictures WHERE id = :id";
        $stmt = Connection::prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function store($options) 
    {
        $sql = "INSERT INTO pictures(resource, filename, resource_id)
                VALUES (:resource, :filename, :resource_id)";
        $stmt = Connection::prepare($sql);
        $stmt->bindParam(':resource', $options['resource'], PDO::PARAM_STR);
        $stmt->bindParam(':filename', $options['filename'], PDO::PARAM_STR);
        $stmt->bindParam(':resource_id', $options['resource_id'], PDO::PARAM_INT);
        $stmt->execute();
    }

    public static function lastId() 
    {
        $stmt = Connection::prepare("SELECT id FROM pictures ORDER BY id DESC LIMIT 1");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['id'];
    }

    public static function getById($id, $resource) 
    {
        $sql = "SELECT * FROM pictures WHERE resource_id = :id and resource = :resource";
        $stmt = Connection::prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':resource', $resource, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
    public static function update($id, $options) 
    {

    }
    
    public static function destroy($id) 
    {
        $sql = "DELETE FROM pictures WHERE id = :id";
        $stmt = Connection::prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
