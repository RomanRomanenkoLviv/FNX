<?php
class Controller_category extends Controller
{
	public function action_index(){
		$routes = explode('/', $_SERVER['REQUEST_URI']);
		$i = count($routes) - 1;
		$id = $routes[$i];
		include "application/models/Articles.php";
		$Articles = new Articles;
		$articles = $Articles->get_by_category($id);
		if($articles === false){
			include "application/models/Categories.php";
			$Categories = new Categories;
			$articles = $Categories->get_articles();
			$this->view->generate('categories_view.php', 'template_view.php', json_encode($articles));
		}else{
			$this->view->generate('category_view.php', 'template_view.php', json_encode($articles));
		}
	}
}
?>