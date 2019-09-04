<?php 	  
	require_once('functions.php'); 	  
	//edit();	
?>
<?php include(HEADER_TEMPLATE); ?>	
	<div class="container">
		<h1 class="text-center">GERENCIAR SERVIDOR</h1>
	</div>	
		
	<div class="container">
		<div class="col">		
			<div class="card">			
				<a href="add.php" class="btn btn-primary">													
					<div class="col-xs-12 text-center">						
						<i class="fa fa-plus fa-5x"></i>					
					</div>	
					<div class="col-xs-12 text-center">						
						<p>Novo Servidor</p>					
					</div>				
				</a>
			</div>
			<div class="card">			
				<a href="servidores.php" class="btn btn-info">				
					<div class="col-xs-12 text-center">						
						<i class="fa fa-user fa-5x"></i>					
					</div>					
					<div class="col-xs-12 text-center">						
						<p>Servidores Cadastrados</p>									
					</div>			
				</a>		
			</div>
		</div>			
	</div>	

<?php include(FOOTER_TEMPLATE); ?>

