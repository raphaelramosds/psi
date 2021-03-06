<?php
$url = base_url("assets/xml/doencas.xml");
$xml = simplexml_load_file($url);


	$this->db->select('id, nome');
	$this->db->from($this->db->dbprefix('paciente'));
	$this->db->where('id = '.$this->session->userdata('paciente'));
	$this->db->order_by("nome", "asc");
	
	$paciente = $this->db->get()->row_array();


?>

<div class="ls-main">
	<div class="container-fluid">
		<h1 class="ls-title-intro ls-ico-pencil">Prontuário <b><?=$paciente['nome']?></b></h1>
		<div class="ls-box ls-board-box ls-no-border">

			<form  action="<?=base_url('Prontuarios/search')?>" class="ls-form ls-form-inline" method="POST">
				<label class="ls-label" role="search">
					<b class="ls-label-text">Filtrar pelo mês:</b>
					<input type="month" name="mes" required="" class="ls-field">
				</label>
				<input type="submit" value="Buscar" class="ls-btn" title="Buscar">
			</form>
			
			<?php if(isset($add_prontuario)):?>
				<div class='ls-background-primary ls-sm-space ls-sm-margin-bottom ls-text-md ls-ico-checkmark'><?=$add_prontuario?></div>
			<?php elseif(isset($update_prontuario)):?>
				<div class='ls-background-primary ls-sm-space ls-sm-margin-bottom ls-text-md ls-ico-checkmark'><?=$update_prontuario?></div>
			<?php endif;?>

			<?php if($dataprontuarios == NULL):?>
			<div class="ls-alert-info">
            Não há nada aqui
         	</div>

			<?php else:?>
			<table class="ls-table ls-table-striped">
				<tr>
					<!-- <th>Número da ficha</th> -->
					<th>Clínica</th>
					<th>CID10/DSM</th>
					<th>Data da criação</th>
					<th></th>
				</tr>

				<?php foreach ($dataprontuarios as $value): ?>
					<tr id="prontuario<?=$value->numeroprontuario?>">
						<!-- <td>
							<?=$value->numeroprontuario ?>
						</td> -->

						<?php
						$this->db->select('nome');
						$this->db->from($this->db->dbprefix('clinica'));
						$this->db->where('id = '.$value->clinica_id);
						$this->db->order_by("nome", "asc");

						$clinica = $this->db->get()->row_array();
						?>

						<td><?=$clinica['nome']?></td>

						<td>
							<?php $find = FALSE; ?>
							<?php foreach($xml->doenca as $line): ?>
								<?php if($line->codigo == $value->cid10): ?>
									<?=$line->nome?>
									<?=$find = TRUE; ?>
								<?php endif;?>
							<?php endforeach;?>
							<?php if($find == FALSE): ?>
								<span class="ls-color-danger"><?="Essa doença não existe"?></span>
							<?php endif; ?>
						</td>

						<td><?php
							$date = new DateTime($value->data);
							echo $date->format('d/m/Y')
						?></td>

						<td class="ls-text-center">
							<div data-ls-module='dropdown' class='ls-dropdown'>
								<a href='#' class='ls-btn' onclick="preencher(<?=$value->numeroprontuario?>)">Ação</a>
								<ul class="ls-dropdown-nav">
									<li><a href="<?=base_url('index-sessao')?>/<?=$value->numeroprontuario?>" class='ls-ico-docs ls-color-black ls-no-bghover' title='Ver sessões'>Ver sessões</a></li>
									<li><a href="<?=base_url('update-prontuario')?>/<?=$value->numeroprontuario?>" class='ls-ico-search ls-color-black ls-no-bghover' title='Detalhar'>Ver/Editar informações</a></li>	

									<li>
										<a data-ls-module="modal" data-target="#confirmacaoRetirar" class='ls-ico-remove ls-color-danger ls-cursor-pointer' title='Excluir'>Excluir</a>
									</li>									
								</ul>
							</div>
						</td>
					</tr>
				<?php endforeach; ?>
			 </table>
			<?php endif;?>
			<a  data-ls-module="modal" data-target="#ficha" onClick="paciente(<?=$paciente['id']?>)" class='ls-btn'> Adcionar nova ficha</a>
			<a href="<?=base_url('view-paciente')?>" class="ls-btn-danger">Voltar</a>
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
      <form action="<?=base_url('Prontuarios/add')?>" method="POST" class="ls-form ls-form-horizontal row" data-ls-module="form">
			<!-- Clínica -->
			<label for="clinica" class="ls-label">
				<b class="ls-label-text">Clínica</b>
				<p class="ls-label-info">Nome da clínica</p>
				<div class="ls-custom-select">
					<select class="ls-select" name="clinica_id">
						<option value=""></option>
						<?php foreach ($clinicas as $value):?>
							<option value="<?=$value->id?>"><?=$value->nome?></option>
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
						<option value="N">Não</option>
						<option value="S">Sim</option>
					</select>
				</div>
			</label>

			<!-- Encaminhado -->
			
			<label for="" class="ls-label">
				<b class="ls-label-text">Encaminhado</b>
				<div class="ls-custom-select">
					<select class="ls-select" name="encaminhado">
						<option value="N">Não</option>
						<option value="S">Sim</option>
					</select>
				</div>
			</label>

			<!-- Tratamento -->
			<label class="ls-label">
			    <b class="ls-label-text">Tratamento adotado</b>
			    <textarea rows="10" name="tratamentoadotado" ></textarea>
		  	</label>

			<label class="ls-label">
			    <b class="ls-label-text">Diagnóstico</b>
			    <textarea rows="10" name="diagnostico"></textarea>
		  	</label>

		  	<label class="ls-label">
			    <b class="ls-label-text">Evolução</b>
			    <textarea rows="10" name="evolucao" ></textarea>
		  	</label>
			<!-- id do psicologo -->
			<input type="hidden" name="id_psicologo" required="required" value="<?=$psicologo?>">
			<input type="hidden" name="paciente_id" required="required" id="paciente_id" value="">
			<input type="hidden" name="data" value="<?php echo date('Y-m-d')?>">
			<script type="text/javascript">
				function paciente(idpaciente)
				{
					document.getElementById('paciente_id').value = idpaciente;
				}
			</script>
			<button type="submit" class="ls-btn">Salvar ficha</button>
	  </form>
    </div>
  </div>
</div>

<!-- Confirmação da retiradas -->

<div class="ls-modal" id="confirmacaoRetirar">
  <div class="ls-modal-box">
    <div class="ls-modal-header">
      <button data-dismiss="modal">&times;</button>
      <h4 class="ls-modal-title">Confirmação de exclusão</h4>
    </div>
    <div class="ls-modal-body" id="myModalBody">
    	Tem certeza que deseja excluir?
    	<input type="hidden" id="excludente" type="number">
    </div>
    <div class="ls-modal-footer">
      <button class="ls-btn ls-float-right" data-dismiss="modal">Close</button>
      <button type="submit" class="ls-btn-danger" id="retirar">Sim</button>
    </div>
  </div>
</div><!-- /.modal -->


<script>
	
	function preencher(request){$("#excludente").val(request);}

	$('#retirar').click(function(){
	    $.ajax({
	        type:'ajax',
	        dataType:'json',
	        method:'post',
	        url: "<?=base_url('Prontuarios/delete')?>",
	        data:{
	            prontuario:$("#excludente").val(),
	        },
	        success:function(data){
	            $("#prontuario" + $("#excludente").val() ).fadeOut("slow");;
	            locastyle.modal.close()
	        }
	    })
	})

</script>