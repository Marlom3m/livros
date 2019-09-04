<div class="modal fade" id="login-modal">	  
	<div class="modal-dialog">	    
		<div class="modal-content">
        <div class="modal-header">
			<h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form action="login.php" method="post" >
            <div class="form-group">
              <input type="text" class="form-control" name="siape" placeholder="SIAPE" autofocus>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="senha" placeholder="SENHA">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">Sair</button>
        </div>
      </div>  
	</div>	
</div> 

