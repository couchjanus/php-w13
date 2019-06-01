<?php

/**
 * Класс Singleton предоставляет метод `GetInstance`, который ведёт себя как
 * альтернативный конструктор и позволяет клиентам получать один и тот же
 * экземпляр класса при каждом вызове.
 */
class Singleton
{
    /**
     * Объект одиночки храниться в статичном поле класса. Это поле — массив, так
     * как мы поволим Singleton иметь подклассы. Все элементы этого
     * массива будут экземплярами кокретных подклассов Singleton.
     */
    private static $instances = [];

    /**
     * Конструктор Singleton всегда должен быть скрытым, чтобы предотвратить
     * создание объекта через оператор new.
     */
    protected function __construct() { }

    /**
     * Singleton не должны быть клонируемыми.
     */
    protected function __clone() { }

    /**
     * Singleton не должны быть восстанавливаемыми из строк.
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
     *
     * Эта реализация позволяет вам расширять класс Singleton, сохраняя повсюду
     * только один экземпляр каждого подкласса.
     */
    public static function getInstance(): Singleton
    {
        $cls = static::class;
        if (!isset(static::$instances[$cls])) {
            static::$instances[$cls] = new static;
        }

        return static::$instances[$cls];
    }

    /**
     * Singleton должен содержать некоторую бизнес-логику, которая
     * может быть выполнена на его экземпляре.
     */
    public function someBusinessLogic()
    {
        // ...
    }
}

/**
 * Клиентский код.
 */
function clientCode()
{
    $s1 = Singleton::getInstance();
    $s2 = Singleton::getInstance();
    if ($s1 === $s2) {
        echo "Singleton works, both variables contain the same instance.";
    } else {
        echo "Singleton failed, variables contain different instances.";
    }
}

clientCode();

// Output: Результат выполнения
// Singleton works, both variables contain the same instance.

