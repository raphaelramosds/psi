<style>
	.ls-table a{margin-left: 10px;}
</style>

<div class="ls-main">
	<div class="ls-box ls-board-box">
	<header class="ls-info-header">
		<h2 class="ls-title-3">Usuários cadastrados</h2>
	</header>
	<table class="ls-table">
		<tr>
			<th>Id</th>
			<th>Nome de usuário</th>
			<th>Senha</th>
			<th class="ls-txt-center">Ação</th>
		</tr>
		<?php 
			foreach ($datausuarios as $value) {
				echo "<tr>";
					echo "<td>".$value->idusuario.'</td>';
					echo "<td>".$value->username.'</td>';
					echo "<td>".$value->senha.'</td>';
					echo "<td class='ls-txt-center'>";
						echo "<a href='usuarioscontroller/delete/$value->idusuario' class='ls-ico-close ls-tag-danger' title='Excluir'></a>";
						echo "<a href='usuarioscontroller/edit/$value->idusuario' class='ls-ico-pencil ls-tag-primary'title='Editar'></a>";
					echo "</td>";
				echo "</tr>";
			}
	 	?>
	 </table>
	 <a href="usuarioscontroller/create" class="ls-ico-plus ls-tag-primary" style="padding:1em;">Adcionar um usuário</a>
	</div>
</div>