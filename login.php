<?php
	require_once('config.php');
	require_once(DBAPI);
	
	if(!empty($_POST['siape'])){
		$id = $_POST['siape'];
		$servidor = find('servidor', $id);
		session_start();
		if(!empty($servidor)){
			if($servidor['ativo'] == 0){
				$_SESSION['message'] = "SERVIDOR INATIVO";
					$_SESSION['type'] = "danger";
			}else{
				$_SESSION['siape']=$servidor['id'];
				$_SESSION['adm'] = $servidor['adm'];
				if($servidor['senha'] == $_POST['senha']){
					$_SESSION['user']=$servidor['nome'];
					$_SESSION['usuario'] = $servidor;		
				}else{
					$_SESSION['message'] = "SENHA INVÁLIDA";
					$_SESSION['type'] = "danger";
				}
			}
		}else{
			$_SESSION['message'] = "SERVIDOR NÃO ENCONTRADO";
			$_SESSION['type'] = "danger";
		}
	}
	header("Location: index.php");exit;
?>