<?php
	require_once('config.php');
	require_once(DBAPI);
	
	echo $senhanova = $_POST['senha'];
	echo $conf = $_POST['conf'];
	session_start();

	$id = $_SESSION['siape'];
	if($senhanova==$conf){
		mudarSenha('servidor',$id,$senhanova);
	}else{
		echo $_SESSION['message'] = "Senhas não conferem";	    
		echo $_SESSION['type'] = 'danger';
	} 
	
	header('Location: '.BASEURL.'index.php');exit;


?>