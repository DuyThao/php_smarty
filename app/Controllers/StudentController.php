<?php


namespace App\Controllers;

use App\Models\StudentModel;
use App\Config\Smarty\SmartyTemplate;
use App\Service\testService;
use Core\Http\Route;

class StudentController extends Route
{

    function index()
    {
        $smarty_path = dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'smarty' . DIRECTORY_SEPARATOR;
        $model = new StudentModel;
        $data = $model->getList(10, 1);
        // $test_my_plugin = ['id'=>1, 'name'=>"test"];
        $test_my_plugin = 'name';
        $this->tpl->assign('test_my_plugin', $test_my_plugin);

        $service = new testService();
        $token = $service->getCSRFToken();

        $_SESSION['token'] = $token;

        $this->tpl->assign('token', $token);

        if ($data) {
            $this->tpl->assign('list_data', $data);
        }
        $this->tpl->display('student/index.tpl');
    }

    function searchStudent()
    {
        $draw = strip_tags($_POST['draw']);
        $offset = strip_tags($_POST['start']);
        $limit = strip_tags($_POST['length']);

        $search = strip_tags($_POST['search']);
        $column = strip_tags($_POST['column']);
        $type = strip_tags($_POST['type']);
        $top = strip_tags($_POST['top']);

        $list_data = [];
        $model = new StudentModel;
        $list_data = $model->search($offset, $limit, $search, $column, $type, $top);
        if ($list_data == null)
            $list_data = [];
        $count = count($list_data);

        foreach ($list_data as $key => $value) {
            array_push($list_data[$key], [
                '<div id="update_' . $list_data[$key][0] . '" class="btn btn-primary" data-toggle="modal" data-target="#edit_modal" 
                data-whatever="@getbootstrap" onclick="getItem(' . $list_data[$key][0] . ')" ><i class="far fa-edit" aria-hidden="true"></i></div> 
                <button id="delete_' . $list_data[$key][0]  . '" type="button" class="btn btn-danger" onclick="deleteStudent(' . $list_data[$key][0] . ')" ><i class="fa fa-trash"></i></button>  '
            ]);
        }
        if ($top == "true")
            $total = $count;
        else
            $total = $model->countStudent("student", $search, $column, $type);
        $results = array(
            "draw" => intval($draw),
            "recordsTotal" => $total,
            "recordsFiltered" => $total,
            "aaData" => $list_data
        );
        echo json_encode($results);
    }
    function createStudent()
    {
        $token = $_POST['token'];
        $ss_token = $_SESSION['token'];
        if ($token != $ss_token) {
            echo json_encode(['code' => 500]);
        } else {
            $model = new StudentModel;

            $data = $this->xssafe($_POST['data']);
            $result =  $model->create($data);

            echo ($result);
        }
    }
    function deleteStudent()
    {
        $model = new StudentModel;
        $url = $_GET['url'];
        $id = addslashes(explode("/", $url)[1]);

        $data = $_POST;
        $token = array_shift(array_keys($data));
        $ss_token = $_SESSION['token'];

        if ($token != $ss_token) {
            echo json_encode(['code' => 500]);
        } else {
            echo $model->delete($id);
        }
    }

    function getItemStudent()
    {
        $model = new StudentModel;
        $url = $_GET['url'];
        $id = explode("/", $url)[1];
        $item = $model->getItem($id);
        echo json_encode($item);
    }

    function updateStudent()
    {
        $token = $_POST['token'];
        $ss_token = $_SESSION['token'];
        if ($token != $ss_token) {
            echo json_encode(['code' => 500]);
        } else {
            $model = new StudentModel;
            $student = $this->xssafe($_POST['data']);
            echo $model->update($student);
        }
    }
    public function xssafe($data, $encoding = 'UTF-8')
    {
        $student = new StudentModel;
        foreach ($data as $key => $value) {
            $student->$key = htmlspecialchars($value, ENT_QUOTES | ENT_HTML401, $encoding);
        }
        return $student;
    }
    function getDataTable()
    {
        $draw = strip_tags($_POST['draw']);
        $offset = strip_tags($_POST['start']);
        $limit = strip_tags($_POST['length']);
        // $value = strip_tags($_POST['search']);

        $list_data = [];
        $model = new StudentModel;
        $list_data = $model->getList($offset, $limit);


        $data = [];
        $index = ($offset) + 1;
        $count = $model->count("student");

        foreach ($list_data as $key => $value) {

            array_push($list_data[$key], [
                '<div id="update_' . $list_data[$key][0] . '" class="btn btn-primary" data-toggle="modal" data-target="#edit_modal" 
                data-whatever="@getbootstrap" onclick="getItem(' . $list_data[$key][0] . ')" ><i class="far fa-edit" aria-hidden="true"></i></div> 
                <button id="delete_' . $list_data[$key][0]  . '" type="button" class="btn btn-danger" onclick="deleteStudent(' . $list_data[$key][0] . ')" ><i class="fa fa-trash"></i></button>  '
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

    //demo xss echo htmlspecialchars($var)
    function search()
    {
        $url = $_GET['search_test'];
        $search = $_SERVER['QUERY_STRING'];
        // echo ("kết quả ". $search);
        // if (isset($_GET['search_test'])) {
        echo ($url);
        // }
    }

    function searchXSS()
    {
        $url = $_GET("URL");
        // echo ("kết quả ". $url);
        // if (isset($_GET['search_test'])) {

        echo ($url);
        // }
    }

    function abc()
    {
        echo ("hahhaa");
    }
}
