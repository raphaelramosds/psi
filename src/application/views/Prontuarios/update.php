<div class="ls-main">
	<div class="container-fluid">
		<h1 class="ls-title-intro ls-ico-pencil">Detalhes</h1>
		<div class="ls-box ls-board-box ls-no-border">
		<form action="<?=base_url('ProntuariosController/update')?>" method="POST" class="ls-form ls-form-horizontal row" data-ls-module="form">
			<fieldset>

				<label for="" class="ls-label col-md-4 col-xs-12">
					<b class="ls-label-text">Clínica</b>
					<div class="ls-custom-select">
						<select class="ls-custom" name="clinica_id">
							<option value="<?=$prontuarios->clinica_id ?>">
								<?php
								$idclinica = $prontuarios->clinica_id;
								$this->db->select('nome');
								$this->db->from('clinica');
								$this->db->where('clinica.id = '.$idclinica);
								$nome = $this->db->get()->result();
								foreach ($nome as $value) 
								{
									echo $value->nome;
								}?>
							</option>
							<?php foreach ($clinicas as $value):?>
								<option value="<?=$value->id?>"><?=$value->nome?></option>
							<?php endforeach;?>
						</select>
					</div>
				</label>

				<label for="" class="ls-label col-md-8 col-xs-12">
					<b class="ls-label-text">CID10/DSM</b>
					<input type="text" name="cid10" required="required" value="<?=$prontuarios->cid10; ?>">
				</label>

				<label for="" class="ls-label col-md-12 col-xs-12">
					<b class="ls-label-text">Alta</b>
					<div class="ls-custom-select">
						<select class="ls-select" name="alta" required="required">
							<option selected="selected">
								<?php if($prontuarios->alta == "S"){ echo "Sim"; } else { echo "Não"; }?>
								
							</option>
							<option value="S">Sim</option>
							<option value="N">Não</option>
						</select>
					</div>
				</label>

				<label for="" class="ls-label col-md-12 col-xs-12">
					<b class="ls-label-text">Encaminhado</b>
					<div class="ls-custom-select">
						<select class="ls-select" name="encaminhado" required="required">
							<option selected="selected">
								<?php if($prontuarios->encaminhado == "S"){ echo "Sim"; } else { echo "Não"; }?>	
							</option>
							<option value="S">Sim</option>
							<option value="N">Não</option>
						</select>
					</div>
				</label>

				<label class="ls-label col-md-4 col-lg-4 col-xs-12">
					<b class="ls-label-text">Tratamento adotado</b>
					<textarea rows="10"  name="tratamentoadotado"><?=$prontuarios->tratamentoadotado?>
					</textarea>
				</label>

				<label class="ls-label col-md-4 col-lg-4 col-xs-12">
					<b class="ls-label-text">Diagnóstico</b>
					<textarea rows="10" name="diagnostico"><?=$prontuarios->diagnostico?></textarea>
				</label>

				<label class="ls-label col-md-4 col-lg-4 col-xs-12">
					<b class="ls-label-text">Evolucao</b>
					<textarea rows="10" name="evolucao"><?=$prontuarios->evolucao?></textarea>
				</label>
				
				<div class="ls-actions-btn">
					<input type="hidden" name="paciente_id" required="required" value="<?=$prontuarios->paciente_id;?>">
					<input type="hidden" name="id_psicologo" required="required" value='<?=$prontuarios->id_psicologo;?>'>
					<input type="hidden" name="numeroprontuario" value="<?=$prontuarios->numeroprontuario ?>">
					<button type="submit" class="ls-btn">Salvar todos os dados</button>
					<a href="<?=base_url('view-prontuario')?>" class="ls-btn-danger">Voltar</a>	
				</div>

			</fieldset>
		</form>
		</div>	
	</div>
</div>

