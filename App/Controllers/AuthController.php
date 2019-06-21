<?php
/**
 * AuthController.php
 * Контроллер для authetication users
 */
require_once MODELS.'User.php';

class AuthController extends Controller
{
    /**
     * страница signup
     *
     * @return bool
     */

    public function signup()
    {
        if (isset($_POST) and (!empty($_POST))) {

            $password = trim(strip_tags($_POST['password']));
            $confirmpassword = trim(strip_tags($_POST['confirmpassword']));

            if (self::is_valid_passwords($password, $confirmpassword))
            {
                $email = trim(strip_tags($_POST['email']));
                $options['email'] = $email;
                list($name, $domain) = explode('@', $email);
                $options['name'] = $name;
                $options['role'] = 3;
                $options['password'] = $password;
                
                if (User::store($options)) {
                    Helper::redirect('/login');
                }else{
                    echo 'Error Registering User!';
                }
            }
            
        }
        
        $this->_view->auth('auth/register');
    }

    // method for password verification
    static private function is_valid_passwords($password, $confirmpassword) 
    {
        // Your validation code.
        if (empty($password)) {
            echo "Password is required.";
            return false;
        } else if ($password != $confirmpassword) {
            // error matching passwords
            echo 'Your passwords do not match. Please type carefully.';
            return false;
        }
        // passwords match
        return true;
    }

    /**
     * Авторизация пользователя
     *
     * @return bool
     */
    public function signin()
    {
        if (Session::get('logged') == true) {
            Helper::redirect('/profile'); //перенаправляем в личный кабинет
        }
        
        if (isset($_POST) and (!empty($_POST))) {
            $email = trim(strip_tags($_POST['email']));
            $password = $_POST['password'];
            
            // Проверяем, существует ли пользователь
            $userId = (int)User::checkUser($email, $password);
            // var_dump($userId);
            // exit();
            if ($userId == false) {
                $data['errors'][] = "Пользователя с таким email или паролем не существует";
            } else {
                $this->user = User::getById($userId);
                Helper::auth($userId); //записываем пользователя в сессию
                Helper::redirect('/profile'); //перенаправляем в личный кабинет
            }
        }        
        $this->_view->auth('auth/login');
    }
    /**
     * Выход из учетной записи
     *
     * @return bool
     */
    public function logout()
    {
        Session::destroy();
        Helper::redirect('/');
    }   
    public function loggedCheck()
    {
        if (!Session::get('logged') == true) {
            $response = array(
                    'r' => 'fail',
                    'url' => 'login'
                );
        } else {

            $userId = Helper::checkLog();
            $user = User::getById($userId);
                        
            $response = [
                'phone_number' => $user['phone_number'],
                'last_name' => $user['last_name'],
                'first_name' => $user['first_name']
            ];
            
        }

        echo json_encode($response);
        // exit;
    }
}