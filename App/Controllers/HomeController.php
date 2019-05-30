<?php
// HomeController.php

class HomeController extends Controller
{
    // Class properties and methods go here   
    public function index()
    {
        $title = 'Our <b>Best Cat Members Home Page </b>';
        // render('pages/index', ['title'=>$title]);
        $this->_view->render('pages/index', ['title'=>$title]);
    }
}

