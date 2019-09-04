<?php 	  
	require_once('functions.php'); 

	add();//função para salvar no banco ao submeter formulário.	
	recuperaDados();
?>	

<?php include(HEADER_TEMPLATE); ?>	

<h2>Novo Servidor</h2>	
	<form action="add.php" method="post">	  
	
	<!-- area de campos do form -->	  
	<hr />	  
		<div class="row">	    
			<div class="form-group col-md-3">	      
				<label for="id">SIAPE</label>	      
				<input type="number" class="form-control" name="servidor['id']" value="<?php echo $servidor["'id'"]; ?>" >	    
			</div>
			<div class="form-group col-md-7">
				<label for="nome">Nome</label>
				<input type="text" class="form-control" name="servidor['nome']" value="<?php echo $servidor["'nome'"]; ?>">
			</div>
			<div class="form-group col-md-7">
				<label for="email">E-mail</label>
				<input type="email" class="form-control" name="servidor['email']" value="<?php echo $servidor["'email'"]; ?>">
			</div>
			<div class="form-group col-md-7">
  				<label for="adm"><input name="servidor['adm']" type="checkbox" value="1" <?php if($servidor["'adm'"]==1){echo "checked";}?>>Administrador</label>
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
				if(!empty($_SESSION['message']))
					echo $_SESSION['message'].'<br>';
			?>		
		</div>		
	
		<?php 
			unset($_SESSION['type']);			
			unset($_SESSION['message']);
		?>	
			
		<?php } ?>				
	</div>	
<?php include(FOOTER_TEMPLATE); ?>