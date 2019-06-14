<?php
/**
 * RoleController.php
 * Контроллер для управления roles
 */
require_once MODELS.'Role.php';

class RoleController extends Controller
{
    /**
     * Главная страница управления roles
     *
     * @return bool
     */
    public function index()
    {
        $roles = Role::index();
        $this->_view->render('admin/roles/index', ['roles' => $roles, 'title' => 'Role List Page ', 'numRows' => count($roles)]);
    }


    /**
     * Добавление role
     *
     * @return bool
     */
    public function create()
    {
        $this->_view->render('admin/roles/create', ['title'=> 'Add New Role ']);
    }

    public function save()
    {
        $opts = [];
        array_push($opts, trim(strip_tags($_POST['name'])));
        Role::store($opts);
        Helper::redirect('/admin/roles');
    }

    public function edit($vars)
    {
        extract($vars);
        $role = role::getById($id);
        //Принимаем данные из формы
        if (isset($_POST) and !empty($_POST)) {
            $options['name'] = trim(strip_tags($_POST['name']));
            Role::update($id, $options);
            Helper::redirect('/admin/roles');
        }
        $this->_view->render('admin/roles/edit', ['role' => $role, 'title' => 'Role Edit Page ']);
    }
    public function delete($vars)
    {
        extract($vars);
        if (isset($_POST['submit'])) {
            Role::destroy($id);
            Helper::redirect('/admin/roles');
        } elseif (isset($_POST['reset'])) {
            Helper::redirect('/admin/roles');            
        }
        $title = 'Delete Role';
        $role = Role::getById($id);
        $this->_view->render('admin/roles/delete', compact('title', 'role'));
    }
}