<?php

function getURI()
{
    if (isset($_SERVER['REQUEST_URI']) and !empty($_SERVER['REQUEST_URI']))
        return trim($_SERVER['REQUEST_URI'], '/');
}

// получаем строку запроса
switch (getURI()) {
    case '':
        require_once CONTROLLERS.'HomeController.php';
        break;
    case 'index.php':
        require_once CONTROLLERS.'HomeController.php';
        break;
    case 'about':
        require_once CONTROLLERS.'AboutController.php';
        break;
    case 'contact':
        require_once CONTROLLERS.'FeedbackController.php';
        break;
    case 'form':
        require_once CONTROLLERS.'FormController.php';
        break;

    case 'index.php/form':
        require_once CONTROLLERS.'FormController.php';
        break;
    case 'guestbook':
        require_once CONTROLLERS.'GuestbookController.php';
        break;
    case 'feedback':
        require_once CONTROLLERS.'FeedbackController.php';
        break;
    default:
        require_once VIEWS.'errors/404.php';
}
