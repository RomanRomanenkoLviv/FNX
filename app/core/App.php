<?php

Class App{
	protected $controller = "home";
	protected $method = "index";
	protected $params = [];

	public function __construct(){
		$url = $this->parseUrl();
		if(isset($url[0])){
			if(file_exists("app/controllers/{$url[0]}.php")){
				$this->controller = $url[0];
			}
		}

		require_once("app/controllers/{$this->controller}.php");
		$this->controller = new $this->controller;

		if(isset($url[1])){
			if(method_exists($this->controller, $url[1])){
				$this->method = $url[1];
			}
		}

		$this->params = [];
		call_user_func_array([$this->controller, $this->method], $this->params);
	}

	public function parseUrl(){
		$url = explode('/', $_SERVER['REQUEST_URI']);
		array_splice($url, 0, 1);
		if(!empty($url)){
			$return = [];
			if(isset($url[0]) && ( $url[0] == 'login' || $url[0] == 'exit') ){
				$return[] = "home";
				$return[] = $url[0];
				return $return;
			}
			if(isset($url[1]) && strrpos($url[1], '?') !== false){
				unset($url[1]);
			}
			return $url;
		}
		return [];
	}
}