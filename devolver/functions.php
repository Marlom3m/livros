<?php	
	require_once('../config.php');
	require_once(DBAPI);
	$servidor = null;
	$areas = null;
	$livros = null;	
	session_start();
	/**	 *  Listagem dos emprestimos	 */	
	

	
	function getAreas(){
		global $areas;
		$areas = find_all('area');
	}
		
	function idEstudante($nome){
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
	
	function pesquisaNome($nome){
		$emprestimos = array();
		$emprestimo;
		$pesquisa =  findListEmprestado('emprestimo','fk_estudante',$nome);
		if(!empty($pesquisa)){
			foreach($pesquisa as $item){
				$emprestimo['id'] = $item['id'];
				$emprestimo['fk_estudante'] = $item['nome'];
				$valor = find('livro',$item['fk_livro']);
				$emprestimo['fk_livro'] = $valor['titulo'];
				$emprestimo['data_i'] = $item['data_i'];
				array_push($emprestimos,$emprestimo);
				$_SESSION['busca'] = $emprestimos;
			}
		}
	}
	function pesquisaLivro($livro){
		$emprestimos = array();
		$emprestimo;
		$pesquisa =  findListEmprestado('emprestimo','fk_livro',$livro);
		if(!empty($pesquisa)){
			foreach($pesquisa as $item){
				$emprestimo['id'] = $item['id'];
				$emprestimo['fk_estudante'] = $item['nome'];
				$valor = find('livro',$item['fk_livro']);
				$emprestimo['fk_livro'] = $valor['titulo'];
				$emprestimo['data_i'] = $item['data_i'];
				array_push($emprestimos,$emprestimo);
				$_SESSION['busca'] = $emprestimos;
			}
		}
	}
	function pesquisaNomeLivro($nome, $livro){
		$emprestimos = array();
		$emprestimo;
		$pesquisa =  findListEmprestado2('emprestimo','fk_livro',$livro, 'fk_estudante', $nome);
		if(!empty($pesquisa)){
			foreach($pesquisa as $item){
				$emprestimo['id'] = $item['id'];
				$emprestimo['fk_estudante'] = $item['nome'];
				$valor = find('livro',$item['fk_livro']);
				$emprestimo['fk_livro'] = $valor['titulo'];
				$emprestimo['data_i'] = $item['data_i'];
				array_push($emprestimos,$emprestimo);
				$_SESSION['busca'] = $emprestimos;
			}
		}
	}
	function buscar() {
	    
		if (!empty($_POST['emprestimo'])) {	
			if(!empty($_SESSION['busca'])){
				unset($_SESSION['busca']);
			}
			if(!empty($_SESSION['nomeEstudante'])){
				unset($_SESSION['nomeEstudante']);
			}
			$emprestimo = $_POST['emprestimo'];
			
			if(!empty($emprestimo["'estudante'"]) && !empty($emprestimo["'fk_livro'"])){
				$_SESSION['nomeEstudante'] = $emprestimo["'estudante'"];
				$emprestimo["'fk_estudante'"] = idEstudante($emprestimo["'estudante'"]);
				pesquisaNomeLivro($emprestimo["'fk_estudante'"],$emprestimo["'fk_livro'"]);
			}else if(!empty($emprestimo["'estudante'"])){
				$_SESSION['nomeEstudante'] = $emprestimo["'estudante'"];
				$emprestimo["'fk_estudante'"] = idEstudante($emprestimo["'estudante'"]);
				pesquisaNome($emprestimo["'fk_estudante'"]);
			}else if(!empty($emprestimo["'fk_livro'"])){
				$_SESSION['livro'] = $emprestimo["'fk_livro'"];
				unset($_SESSION['nomeEstudante']);
				pesquisaLivro($emprestimo["'fk_livro'"]);
			}
			
				
		}
	}
	
	function findServidor($id = null) {	  
		global $servidor;	  
		$servidor = find('servidor', $id);	
	}
	
	function devolver($id = null) {
		$today = date_create('now', new DateTimeZone('America/Campo_Grande'));	
		$data = $today->format("Y-m-d H:i:s");
		$emprestimo = devolucao('emprestimo', $id, $data);
		$emprestimos = $_SESSION['busca'];
		$newEmprestimos = array();
		foreach($emprestimos as $e):
			if($e['id'] != $id){
				array_push($newEmprestimos,$e);
			}	
		endforeach;
		$_SESSION['busca'] = $newEmprestimos;
		header('location: index.php');	exit;
	}
?>