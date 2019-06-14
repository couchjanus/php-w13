<?php

require_once MODELS.'User.php';

/**
 * ProfileController.php
 * Контроллер для authetication users
 */

class ProfileController extends Controller
{
    private $userId;
    private $user;

    public function __construct()
    {
        parent::__construct();
        //Получаем id пользователя из сессии
        $this->userId = Helper::checkLog();
        //Получаем всю информацию о пользователе из БД
        $this->user = User::getById($this->userId);
    }

    /**
     * страница index
     *
     * @return bool
     */

    public function index()
    {
        $userId = Helper::checkLog();
        $user = User::getById($userId);

        if ($user['role_id']==1) {
            $this->_view->render('admin/index', compact('user'));
        } else {
            $this->_view->render('profile/index', compact('user'));
        }
        
    }

    /**
     * Редактирование профиля
     *
     * @return bool
    */
    public function edit()
    {
        $title = 'Личный кабинет ';
        $user = $this->user;
        $this->_view->render('profile/edit', compact('user', 'title'));
    }

    public function update()
    {
        $res = false;
        //Флаг ошибок
        $errors = false;
        
        $options['name'] = trim(strip_tags($_POST['name']));
        $options['phone_number'] = trim(strip_tags($_POST['phone_number']));
        $options['first_name'] = trim(strip_tags($_POST['first_name']));
        $options['last_name'] = trim(strip_tags($_POST['last_name']));

        // Валидация полей
        // if (!User::checkName($options['name'])) {
        //     $errors[] = "Имя не может быть короче 2-х символов";
        // }
        if ($errors == false) {
            $res = User::updateProfile($this->userId, $options);
        }
    }

    /**
     * Просмотр истории заказов пользователя
     *
     * @return bool
    */

    public function ordersList()
    {
        
    }

    
}