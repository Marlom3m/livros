<?php	
	require_once('../config.php');
	require_once(DBAPI);
	$livros = null;
	$livro = null;
	$areas = null;
	session_start();
	
	/**	 *  Listagem dos livros	 */	
	function index() {		
		global $livros;		
		$livros = find_allLivros('livro'); 
	}
	
	function testeTitulo($livro){
		if(empty($livro["'titulo'"])){
			$_SESSION['type'] = "danger";
			$_SESSION['message'] = "Preencha o título";
			return false;
		}
		return true;		
	}
	
	function add() {		  
		if (!empty($_POST['livro'])) {	    	    		    
			$livro = $_POST['livro'];
			if(testeTitulo($livro)){
				if(empty($livro["'validade'"]))
					$livro["'validade'"]=null;
				if(empty($livro["'quant'"]))
					$livro["'quant'"]=null;
				save('livro', $livro);
			}
			header("Location: add.php");exit;
		}
	}
	
	function edit() {		  	  
		if (isset($_GET['id'])) {		    
			$id = $_GET['id'];		    
			if (isset($_POST['livro'])) {		      
				$livro = $_POST['livro'];
				if(testeTitulo($livro)){				
					update('livro', $id, $livro);
					header('location: livros.php');exit;
				}else{
					header('location: edit.php?id='.$id);exit;
				}					
			} else {		      
				global $livro;	      
				$livro = find('livro', $id);	    
			} 	  
		} else {	    
			header('location: livros.php');exit;	  
		}	
	}
	
	function view($id = null) {	  
		global $livros;	  
		$livro = find('livro', $id);	
	}
	
	function delete($id = null) {		  
		global $livro;	  
		$livro = remove('livro', $id);		  
		header('location: livros.php');	
	}
	
	function getAreas(){
		global $areas;
		$areas = find_all('area');
	}

?>