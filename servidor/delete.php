<?php 	  
	require_once('functions.php'); 		  
	if (isset($_GET['id'])){	    
		status($_GET['id'],$_GET['status']);	  
	} else {	    
		die("ERRO: ID não definido.");	  
	}	
?>