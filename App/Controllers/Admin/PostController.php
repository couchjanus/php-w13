<?php

require_once MODELS.'Post.php';

class PostController extends Controller
{
    public function index()
    {
        $data['posts'] = Post::selectAll();
        $data['title'] = 'Admin Posts Page ';
        $data['title'] = 'Admin Posts Page';
        $this->_view->renderView('admin/posts/index', $data);
    }
    
    public function create()
    {
        $data['title'] = 'Admin Add Post ';
        $this->_view->renderView('admin/posts/create', $data);
    }

    public function store()
    {
        $opts['title'] = trim(strip_tags($_POST['title']));
        $opts['content'] = trim($_POST['content']);
        $opts['status'] = $_POST['status'];
        Post::store($opts);
        $this->redirect('/admin/posts');
    }

    public function edit($vars)
    {
        extract($vars);
        $data['title'] = 'Admin Edit Post ';
        $data['post'] = Post::getPostById($id);
        $this->_view->renderView('admin/posts/edit', $data);
    }

    public function update($vars)
    {
        extract($vars);
        $options['title'] = trim(strip_tags($_POST['title']));
        $options['content'] = trim($_POST['content']);
        $options['status'] = trim(strip_tags($_POST['status']));
        Post::update($id, $options);
        $this->redirect('/admin/posts');
    }

    public function delete($vars)
    {
        extract($vars);
        if (isset($_POST['submit'])) {

            Post::destroy($id);
            $this->redirect('/admin/posts');
        
        } elseif (isset($_POST['reset'])) {
            $this->redirect('/admin/posts');            
        }

        $data['title'] = 'Admin Delete Post ';
        $data['post'] = Post::getPostById($id);
        $this->_view->renderView('admin/posts/delete', $data);
    }

    public function show($vars)
    {
        extract($vars);
        // var_dump($id);
        $data['title'] = 'Admin Show Post ';
        $data['post'] = Post::getPostById($id);
        $this->_view->renderView('admin/posts/show', $data);

    }
}
