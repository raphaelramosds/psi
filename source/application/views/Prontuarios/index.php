<?php
if($dataprontuarios == NULL){
	redirect("view-paciente");
}
?>

<div class="ls-main">
	<div class="container-fluid">
		<div class="ls-box ls-board-box ls-no-border">
			<header class="ls-info-header ls-no-border">
				<h2 class="ls-title-3 ls-ico-folder">
					Prontuário de
					<b>
					<?php
						$this->db->select('nomepaciente');
						$this->db->from('paciente');
						$this->db->where('idpaciente = '.$dataprontuarios[0]->paciente_id);
						$this->db->order_by("nomepaciente", "asc");
						$result = $this->db->get()->result();
						echo $result[0]->nomepaciente;
					?>
					</b>
				</h2>
			</header>
			<?php if(isset($add_prontuario)):?>
			<?=$add_prontuario?>
			<?php elseif(isset($delete_prontuario)):?>
			<?=$delete_prontuario?>
			<?php elseif(isset($update_prontuario)):?>
			<?=$update_prontuario?>
			<?php endif;?>
			<table class="ls-table">
				<tr>
					<th>Número da ficha</th>
					<th>Clínica</th>
					<th>CID10/DSM</th>
					<th>Encaminhado</th>
					<th>Alta</th>
					<th></th>
				</tr>
				<?php
					$url = base_url("assets/xml/doencas.xml");
					$xml = simplexml_load_file($url);
				?>
				<?php foreach ($dataprontuarios as $value): ?>
					<tr>
						<td>
							<?=$value->numeroprontuario ?>
						</td>
						<td>
							<?php
							$this->db->select('nomeclinica');
							$this->db->from('clinica');
							$this->db->where('idclinica = '.$value->clinica_id);
							$this->db->order_by("nomeclinica", "asc");
							$query = $this->db->get()->result();
							echo $query[0]->nomeclinica;
							?>
						</td>
						<td>
							<?php 
							foreach($xml->doenca as $line){
								if($line->codigo == $value->cid10){
									echo $line->nome;
								}
							}
							?>
						</td>
						<td>
							<?=$value->encaminhado ?>
						</td>
						<td>
							<?=$value->alta ?>
						</td>
						<td class="ls-text-center">
							<div data-ls-module='dropdown' class='ls-dropdown'>
								<a href='#' class='ls-btn'>Ação</a>
								<ul class="ls-dropdown-nav">
									<li><a href="<?=base_url()?>index-sessao/<?=$value->numeroprontuario?>" class='ls-ico-docs ls-color-black ls-no-bghover' title='Ver sessões'>Ver sessões</a></li>
									<li><a href="<?=base_url()?>update-prontuario/<?=$value->numeroprontuario?>" class='ls-ico-search ls-color-black ls-no-bghover' title='Detalhar'>Ver informações</a></li>		
									<li><a href="<?=base_url()?>delete-prontuario/<?=$value->numeroprontuario?>" class='ls-ico-remove ls-color-danger' title='Excluir'>Excluir</a></li>									
								</ul>
							</div>
						</td>
					</tr>
				<?php endforeach; ?>
			 </table>
			 <a  data-ls-module="modal" data-target="#ficha" onClick="paciente(<?=$dataprontuarios[0]->paciente_id?>)" class='ls-btn'> Adcionar nova ficha</a>
			 <a href="<?=base_url()?>view-paciente" class="ls-btn-danger">Voltar</a>
		</div>
	</div>
</div>

<!-- Modal div: -->
<div class="ls-modal" id="ficha">
  <div class="ls-modal-box ls-sm-space">
    <div class="ls-modal-header">
		<button data-dismiss="modal">&times;</button>
      	<h4 class="ls-modal-title">Cadastrar nova ficha</h4>
    </div>

    <div class="ls-modal-body" id="myModalBody">
      <form action="<?=base_url()?>ProntuariosController/add" method="POST" class="ls-form ls-form-horizontal row" data-ls-module="form">
			<!-- Clínica -->
			<label for="clinica" class="ls-label">
				<b class="ls-label-text">Clínica</b>
				<p class="ls-label-info">Nome da clínica</p>
				<div class="ls-custom-select">
					<select class="ls-select" name="clinicaid">
						<option value=""></option>
						<?php foreach ($clinicas as $value):?>
							<option value="<?=$value->idclinica?>"><?=$value->nomeclinica?></option>
						<?php endforeach;?>
					</select>
				</div>
			</label>

			<!-- Cid 10 -->
			<label for="" class="ls-label">
				<b class="ls-label-text">CID10/DSM</b>
				<p class="ls-label-info">Identifique a doença</p>
				<input type="text" name="cid10" required="required" placeholder="Código da doença">
			</label>

			<!-- Alta -->
			<label for="" class="ls-label">
				<b class="ls-label-text">Alta</b>
				<div class="ls-custom-select">
					<select class="ls-select" name="alta" required="required">
						<option value="S">Sim</option>
						<option value="N">Não</option>
					</select>
				</div>
			</label>

			<!-- Encaminhado -->
			
			<label for="" class="ls-label">
				<b class="ls-label-text">Encaminhado</b>
				<div class="ls-custom-select">
					<select class="ls-select" name="encaminhado" required="required">
						<option value="S">Sim</option>
						<option value="N">Não</option>
					</select>
				</div>
			</label>

			<!-- Tratamento -->
			<label class="ls-label">
			    <b class="ls-label-text">Tratamento adotado</b>
			    <textarea rows="10" name="tratamentoadotado" required="required"></textarea>
		  	</label>

			<label class="ls-label">
			    <b class="ls-label-text">Diagnóstico</b>
			    <textarea rows="10" name="diagnostico" required="required"></textarea>
		  	</label>

		  	<label class="ls-label">
			    <b class="ls-label-text">Evolução</b>
			    <textarea rows="10" name="evolucao" required="required"></textarea>
		  	</label>
			<!-- id do psicologo -->
			<input type="hidden" name="id_psicologo" required="required" value="<?=$psicologo?>">
			<input type="hidden" name="paciente_id" required="required" id="paciente_id" value="">
			<script type="text/javascript">
				function paciente(idpaciente){
					document.getElementById('paciente_id').value = idpaciente;
				}
			</script>
			<button type="submit" class="ls-btn">Salvar ficha</button>
	  </form>
    </div>
  </div>
</div>