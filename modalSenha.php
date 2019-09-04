<div class="modal fade" id="senha-modal">	  
	<div class="modal-dialog">	    
		<div class="modal-content">
        <div class="modal-header">
			<h4><span class="glyphicon glyphicon-lock"></span> Alterar Senha</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form action="<?php echo BASEURL;?>senha.php" method="post" >
            <div class="form-group">
              <input type="password" class="form-control" name="senha" placeholder="NOVA SENHA" autofocus>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="conf" placeholder="CONFIRMAR NOVA SENHA">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Confirmar</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">Sair</button>
        </div>
      </div>  
	</div>	
</div> 

