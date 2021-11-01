<?php


namespace App\Controllers;

use App\Models\HomeModel;
use App\Config\Smarty\SmartyTemplate;
use Core\Http\Route;

class home extends Route{

    function index() {
        $model = new HomeModel;
        $names = $model->getNames();
        if($names) {
            $this->tpl->assign('names', $names);
        }
        // $this->tpl->assign("Name", "Duy Thao");
        $this->tpl->display('home/index.tpl' );
    }
    
    function abc() {
        echo("hêhhe");
       
    }
}