<?php
class Controller_Main extends Controller
{
	function action_index()
	{
		$is_login = false;

		include "application/models/Articles.php";
		$Articles = new Articles;
		$all_articles = $Articles->get_all();

		$this->view->generate('main_view.php', 'template_view.php', json_encode($all_articles));
	}

	function action_login()
	{
		if(isset($_POST['loginuser'])){
			include "application/models/Users.php";
			$user = new Users;
			if($user->login($_POST['login'], $_POST['password']) === true){
				return Route::Redirect();
			}else{
			}
		}
		$this->view->generate('login_view.php', 'template_view.php');
	}
	function action_exit()
	{
		include "application/models/Users.php";
		$user = new Users;
		$user->exit();
		return Route::Redirect();
	}
}
?>