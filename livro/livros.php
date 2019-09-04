<?php	    
	require_once('functions.php');	    
	index();	
?>	


<?php include(HEADER_TEMPLATE); ?>	
<script src="../cdn/js/livros.js" type="text/javascript"></script>
	<header>		
		<div class="row">			
			<div class="col-sm-6">				
				<h2>Livros</h2>			
			</div>			
			<div class="col-sm-6 text-right h2">		    	
				<a class="btn btn-primary" href="add.php"><i class="fa fa-plus"></i> Novo Livro</a>		    	
				<a class="btn btn-default" href="livros.php"><i class="fa fa-refresh"></i> Atualizar</a>		    
			</div>		
		</div>	
	</header>	

	<?php
		if (!empty($_SESSION['message'])) { 
	?>	
	<div class="container">	
		<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">			
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>			
			<?php echo $_SESSION['message']; ?>		
		</div>
	</div>	
	
	<?php 
			unset($_SESSION['type']);
			unset($_SESSION['message']);
		?>	
	<?php } ?>	

	<hr>	
		<table class="table table-hover">	
			<thead>		
				<tr>			
					<th>ID</th>			
					<th width="30%">Título</th>
					<th>Área</th>					
					<th>Validade</th>			
				</tr>	
			</thead>	
			<tbody>	
				<?php if ($livros) : ?>	
				<?php foreach ($livros as $livro) : ?>		
				<tr>			
					<td><?php echo $livro['id']; ?></td>			
					<td><?php echo $livro['titulo']; ?></td>
					<td><?php echo $livro['nome']; ?></td>					
					<td><?php echo $livro['validade']; ?></td>						
					<td class="actions text-right">				
				
						<a href="edit.php?id=<?php echo $livro['id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil" ></i> Editar</a>				
						<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" onclick="deletar(<?php echo $livro['id']; ?>)">					
							<i class="fa fa-trash"></i> Excluir				
						</a>			
					</td>		
				</tr>	
				<?php endforeach; ?>	
				<?php else : ?>		
				<tr>			
					<td colspan="6">Nenhum registro encontrado.</td>		
				</tr>	
				<?php endif; ?>	
			</tbody>	
		</table>
		<a href="index.php" class="btn btn-default">Voltar</a></center>
<?php include('modal.php'); ?>		
<?php include(FOOTER_TEMPLATE); ?>
