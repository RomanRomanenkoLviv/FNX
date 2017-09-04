<?php
class Ajax extends Controller
{
	function index()
	{
		if(isset($_GET['action'])){
			switch ($_GET['action']) {
				case 'buy_article':
					$user = $this->model('Users');
					if($user->buy_article($_GET['id']) === true){
						echo 'succesBuying';
					}
					break;
			}
		}
	}
}
?>