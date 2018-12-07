<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Requisição de senha</title>
	</head>
	<body>
		<div class="box_message">
			<div class="header_box">
				<h1 class="title">Olá, <?=$usuario[0]->username?></h1>
			</div>
			<div class="body_box">
				<p>Vimos que você solicitou uma alteração de senha.</p>
				<p>Seu código de ativação é: </p>
				<input id="content" style="border:none;" type="text" value="<?=$code_access?>" readonly>
			</div>
			<footer>	
				<p>Atenciosamente, <br> Equipe do sistema Psi (Prontuários Eletrônicos em um Sistema Inteligente)</p>  
			</footer>
		</div>
	</body>
</html>