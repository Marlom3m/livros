<?php
/** O nome do banco de dados*/	
define('DB_NAME', 'u411879655_teste');
		
/** Usuário do banco de dados MySQL */	
define('DB_USER', 'u411879655_teste');		

/** Senha do banco de dados MySQL */	
define('DB_PASSWORD', 'teste123');		

/** nome do host do MySQL */	
define('DB_HOST', 'sql134.main-hosting.eu.');		

/** caminho absoluto para a pasta do sistema **/	
if ( !defined('ABSPATH') )		
	define('ABSPATH', dirname(__FILE__).'/');			

/** caminho no server para o sistema **/	
if ( !defined('BASEURL') )		
	define('BASEURL', '/emprestimolivros/');			

/** caminho do arquivo de banco de dados **/	
if ( !defined('DBAPI') )		
	define('DBAPI', ABSPATH . 'inc/database.php');

define('HEADER_TEMPLATE', ABSPATH . 'inc/header.php');	
define('FOOTER_TEMPLATE', ABSPATH . 'inc/footer.php');
?>