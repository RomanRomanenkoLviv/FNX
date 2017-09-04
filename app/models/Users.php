<?php
class Users extends Model
{
	public function is_login(){
		if(isset($_COOKIE['can_see'])){
			$id = $_COOKIE['can_see'];

			$mysqli = Model::connect_db();
			$res = $mysqli->query("
				SELECT `username`
					FROM `User`
						WHERE `id` = '{$id}'
			");
			$user = $res->fetch_assoc();
			if(!is_null($user['username'])){
				return true;
			}else{
				setcookie ("can_see", "", time() - 3600);
				return false;
			}
		}else{
			return false;
		}
	}

	public function login($login, $password){
		$mysqli = Model::connect_db();
		$res = $mysqli->query("
			SELECT `id`, `username`, `password`
				FROM `User`
					WHERE `username` = '{$login}'
		");
		$user = $res->fetch_assoc();
		if(md5($password) == $user['password']){
			SetCookie("can_see",$user['id'],time()+3600*24*30); // 30 days
			return true;
		}else{
			setcookie ("can_see", "", time() - 3600);
			return false;
		}
	}

	public function exit(){
		setcookie ("can_see", "", time() - 3600);
	}

	public function get_user(){
		if($this->is_login() === true){
			$id = $_COOKIE['can_see'];

			$mysqli = Model::connect_db();
			$res = $mysqli->query("
				SELECT *
					FROM `User`
						WHERE `id` = '{$id}'
			");
			$user = $res->fetch_assoc();
			if(!is_null($user['username'])){
				return $user;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public function is_bought($article_id){
		if($this->is_login() === true){
			$id = $_COOKIE['can_see'];

			$mysqli = Model::connect_db();
			$res = $mysqli->query("
				SELECT *
					FROM `User`
						WHERE `id` = '{$id}'
			");
			$user = $res->fetch_assoc();
			if(!empty($user['articles'])){
				$articles = json_decode($user['articles'], true);
				$count = count($articles);
				foreach ($articles as $article) {
					if($article == $article_id){
						return true;
					}
				}
			}
		}
		return false;
	}
	public function buy_article($article_id){
		if($this->is_login() === true){
			$id = $_COOKIE['can_see'];

			$mysqli = Model::connect_db();
			$res = $mysqli->query("
				SELECT *
					FROM `User`
						WHERE `id` = '{$id}'
			");
			$user = $res->fetch_assoc();
			$Controller = new Controller;
			$article_model = $Controller->model('Articles');
			$article_info = $article_model->get_item($article_id);

			if($user['wallet'] >= $article_info['price']){
				$wallet = $user['wallet'] - $article_info['price'];
				$articles = json_decode($user['articles'], true);
				$count = count($articles);
				if($count > 1){
					$articles[] = $article_id;
				}elseif($count == 1){
					$article = $articles[0];
					$articles = array();
					$articles[] = $article;
					$articles[] = $article_id;
				}else{
					$articles = array();
					$articles[] = $article_id;
				}
				$articles = json_encode($articles);
				$res = $mysqli->query("
					UPDATE `User`
						SET `wallet` = '{$wallet}',
							`articles` = '{$articles}'
							WHERE `id` = '{$id}'
				");
				return true;
			}
		}
		return false;
	}
}