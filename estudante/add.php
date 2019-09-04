<?php 	  
	require_once('functions.php'); 	  
	add();	
?>	

<?php include(HEADER_TEMPLATE); ?>	

<h2>Novo Estudante</h2>	
	<form action="add.php" method="post">	  
	
	<!-- area de campos do form -->	  
	<hr />	  
		<div class="row">	    
			<div class="form-group col-md-3">	      
				<label for="rga">RGA</label>	      
				<input type="text" class="form-control" name="estudante['rga']">	    
			</div>
			<div class="form-group col-md-7">
				<label for="nome">Nome</label>
				<input type="text" class="form-control" name="estudante['nome']">
			</div>			
			<div class="form-group col-md-5">	      
				<label for="email">E-mail</label>	      
				<input type="email" class="form-control" name="estudante['email']">	    
			</div>		
		</div>	  	  
		<div id="actions" class="row">	    
			<div class="col-md-12">	      
				<button type="submit" class="btn btn-primary">Salvar</button>	      
				<a href="index.php" class="btn btn-default">Voltar</a>	    
			</div>	  
		</div>
	</form>
	<br>
	<div class="container">
		<?php
			if (!empty($_SESSION['type'])) {
		?>		
		<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">			
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>			
			<?php		
				if(!empty($_SESSION['msgRga']))
					echo $_SESSION['msgRga'].'<br>';
				if(!empty($_SESSION['msgNome']))
					echo $_SESSION['msgNome'].'<br>';
				if(!empty($_SESSION['message']))
					echo $_SESSION['message'].'<br>';
			?>		
		</div>		
	
		<?php 
			unset($_SESSION['type']);
			unset($_SESSION['msgRGA']);
			unset($_SESSION['msgNome']);			
			unset($_SESSION['message']);
		?>	
			
		<?php } ?>				
	</div>	
<?php include(FOOTER_TEMPLATE); ?>