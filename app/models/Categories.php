<?php
class Categories extends Model
{
	public function get_all(){
		$mysqli = Model::connect_db();
		$res = $mysqli->query("
			SELECT *
				FROM `Category`
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
					FROM `Category`
						WHERE `id` = '{$id}'
			");
	        $category = $res->fetch_assoc();
	        if(!empty($category)){
				return $category;
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
				FROM `Category`
					ORDER BY `id`
		");
		$categories = array();
        while($row = $res->fetch_assoc()){
            $categories[] = $row;
        }
        foreach ($categories as $key => $category) {
        	$res = $mysqli->query("
				SELECT *
					FROM `Article`
						WHERE `category_id` = '{$category['id']}'
			");
			if($res->num_rows == 1) {
	        	$categories[$key]['articles'][] = $res->fetch_assoc();
		    } elseif($res->num_rows > 1) {
		        while($row = $res->fetch_assoc()){
		            $categories[$key]['articles'][] = $row;
		        }
		    }
        }
        return $categories;
	}
}
 ?>