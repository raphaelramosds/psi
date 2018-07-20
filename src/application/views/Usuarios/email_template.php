<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Requisição de senha</title>
		<link rel="stylesheet" href="<?=base_url('assets/css/email.css')?>">
	</head>
	<body>
		<div class="box_message">
			<div class="header_box">
				<h1 class="title">Olá, <?=$usuario[0]->username?></h1>
			</div>
			<div class="body_box">
				<p>Vimos que você solicitou uma alteração de senha.</p>
				<p>Seu código de ativação é: </p>
				<span class="acces_code"><?=$code_access?></span>
			</div>
			<footer>
				<p>Atenciosamente, <br> Equipe do sistema Psi (Prontuários Eletrônicos em um Sistema Inteligente)</p>  
			</footer>
		</div>
	</body>
</html>