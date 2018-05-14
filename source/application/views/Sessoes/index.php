<style>
	.ls-table a{margin-left: 10px;}
</style>

<div class="ls-main">
	<div class="container-fluid">
		<div class="ls-box ls-board-box">
		<header class="ls-info-header">
			<h2 class="ls-title-3 ls-ico-stats">Sessões cadastradas</h2>
		</header>
		<table class="ls-table">
			<tr><!--
				<th>Id</th> -->
				<th>Título</th>
				<th>Data</th>
				<th>Descricao</th>
				<th class="ls-txt-center">Ação</th>
			</tr>
			<?php
				foreach ($datasessoes as $value) {
					echo "<tr>";
						// echo "<td>".$value->idsessao.'</td>';
						echo "<td>".$value->titulo.'</td>';
						echo "<td>".$value->data.'</td>';
						echo "<td>".$value->descricao.'</td>';
						echo "<td class='ls-txt-center'>";
							echo "<a href='".base_url()."sessoescontroller/delete/$value->idsessao' class='ls-ico-remove ls-btn-danger' title='Excluir'></a>";
							echo "<a href='".base_url()."sessoescontroller/edit/$value->idsessao' class='ls-ico-pencil ls-btn'title='Editar'></a>";
						echo "</td>";
					echo "</tr>";
				}
		 	?>
		 	<!--Detalhar informações de Evolução, Diagnóstico e o tratamento adotado-->
		 </table>
		 <a href="<?=base_url()?>sessoescontroller/create" class="ls-ico-plus ls-btn">Adcionar um sessão</a>
		 <a href="<?=base_url()?>prontuarioscontroller/view" class="ls-btn-danger">Voltar</a>
		</div>
</div>
</div>
