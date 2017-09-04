<?php
class Articles extends Model
{
	public function get_all(){
		$mysqli = Model::connect_db();
		$res = $mysqli->query("
			SELECT *
				FROM `Article`
					ORDER BY `id`
		");
		if($res->num_rows == 1) {
        	$articles = $res->fetch_assoc();
	    } elseif($res->num_rows > 1) {
	        $articles = array();
	        while($row = $res->fetch_assoc()){
	            $articles[] = $row;
	        }
	    }
		return $articles;
	}
	public function get_item($id){
		$mysqli = Model::connect_db();
		$res = $mysqli->query("
			SELECT *
				FROM `Article`
					WHERE `id` = '{$id}'
		");
        $article = $res->fetch_assoc();
        if(!empty($article)){
			return $article;
		}else{
			return false;
		}
	}

	public function get_by_category($id){
		$mysqli = Model::connect_db();
		$res = $mysqli->query("
			SELECT *
				FROM `Category` AS `c`
				JOIN `Article` AS `a` ON (`a`.`category_id` = `c`.`id`)
					WHERE `c`.`id` = '{$id}'
		");
        $articles = array();
        while($row = $res->fetch_assoc()){
            $articles[] = $row;
        }
        if(!empty($articles)){
			return $articles;
		}else{
			return false;
		}
	}

	public function get_by_author($id){
		$all = $this->get_all();
		$articles = array();
		foreach ($all as $article) {
			$authors = json_decode($article['authors'], true);
			$count = count($authors);
			if($count > 1){
				foreach ($authors as $author) {
					if($author == $id){
						$articles[] = $article;
					}
				}
			}else{
				if($authors == $id){
					$articles[] = $article;
				}
			}
		}
        if(!empty($articles)){
			return $articles;
		}else{
			return false;
		}
	}
}
 ?>