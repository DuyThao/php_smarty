<?php


namespace App\Controllers;

use App\Models\StudentModel;
use App\Config\Smarty\SmartyTemplate;
use App\Service\testService;
use Core\Http\Route;

class StudentController extends Route {

    function index() {
        $smarty_path = dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'smarty' . DIRECTORY_SEPARATOR;
        $model = new StudentModel;
        $data = $model->getList(10, 1);
        // $test_my_plugin = ['id'=>1, 'name'=>"test"];
        $test_my_plugin = 'name';
        $this->tpl->assign('test_my_plugin', $test_my_plugin);
        if($data) {
            $this->tpl->assign('list_data', $data);
        }
        $this->tpl->display( 'student/index.tpl' );

    }

    //demo sql injection 
    function detail(){

        $model = new StudentModel;
        $url = $_GET['url'];
        $id= explode("/", $url)[1];
        $item = $model->getItem($id);
        echo json_encode($item);

    }
    //demo xss echo htmlspecialchars($var)
    function search(){

        // $url = $_GET("URL");
        $search = $_POST['search_test'];
        // echo ("kết quả nè". $search);
        // if (isset($_GET['search_test'])) {
            echo ($search);
        // }
    }
    function searchStudent(){
        $text= $_POST['text'];
        // echo($text);
        $model = new StudentModel;

       
        $a= $model->search($text);
        echo json_encode($a);

    }
    function createStudent() {
        $model = new StudentModel;

        $data = $_POST['data'];

        $data = strip_tags( $_POST['data']);


        // $name = $student['name'];
       
        echo $model->create($data);
        
    }
    function deleteStudent(){
        $model = new StudentModel;
        $url = $_GET['url'];
        $id= explode("/", $url)[1];
        echo $model->delete($id);
    }

    function getItemStudent(){
        $model = new StudentModel;
        $url = $_GET['url'];
        $id= explode("/", $url)[1];
        $item = $model->getItem($id);
        echo json_encode($item);
    }
    
    function updateStudent(){
        $model = new StudentModel;
        $student =strip_tags($_POST['data']);
        echo $model->update($student);
        
    }
    function getDataTable(){
            
            $draw = strip_tags( $_POST['draw']);
            $offset = strip_tags($_POST['start']);
            $limit = strip_tags($_POST['length']);
            // $value = strip_tags($_POST['search']);

            $list_data =[];
            $model = new StudentModel;
            $list_data = $model->getList($offset , $limit );
            

            $data = [];
            $index = ($offset) + 1;
            $count = $model->count("student");
            
            foreach ($list_data as $key=> $value) {
                
                array_push($list_data[$key], ['<div id="update_' . $list_data[$key][0] . '" class="btn btn-primary" data-toggle="modal" data-target="#edit_modal" 
                data-whatever="@getbootstrap" onclick="getItem('.$list_data[$key][0].')" ><i class="far fa-edit" aria-hidden="true"></i></div> 
                <button id="delete_' . $list_data[$key][0]  . '" type="button" class="btn btn-danger" onclick="deleteStudent('.$list_data[$key][0].')" ><i class="fa fa-trash"></i></button>  '
                ]);
            }
            
            $results = array(
                "draw" => intval($draw),
                "recordsTotal" => $count,
                "recordsFiltered" => $count,
                "aaData" => $list_data
            );
            echo json_encode($results);
    }
    
    function abc() {
        echo("hahhaa");
       
    }
}