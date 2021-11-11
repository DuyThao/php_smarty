<?php

namespace App\Controllers;

use App\Models\StudentModel;
use App\Models\UserModel;
use App\Service\testService;
use Core\Http\Route;

class user extends Route
{

    //demo sql injection 
    function detail1()
    {
        $model = new UserModel;
        $url = $_GET['url'];
        $id = explode("/", $url)[1];
        $item = $model->getItem1($id);
        echo json_encode($item);
    }
    function demo()
    {
        $model = new UserModel;
        $data = $model->getList(1, 10);
        if ($data) {
            $this->tpl->assign('list_data', $data);
        }
        $this->tpl->display('demo/index.tpl');
    }
    function detail()
    {
        $model = new UserModel;
        $url = $_GET['url'];
        $id = explode("/", $url)[1];
        $item = $model->getItem($id);
        echo json_encode($item);
    }

    function displayTransfer()
    {
        $service = new testService();
        $token = $service->getCSRFToken();

        $_SESSION['token'] = $token;

        $this->tpl->assign('token', $token);

        $this->tpl->display('demo/csrf.tpl');
    }
    function transfer()
    {

        $account = $_POST['account'];
        $amount = $_POST['amount'];
        $token = $_POST['token'];
        $ss_token = $_SESSION['token'];
        if ($token != $ss_token) {
            echo "invalid csrf token ";
        } else {
            $data = [
                "account" => $account,
                "amount" => $amount,
            ];
            $inp = file_get_contents('public/data/data.json');
            $tempArray = json_decode($inp);
            array_push($tempArray, $data);
            $jsonData = json_encode($tempArray);
            file_put_contents('public/data/data.json', $jsonData);

            if (file_put_contents('public/data/data.json', $jsonData))
                echo "successfully...";
            else
                echo "Error ";
        }
    }

    function displayTransfer_unsafe()
    {
        $this->tpl->display('demo/csrf.tpl');
    }
    function transfer_unsafe()
    {

        $account = $_POST['account'];
        $amount = $_POST['amount'];
       
            $data = [
                "account" => $account,
                "amount" => $amount,
            ];

            $inp = file_get_contents('public/data/data.json');
            $tempArray = json_decode($inp);
            array_push($tempArray, $data);
            $jsonData = json_encode($tempArray);
            file_put_contents('public/data/data.json', $jsonData);


            if (file_put_contents('public/data/data.json', $jsonData))
                echo "successfully...";
            else
                echo "Error ";
        
    }

    function index()
    {
        $model = new UserModel;
        $names = $model->getList();
        var_dump($names);
        if ($names) {
            $this->tpl->assign('names', $names);
        }
        // $this->tpl->assign("Name", "Duy Thao");
        // $this->tpl->display('home/index.tpl' );
    }
    function getList()
    {
        $model = new UserModel;
        $data = $model->getList();
        echo json_encode($this->test());
    }
    function test()
    {
        $model = new UserModel;
        $data = $model->getList();
        return "hello";
    }
}
