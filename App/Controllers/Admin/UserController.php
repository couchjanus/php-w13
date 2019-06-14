<?php
/**
 * UserController.php
 * Контроллер для управления users
 */
require_once MODELS.'User.php';
require_once MODELS.'Role.php';

class UserController extends Controller
{
    /**
     * Главная страница управления users
     *
     * @return bool
     */
    public function index()
    {
        $users = User::index();
        $title = 'User List Page';
        $numRows = count($users);
        $this->_view->render('admin/users/index', compact('users', 'title', 'numRows'));
    }

    /**
     * Добавление user
     *
     * @return bool
     */

    public function create()
    {
        if (isset($_POST) and !empty($_POST)) {
            $options['name'] = trim(strip_tags($_POST['name']));
            $options['email'] = trim(strip_tags($_POST['email']));
            $options['role'] = $_POST['role'];
            $options['password'] = trim(strip_tags($_POST['password']));
            User::store($options);
            Helper::redirect('/admin/users');
        }
        $title = 'Create User';
        $roles = Role::index();
        $this->_view->render('admin/users/create', compact('title', 'roles'));
         
    }

    public function edit($vars)
    {
        extract($vars);
        $user = User::getById($id);
        if (isset($_POST) and !empty($_POST)) {
            $options['name'] = trim(strip_tags($_POST['name']));
            $options['email'] = trim(strip_tags($_POST['email']));
            $options['password'] = trim(strip_tags($_POST['password']));
            $options['role_id'] = (int) $_POST['role_id'];
            $options['status'] = $_POST['status'];

            User::update($id, $options);
                        
            Helper::redirect('/admin/users');
            
        }
        $title = 'Admin User Edit Page ';
        $roles = Role::index();
        $user = $user;
        $this->_view->render('admin/users/edit', compact('user', 'title', 'roles'));
    }
    
    public function delete($vars)
    {
        extract($vars);
        if (isset($_POST['submit'])) {
            user::destroy($id);
            Helper::redirect('/admin/users');
        } elseif (isset($_POST['reset'])) {
            Helper::redirect('/admin/users');            
        }
        $title = 'Delete user';
        $user = user::getById($id);
        $this->_view->render('admin/users/delete', compact('title', 'user'));
    }
}