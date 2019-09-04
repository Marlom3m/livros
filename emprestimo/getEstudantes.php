<?php
	require_once('../config.php');
	require_once(DBAPI);

	if(!empty($_GET['nome'])){
		$estudantes = array();
		$nome = $_GET['nome'];
		$resultados = findList('estudante','nome',$nome);
		if($resultados){
			foreach ($resultados as $resultado){
				$estudante = new Estudante;
				$estudante->id = $resultado['id'];
				$estudante->label = $resultado['nome']." - RA:".$resultado['ra'];
				$estudante->value = $resultado['nome']." - RA:".$resultado['ra'];
				array_push($estudantes,$estudante);
			}
		}
		echo json_encode($estudantes);
	}

	class Estudante{
		public $id;
		public $label;
		public $value;
	}
?>