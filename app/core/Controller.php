<?php
class Controller{
	public function model($model){
		require_once("app/models/{$model}.php");
		return new $model();
	}

	public function view($view, $data = []){
		require_once("app/views/template.php");
	}

	public function ErrorPage404()
	{
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }

    public function Redirect($url = NULL){
    	$host = 'http://'.$_SERVER['HTTP_HOST'].'/';
    	($url ? header('Location:'.$host.$url) : header('Location:'.$host));
    }
}