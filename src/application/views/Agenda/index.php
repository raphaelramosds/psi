 
<div class="ls-main">
	<div class="container-fluid">
		<div class="ls-box ls-board-box ls-no-border">
			

			<div id="calendar"></div>

		</div>
	</div>
</div>

<div class="modal fade " id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title text-center">Cadastrar horários para pacientes</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" method="POST" action="<?=base_url('AgendaController/add')?>">
						<label for="inputEmail3" class="col-sm-2 control-label">Intervalo de Atendimento</label>
						<div class="form-group">
							<div class="col-sm-3">
								<input type="time" class="form-control" placeholder="Intervalo de atendimento" name="intervalo">
							</div>
						</div>

						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Paciente</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="title[]" placeholder="Nome do paciente">
							</div>
						</div>

						<!-- start: 2018-09-03 08:00:00 -->
						<!-- end: 	2018-09-03 12:00:00 -->

						<div class="form-group">
							<label class="col-sm-2 control-label">Do dia:</label>
							<div class="col-sm-3">
								<input type="date" class="form-control" name="dinicial[]">
							</div>
							<label class="col-sm-2 control-label">Até:</label>
							<div class="col-sm-3">
								<input type="date" class="form-control" name="dfinal[]">
							</div>

						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Das:</label>
							<div class="col-sm-3">
								<input type="time" class="form-control" name="ihora[]">
							</div>
							
							<input type="hidden" class="form-control" name="fhora[]" value="00:00:00">

						</div>	

						<div id="dynamic_fields">
							
						</div>						

						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">

								<input type="hidden" value="<?=$id?>" name="psicologo_id">
								<button type="submit" class="btn btn-success">Cadastrar</button>
								<button type="button" id="maishorarios" class="btn btn-primary">Adcionar outro horário</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	
	<script>
		i = 1;
		$("#maishorarios").on("click", function(event){
			$('#dynamic_fields').append(
				"<div id='fields"+i+"'>" +
					"<hr>" +
					"<div class='form-group'>" +
						"<label for='inputEmail3' class='col-sm-2 control-label'>Paciente</label>" +
						"<div class='col-sm-10'>" + 
							"<input type='text' class='form-control' name='title[]' placeholder='Nome do paciente'>"+
						"</div>" +
					"</div>" +

					"<div class='form-group'>" +
						"<label class='col-sm-2 control-label'>Do dia:</label>" +
						"<div class='col-sm-3'>" +
							"<input type='date' class='form-control' name='dinicial[]'>" + 
						"</div>" + 
						"<label class='col-sm-2 control-label'>Até:</label>" +
						"<div class='col-sm-3'>" +
							"<input type='date' class='form-control' name='dfinal[]'>"+
						"</div>" +
					"</div>" +

					"<div class='form-group'>"+
						"<label class='col-sm-2 control-label'>Das:</label>"+
						"<div class='col-sm-3'>"+
							"<input type='time' class='form-control' name='ihora[]'>"+
						"</div>" +
						"<input type='hidden' value='00:00:00' class='form-control' name='fhora[]'>" + 
						"<button type='button' name='remove' id='"+i+"' class='btn btn-danger btn_remove'>Retirar</button>"+
					"</div>" +
				"</div>"
				)
			i++
		})

		$(document).on('click', '.btn_remove', function(){
			button_id = $(this).attr('id')
			$('#fields'+button_id).remove()
		})

	</script>

	<style>.form{display:none}</style>
	<div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title text-center">Dados da consulta</h4>
				</div>
				<div class="modal-body">
					<div class="visualizar">
						<dl class="dl-horizontal">
							<dt>Paciente Cadastrado</dt>
							<dd id="title"></dd>
							<dt>Horário inicial</dt>
							<dd id="start"></dd>
							<dt>Horário final</dt>
							<dd id="end"></dd>
						</dl>						
						<button class="btn btn-canc-vis btn-warning">Encaixar paciente</button>
					</div>
				</div>
				<div class="form">
					<form class="form-horizontal" method="POST" action="<?=base_url('AgendaController/update')?>">
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Paciente</label>
							<div class="col-sm-10">
								<input type="text" id="pnome" class="form-control" name="title" placeholder="Nome do paciente">
							</div>
						</div>

						<!-- start: 2018-09-03 08:00:00 -->
						<!-- end: 	2018-09-03 12:00:00 -->

						<div class="form-group">
							<label class="col-sm-2 control-label">Do dia:</label>
							<div class="col-sm-3">
								<input type="date" class="form-control" id="dini">
							</div>
							<label class="col-sm-2 control-label">Até:</label>
							<div class="col-sm-3">
								<input type="date" class="form-control" id="dfin">
							</div>
							<input type="hidden" name="start" id="inicioO">

						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Das:</label>
							<div class="col-sm-3">
								<input type="time" class="form-control" id="ih">
							</div>
							<label class="col-sm-2 control-label">Até às:</label>
							<div class="col-sm-3">
								<input type="time" class="form-control" id="fh">
							</div>

							<input type="hidden" name="end" id="fimO">
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
							<script>
								function outroHorario(){
									idata = document.getElementById('dini')
									ihora = document.getElementById('ih')
									fdata = document.getElementById('dfin')
									fhora = document.getElementById('fh')
									inicio = document.getElementById('inicioO')
									fim = document.getElementById('fimO')

									// start: idata ihora
									inicio.value = idata.value + " " + ihora.value

									// end: fdata fhora
									fim.value = fdata.value + " " + fhora.value

								}
							</script>
								<input type="hidden" name="id" id="id">
								<input type="hidden" value="<?=$id?>" name="psicologo_id">
								<button type="submit" onclick="outroHorario()" class="btn btn-success">Salvar Dados</button>
								<button type="button" class="btn btn-canc-edit btn-primary">Cancelar</button>
							</div>
						</div>
					</form>
	
				</div>
			</div>
		</div>
	</div>


<?php $data = $this->db->where('psicologo_id', $id)->get('horario'); ?>

<script>
	$(document).ready(function(){
		$('#calendar').fullCalendar({
			selectable :true,
			defaultDate : Date(),
			editable : true,
			eventLimit : true,
			select: function(start, end){
				// Passar dias selecionados para a janela Modal
				$('#cadastrar').modal('show')
			},
			eventClick : function(event){

				$('#visualizar #id').val(event.id);

				$('#visualizar #title').text(event.title);
				$('#visualizar #start').text(event.start.format('DD/MM/YYYY HH:mm:ss'));
				$('#visualizar #end').text(event.end.format('DD/MM/YYYY HH:mm:ss'));

				dinicial = event.start.format('YYYY-MM-DD')
				hinicial = event.start.format('HH:mm:ss')
				dfinal = event.end.format('YYYY-MM-DD')
				hfinal = event.end.format('HH:mm:ss')

				$('#visualizar #pnome').val(event.title)
				$('#visualizar #dini').val(dinicial) 
				$('#visualizar #dfin').val(dfinal)
				$('#visualizar #ih').val(hinicial)
				$('#visualizar #fh').val(hfinal)



				$('#visualizar').modal('show')

				return false;
			},
			events : [
				<?php foreach ($data->result() as $row): ?>
				{
					id : "<?php echo $row->id; ?>",
					title : "<?php echo $row->title; ?>",
					start : "<?php echo $row->start; ?>",
					end : "<?php echo $row->end; ?>",
					description : "<?php echo $row->end; ?>"
				},
				<?php endforeach; ?>
			]

		})
	})

	$('.btn-canc-vis').on('click', function(){
		$('.form').slideToggle()
		$('.visualizar').slideToggle()
	})

	$('.btn-canc-edit').on('click', function(){
		$('.form').slideToggle()
		$('.visualizar').slideToggle()
	})


</script>


	