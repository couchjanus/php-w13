<?php
namespace Core;
class Helper {

    public static function redirect($redirect_url = '/')
    {
        header('HTTP/1.1 200 OK');
        header('Location: http://'.$_SERVER['HTTP_HOST'].$redirect_url);
        exit();
    }

    // Вместо числового статуса категории, отображаем определенную строку
    public static function getStatusText($status)
    {
        switch ($status) {
           case '1' :
               return 'Новый';
               break;
            case '2' :
                return 'В обработке';
                break;
            case '3' :
                return 'Доставляется';
                break;
            case '4' :
                return 'Закрыт';
                break;
        }
    }
/**
     * 
     *Запись пользователя в сессию
     *
     * @param $userId
     */
    
    public static function auth($userId)
    {
        Session::set('userId', $userId);
        Session::set('logged', true);
    }

    /**
     * Проверяем, авторизован ли пользователь при переходе в личный кабинет
     *
     * @return mixed
     */
    public static function checkLog()
    {
         //Если сессия есть, то возвращаем id пользователя
        if ((Session::get('userId'))) {
            return Session::get('userId');
        }
        self::redirect('/login');
    }

    /**
     * Проверяем наличие открытой сессии у пользователя для
     * отображения на сайте необходимой информации
     *
     * @return bool
     */
    public static function isGuest()
    {
        if (Session::get('logged') == true) {
            return false;
        }
        return true;
    }

    public static function dd($mix)
    {
        echo '<pre>'.print_r($mix, true).'</pre>';
    }

}
