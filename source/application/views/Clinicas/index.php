<style>
	.ls-table a{margin-left: 10px;}
</style>
<div class="ls-main">
	<?php if(isset($delete)){
		echo "<div class='ls-alert-success'>$delete</div>";
	} ?>
	<div class="ls-box ls-board-box">
	<header class="ls-info-header">
		<h2 class="ls-title-3 ls-ico-location">Clínicas cadastradas</h2>
	</header>
	<form  action="<?=base_url()?>clinicascontroller/search" class="ls-form ls-form-inline" method="POST">
		 <label class="ls-label" role="search">
			 <input type="text" id="q" name="clinica" aria-label="Faça sua busca pela clínica" placeholder="Nome da clínica" required="" class="ls-field">
		 </label>
			 <input type="submit" value="Buscar" class="ls-btn" title="Buscar">
			 	 <a href="<?=base_url()?>clinicascontroller/create" class="ls-ico-plus ls-btn">Adcionar uma clínica</a>
	 </form>
	<table class="ls-table">
		<tr>
			<th>Nome</th>
			<th>Telefone</th>
			<th>Estado</th>
			<th>Cidade</th>
			<th class="ls-txt-center"></th>
		</tr>
		<?php
			foreach ($dataclinica as $value) {
				echo "<tr>";
					echo "<td>".$value->nomeclinica.'</td>';
					echo "<td>".$value->telefone.'</td>';
					echo "<td>".$value->estado.'</td>';
					echo "<td>".$value->cidade.'</td>';
					echo "<td class='ls-txt-left'>";
					echo "<div data-ls-module='dropdown' class='ls-dropdown'>";
						echo "<a href='#' class='ls-btn'>Ação</a>";
						echo "<ul class='ls-dropdown-nav'>";
							echo "<li><a href='".base_url()."/clinicascontroller/delete/$value->idclinica' class='ls-ico-remove' title='Excluir'>Excluir</a></li>";
							echo "<li><a href='".base_url()."/clinicascontroller/edit/$value->idclinica' class='ls-ico-pencil'title='Editar'>Editar</a></li>";
						echo "</ul>";
					echo "</div>";
					echo "</td>";
				echo "</tr>";
			}
	 	?>
	 </table>
	 <div class="ls-pagination-filter">
		<?php
			echo $pagination;
		?>
	 </div>
	</div>
</div>
