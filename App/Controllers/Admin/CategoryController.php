<?php
/**
 * CategoryController.php
 * Контроллер для управления категориями
 */
require_once MODELS.'Category.php';

class CategoryController extends Controller
{
    /**
     * Главная страница управления категориями
     *
     * @return bool
     */
    public function index()
    {
        // $categories = new Category();
        // $categories = $categories->index();
        $categories = Category::index();
        $data['categories'] = $categories;
        $data['title'] = 'Category List Page ';
        $data['numRows'] = count($categories);
        $this->_view->render('admin/categories/index', $data);
    }
    /**
     * Добавление категории
     *
     * @return bool
     */
    public function create()
    {
        if (isset($_POST) and !empty($_POST)) {
            $opts = [];
            array_push($opts, trim(strip_tags($_POST['name'])));
            array_push($opts, $_POST['status']);
            // $category = new Category();
            // $category->store($opts);
            Category::store($opts);
            Helper::redirect('/admin/categories');
        }

        $data['title'] = 'Admin Category Add New Category ';
        $this->_view->render('admin/categories/create', $data);
    }

    public function edit($vars)
    // public function edit()
    {
        extract($vars);
        // $id=1;
        $category = Category::getCategoryById($id);

        //Принимаем данные из формы
        if (isset($_POST) and !empty($_POST)) {
            $options['name'] = trim(strip_tags($_POST['name']));
            $options['status'] = $_POST['status'];
            Category::update($id, $options);
            Helper::redirect('/admin/categories');
        }
        $data['category'] = $category;
        $data['title'] = 'Admin Category Edit Page ';
        $this->_view->render('admin/categories/edit', $data);
    }
    public function delete($vars)
    {
        extract($vars);
        if (isset($_POST['submit'])) {
            Category::destroy($id);
            Helper::redirect('/admin/categories');
        } elseif (isset($_POST['reset'])) {
            Helper::redirect('/admin/categories');
        }
        $data['title'] = 'Admin Delete Category ';
        $data['category'] = Category::getCategoryById($id);
        $this->_view->render('admin/categories/delete', $data);
    }
}
