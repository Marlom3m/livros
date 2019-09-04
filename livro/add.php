
<?php 	  
	require_once('functions.php'); 	  
	add();
	getAreas();
?>

<?php include(HEADER_TEMPLATE); ?>	
<h2>Novo Livro</h2>	
	<form action="add.php" method="post">	  	
	<!-- area de campos do form -->	  
	<hr />	  
		<div class="row">	    
			<div class="form-group col-md-7">	      
				<label for="titulo">Título</label>	      
				<input type="text" class="form-control" name="livro['titulo']">	    
			</div>
			<div class="form-group col-md-2">
				<label for="area">Área:</label>
				<select class="form-control" id="sel1" name="livro['fk_area']">
					<?php foreach ($areas as $area) : ?>
					<option value="<?php echo $area['id'];?>"><?php echo utf8_encode($area['nome']);?></option>
					<?php endforeach; ?>					
				</select>
			</div>			
			<div class="form-group col-md-2">	      
				<label for="validade">Validade</label>	      
				<input type="number" class="form-control" name="livro['validade']">	    
			</div>
			<div class="form-group col-md-1">	      
				<label for="quantidade">Quantidade</label>	      
				<input type="number" class="form-control" name="livro['quant']">	    
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
			if (!empty($_SESSION['message'])) {
		?>		
		<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">			
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>			
			<?php echo $_SESSION['message']; ?>		
		</div>		
	
		<?php 
			unset($_SESSION['type']);
			unset($_SESSION['message']);
		?>	
			<?php } ?>				
	</div>
<?php include(FOOTER_TEMPLATE); ?>