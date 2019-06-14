<?php
/**
 * class User
 */
class User
{
    /**
     * @return users list
    **/

    public static function index() 
    {
        $stmt = Connection::query("SELECT * FROM users ORDER BY id ASC");
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'User');
    }

    public static function store($options)
    {
        $sql = "INSERT INTO users(name, email, password, role_id)
                VALUES(:name, :email, :password, :role)";
        $stmt = Connection::prepare($sql);
        $stmt->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $stmt->bindParam(':email', $options['email'], PDO::PARAM_STR);
        $stmt->bindParam(':role', $options['role'], PDO::PARAM_INT);
        
        /**
         * Использование password_hash() с ручным заданием стоимости
         * Увеличиваем алгоритмическую стоимость BCRYPT до 12.
         * Но это никак не скажется на длине полученного результата, она останется 60 символов
         */
        $costs = [
            'cost' => 12,
        ];
        $hash = password_hash($options['password'], PASSWORD_BCRYPT, $costs);
        $stmt->bindParam(':password', $hash, PDO::PARAM_STR);

        // $stmt->bindParam(':password', $options['password'], PDO::PARAM_STR);
        
        return $stmt->execute();
    }

    public static function update($id, $options)
    {
        $sql = "SELECT password FROM users WHERE id = :userId";
        $stmt = Connection::prepare($sql);
        $stmt->bindParam(':userId', $id, PDO::PARAM_INT);
        $stmt->execute();

        $passwordFromDatabase = $stmt->fetch(PDO::FETCH_ASSOC)['password'];
        $password = $options['password'];
        if (!password_verify($password, $passwordFromDatabase)) {
          // update hash from databse - replace old hash $passwordFromDatabase with new hash $newPasswordHash
            $password = password_hash($options['password'], PASSWORD_DEFAULT, ["cost" => 12]);
        }
        $sql = "UPDATE users
                    SET name = :name, password = :password, email = :email, role_id = :role_id, status = :status
                      WHERE id = :id
               ";
        $stmt = Connection::prepare($sql);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $stmt->bindParam(':email', $options['email'], PDO::PARAM_STR);
       
        $status = $options['status']? 1:0;
        $stmt->bindParam(':status', $status, PDO::PARAM_INT);
        $stmt->bindParam(':role_id', $options['role_id'], PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
    /* Выбор user по id  */
    public static function getById($id)
    {
        $stmt = Connection::prepare("SELECT * FROM users  WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_BOTH);
    }
    public static function destroy($id)
    {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = Connection::prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    /**
     * Проверка на существовние введенных данных при ааторизации
     *
     * @param $email
     * @param $password
     * @return bool
     */
    public static function checkUser($email, $password)
    {
        $sql = "SELECT *
                FROM users
                WHERE email = :email
                ";
        $stmt = Connection::prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch();
        if (password_verify($password, $user['password'])) {
            return $user['id'];
        }
        return false;
    }

    public static function updateProfile($userId, $options)
    {
        $sql = "UPDATE users
                SET phone_number = :phone_number, first_name = :first_name, last_name = :last_name
                WHERE id = :id";
        $stmt = Connection::prepare($sql);
        $stmt->bindParam(':phone_number', $options['phone_number'], PDO::PARAM_STR);
        $stmt->bindParam(':first_name', $options['first_name'], PDO::PARAM_STR);
        $stmt->bindParam(':last_name', $options['last_name'], PDO::PARAM_STR);
        $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
        return $stmt->execute();
    }
   
}
