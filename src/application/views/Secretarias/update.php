<div class="ls-main">
	<div class="container-fluid">
		<h1 class="ls-title-intro ls-ico-user">Editar Secretária</h1>
		<div class="ls-box ls-board-box"  style="border:none;">


			  	<form action="<?=base_url('SecretariasController/update')?>" method="post" data-ls-module="form">
			  		<fieldset>

                   <label class="ls-label">
                        <input type="text" name="nome" required="required" value="<?=$secretaria->nome?>">
                    </label>

                    <label class="ls-label">
                        <p class="ls-label-info">Sexo</p>
                        <div class="ls-custom-select">
                            <select class="ls-custom" name="sexo">
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                            </select>
                        </div>
                    </label>

                    <label for="" class="ls-label">
                        <p class="ls-label-info">Telefone</p>
                        <input type="text" name="telefone" value="<?=$secretaria->telefone?>" class="ls-mask-phone8_with_ddd">
                    </label>

                    <label for="" class="ls-label">
                        <p class="ls-label-info">Endereço</p>
                        <input type="text" name="endereco" value="<?=$secretaria->endereco?>">
                    </label>

                    <label for="" class="ls-label">
                        <p class="ls-label-info">Email</p>
                        <input type="email" name="email" value="<?=$secretaria->email?>">
                    </label>
                    
                    <!-- Foreign Keys -->
                    <label class="ls-label">
                        <p class="ls-label-info">Clinica</p>
                        <div class="ls-custom-select">
                            <select name="clinica_id" class="ls-custom" required="required">
                                <?php foreach ($clinicas as $row): ?>
                                <option value="<?=$row->id?>"><?=$row->nome?></option>
                                <?php endforeach;?>
                            </select> 
                        </div>
                    </label>

					<input type="hidden" name="clinica_id" value="<?=$secretaria->clinica_id?>">
					<input type="hidden" name="psicologo_id" value="<?=$secretaria->psicologo_id?>">
					<input type="hidden" name="usuario_idusuario" value="<?=$secretaria->usuario_idusuario?>">
					<input type="hidden" name="id" value="<?=$secretaria->id?>">
					<hr>
					<button type="submit"  class='ls-ico-pencil ls-btn' title='Editar' >Salvar informações da Secretária</button>		<a href="<?=base_url()?>view-secretaria" class="ls-btn-danger" >Voltar</a>
			  	</form>
			</div>
		</div>
	</div>
</div>
