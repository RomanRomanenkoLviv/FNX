<?php

class Model_general extends Model
{
	public static function getMembers($data = null){
		$result = null;
		$getdata = (is_null($data)) ? get_db_data(false, 'members', false, '`death_date` IS NULL AND `exclusion_date` IS NULL AND `retirement_date` IS NULL', '`id` DESC', false, true) : $data ;
		foreach ($getdata as $member){
            $member['birthday_day'] = (strlen($member['birthday_day']) == 1 && $member['birthday_day'] > 0) ? '0'.$member['birthday_day'] : $member['birthday_day'];
            $member['birthday_month'] = (strlen($member['birthday_month']) == 1 && $member['birthday_month'] > 0) ? '0'.$member['birthday_month'] : $member['birthday_month'];
            $member['baptism_day'] = (strlen($member['baptism_day']) == 1 && $member['baptism_day'] > 0) ? '0'.$member['baptism_day'] : $member['baptism_day'];
            $member['baptism_month'] = (strlen($member['baptism_month']) == 1 && $member['baptism_month'] > 0) ? '0'.$member['baptism_month'] : $member['baptism_month'];
            $member['members_day'] = (strlen($member['members_day']) == 1 && $member['members_day'] > 0) ? '0'.$member['members_day'] : $member['members_day'];
            $member['members_month'] = (strlen($member['members_month']) == 1 && $member['members_month'] > 0) ? '0'.$member['members_month'] : $member['members_month'];
			$widow = (isset($member['widow']) && $member['widow'] == 1) ? 'Так' : 'Ні';
			$invalid = (isset($member['invalid']) && $member['invalid'] == 1) ? 'Так' : 'Ні';
            $birthday_date = (isset($member['birthday_year']) && strlen($member['birthday_year']) > 0 ) ? "{$member['birthday_day']}.{$member['birthday_month']}.{$member['birthday_year']}" : '---';
            if (isset($member['birthday_date']) && $member['death_date'] > 0 ) {
                $birthday_date .= " - ";
                $birthday_date .= date('d.m.Y', strtotime($member['death_date']));
            }
            $baptism_date = (isset($member['baptism_year']) && $member['baptism_year'] > 0 ) ? "{$member['baptism_day']}.{$member['baptism_month']}.{$member['baptism_year']}" : '---';
            $members_date = (isset($member['members_year']) && $member['members_year'] > 0 ) ? "{$member['members_day']}.{$member['members_month']}.{$member['members_year']}" : '---';
			$result .= "<tr class=\"line\" onclick=\"getMemberInfo({$member['id']})\">
				<td class=\"cell id\">{$member['id']}</td>
				<td class=\"cell\">{$member['surname']} {$member['name']} {$member['patro']}</td>
				<td class=\"cell\">{$member['address_city']} {$member['address_street']} {$member['address_house']}</td>
				<td class=\"cell\">{$member['home_phone']}</td>
				<td class=\"cell\">{$member['phone']}</td>
				<td class=\"cell\">{$birthday_date}</td>
				<td class=\"cell none\">{$baptism_date}</td>
				<td class=\"cell\">{$member['district_number']}</td>
				<td class=\"cell\">{$member['list_number']}</td>
				<td class=\"cell none\">{$members_date}</td>
				<td class=\"cell none\">{$member['church_where']}</td>
				<td class=\"cell none\">".date('d.m.Y', strtotime($member['retirement_date']))."</td>
				<td class=\"cell none\">{$member['retirement_city']}</td>
				<td class=\"cell none\">".date('d.m.Y', strtotime($member['exclusion_date']))."</td>
				<td class=\"cell none\">{$member['exclusion_reason']}</td>
				<td class=\"cell none\">".date('d.m.Y', strtotime($member['remark_date']))."</td>
				<td class=\"cell none\">{$member['remark_term']}</td>
				<td class=\"cell none\">".date('d.m.Y', strtotime($member['remark_off_date']))."</td>
				<td class=\"cell\">{$widow}</td>
				<td class=\"cell\">{$invalid}</td>
				<td class=\"cell\">{$member['comment']}</td>
				<td class=\"cell none\">".date('d.m.Y', strtotime($member['death_date']))."</td>
			</tr>";
		}
		return $result;
	}

	public static function getOptions($type, $info = null){
		switch ($type) {
			case 'pib':
				$getdata = get_db_query("
					SELECT CONCAT(`surname` , ' ' , `name` , ' ' , `patro`) AS `pib`, `id`
						FROM `members`
				");
				$result = null;
                if(count($getdata) > 1){
                    foreach ($getdata as $member) {
                        $selected = ($member['pib'] == $info) ?'selected="selected"' : '';
                        $result .= "<option value=\"{$member['id']}\" {$selected}>{$member['pib']}</option>";
                    }
                } else if(count($getdata) == 1){
                    $selected = ($getdata['pib'] == $info) ?'selected="selected"' : '';
                    $result .= "<option value=\"{$getdata['id']}\"  {$selected}>{$getdata['pib']}</option>";
                }
				return $result;
			
			case 'district':
				$getdata = get_db_query("
					SELECT `district_number`
						FROM `members`
							WHERE `district_number` > 0
								GROUP BY `district_number`
				");
				$result = null;
                if(count($getdata) > 1){
                    foreach ($getdata as $member) {
                        $selected = ($member['district_number'] == $info) ?'selected="selected"' : '';
                        $result .= "<option value=\"{$member['district_number']}\"  {$selected}>{$member['district_number']}</option>";
                    }
                } else if(count($getdata) == 1){
                    $selected = ($getdata['district_number'] == $info) ?'selected="selected"' : '';
                    $result .= "<option value=\"{$getdata['district_number']}\"  {$selected}>{$getdata['district_number']}</option>";
                }
				return $result;

			case 'address_city':
				$getdata = get_db_query("
					SELECT `address_city`
						FROM `members`
							WHERE `address_city` IS NOT NULL
								GROUP BY `address_city`
				");
				$result = null;
                if(count($getdata) > 1){
                    foreach ($getdata as $member) {
                        $selected = ($member['address_city'] == $info) ?'selected="selected"' : '';
                        $result .= "<option value=\"{$member['address_city']}\"  {$selected}>{$member['address_city']}</option>";
                    }
                } else if(count($getdata) == 1){
                    $selected = ($getdata['address_city'] == $info) ?'selected="selected"' : '';
                    $result .= "<option value=\"{$getdata['address_city']}\"  {$selected}>{$getdata['address_city']}</option>";
                }
				return $result;

            case 'address_street':
                $getdata = get_db_query("
					SELECT `address_street`
						FROM `members`
							WHERE `address_street` IS NOT NULL
								GROUP BY `address_street`
				");
                $result = null;
                if(count($getdata) > 1){
                    foreach ($getdata as $member) {
                        $selected = ($member['address_street'] == $info) ?'selected="selected"' : '';
                        $result .= "<option value=\"{$member['address_street']}\"  {$selected}>{$member['address_street']}</option>";
                    }
                } else if(count($getdata) == 1){
                    $selected = ($getdata['address_street'] == $info) ?'selected="selected"' : '';
                    $result .= "<option value=\"{$getdata['address_street']}\"  {$selected}>{$getdata['address_street']}</option>";
                }
                return $result;
		}
	}

	static function get_small_admin_menu($value = FALSE)
	{	
		
		$userdata = get_db_data(false, 'users', "id = '{$_COOKIE['can_see']}'", false, false, false);
	}
	
	public static function getMemberInfo($id = FALSE)
	{	
		if(isset($id)){
			$userdata = get_db_data(false, 'members', '*', "id = '{$id}'", false, false, false);
			return $userdata;
		}else{
			return null;
		}
	}

	static function get_userinfo($id, $action){
		$userdata = get_db_data(false, 'users', '*', "id = '$id'", false, false, false);

		if($action == 'errorsviewscount'){
			$userid = $id;
			$errorviews = json_decode($userdata['errorviews'], true);
			$errorviews[]['date'] = date("Y-m-d H:i:s");
			$arr_json = json_encode($errorviews);
			$mysqli = connect_db();
			$res = $mysqli->prepare("UPDATE users SET errorviews=? WHERE id=?");
			$res->bind_param('si'
			                 ,$arr_json								                 
			                 ,$userid
			                );
			$mysqli->error;
			$res->execute();
			$res->close();

			addToLog('errors', $id, 'confirm_modal_object_report', 'errors', false, false, 'errorsviewscount');
			foreach ($errorviews as $key => $value) {
				if( date('Y-m-d', strtotime($errorviews[$key]['date'])) == date("Y-m-d")){
					if(date('H', strtotime($errorviews[$key]['date'])) == date("H")){
						$hour++;
					}
					$day++;
				}
			}
			if($day>=25){
				$return = $day;
			}else $return = $hour;
		}
		return $return;
	}
	
	static function user_deleteuser($id){
		$admin = $_SESSION['can_see'];
		$userid = $id;
		$mysqli = connect_db();
		$res = $mysqli->prepare("DELETE FROM users WHERE id=?");
		$res->bind_param('i'					                 
		                 ,$userid
		                );
		$mysqli->error;
		$res->execute();
		$res->close();

		addToLog('userban', $admin, 'deleteuser', false, $userid);
	}

	public static function getnerateText($text){
		$cryptKey = null;
		$arr = array('a','b','c','d','e','f',  
               'g','h','i','j','k','l',  
               'm','n','o','p','r','s',  
               't','u','v','x','y','z',  
               'A','B','C','D','E','F',  
               'G','H','I','J','K','L',  
               'M','N','O','P','R','S',  
               'T','U','V','X','Y','Z',  
               '1','2','3','4','5','6',  
               '7','8','9','0','.',',',  
               '(',')','[',']','!','?',  
               '&','^','%','@','*','~',  
               '<','>','/','|','+','-',  
               '{','}','`');  
		// Генерируем пароль
		for($i = 0; $i < 20; $i++)  
		{  
			// Вычисляем случайный индекс массива  
			$index = rand(0, count($arr) - 1);  
			$cryptKey .= $arr[$index];  
		} 
		if(isset($text)){
			$qEncoded = base64_encode( md5( md5( $cryptKey ) . md5( $text ) ) );
    		return( "<pre>{$qEncoded}</pre> key: <pre>{$cryptKey}</pre>" );
		}
	}
}
?>