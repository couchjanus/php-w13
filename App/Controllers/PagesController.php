<?php

class PagesController extends Controller
{
    
    public function notFound()
    {
        $this->_view->renderView('errors/404');
    }
}

