<?php
class Home extends Controller
{
	public function index(){
		$is_login = false;

		$Categories = $this->model('Categories');

		$Articles = $this->model('Articles');
		$all_articles = $Articles->get_all();
		$this->view('index',$all_articles);
	}

	public function login()
	{
		if(isset($_POST['loginuser'])){
			$user = $this->model('Users');
			if($user->login($_POST['login'], $_POST['password']) === true){
				return $this->Redirect();
			}
		}
		$this->view('login');
	}
	public function exit()
	{
		$user = $this->model('Users');
		$user->exit();
		return $this->Redirect();
	}
}