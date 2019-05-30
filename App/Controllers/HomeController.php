<?php
// HomeController.php

class HomeController extends Controller
{
    
    public function index()
    {
        $title = 'Our <b>Best Cat Members Home Page </b>';

        $this->_view->render('pages/index', ['title'=>$title]);
    }
}

