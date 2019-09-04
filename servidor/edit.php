<?php 	  
	require_once('functions.php'); 	  
	edit();	
?>	

<?php include(HEADER_TEMPLATE); ?>	

	<h2>Atualizar servidor</h2>	
	<form action="edit.php?id=<?php echo $servidor['id']; ?>" method="post">	  
	<hr />	  
		<div class="row">	    
			<div class="form-group col-md-3">	      
				<label for="id">SIAPE</label>	      
				<input type="text" class="form-control" name="servidor['id']" value=" <?php echo $servidor['id']; ?>" readonly="readonly">	    
			</div>
			<div class="form-group col-md-7">
				<label for="nome">Nome:</label>
				<input type="text" class="form-control" name="servidor['nome']" value="<?php echo $servidor['nome']; ?>">
			</div>
			<div class="form-group col-md-7">
				<label for="email">E-mail</label>
				<input type="email" class="form-control" name="servidor['email']" value="<?php echo $servidor['email']; ?>">
			</div>
			<div class="form-group col-md-7">
  				<label for="adm"><input name="servidor['adm']" type="checkbox" value="1" <?php if($servidor['adm']==1){echo "checked";}?>>Administrador</label>
			</div>
		</div>
		<div id="actions" class="row">	    
			<div class="col-md-12">	      
				<button type="submit" class="btn btn-primary">Salvar</button>	      
				<a href="servidores.php" class="btn btn-default">Cancelar</a>	    
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
				if(!empty($_SESSION['msgNome']))
					echo $_SESSION['msgNome'].'<br>';
				if(!empty($_SESSION['message']))
					echo $_SESSION['message'].'<br>';
			?>		
		</div>		
		<?php 
			unset($_SESSION['type']);
			unset($_SESSION['msgNome']);			
			unset($_SESSION['message']);
		?>	
			
		<?php } ?>				
	</div>	
<?php include(FOOTER_TEMPLATE); ?>