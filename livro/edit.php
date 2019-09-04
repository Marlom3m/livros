<?php 	  
	require_once('functions.php'); 	  
	edit();
	getAreas();	
?>	

<?php include(HEADER_TEMPLATE); ?>	

	<h2>Atualizar Livro</h2>	
	<form action="edit.php?id=<?php echo $livro['id']; ?>" method="post">	  
	<hr />	  
		<div class="row">	    
			<div class="form-group col-md-7">	      
				<label for="titulo">Título</label>	      
				<input type="text" class="form-control" name="livro['titulo']" value="<?php echo $livro['titulo']; ?>">	    
			</div>
			<div class="form-group col-md-2">
				<label for="area">Área:</label>
				<select class="form-control" id="sel1" name="livro['fk_area']">
					<?php foreach ($areas as $area) :
							if ($livro['fk_area'] == $area['id'])
								echo '<option value='.$area['id'].' selected>'.$area["nome"].'</option>';
							else 
								echo '<option value='.$area['id'].'>'.$area['nome'].'</option>';
						endforeach;?>
				</select>
			</div>
			<div class="form-group col-md-2">	      
				<label for="validade">Validade</label>	      
				<input type="number" class="form-control" name="livro['validade']" value="<?php echo $livro['validade']; ?>">	    
			</div>
			<div class="form-group col-md-1">	      
				<label for="quantidade">Quantidade</label>	      
				<input type="number" class="form-control" name="livro['quant']" value="<?php echo $livro['quant']; ?>">	    
			</div>
		</div>
		<div id="actions" class="row">	    
			<div class="col-md-12">	      
				<button type="submit" class="btn btn-primary">Salvar</button>	      
				<a href="livros.php" class="btn btn-default">Voltar</a>	    
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