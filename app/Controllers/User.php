<?php

namespace App\Controllers;

use App\Models\UserModel;

class user extends BaseController{

    function index() {
        $model = new UserModel;
        $names = $model->getList();
        var_dump($names);
        if($names) {
            $this->tpl->assign('names', $names);
        }
        // $this->tpl->assign("Name", "Duy Thao");
        // $this->tpl->display('home/index.tpl' );
    }
    function getList() {
        $model = new UserModel;
        $data = $model->getList();
        echo json_encode($this->test());

    }
    function test() {
        $model = new UserModel;
        $data = $model->getList();
        return "hello";

    }
}