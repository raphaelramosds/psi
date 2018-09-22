<style type="text/css">
	.calendar{ font-family: Arial; font-size: 12px; }
	table.calendar{ margin: auto; border-collapse:collapse; }
	.calendar .days td{ width:150px; height:120px; padding:4px; border: 1px solid #999; vertical-align:top; background-color: white; }
	.calendar .days td:hover{ background-color: lightgrey; }
	.calendar .highlight { background: #E84855; color:white; padding: 0.5em;}
	.calendar .title { text-transform: uppercase;  font-size:20px; line-height:80px;}
</style>

<div class="ls-main">
	<div class="container-fluid">
		<h1 class="ls-title-intro ls-ico-calendar ls-txt-center">Minha Agenda</h1>
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