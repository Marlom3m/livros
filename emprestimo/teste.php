<?php
	require_once('../config.php');
	require_once(DBAPI);
	
	if (!empty($_POST['emprestimo'])) {	    	    		    
		$emprestimo = $_POST['emprestimo'];
		$emprestimo["'fk_estudante'"] = testeEstudante($emprestimo["'estudante'"]);
		if(!empty($emprestimo["'fk_estudante'"])){
			unset($emprestimo["'estudante'"]);
			$today = date_create('now', new DateTimeZone('America/Campo_Grande'));	
			$emprestimo["'data_i'"] = $today->format("Y-m-d H:i:s");
			$emprestimo["'emprestado'"] = 1;
			save('emprestimo',$emprestimo);
		}else{
			$_SESSION['message'] = 'Estudante não encontrado.';	    
			$_SESSION['type'] = 'danger';	
		}
	}
	
	
	function testeEstudante($nome){
		if(strripos($nome,":")){
			list($desc,$rga) = explode(':',$nome);
			$rga = findAnyThing('estudante','rga',$rga);
			if(!empty($rga['id'])){
				return $rga['id'];
			}
		}
		return null;		
	}
?>