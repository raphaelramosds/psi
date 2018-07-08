<div class="ls-main">
	<div class="container-fluid">
			<h1 class="ls-title-intro ls-ico-user">Meu Perfil</h1>
			<div class="ls-box ls-board-box"  style="border:none;">
				<?php foreach ($datapsicologos as $row): ?>

				<ul class="ls-tabs-nav" id="awesome-dropdown-tab">
				  <li class="ls-active"><a data-ls-module="tabs" href="#tab3">Gerais</a></li>
				  <li><a data-ls-module="tabs" href="#tab4">Específicas</a></li>
				</ul>

				<div class="ls-tabs-container" id="awesome-tab-content">
				  <div id="tab3" class="ls-tab-content ls-active">
						<h3 class="ls-title-5">
							<?php echo $row->nomepsicologo ?>
						</h3>
						<hr>
						<p>Meu CRP:</p><?php echo $row->crp ?>
						<hr>
						<p>Email: </p> <?php echo $row->emailpsicologo ?>
				  </div>
					<!---->
				  <div id="tab4" class="ls-tab-content">
						<h3 class="ls-title-5">Pessoais</h3>
						<hr>
						<p>Data de nascimento: </p><?php echo $row->datanascimento ?>
						<hr>
						<p>Sexo: </p>
						<?php if ($row->sexopsicologo == 'M'): ?>
							<?php echo "Masculino" ?>
						<?php endif; ?>
						<?php if ($row->sexopsicologo == 'F'): ?>
							<?php echo "Feminino" ?>
						<?php endif; ?>
						<hr>
				  </div>
				</div>
				<a href="<?=base_url()?>PsicologosController/edit/<?=$row->idpsicologo?>"  class='ls-ico-pencil ls-btn' title='Editar' >Editar informações</a>
				<a href="<?=base_url()?>HomeController" class="ls-btn-danger" >Voltar</a>
				<?php endforeach; ?>
			</div>
	</div>


</div>
