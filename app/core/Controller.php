<?php
class Controller{
    public function view($view, $data=[]){
        require_once"../app/views/". $view . ".php";
    }

    public function model($model, $param1 = null, $param2 = null){
        require_once"../app/models/". $model . ".php";
        return new $model($param1, $param2);
    }
}
?>