<?php 

//student page

$router->get('/', 'StudentController@index');
$router->get('/student-list', 'StudentController@index');

$router->get('/student-add', 'StudentController@add');
$router->post('/student-add', 'StudentController@createStudent');

$router->post('/get-data-table-student', 'StudentController@getDataTable');
$router->get('/get-data-table-student', 'StudentController@getDataTable');

$router->post('/student-delete/{id}', 'StudentController@deleteStudent');
$router->post('/student-get-item/{id}', 'StudentController@getItemStudent');

$router->post('/student-update', 'StudentController@updateStudent');
$router->post('/search-student', 'StudentController@searchStudent');


//demo sql injection
$router->get('/demo', 'User@demo');

$router->get('/student-detail/{id}', 'User@detail1');

//search test xss
$router->get('/search-item/{text}', 'StudentController@searchXSS');
$router->post('/search-item', 'StudentController@search');
$router->get('/search-item', 'StudentController@search');

//csrf 
$router->get('/transfer', 'User@displayTransfer');
$router->post('/transfer', 'User@transfer');


//test 
$router->get('/test', function(){
    echo 'home';
});
$router->get('/abc', 'StudentController@abc');

$router->get('/api/v1/user/', 'User@getList');