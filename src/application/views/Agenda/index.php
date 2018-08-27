<div class="ls-main">
	<div class="container-fluid">
		<h1 class="ls-title-intro ls-ico-calendar">Minha Agenda</h1>

		<div class="ls-box ls-board-box ls-no-border">
			<form action="<?=base_url('AgendaController/search')?>" method="POST">
				<label>Filtre os Resultados por dia, mês e ano:</label>

				<select name="dia">

				</select>

				<select name="mes">

				</select>

				<select name="ano">
					
				</select>
	
			</form>

			<hr>

			
			<div class="row">
				<div class="col-md-6 ls-txt-left ">
					<h3>Horários sem pacientes</h3>	
							
		
				</div>

				<div class="col-md-6 ls-txt-left ">
					<h3>Horários com pacientes</h3>

				</div>
			</div>

			<hr>
			<?php if ($this->session->userdata('usuario')[1]['role'] == 1): ?>
			<a href="<?=base_url('create-agenda')?>" class="ls-btn">Abrir uma agenda</a>
			<?php endif ?>
		</div>

	</div>
</div>