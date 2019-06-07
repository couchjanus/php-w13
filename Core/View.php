<?php

class View {

    protected function getHeader($path) {
        if ($this->isAdmin($path)){
            return require_once VIEWS.'partials/admin/_head.php';
        }
        return require_once VIEWS.'partials/_head.php';
    }

    protected function getFooter($path) {
        if ($this->isAdmin($path)){
            return require_once VIEWS.'partials/admin/_footer.php';
        }
        return require_once VIEWS.'partials/_footer.php';
    }

    protected function renderContent($path, $data, $error) {
        extract($data);
        return require VIEWS."/{$path}.php";
    }

    protected function isAdmin($path) {
        $admin = explode('/', $path);
        return (array_shift($admin)=='admin')? true : false;
    }

    public function render($path, $data = [], $error = false) {
        return $this->getHeader($path).$this->renderContent($path, $data, $error).$this->getFooter($path);
    }
}
