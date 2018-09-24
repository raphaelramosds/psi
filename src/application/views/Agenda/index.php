 
<div class="ls-main">
	<div class="container-fluid">
		<div class="ls-box ls-board-box ls-no-border">
			

			<div id="calendar"></div>

		</div>
	</div>
</div>

<div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title text-center">Cadastrar horário</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" method="POST" action="<?=base_url('AgendaController/add')?>">
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Nome do paciente (opcional)</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="title" placeholder="Nome">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Data/Hora Inicial</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="start" id="start" onKeyPress="DataHora(event, this)">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Data/Hora Final</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="end" id="end" onKeyPress="DataHora(event, this)">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<input type="hidden" value="<?=$id?>" name="psicologo_id">
								<button type="submit" class="btn btn-success">Cadastrar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<style>.form{display:none}</style>
	<div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
		<div class="modal-dialog" role="document">
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
							<label for="inputEmail3" class="col-sm-2 control-label">Nome do paciente (opcional)</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="title" placeholder="Nome" id="title">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Data/Hora Inicial</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="start" id="start">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Data/Hora Final</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="end" id="end">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<input type="hidden" name="id" id="id">
								<input type="hidden" value="<?=$id?>" name="psicologo_id">
								<button type="submit" class="btn btn-success">Salvar Dados</button>
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
				$('#cadastrar #start').val(moment(start).format('DD/MM/YYYY HH:mm:ss'))
				$('#cadastrar #end').val(moment(end).format('DD/MM/YYYY HH:mm:ss'))
				$('#cadastrar').modal('show')
			},
			eventClick : function(event){
				$('#visualizar #id').val(event.id);
				$('#visualizar #title').text(event.title);
				$('#visualizar #title').val(event.title);
				$('#visualizar #start').text(event.start.format('DD/MM/YYYY HH:mm:ss'));
				$('#visualizar #start').val(event.start.format('DD/MM/YYYY HH:mm:ss'));
				$('#visualizar #end').text(event.end.format('DD/MM/YYYY HH:mm:ss'));
				$('#visualizar #end').val(event.end.format('DD/MM/YYYY HH:mm:ss'));
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


	