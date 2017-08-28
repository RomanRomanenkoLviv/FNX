<?php
class Controller_article extends Controller
{
	public function action_index(){
		$routes = explode('/', $_SERVER['REQUEST_URI']);
		$i = count($routes) - 1;
		$id = $routes[$i];
		include "application/models/Articles.php";
		$Articles = new Articles;
		$article = $Articles->get_item($id);
		if($article === false){
			Route::ErrorPage404();
		}else{
			$this->view->generate('article_view.php', 'template_view.php', json_encode($article));
		}
	}
}
?>