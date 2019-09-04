<?php require_once 'config.php'; ?>	
<?php require_once DBAPI; ?>	
<?php include(HEADER_TEMPLATE); ?>	
<?php $db = open_database(); ?>	
	<div class="container">
		
		<h1 class="text-center">GERENCIADOR DE ENTREGA DOS LIVROS DIDÁTICOS</h1>
	</div>
	<div class="container">
		<div class = "col">
			<div class = "card" style="border:none;">

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
	

	<?php 
		if(!empty($_SESSION['busca'])){
			unset($_SESSION['busca']);
		}
		if(!empty($_SESSION['nomeEstudante'])){
			unset($_SESSION['nomeEstudante']);
		}
		if ($db) { 
			if(!empty($_SESSION['user'])){
	?>
			<a href="emprestimo/index.php" class="btn btn-success">
				<div class="col-xs-12 text-center">
					<i class="fa fa-book fa-5x"></i>
				</div>
				<div class="col-xs-12 text-center">
					Entregar Livro
				</div>
			</a>
	
			<a href="#p" class="btn btn-info">
				<div class="col-xs-12 text-center">
					<i class="fa fa-search fa-5x"></i>
				</div>
				<div class="col-xs-12 text-center">
					Consulta Livros Entregues - Em Breve
				</div>
			</a>
			
			<a href="devolver/index.php" class="btn btn-warning">
				<div class="col-xs-12 text-center">
					<i class="fa fa-book fa-5x"></i>
				</div>
				<div class="col-xs-12 text-center">
					Devolução de Livros
				</div>
			</a>
	<?php } else { ?>		
			<img src="<?php echo BASEURL; ?>logo.png" style="width: 50%; display: block;  margin-left: auto;  margin-right: auto;opacity: 0.3;">
	<?php } ?>
		<div class="container">
	<?php 
	if(empty($_SESSION['siape'])){ ?>

			<h2 class="text-center text-danger">Realize o Login</h2>
		<?php }else if(!empty($_SESSION['mensagem'])){ ?>
			<h2 class="text-center text-danger"><?php echo $_SESSION['mensagem']; unset($_SESSION['mensagem']);?> </h2>
		<?php }?>
	</div>	
				
			
	
	<?php }else{ ?>	
			<div class="alert alert-danger" role="alert">			
			<p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>		
			</div>
			
<?php } ?>

			
			</div>
		</div>
	</div>
<?php include(FOOTER_TEMPLATE); ?>

