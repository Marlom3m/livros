<?php
	require_once('../config.php');
	require_once(DBAPI);
	session_start();

	if(!empty($_GET['area'])){
		$livros = "" ;
		$area = $_GET['area'];
		$resultados = findListEqual('livro','fk_area',$area);
		if($resultados){
			foreach ($resultados as $resultado){
				if (!empty($_SESSION['livro'])){
					if($_SESSION['livro'] == $resultado['id']){
						$livros .= "<option selected value=".$resultado['id'].">".$resultado['titulo']."</option>";
					}else{
						$livros .= "<option value=".$resultado['id'].">".$resultado['titulo']."</option>";
					}
				}else{
					$livros .= "<option value=".$resultado['id'].">".$resultado['titulo']."</option>";
				}
					
				
				
			}
		}
		echo $livros;
	}
?>