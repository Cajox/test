<?php

$router = new Bramus\Router\Router();

//Login and Logout
$router->get('/login', '\App\Controllers\Auth\LoginController@index');
$router->post('/loginSubmit', '\App\Controllers\Auth\LoginController@login');
$router->get('/logout' , '\App\Controllers\Auth\LoginController@logout');

//Register
$router->get('/register', '\App\Controllers\Auth\RegisterController@index');
$router->post('/registerSubmit', '\App\Controllers\Auth\RegisterController@register');

//HomePage
$router->get('/', '\App\Controllers\HomeController@homePage');

//Comments
$router->post('/createComment', '\App\Controllers\CommentController@createComment');
$router->post('/update/comment/active', '\App\Controllers\CommentController@updateCommentActive');

//Admin INDEX
$router->get('/admin/index', '\App\Controllers\UserController@adminIndex');

return $router;

