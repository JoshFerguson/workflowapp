<?php
	//Include Classes and Functions
	include_once(CLASS_PATH.'/class.workflow.php');
	
	//Creates WorkFlow class
	$WorkFlow = new WorkFlow();
	$WorkFlow -> setup( $WorkFlow->GET() );
	
	//Sets up materpage
	include_once(PHP_PATH.'/wf-masterpage.php');
?>