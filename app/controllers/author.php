<?php
class Author extends Controller
{
	public function index(){
		$id = (isset($_GET['id'])) ? $_GET['id'] : '';
		if($id > 0){
			$Articles = $this->model('Articles');
			$articles = $Articles->get_by_author($id);
		}else{
			$Categories = $this->model('Authors');
			$articles = $Categories->get_articles();
		}
		$result = array();
		if($id > 0){ $result['id'] = $id; }
		$result['data'] = $articles;
		$this->view('authors',$result);
	}
}
?>