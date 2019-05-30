<?php
// AboutController.php

class AboutController extends Controller
{
    public function index()
    {
        $title = 'SHOPAHOLIC <b>ABOUT PAGE</b>';
        // render('pages/about', ['title'=>$title]);
        $this->_view->render('pages/about', ['title'=>$title]);
    }
}
