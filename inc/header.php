<!DOCTYPE html>	
<html>	
	<head>	    
		<meta charset="utf-8">	    	    
		<title>Livros</title>	    
		<meta name="description" content="">	    
		<meta name="viewport" content="width=device-width, initial-scale=1">	
		<link rel="stylesheet" href="<?php echo BASEURL; ?>cdn/css/bootstrap.css">
		<link rel="stylesheet" href="<?php echo BASEURL; ?>cdn/css/jquery-ui.css"> 
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>	
	</head>	
	<body>
		<nav class="navbar navbar-expand-sm navbar-dark"  style="background-color: #006856;">
			<a href="<?php echo BASEURL; ?>index.php" class="navbar-brand">
				<img src="<?php echo BASEURL; ?>logo2.png" width="120" height="80" style="opacity:0.5">	       	          
			</a>
			<?php
			if(!isset($_SESSION)){
				session_start();
			}
			if(empty($_SESSION['adm']) || $_SESSION['adm'] == 0){
			?>
			
			<ul class="navbar-nav navbar-collapse">          	            
				<li class="nav-item">	                
								
				</li>
				<li class="nav-item" >	                
									
				</li>
				<li class="nav-item">	                
									
				</li>
			</ul>
			
			
			<?php 
				} else {
			?>	             
			<ul class="navbar-nav navbar-collapse">          	            
				<li class="nav-item">	                
					<a href="<?php echo BASEURL; ?>livro/index.php" class="nav-link">	                    
						Gerenciar Livros              
					</a>									
				</li>
				<li class="nav-item" >	                
					<a href="<?php echo BASEURL; ?>estudante/index.php" class="nav-link">	                    
						Gerenciar Estudantes               
					</a>									
				</li>
				<li class="nav-item">	                
					<a href="<?php echo BASEURL; ?>servidor/index.php" class="nav-link">	                    
						Gerenciar Servidor               
					</a>									
				</li>		
			</ul>
			<?php 
				} if(empty($_SESSION['user'])){ 
				
			?>
			
			<button type="button" class="btn btn-default" data-toggle="modal" data-target="#login-modal">Login</button>
			<?php } else { ?>
				
			<li class="nav-item dropdown">
      			<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
       				 <span class="navbar-text" > <?php echo "Olá, ".$_SESSION['user']; ?> </span>
      			</a>
      			<div class="dropdown-menu">
        			<a class="dropdown-item" href="# "class="btn text-warning" data-toggle="modal" data-target="#senha-modal">Alterar Senha</a>
        			<a class="dropdown-item" href="<?php echo BASEURL;?>logout.php" class="btn text-warning">Logout</a>
      			</div>
    		</li>
				
			<?php } ?>
		</nav>	
    <main class="container">
