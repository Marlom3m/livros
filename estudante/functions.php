<?php	
	require_once('../config.php');
	require_once(DBAPI);
	$estudantes = null;
	$estudante = null;		
	/**	 *  Listagem dos estudantes	 */	
	function index() {		
		global $estudantes;		
		$estudantes = find_all('estudante');	
	}
	
	function testeRga($estudante){
		if(empty($estudante["'rga'"])){
			$_SESSION['type'] = "danger";
			$_SESSION['msgRga'] = "Preencha o RGA";
			return false;
		}
		return true;		
	}
	
	function testeNome($estudante){
		if(empty($estudante["'nome'"])){
			$_SESSION['type'] = "danger";
			$_SESSION['msgNome'] = "Preencha o nome";
			return false;
		}
		return true;		
	}
	
	function add() {		  
		if (!empty($_POST['estudante'])) {	    	    		    
			$estudante = $_POST['estudante'];
			$teste1 = testeRga($estudante);
			$teste2 = testeNome($estudante);
			if($teste1 && $teste2){
				save('estudante', $estudante);
			}			
			header('location: add.php');exit;	  
		}
	}
	
	function edit() {		  	  
		if (isset($_GET['id'])) {		    
			$id = $_GET['id'];		    
			if (isset($_POST['estudante'])) {		      
				$estudante = $_POST['estudante'];
					$teste1 = testeRga($estudante);
					$teste2 = testeNome($estudante);
					if($teste1 && $teste2){				
						update('estudante', $id, $estudante);
						header('location: estudantes.php');exit;
					} else {
						header('location: edit.php?id='.$id);exit;
					}
					
			} else {		      
				global $estudante;	      
				$estudante = find('estudante', $id);	    
			} 	  
		} else {	    
			header('location: estudantes.php');exit;	  
		}	
	}
	
	function view($id = null) {	  
		global $estudante;	  
		$estudante = find('estudante', $id);	
	}
	
	function delete($id = null) {		  
		global $estudante;	  
		$estudante = remove('estudante', $id);		  
		header('location: estudantes.php');	exit;
	}
?>