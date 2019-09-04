<?php 	  
	require_once('functions.php'); 	  	
?>
<?php include(HEADER_TEMPLATE); ?>	
	<div class="container">
		<h1 class="text-center">GERENCIAR DOS LIVROS</h1>
	</div>	
		
	<div class="container">
		<div class="col">		
			<div class="card">			
				<a href="add.php" class="btn btn-primary">													
					<div class="col-xs-12 text-center">						
						<i class="fa fa-plus fa-5x"></i>					
					</div>	
					<div class="col-xs-12 text-center">						
						<p>Novo Livro</p>					
					</div>				
				</a>
			</div>
			<div class="card">			
				<a href="livros.php" class="btn btn-info">				
					<div class="col-xs-12 text-center">						
						<i class="fa fa-book fa-5x"></i>					
					</div>					
					<div class="col-xs-12 text-center">						
						<p>Livros Cadastrados</p>									
					</div>			
				</a>		
			</div>
		</div>			
	</div>	

<?php include(FOOTER_TEMPLATE); ?>

