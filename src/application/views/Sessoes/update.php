<div class="ls-main">
	<div class="container-fluid">
		<h1 class="ls-title-intro ls-ico-pencil">Editar sessão</h1>
		<div class="ls-box ls-board-box ls-no-border">
				<form action="<?=base_url()?>SessoesController/update" method="POST" class="ls-form ls-form-horizontal row">
					<fieldset>
					<input type="hidden" name="id" value="<?=$sessao->id ?>">
					<label class="ls-label col-md-6 col-xs-12">
						<b class="ls-label-text">Título da sessão</b>
						<p class="ls-label-information">Seja claro e direto</p>
						<input type="text" required name="titulo" class="ls-field" value="<?=$sessao->titulo ?>">
					</label>
					<label class="ls-label col-md-6 col-xs-12">
						<b class="ls-label-text">Data da sessão</b>
						<p class="ls-label-information">Quando ocorreu?</p>
						<input type="date" required name="data" class="ls-field" value="<?=$sessao->data ?>">
					</label>
					<input type="hidden" required name="numero_prontuario" class="ls-field" value="<?=$sessao->numero_prontuario ?>">
					<label class="ls-label col-md-12">
						<b class="ls-label-text">Descrição da sessão</b>
						<textarea rows="4" name="descricao"><?=$sessao->descricao ?></textarea>
					</label>

					<div class="ls-actions-btn" >
				   	 	<button class="ls-btn">Salvar dados da sessão</button>
					 	<a href="<?=base_url()?>view-sessao" class="ls-btn-danger">Voltar</a>
					</div>
					</fieldset>
				</form>
			</div>
	</div>
</div>
