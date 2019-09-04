<?php	
	require_once('../config.php');
	require_once(DBAPI);
	$emprestimos = null;
	$emprestimo = null;
	$servidor = null;
	$areas = null;
	$livros = null;	
	session_start();
	/**	 *  Listagem dos emprestimos	 */	
	
	function index() {		
		global $emprestimos;
		$emprestimos = array();
		$emprestimo;
		$pesquisa = topDez('emprestimo');
		if(!empty($pesquisa)){
			foreach($pesquisa as $item){
				$emprestimo['id'] = $item['id'];
				$valor = find('estudante',$item['fk_estudante']);
				$emprestimo['fk_estudante'] = $valor['nome'];
				$valor = find('livro',$item['fk_livro']);
				$emprestimo['fk_livro'] = $valor['titulo'];
				$emprestimo['data_i'] = $item['data_i'];
				array_push($emprestimos,$emprestimo);
			}
		}
	}
	
	function getAreas(){
		global $areas;
		$areas = find_all('area');
	}
		
	function testeEstudante($nome){
		if(strripos($nome,":")){
			list($desc,$ra) = explode(':',$nome);
			$ra = findAnyThing('estudante','ra',$ra);			
			if(!empty($ra['id'])){
				return $ra['id'];
			}
		}
		return null;		
	}
	
	function testeEntregue($emprestimo){
		$pesquisa = findListEqual('emprestimo','emprestado',1);
		foreach($pesquisa as $item){
			if(($item['fk_livro'] == $emprestimo["'fk_livro'"]) && ($item['fk_estudante']==$emprestimo["'fk_estudante'"])){
				return false;
			} 
		}
		return true;
	}
	function add() {		  
		if (!empty($_POST['emprestimo'])) {	    	    		    
			$emprestimo = $_POST['emprestimo'];
			$emprestimo["'fk_estudante'"] = testeEstudante($emprestimo["'estudante'"]);
			if(!empty($emprestimo["'fk_estudante'"])){
				$_SESSION['nomeEstudante'] = $emprestimo["'estudante'"];
				unset($emprestimo["'estudante'"]);
				if(testeEntregue($emprestimo)){
					$today = date_create('now', new DateTimeZone('America/Campo_Grande'));	
					$emprestimo["'data_i'"] = $today->format("Y-m-d H:i:s");
					$emprestimo["'emprestado'"] = 1;
					save('emprestimo',$emprestimo);
				}
				else{
					$_SESSION['message'] = 'Estudante já pegou este livro';	    
					$_SESSION['type'] = 'danger';
				}
			}else{
				$_SESSION['message'] = 'Estudante não encontrado.';	    
				$_SESSION['type'] = 'danger';	
			}
			
			header('Location: index.php'); exit;
		}
	}
	
	function findServidor($id = null) {	  
		global $servidor;	  
		$servidor = find('servidor', $id);	
	}
	/*
	function delete($id = null) {		  
		global $emprestimo;	  
		$emprestimo = remove('emprestimo', $id);		  
		header('location: emprestimos.php');	exit;
	}*/
?>