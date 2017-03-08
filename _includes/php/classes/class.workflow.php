<?php
	class WorkFlow { 
		private $session = array();
	    public $url_params = array(); 
	    public $client_id = null;
	    
	    public function setup($array) { 
			$this->url_params = $array;
			$this->client_id = $this->GET('client_id');
			
			//Check for client id
			if(!isset($this->client_id) && $this->is_valid_client($this->client_id)){
				print 'Failed to enter valid client id.';
				die;
			}
			//Redirect if not specified
			if(!isset($this->url_params['page'])){
				$this->redirect('/'.$this->client_id.'/dashboard');
			}
			//Check if logged in
			if($this->url_params['page'] != 'login' && !$this->is_logged_in()){
				$this->redirect('/'.$this->client_id.'/login');
			}
	    } 
	    
	    public function page_title() { print ucfirst($this->url_params['page']); } 
	    
	    public function get_the_page(){
		    $path = PAGE_PATH.$this->url_params['page'].'.php';
		    if(file_exists($path)){
			    $WorkFlow = $this;
			    include($path);
		    }
		    else{
			    print $this->url_params['page'] . ' | Page not found.';
		    }
	    }
	    
	    public function is_logged_in(){
		    if(isset($this->session['user_id']) && isset($this->client_id)){
			    return true;
		    }
	    }
	    
	    public function is_valid_client($id){
		    return true;
	    }
	    
	    public function redirect($url){
		    die("<script>location.href='$url'</script>");
	    }
	    
	    public function GET($name=null){
		    if($name!==null){
			    if(isset($_GET) && isset($_GET[$name])){
				    return $_GET[$name];
			    }
		    }else{
			    if(isset($_GET)){
				    return $_GET;
			    }
		    }
	    }
	} 	
?>