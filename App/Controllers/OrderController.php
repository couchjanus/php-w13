<?php

require_once MODELS.'User.php';
require_once MODELS.'Order.php';

// namespace App\Controllers;

// use App\Models\Order;
// use App\Models\User;
// use Core\Helper;
// use Core\Controller;

/**
 * OrderController.php
 * 
 */

class OrderController extends Controller
{
    public function cart()
    {
        //Получаем id пользователя из сессии
        $userId = Helper::checkLog();
        //Получаем всю информацию о пользователе из БД
        $user = User::getById($userId);

        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            //Receive the RAW post data.
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);
                
            $options = [];
            User::updateProfile($userId, ["first_name" => $decoded["first_name"], "last_name" => $decoded["last_name"], "phone_number" => $decoded["phone_number"]]);
            
            Order::save($userId, json_encode($decoded['cart']));
            echo json_encode($options);
        }
    }
}