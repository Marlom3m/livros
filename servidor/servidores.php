<?php	    
	require_once('functions.php');	    
	index();	
?>	

<?php include(HEADER_TEMPLATE); ?>	
<script src="../cdn/js/servidores.js" type="text/javascript"></script>	
	<header>		
		<div class="row">			
			<div class="col-sm-6">				
				<h2>Servidores</h2>			
			</div>			
			<div class="col-sm-6 text-right h2">		    	
				<a class="btn btn-primary" href="add.php"><i class="fa fa-plus"></i> Novo Servidor</a>		    	
				<a class="btn btn-default" href="servidores.php"><i class="fa fa-refresh"></i> Atualizar</a>		    
			</div>
			<div class="col-sm-6 text-left h2">		    	
				<a class="btn btn-light" href="servidores.php?ativo=1"><i class="fa fa-star"></i> Ativos</a>		    	
				<a class="btn btn-light" href="servidores.php?ativo=0"><i class="fa fa-star-o"></i> Inativos</a>		    
			</div>			
		</div>	
	</header>	

<?php 
	if (!empty($_SESSION['message'])){ 
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
	<hr>	
		<table class="table table-hover">	
			<thead>		
				<tr>			
					<th>SIAPE</th>			
					<th>Nome</th>
					<th>E-mail</th>								
				</tr>	
			</thead>	
			<tbody>	
				<?php if ($servidores) : ?>	
				<?php foreach ($servidores as $servidor) : ?>		
				<tr>			
					<td><?php echo $servidor['id']; ?></td>			
					<td><?php echo $servidor['nome']; ?></td>
					<td><?php echo $servidor['email']; ?></td>
																	
					<td class="actions text-right">				
						<?php if($_GET['ativo']==1) { ?>
							<a href="edit.php?id=<?php echo $servidor['id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>				
							<a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#status-modal" onclick="mStatus(<?php echo $servidor['id']; ?>,0)">					
								<i class="fa fa-ban"></i> Desativar				
							</a>
						<?php } else {?>
							<a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#status-modal" onclick="mStatus(<?php echo $servidor['id']; ?>,1)">					
								<i class="fa fa-check"></i> Ativar				
							</a>
						<?php } ?>			
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
