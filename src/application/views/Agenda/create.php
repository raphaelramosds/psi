<div class="ls-main">
	<div class="container-fluid">
		<div class="ls-box ls-board-box ls-no-border">
			<header class="ls-info-header ls-no-border">
				<h2 class="ls-title-3">Registre uma nova agenda</h2>
			</header>
			
			<?php if($this->session->flashdata('add_paciente')): ?>
			<div class="ls-background-primary ls-sm-space ls-sm-margin-bottom ls-text-md ls-ico-checkmark"><?=$this->session->flashdata('add_paciente')?></div>
			<?php endif;?>

			<form action="<?=base_url('AgendaController/add')?>" method="POST" class="ls-form ls-form-horizontal row" data-ls-module="form">
				<fieldset>
					<label class="ls-label col-md-6 col-xs-12">
						<p class="ls-label-info">Clínica</p>
						<div class="ls-custom-select">
							<select name="clinica_id" class="ls-select">
								<option value="<?=null?>"></option>
								<?php foreach ($clinicas as $c): ?>
									<option value="<?=$c->id?>"><?=$c->nome?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</label>

					<label class="ls-label col-md-6 col-xs-12">
						<p class="ls-label-info">Paciente ou <a data-ls-module="modal" data-target="#paciente">Cadastre um paciente</a></p>
						<div class="ls-custom-select">
							<select name="paciente_id" class="ls-select">
								<option value="<?=null?>"></option>
								<?php foreach ($pacientes as $p): ?>
									<option value="<?=$p->id?>"><?=$p->nome?></option>
								<?php endforeach;?>
							</select>
						</div>
					</label>
					
					<label class="ls-label col-md-6 col-xs-12">
						<p class="label-info">Mês</p>
						<div class="ls-custom-select">
							<select name="mes" class='ls-select'>
								<option value=""></option>
								<option value="Jan">Janeiro</option>
								<option value="Fev">Fevereiro</option>
								<option value="Mar">Março</option>
								<option value="Abr">Abril</option>
								<option value="Mai">Maio</option>
								<option value="Jun">Junho</option>
								<option value="Jul">Julho</option>
								<option value="Ago">Agosto</option>
								<option value="Set">Setembro</option>
								<option value="Out">Outubro</option>
								<option value="Nov">Novembro</option>
								<option value="Dez">Dezembro</option>
							</select>
						</div>
					</label>


					<label class="ls-label col-md-6 col-xs-12">
						<p class="ls-label-info">Ano</p>
						<div class="ls-custom-select">
							<select name="ano" class="ls-select" required=''>
								<option value=""></option>
								<?php for ($i=2018; $i < 2040; $i++): ?>
								<option value="<?=$i?>"><?=$i?></option>
								<?php endfor; ?>
							</select>
						</div>
					</label>


					<div class="ls-actions-btn">
						<input type="hidden" name="psicologo_id" value="<?=$psicologo?>">
						<button type="submit" class="ls-btn">Salvar dados</button>
					</div>
			
				</fieldset>
			</form>

		</div>
	</div>
</div>

<div class="ls-modal" id="paciente">
  <div class="ls-modal-box ls-sm-space">
    <div class="ls-modal-header">
		<button data-dismiss="modal">&times;</button>
      	<h4 class="ls-modal-title">Cadastrar novo paciente</h4>
    </div>

    <div class="ls-modal-body" id="myModalBody">
      <form action="<?=base_url('AgendaController/addPaciente')?>" method="POST" class="ls-form ls-form-horizontal row" data-ls-module="form">

			<label class="ls-label">
				<b class="ls-label-text">Nome do paciente</b>
				<input type="text" name="nome" required="required">
			</label>

			<label class="ls-label">
			  <b class="ls-label-text">Sexo</b>
			  <div class="ls-custom-select">
			    <select class="ls-custom" name="sexo" required="required">
			      <option value="M">Masculino</option>
			      <option value="F">Feminino</option>
			    </select>
			  </div>
			</label>

			<label class="ls-label">
				<b class="ls-label-text">Profissão</b>
				<input type="text" name="profissao" required="required">
			</label>


			<label class="ls-label">
				<b class="ls-label-text">Cartão de saúde</b>
				<p class="ls-labe-info">Número do cartão de saúde</p>
				<input type="number" name="cartaosaude">
			</label>

			<label class="ls-label">
				<b class="ls-label-text">Número SUS</b>
				<p class="ls-labe-info">Número do cartão SUS</p>
				<input type="number" name="numerosus">
			</label>

			<label class="ls-label">
				<b class="ls-label-text">Email</b>
				<p class="ls-labe-info">Para melhor contato</p>
				<input type="email" name="email" required="required">
			</label>

			<label class="ls-label">
				<b class='ls-label-text'>Telefone</b>
				<input type="text" name="telefone" required="required" class="ls-mask-phone8_with_ddd" placeholder="(99) 9999-9999">
			</label>

			<input type="hidden" name="id_psicologo" value="<?=$this->session->userdata('usuario')[0]['id']?>">
			<button type="submit" class="ls-btn">Salvar dados</button>
	  </form>
    </div>
  </div>
</div>