<div class="ls-main">
	<div class="container-fluid">
		<h1 class="ls-title-intro ls-ico-calendar">Minha Agenda</h1>

		<div class="ls-box ls-board-box ls-no-border">

			<hr />
			<?php if ($this->session->userdata('usuario')[1]['role'] == 1): ?>
			<a href="<?=base_url('create-agenda')?>" class="ls-btn">Abrir uma agenda</a>
			<?php endif ?>
		</div>

	</div>
</div>