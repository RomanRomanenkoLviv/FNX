<?php
class Controller_author extends Controller
{
	public function action_index(){
		$routes = explode('/', $_SERVER['REQUEST_URI']);
		$i = count($routes) - 1;
		$id = $routes[$i];
		include "application/models/Articles.php";
		$Articles = new Articles;
		$articles = $Articles->get_by_author($id);
		if($articles === false){
			include "application/models/Authors.php";
			$Authors = new Authors;
			$articles = $Authors->get_articles($id);
			$this->view->generate('authors_view.php', 'template_view.php', json_encode($articles));
		}else{
			$this->view->generate('author_view.php', 'template_view.php', json_encode($articles));
		}
	}
}
?>