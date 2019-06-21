<?php
/**
 * class Connection
 */
namespace Core;
use PDO;

 class Connection
{
    /**
     * Объект Connection храниться в статичном поле класса.
     */
    private static $instance;
    const ERROR_UNABLE = 'ERROR: no database connection';

    /**
     * Конструктор Connection всегда должен быть скрытым, чтобы предотвратить
     * создание объекта через оператор new.
     */
    protected function __construct() { }

    /**
     * Connection не должны быть клонируемыми.
     */
    protected function __clone() { }

    /**
     * Connection не должны быть восстанавливаемыми из строк.
     */
    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    /**
     * Это статический метод, управляющий доступом к экземпляру одиночки. При
     * первом запуске, он создаёт экземпляр одиночки и помещает его в
     * статическое поле. При последующих запусках, он возвращает клиенту объект,
     * хранящийся в статическом поле.
     */
    
    public static function connect($config)
    {
        if (!isset(static::$instance)) {
            if (!isset($config['db']['driver'])) {
                $message = __METHOD__ . ' : ' 
                . self::ERROR_UNABLE . PHP_EOL;
                throw new Exception($message);
            }

            $dsn = self::makeDsn($config['db']);        
            try {
                static::$instance = new PDO(
                    $dsn,                                                                                       
                    $config['user'], 
                    $config['password'], 
                    [
                        PDO::ATTR_ERRMODE => $config['errmode']
                    ]
                );
            } catch (PDOException $e) {
                error_log($e->getMessage());
            }
        }

        return static::$instance;
    }
    /**
     * Singleton должен содержать некоторую бизнес-логику, которая
     * может быть выполнена на его экземпляре.
     */
    
    static public function query($query)
    {
        return self::$instance->query($query);
    }
    
    
    static public function prepare($sql)
    {
        return self::$instance->prepare($sql);
    }    

    public static function makeDsn($config)
    {
        $dsn = $config['driver'] . ':';
        unset($config['driver']);
        
        foreach ($config as $key => $value) {
                $dsn .= $key . '=' . $value . ';';
        }
        return substr($dsn, 0, -1);
    }

}
