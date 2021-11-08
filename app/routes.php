<?php 

//student page

$router->get('/', 'StudentController@index');
$router->get('/student-add', 'StudentController@add');
$router->post('/student-add', 'StudentController@createStudent');

$router->post('/get-data-table-student', 'StudentController@getDataTable');
$router->get('/get-data-table-student', 'StudentController@getDataTable');

$router->post('/student-delete/{id}', 'StudentController@deleteStudent');
$router->post('/student-get-item/{id}', 'StudentController@getItemStudent');

$router->post('/student-update', 'StudentController@updateStudent');

$router->get('/student-detail/{id}', 'StudentController@detail');

//search test xss
// $router->get('/search-item/{text}', 'StudentController@search');
$router->post('/search-item', 'StudentController@search');
// $router->get('/search-item', 'StudentController@search');
$router->post('/search-student', 'StudentController@searchStudent');


//test 
$router->get('/test', function(){
    echo 'home';
});
$router->get('/abc', 'StudentController@abc');

$router->get('/api/v1/user/', 'User@getList');