<?php
// ContactController.php

class ContactController
{
    public function index()
    {
        $title = 'SHOPAHOLIC <b>Contact PAGE</b>';
        render('pages/contact', ['title'=>$title]);
    }
}
