<?php		
mysqli_report(MYSQLI_REPORT_STRICT);		
function open_database() {		
	try {			
		$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);			
		return $conn;		
	} catch (Exception $e) {			
		echo $e->getMessage();			
		return null;		
	}
}		
function close_database($conn) {		
	try {			
		mysqli_close($conn);		
	} catch (Exception $e) {			
		echo $e->getMessage();		
	}
}

/*
	função para testar se ID já cadastrado
*/

function testID($table = null, $id = null){
	$database = open_database();
	$found = false;
	if($id){
		try {		  		    
			$sql = "SELECT * FROM " . $table . " WHERE id = " . $id;		    
			$result = $database->query($sql);		    		    
			if ($result->num_rows > 0) {		      
				$found = true;		    
			}		    		  	
		} catch (Exception $e) {		  
			$_SESSION['message'] = $e->GetMessage();		 
			$_SESSION['type'] = 'danger';	  
		}
	}				
	close_database($database);		
	return $found;	
}


function find( $table = null, $id = null ) {	  		
	$database = open_database();		
	$found = null;			
	try {		  
		if ($id) {		    
			$sql = "SELECT * FROM " . $table . " WHERE id = " . $id;		    
			$result = $database->query($sql);		    		    
			if ($result->num_rows > 0) {		      
				$found = $result->fetch_assoc();		    
			}		    		  
		} else {		    		    
			$sql = "SELECT * FROM " . $table;		    
			$result = $database->query($sql);		    		    
			if ($result->num_rows > 0) {		      
				$found = $result->fetch_all(MYSQLI_ASSOC);	        	        
				
				/* Metodo alternativo	        
				$found = array();		        
				while ($row = $result->fetch_assoc()) {	          
					array_push($found, $row);	        
				} */		    
			}		  
		}		
	} catch (Exception $e) {		  
		$_SESSION['message'] = $e->GetMessage();		 
		$_SESSION['type'] = 'danger';	  
	}				
	close_database($database);		
	return $found;	
}

function findAnyThing($table = null, $coluna = null, $id = null){
	$database = open_database();		
	$found = null;			
	try {		  
		if ($id) {		    
			$sql = "SELECT * FROM " . $table . " WHERE ". $coluna ." = " . $id;		    
			$result = $database->query($sql);		    		    
			if ($result->num_rows > 0) {		      
				$found = $result->fetch_assoc();		    
			}		    		  
		} else {		    		    
			$sql = "SELECT * FROM " . $table;		    
			$result = $database->query($sql);		    		    
			if ($result->num_rows > 0) {		      
				$found = $result->fetch_all(MYSQLI_ASSOC);	        	        
				
				/* Metodo alternativo	        
				$found = array();		        
				while ($row = $result->fetch_assoc()) {	          
					array_push($found, $row);	        
				} */		    
			}			  
		}		
	} catch (Exception $e) {		  
		$_SESSION['message'] = $e->GetMessage();		 
		$_SESSION['type'] = 'danger';	  
	}				
	close_database($database);		
	return $found;
}

function find_all( $table ) {	  
	return find($table);	
}

function find_allLivros( $table = null) {	  		
	$database = open_database();		
	$found = null;			
	try {		  
		    		    
			$sql = "SELECT titulo, livro.id, a.nome , validade  FROM ".$table." JOIN area as a ON a.id=fk_area";		    
			$result = $database->query($sql);		    		    
			if ($result->num_rows > 0) {		      
				$found = $result->fetch_all(MYSQLI_ASSOC);	        	        
				
				/* Metodo alternativo	        
				$found = array();		        
				while ($row = $result->fetch_assoc()) {	          
					array_push($found, $row);	        
				} */		    
			}		  
				
	} catch (Exception $e) {		  
		$_SESSION['message'] = $e->GetMessage();		 
		$_SESSION['type'] = 'danger';	  
	}				
	close_database($database);		
	return $found;	
}

function findList($table=null, $coluna=null, $pesquisa=null){
	$database = open_database();		
	$found = null;
	
	try {		  
		if ($pesquisa) {		    
			$sql = "SELECT * FROM " . $table . " WHERE ".$coluna." like '".$pesquisa."%'";		    
			$result = $database->query($sql);		    		    
			if ($result->num_rows > 0) {		      	        
				$found = array();		        
				while ($row = $result->fetch_assoc()) {	          
					array_push($found, $row);	        
				} 		    
			}		    		  
		} 	  		
	} catch (Exception $e) {		  
		$_SESSION['message'] = $e->GetMessage();		 
		$_SESSION['type'] = 'danger';	  
	}				
	close_database($database);		
	return $found;	
}

function topDez($table=null){
	$database = open_database();		
	$found = null;
	
	try {		  
		if ($table) {
				
			$sql = "SELECT * FROM ".$table." ORDER BY id DESC Limit 10;";	
			$result = $database->query($sql);
			if ($result->num_rows > 0) {		      	        
				$found = array();		        
				while ($row = $result->fetch_assoc()) {	          
					array_push($found, $row);	        
				} 		    
			}		    		  
		} 	  		
	} catch (Exception $e) {		  
		$_SESSION['message'] = $e->GetMessage();		 
		$_SESSION['type'] = 'danger';	  
	}				
	close_database($database);		
	return $found;
}

function findListEqual($table=null, $coluna=null, $pesquisa=null){
	$database = open_database();		
	$found = null;
	
	try {		  
		if ($pesquisa!=null) {		    
			$sql = "SELECT * FROM " . $table . " WHERE ".$coluna." = '".$pesquisa."'";		    
			$result = $database->query($sql);		    		    
			if ($result->num_rows > 0) {		      	        
				$found = array();		        
				while ($row = $result->fetch_assoc()) {	          
					array_push($found, $row);	        
				} 		    
			}		    		  
		} 	  		
	} catch (Exception $e) {		  
		$_SESSION['message'] = $e->GetMessage();		 
		$_SESSION['type'] = 'danger';	  
	}				
	close_database($database);		
	return $found;	
}


function findListServidores($table=null, $coluna=null, $pesquisa=null){
	$database = open_database();		
	$found = null;
	
	try {		  
		if ($pesquisa!=null) {		    
			$sql = "SELECT * FROM " . $table . " WHERE ".$coluna." = '".$pesquisa."' order by nome";		    
			$result = $database->query($sql);		    		    
			if ($result->num_rows > 0) {		      	        
				$found = array();		        
				while ($row = $result->fetch_assoc()) {	          
					array_push($found, $row);	        
				} 		    
			}		    		  
		} 	  		
	} catch (Exception $e) {		  
		$_SESSION['message'] = $e->GetMessage();		 
		$_SESSION['type'] = 'danger';	  
	}				
	close_database($database);		
	return $found;	
}

function findListEmprestado($table=null, $coluna=null, $pesquisa=null){
	$database = open_database();		
	$found = null;
	
	try {		  
		if ($pesquisa) {		    
			$sql = "SELECT emprestimo.id, estudante.nome, emprestimo.data_i, emprestimo.fk_livro  FROM " . $table . " INNER JOIN estudante ON emprestimo.fk_estudante = estudante.id and emprestimo.".$coluna." = ".$pesquisa." and emprestado = 1 order by nome;";		    
			$result = $database->query($sql);		    		    
			if ($result->num_rows > 0) {		      	        
				$found = array();		        
				while ($row = $result->fetch_assoc()) {	          
					array_push($found, $row);	        
				} 		    
			}		    		  
		} 	  		
	} catch (Exception $e) {		  
		$_SESSION['message'] = $e->GetMessage();		 
		$_SESSION['type'] = 'danger';	  
	}				
	close_database($database);		
	return $found;	
}

function findListEmprestado2($table=null, $coluna=null, $pesquisa=null, $coluna2=null, $pesquisa2=null){
	$database = open_database();		
	$found = null;
	
	try {		  
		if ($pesquisa) {		    
			$sql = "SELECT emprestimo.id, estudante.nome, emprestimo.data_i, emprestimo.fk_livro FROM " . $table . " INNER JOIN estudante ON emprestimo.fk_estudante = estudante.id and emprestimo.".$coluna." = ".$pesquisa." and emprestimo.".$coluna2." = ".$pesquisa2." and emprestado = 1 order by nome;";		    
			$result = $database->query($sql);		    		    
			if ($result->num_rows > 0) {		      	        
				$found = array();		        
				while ($row = $result->fetch_assoc()) {	          
					array_push($found, $row);	        
				} 		    
			}		    		  
		} 	  		
	} catch (Exception $e) {		  
		$_SESSION['message'] = $e->GetMessage();		 
		$_SESSION['type'] = 'danger';	  
	}				
	close_database($database);		
	return $found;	
}

function save($table = null, $data = null) {		  
	$database = open_database();		  
	$columns = null;	  
	$values = null;		  
	foreach ($data as $key => $value) {	    
		$columns .= trim($key, "'") . ",";	    
		if($value === null)
			$values .= "null,";
		else
			$values .= "'$value',";	  
	}		  
	// remove a ultima virgula	  
	$columns = rtrim($columns, ',');	
	$values = rtrim($values, ',');	  	  
	
	$sql = "INSERT INTO " . $table . "($columns)" . " VALUES " . "($values);";		  
	try {	    
		$database->query($sql);	    
		$_SESSION['message'] = 'Registro cadastrado com sucesso.';	    
		$_SESSION['type'] = 'success';	  	  
	} catch (Exception $e) { 	  	    
		$_SESSION['message'] = 'Não foi possível realizar a operação.';	    
		$_SESSION['type'] = 'danger';	  
	} 		  
	close_database($database);	
}

function update($table = null, $id = 0, $data = null) {		  
	$database = open_database();		  
	$items = null;		  
	foreach ($data as $key => $value) {
		if($value == null)
			$items .= trim($key, "'") . "=null,";
		else
			$items .= trim($key, "'") . "='$value',";	  
	}		  
	// remove a ultima virgula	  
	$items = rtrim($items, ',');		  
	$sql  = "UPDATE " . $table;	  
	$sql .= " SET $items";	  
	echo $sql .= " WHERE id=" . $id . ";";		  
	try {	    
		$database->query($sql);		    
		$_SESSION['message'] = 'Registro atualizado com sucesso.';	    
		$_SESSION['type'] = 'success';		  
	} catch (Exception $e) { 		    
		$_SESSION['message'] = 'Nao foi possivel realizar a operacao.';	    
		$_SESSION['type'] = 'danger';	  
	} 		  
	close_database($database);	
}
function devolucao($table = null, $id = null, $today = null){
	$database = open_database();	      
	$sql = "UPDATE ".$table." SET emprestado = 0, data_f = '".$today."' WHERE id = ".$id.";";
	try{
		$database->query($sql);
		$_SESSION['message'] = "Livro devolvido com Sucesso.";	        
		$_SESSION['type'] = 'success';	  
	} catch (Exception $e) { 		    
		$_SESSION['message'] = $e->GetMessage();	    
		$_SESSION['type'] = 'danger';	  
	}		  
	close_database($database);
}


function remove( $table = null, $id = null ) {		  
	$database = open_database();			  
	try {	    
		if ($id) {		      
			$sql = "DELETE FROM " . $table . " WHERE id = " . $id;	      
			$result = $database->query($sql);		      
			if ($result = $database->query($sql)) {   		        
				$_SESSION['message'] = "Registro Removido com Sucesso.";	        
				$_SESSION['type'] = 'success';	      
			}	    
		}	  
	} catch (Exception $e) { 		    
		$_SESSION['message'] = $e->GetMessage();	    
		$_SESSION['type'] = 'danger';	  
	}		  
	close_database($database);	
}

function mudarStatus( $table = null, $id = null, $status = null ) {		  
	$database = open_database();			  
	try {	    
		if ($id) {		      
			$sql = "UPDATE " . $table . " SET ativo = ".$status." WHERE id = " . $id;	      
			$result = $database->query($sql);		      
			if ($result = $database->query($sql)) {   		        
				$_SESSION['message'] = "Alterado com Sucesso.";	        
				$_SESSION['type'] = 'success';	      
			}	    
		}	  
	} catch (Exception $e) { 		    
		$_SESSION['message'] = $e->GetMessage();	    
		$_SESSION['type'] = 'danger';	  
	}		  
	close_database($database);
}

function mudarSenha( $table = null, $id = null, $senha = null ) {		  
	$database = open_database();			  
	try {	    
		if ($id) {		      
			echo $sql = "UPDATE " . $table . " SET senha = '".$senha."' WHERE id = " . $id;	      
			$result = $database->query($sql);		      
			if ($result = $database->query($sql)) {   		        
				$_SESSION['message'] = "Alterado com Sucesso.";	        
				$_SESSION['type'] = 'success';	      
			}	    
		}	  
	} catch (Exception $e) { 		    
		$_SESSION['message'] = $e->GetMessage();	    
		$_SESSION['type'] = 'danger';	  
	}		  
	close_database($database);
}
?>