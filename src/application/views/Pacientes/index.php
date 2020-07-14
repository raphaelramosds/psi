	<div class="ls-main">
	<div class="container-fluid">
		<h1 class="ls-title-intro ls-ico-accessibility">Pacientes cadastrados</h1>
		<div class="ls-box ls-board-box ls-no-border">
			
			<?php if(isset($add_paciente)):?>
				<div class='ls-background-primary ls-sm-space ls-sm-margin-bottom ls-text-md ls-ico-checkmark'><?=$add_paciente?></div>
			<?php elseif(isset($update_paciente)):?>
				<div class='ls-background-primary ls-sm-space ls-sm-margin-bottom ls-text-md ls-ico-checkmark'><?=$update_paciente?></div>
			<?php endif;?>
			
			<form  action="<?=base_url('Pacientes/search')?>" class="ls-form ls-form-inline" method="POST">
				<label class="ls-label" role="search">
					<input type="text" id="q" name="paciente" aria-label="Faça sua busca pelo paciente" placeholder="Nome do paciente" required="" class="ls-field">
				</label>
				<input type="submit" value="Buscar" class="ls-btn" title="Buscar">
				<a href="<?=base_url('create-paciente')?>" class="ls-ico-plus ls-btn	">Adcionar um paciente</a>
			</form>
			<table class="ls-table ls-table-striped">
			<tr>
				<th>Nome</th>
				<th>Email</th>
				<th>Telefone</th>
				<th>Profissão</th>
				<th>Cartão de Saúde</th>
				<th>Numeros SUS</th>
				<th></th>
			</tr>
			<?php foreach ($datapacientes as $value): ?>
				<?php
				$this->db->from($this->db->dbprefix('prontuario').','.$this->db->dbprefix('paciente'));
				$this->db->where($this->db->dbprefix('prontuario').".paciente_id = ".$value->id);
				$paciente_prontuario = $this->db->get()->result();
				?>
				<tr id="paciente<?=$value->id?>">
					<td><?=$value->nome?></td>
					<td><?=$value->email?></td>
					<td><?=$value->telefone?></td>
					<td><?=$value->profissao?></td>
					<td>
						<?php if($value->cartaosaude == 0):?>
							<?="Não registrado"?>
						<?php else:?>
							<?=$value->cartaosaude?>
						<?php endif;?>
					</td>
					<td>
						<?php if($value->numerosus == 0):?>
							<?="Não registrado"?>
						<?php else:?>
							<?=$value->numerosus?>
						<?php endif;?>
					</td>
					<td class='ls-txt-left'>
						<div data-ls-module='dropdown' class='ls-dropdown'>
							<a href='#' class='ls-btn' onclick="preencher(<?=$value->id?>)">Ação</a>
							<ul class='ls-dropdown-nav'>
								<li><a href="<?=base_url('update-paciente')?>/<?=$value->id?>" class='ls-ico-pencil ls-color-black ls-no-bghover' title='Editar'>Editar</a></li>
								<li>
									<?php if (count($paciente_prontuario) > 0): ?>
										<a href="<?=base_url('index-prontuario')?>/<?=$value->id?>" class='ls-ico-search ls-color-black ls-no-bghover' title='Ver prontuário'>Ver prontuário</a>
									<?php else: ?>
										<a class='ls-ico-plus ls-color-black ls-no-bghover ls-cursor-pointer criarprontuario' title='Adcionar prontuário' data-ls-module="modal" data-target="#prontuario" data-id="<?=$value->id?>">Adcionar prontuário</a>
									<?php endif ?>
								</li>
								<li>
									<a data-ls-module="modal" data-target="#confirmacaoRetirar" class='ls-ico-remove ls-color-danger ls-cursor-pointer' title='Excluir'>Excluir</a>
								</li>
							</ul>
						</div>
					</td>
				</tr>
			<?php endforeach ?>
			</table>
			<div class="ls-pagination-filter">
				<?php if(isset($pagination)):?>
				<?=$pagination?>
				<?php endif;?>
			</div>
		</div>
	</div>
</div>

<!-- Modal div: -->
<div class="ls-modal" id="prontuario">
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
				<p class="ls-label-info">Abrir pesquisa de CID10</a></p>
				<input type="text" name="cid10">
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
					<select class="ls-select" name="encaminhado" required="required">
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
			    <textarea rows="10" name="diagnostico" ></textarea>
		  	</label>

		  	<label class="ls-label">
			    <b class="ls-label-text">Evolução</b>
			    <textarea rows="10" name="evolucao" ></textarea>
		  	</label>

			<!-- id do psicologo -->
			<input type="hidden" name="id_psicologo" required="required" value="<?=$psicologo?>">
			<input type="hidden" name="paciente_id" required="required" id="paciente_id" value="">
	  		<input type="hidden" name="data" value="<?php echo date('Y-m-d')?>">

			<script>
				$('.criarprontuario').click(function(){
					id = $(this).data('id')
					$('#paciente_id').val(id)
				})
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
	        url: "<?=base_url('Pacientes/delete')?>",
	        data:{
	            paciente:$("#excludente").val(),
	        },
	        success:function(data){
	            $("#paciente" + $("#excludente").val() ).fadeOut("slow");
	            locastyle.modal.close()
	        },
	        error:function(){
	        	alert("Este paciente está atribuído a um prontuário. Então, não é possível removê-lo.");
	        }
	    })
	})

</script>