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
							<?=$row->nomepsicologo ?>
						</h3>
						<hr>
						<p>Meu CRP:</p><?=$row->crp ?>
						<hr>
						<p>Email: </p> <?=$row->emailpsicologo ?>
				  </div>
					<!---->
				  <div id="tab4" class="ls-tab-content">
						<h3 class="ls-title-5">Pessoais</h3>
						<hr>
						<p>Data de nascimento: </p><?=$row->datanascimento ?>
						<hr>
						<p>Sexo: </p>
						<?php if ($row->sexopsicologo == 'M'): ?>
							<?="Masculino" ?>
						<?php endif; ?>
						<?php if ($row->sexopsicologo == 'F'): ?>
							<?="Feminino" ?>
						<?php endif; ?>
						<hr>
				  </div>
				</div>
				<a href="<?=base_url()?>update-psycho/<?=$row->idpsicologo?>"  class='ls-ico-pencil ls-btn' title='Editar' >Editar informações</a>
				<a href="<?=base_url()?>home" class="ls-btn-danger" >Voltar</a>
				<?php endforeach; ?>
			</div>
	</div>
</div>
