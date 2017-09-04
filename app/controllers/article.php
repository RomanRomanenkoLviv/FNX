<?php
class Article extends Controller
{
	public function index(){
		$id = (isset($_GET['id'])) ? $_GET['id'] : '';
		$Articles = $this->model('Articles');
		$article = $Articles->get_item($id);
		if($article === false){
			$this->view('404');
		}else{
			$this->view('article',$article);
			// $this->view->generate('article_view.php', 'template_view.php', json_encode($article));
		}
	}
}
?>