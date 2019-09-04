<?php 	  
	require_once('functions.php'); 	  
	if(!empty($_SESSION['number'])){
		findServidor($_SESSION['number']);
		getAreas();
		index();		
		add();
?>	
	
<?php include(HEADER_TEMPLATE); ?>	
<script src="../cdn/js/emprestimo.js" type="text/javascript"></script>


	<h2>Entregar Livros</h2>	
	<form action="index.php" method="post">	  
	<hr />	  
		<div class="row">	    
			<div class="form-group col-md-7">	      
				<label for="fk_servidor">Servidor: <?php echo $_SESSION['user']; ?> </label>	      
				<input type="hidden" class="form-control"  name="emprestimo['fk_servidor']" value="<?php echo $_SESSION['number']; ?>">	    
			</div>
		</div>
		<div class="row">	    
			<div class="form-group col-md-7">
				<label for="nome">Estudante:</label>
				<?php if (!empty($_SESSION['nomeEstudante'])){ ?>
				<input type="text" class="form-control" name="emprestimo['estudante']" id="estudante" value="<?php echo $_SESSION['nomeEstudante']?>" required>
				<?php } else { ?>
				<input type="text" class="form-control" name="emprestimo['estudante']" id="estudante" placeholder="Informe o nome do estudante para pesquisa" required>
				<?php } unset($_SESSION['nomeEstudante']);?>
				
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-3" id="load_livros">
				<label for="area">Área:</label>
				<select class="form-control" id="area" onChange="getLivros(this.value)">
					<option> Selecione a Área </option>
					<?php foreach ($areas as $area) : ?>
					<option valeu="<?php echo utf8_encode($area['nome']);?>"><?php echo utf8_encode($area['nome']);?></option>
					<?php endforeach; ?>					
				</select>
			</div>
			<div class="form-group col-md-5">
				<label for="area">Livro:</label>
				<select class="form-control" id="livro" name="emprestimo['fk_livro']" required>
									
				</select>
			</div>
		</div>
		<div id="actions" class="row">	    
			<div class="col-md-12">	      
				<button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Adicionar Livro</button>	      
				<a href="../index.php" class="btn btn-default">Cancelar</a>	    
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
			
		<?php 
		} 
	}
	?>				
	</div>
	<table class="table table-hover">	
			<thead>		
				<tr>			
					<th>ID</th>
					<th>Estudante</th>			
					<th width="30%">Livro</th>
					<th>Data</th>							
				</tr>	
			</thead>	
			<tbody>	
				<?php if ($emprestimos) : ?>	
				<?php foreach ($emprestimos as $emprestimo) : ?>		
				<tr>			
					<td><?php echo $emprestimo['id']; ?></td>			
					<td><?php echo $emprestimo['fk_estudante']; ?></td>
					<td><?php echo $emprestimo['fk_livro']; ?></td>					
					<td><?php echo $emprestimo['data_i']; ?></td>						
						
				</tr>	
				<?php endforeach; ?>	
				<?php else : ?>		
				<tr>			
					
					<td colspan="6">Nenhum registro encontrado.</td>
				</tr>	
				<?php endif; ?>	
			</tbody>	
		</table>
	
<?php include(FOOTER_TEMPLATE); ?>