<div class="ls-main">
<div class="container-fluid">
	<div class="ls-box ls-board-box ls-no-border">
		<header class="ls-info-header ls-no-border">
			<h2 class="ls-title-3 ls-ico-stats">Registre um uma nova sessão</h2>
		</header>
		<form action="<?=base_url()?>SessoesController/add" method="POST" class="ls-form ls-form-horizontal row">
			<fieldset>
			<label class="ls-label col-md-4 col-xs-12">
				<b class="ls-label-text">Título da sessão</b>
				<p class="ls-label-information">Seja claro e direto</p>
				<input type="text" required name="titulo" class="ls-field">
			</label>
			<label class="ls-label col-md-4 col-xs-12">
				<b class="ls-label-text">Data da sessao</b>
				<p class="ls-label-information">Quando ocorreu?</p>
				<input type="date" required name="data" class="ls-field">
			</label>
			<!-- <label class="ls-label col-md-4 col-xs-12">
				<b class="ls-label-text">Número do prontuario</b>
				<p class="ls-label-information">Essa sessão cabe a qual prontuário?</p>
				<input type="hidden" required name="numeroprontuario" class="ls-field" value="<?php echo $prontuario ?>">
			</label> -->
			<input type="hidden" required name="numeroprontuario" class="ls-field" value="<?php echo $prontuario ?>">
			<label class="ls-label col-md-12">
				<b class="ls-label-text">Descrição da sessão</b>
				<textarea rows="4" name="descricao"></textarea>
			</label>
			</fieldset>
			
			<div class="ls-actions-btn">
				<button type="submit" class="ls-btn">Salvar dados da sessão</button>
				<a href="<?=base_url()?>SessoesController/view" class="ls-btn-danger">Voltar</a>	
			</div>
		</form>
	</div>	
</div>

</div>
