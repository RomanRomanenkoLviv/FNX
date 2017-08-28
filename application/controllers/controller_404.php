<?php

class Controller_404 extends Controller
{
	
	function action_index()
	{
		include "application/models/Users.php";
		$this->view->generate('404_view.php', 'template_view.php');
	}

}
?>