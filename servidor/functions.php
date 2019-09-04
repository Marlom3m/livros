<?php	
	require_once('../config.php');
	require_once(DBAPI);
	$servidores = null;
	$servidor = null;

	
			
	session_start();
	/*
		Função que salva os dados do servidor na pagina add.php
	*/
	function recuperaDados(){
		if(!empty($_SESSION['servidor'])){
			global $servidor;
			$servidor = $_SESSION['servidor'];
			unset($_SESSION['servidor']);
		}
	}
	

	/**	 *  Listagem dos servidores	 */	
	function index() {		
		global $servidores;		
		if(isset($_GET['ativo'])){
			$ativo = $_GET['ativo'];
			$servidores = findListServidores('servidor', 'ativo', $ativo);
		}
		//$servidores = find_all('servidor');	
	}
	/*
		função de testes dos campos
	*/
    function testaCampos($servidor){
    	$_SESSION['type'] = "danger";
    	$_SESSION['message'] = "Campos Obrigatórios:";
    	
    	if(empty($servidor["'id'"])){
			$_SESSION['message'] .= "<br>SIAPE";
    	}
    	if(empty($servidor["'nome'"])){
			$_SESSION['message'] .= "<br>Nome";
		}
		if(empty($servidor["'email'"])){
			$_SESSION['message'] .= "<br>E-mail";
		}
		if($_SESSION['message']=="Campos Obrigatórios:"){
			return true;
		}
		return false;
		
    }

	/*
		Função para adicionar no banco:
		$servidor --> array com os seguintes atributos (id,nome,email,adm,ativo,senha)
	*/
	function add() {	  
		if (!empty($_POST['servidor'])) {//teste para formulario enviado	    	    		    
			$servidor = $_POST['servidor'];			
			if(empty($servidor["'adm'"])){
				$servidor["'adm'"] = 0;
			}
			$servidor["'ativo'"] = 1;
			$servidor["'senha'"] = "mudar123";	
			$_SESSION['servidor'] = $servidor; //salva os dados para recuperar	
			if(testID('servidor',$servidor["'id'"])){
				$_SESSION['type'] = "danger";
    			$_SESSION['message'] = "SIAPE já cadastrado";
			}else if(testaCampos($servidor)){	
				save('servidor', $servidor);
				unset($_SESSION['servidor']);
			}
			header('location: add.php');exit;			  
		}
		
	}
	/*
		Função para salvar servidor editado.
	*/
	function edit() {		  	  	    
		if (isset($_GET['id'])) {		    
			$id = $_GET['id'];		    
			if (isset($_POST['servidor'])) {		      
				$servidor = $_POST['servidor'];
				if(testaCampos($servidor)){				
					update('servidor', $id, $servidor);
					header('location: servidores.php');exit;
				} else {
					header('location: edit.php?id='.$id);exit;
				}
					
			} else {		      
				global $servidor;	      
				$servidor = find('servidor', $id);	    
			} 	  
		} else {	    
			header('location: servidores.php');exit;	  
		}			   	
	}
	
	function view($id = null) {	  
		global $servidor;	  
		$servidor = find('servidor', $id);	
	}
	
	/*
		função para desativar o servidor
	*/
	function status($id = null, $status = null) {		  	  
		mudarStatus('servidor', $id, $status);
		if($status==1){
			header('location: servidores.php?ativo=0');	exit;
		}		  
		header('location: servidores.php?ativo=1');	exit;
	}
?>