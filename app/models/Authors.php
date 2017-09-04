<?php
class Authors extends Model
{
	public function get_all(){
		$mysqli = Model::connect_db();
		$res = $mysqli->query("
			SELECT *
				FROM `Author`
					ORDER BY `id`
		");
		if($res->num_rows == 1) {
        	$authors = $res->fetch_assoc();
	    } elseif($res->num_rows > 1) {
	        $authors = array();
	        while($row = $res->fetch_assoc()){
	            $authors[] = $row;
	        }
	    }
		return $authors;
	}
	public function get_item($id){
		if($id > 0){
			$mysqli = Model::connect_db();
			$res = $mysqli->query("
				SELECT *
					FROM `Author`
						WHERE `id` = '{$id}'
			");
	        $author = $res->fetch_assoc();
	        if(!empty($author)){
				return $author;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public function get_articles(){
		$mysqli = Model::connect_db();
        $res = $mysqli->query("
			SELECT *
				FROM `Article`
		");
		if($res->num_rows == 1) {
        	$articles = $res->fetch_assoc();
	    } elseif($res->num_rows > 1) {
	        $articles = array();
	        while($row = $res->fetch_assoc()){
	            $articles[] = $row;
	        }
	    }
	    $sort_articles = array();
	    foreach ($articles as $article) {
	    	$authors = json_decode($article['authors'], true);
	    	$count = count($authors);
	    	if($count > 1){
				foreach ($authors as $author) {
					$sort_articles[$author][] = $article;
				}
			}else{
				$sort_articles[$authors][] = $article;
			}
	    }
	    $res = $mysqli->query("
			SELECT *
				FROM `Author`
					ORDER BY `id`
		");
		$authors = array();
        while($row = $res->fetch_assoc()){
            $authors[] = $row;
        }
        $result = array();
        foreach ($authors as $key => $author) {
        	$id = $author['id'];
        	$result[$id]['name'] = "{$author['firstName']} {$author['lastName']}";
        	$result[$id]['articles'] = (!empty($sort_articles[$id]))?$sort_articles[$id]:'';
        }
        return $result;
	}
}
 ?>