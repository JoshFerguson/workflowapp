<?php
//Check if logged in
$WorkFlow->is_logged_in(false, function(){
	$WorkFlow->redirect('/'.$WorkFlow->client_id.'/dashboard');
});	
?>