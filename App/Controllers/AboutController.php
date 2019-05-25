<?php
// AboutController.php

class AboutController
{
    // Class properties and methods go here   
    public function __construct()
    {
        render('pages/about', ['title'=>'About <b>Our Cats</b> Page']);
    }
    
    public function index()
    {
        $title = 'SHOPAHOLIC <b>ABOUT PAGE</b>';
        render('pages/about', ['title'=>$title]);
    }

}
