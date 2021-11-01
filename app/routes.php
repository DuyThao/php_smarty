<?php 

// action là callback
$router->get('/test', function(){
    echo 'home';
});
$router->get('/home', 'Home@index');
$router->get('/abc', 'Home@abc');

$router->get('/api/v1/user/', 'User@getList');