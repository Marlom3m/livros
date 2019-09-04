<?php
	require_once('../config.php');
	require_once(DBAPI);

	if(!empty($_GET['area'])){
		$livros = "" ;
		$area = $_GET['area'];
		$resultados = findListEqual('livro','fk_area',$area);
		if($resultados){
			foreach ($resultados as $resultado){
				$livros .= "<option value=".$resultado['id'].">".$resultado['titulo']."</option>";
			}
		}
		echo $livros;
	}
?>