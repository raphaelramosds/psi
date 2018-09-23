<style type="text/css">
	.calendar{ font-family: Arial; font-size: 12px; }
	table.calendar{ margin: auto; border-collapse:collapse; }
	.calendar .days td{ width:150px; height:120px; padding:4px; border: 1px solid #999; vertical-align:top; background-color: white; }
	.calendar .days td:hover{ background-color: lightgrey; cursor: pointer;}
	.calendar .highlight { background: #E84855; color:white; padding: 0.5em; }
	.calendar .today_highlight {  background: lightgreen; color:#1c1c1c; padding: 0.5em; }
	.calendar .title { text-transform: uppercase;  font-size:20px; line-height:80px;}
</style>

<div class="ls-main">
	<div class="container-fluid">
		<div class="ls-box ls-board-box ls-no-border">

			<?=$calendario?>
			<div class="ls-actions-btn">
				<?php if ($this->session->userdata('usuario')[1]['role'] == 1): ?>
				<a href="<?=base_url('create-horario')?>" class="ls-btn">Adcionar um horário</a>
				<?php endif ?>
			</div>
		</div>

	</div>
</div>

<script type="text/javascript">

	var url = "<?php echo base_url()?>AgendaController"

	$(document).ready(function(){
		$('.calendar .day').click(function(){
			
			day_num = $(this).find('.day_num').html()

			$.ajax({
				url : window.location,
				type : "POST",
				data : {diaEscolhido : day_num}

			}).done(function(content){ console.log("Data saved: " + content) })

		})
	})

</script>


<div class="ls-modal" id="description">
  <div class="ls-modal-box">
    <div class="ls-modal-header">
      <button data-dismiss="modal">&times;</button>
      <h4 class="ls-modal-title">Horários disponiveis</h4>
    </div>
    <div class="ls-modal-body" id="myModalBody">
    	<!-- Recuperar horários referentes a esse dia -->
		<?php if(isset($request)): ?>
 			<?php foreach ($request as $row): ?>
 				<ul>
 					<li><?=$row->hinicial?> até as <?=$row->hfinal?></li>
 				</ul>
 			<?php endforeach ?>
 		<?php endif;?>
    </div>
    <div class="ls-modal-footer">
      <button class="ls-btn ls-float-right" data-dismiss="modal">Fechar</button>
      <button type="submit" class="ls-btn-primary">Salvar</button>
    </div>
  </div>
</div>