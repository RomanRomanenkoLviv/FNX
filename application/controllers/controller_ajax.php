<?php
class Controller_Ajax extends Controller
{
	function action_index()
	{
		if(isset($_GET['action'])){
			switch ($_GET['action']) {
				case 'buy_article':
					include "application/models/Users.php";
					$user = new Users;
					if($user->buy_article($_GET['id']) === true){
						echo 'succesBuying';
					}
					break;
			}
		}
	}
}
?>