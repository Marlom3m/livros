<?php 	  
	require_once('functions.php'); 	  
	if(!empty($_SESSION['siape'])){
		findServidor($_SESSION['siape']);
		getAreas();	
		buscar();
?>	
	
<?php include(HEADER_TEMPLATE); ?>	
<script src="../cdn/js/emprestimo.js" type="text/javascript"></script>
<script src="../cdn/js/devolucao.js" type="text/javascript"></script>


	<h2>Devolução de Livros</h2>
	<form action="index.php" method="post">	  
	<hr />
		<div class="row">	    
			<div class="form-group col-md-7">	      
				<label for="fk_servidor">Servidor: <?php echo $_SESSION['user']; ?> </label>	      
				<input type="hidden" class="form-control"  name="emprestimo['fk_servidor']" value="<?php echo $_SESSION['siape']; ?>">	    
			</div>
		</div>
		<div class="row">	    
			<div class="form-group col-md-7">
				<label for="nome">Estudante:</label>
				<?php if (!empty($_SESSION['nomeEstudante'])){ ?>
				<input type="text" class="form-control" name="emprestimo['estudante']" id="estudante" value="<?php echo $_SESSION['nomeEstudante']?>">
				<?php } else { ?>
				<input type="text" class="form-control" name="emprestimo['estudante']" id="estudante" placeholder="Informe o nome do estudante para pesquisa">
				<?php }?>
				
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-3" id="load_livros">
				<label for="area">Área:</label>
				<select class="form-control" id="area" onChange="getLivros(this.value)">
					<option> Selecione a Área </option>
					<?php foreach ($areas as $area) : ?>
					<option value="<?php echo $area['id'];?>"><?php echo utf8_encode($area['nome']);?></option>
					<?php endforeach; ?>					
				</select>
			</div>
			<div class="form-group col-md-5">
				<label for="livro">Livro:</label>
				<select class="form-control" id="livro" name="emprestimo['fk_livro']">
									
				</select>
			</div>
		</div>
		<div id="actions" class="row">	    
			<div class="col-md-12 text-right">	      
				<button type="submit" class="btn btn-info"><i class="fa fa-search"></i> Buscar</button>	      
				<a href="../index.php" class="btn btn-default">Voltar</a>	    
			</div>	  			
		</div>	
	</form>
	<h5 class="text-center text-info">A pesquisa pode ser realizada por nome, livro ou ambos</h5>	
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
	}else{
		header('location:'.BASEURL);
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
					<th>Devolver</th>
				</tr>	
			</thead>	
			<tbody>	
				<?php 
					if(!empty($_SESSION['busca'])){
						$emprestimos = $_SESSION['busca'];
						foreach ($emprestimos as $emprestimo) { ?>		
				<tr>			
					<td><?php echo $emprestimo['id']; ?></td>			
					<td><?php echo $emprestimo['fk_estudante']; ?></td>
					<td><?php echo $emprestimo['fk_livro']; ?></td>					
					<td><?php echo $emprestimo['data_i']; ?></td>
					<td class="actions text-left">								
						<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#devolver-modal" onclick="devolver(<?php echo $emprestimo['id']; ?>)">					
							 Devolução				
						</a>			
					</td>
						
				</tr>	
	
					<?php } 
					}else { ?>		
				<tr>			
					
					<td colspan="6">Nenhum registro encontrado.</td>
				</tr>	
					<?php } ?>	
			</tbody>	
		</table>
<?php include('modal.php'); ?>
<?php include(FOOTER_TEMPLATE); ?>