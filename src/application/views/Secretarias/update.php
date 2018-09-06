<div class="ls-main">
	<div class="container-fluid">
		<h1 class="ls-title-intro ls-ico-user">Editar Secretária</h1>
		<div class="ls-box ls-board-box"  style="border:none;">
            <ul class="ls-tabs-nav" id="awesome-dropdown-tab">
              <li class="ls-active"><a data-ls-module="tabs" href="#tab6">Informações de Usuário</a></li>
              <li><a data-ls-module="tabs" href="#tab7">Informações da Secretária</a></li>
            </ul>
            <div class="ls-tabs-container" id="awesome-tab-content">
                <div id="tab6" class="ls-tab-content ls-active">
                    <form action="<?=base_url('UsuariosController/update')?>" method="post" data-ls-module="form">
                        <fieldset>
                            <label class="ls-label">
                                <p class="ls-label-info">Nome de usuário</p>
                                <input type="text" name="username" value="<?=$usuario[0]->username?>">
                            </label>

                            <label class="ls-label">
                                <p class="ls-label-info">Email</p>
                                <input type="email" name="email" value="<?=$usuario[0]->email?>" >
                            </label>

                            <input type="hidden" name="id" value="<?=$usuario[0]->id?>">
                            <input type="hidden" name="role" value="<?=$usuario[0]->role?>">
                        </fieldset>
                        <button type="submit"  class='ls-ico-pencil ls-btn' title='Editar' >Salvar informações de usuário</button>
                    </form>
                </div>

                <div id="tab7" class="ls-tab-content">
                    <form action="<?=base_url('SecretariasController/update')?>" method="post" data-ls-module="form">
                        <fieldset>
                            <label class="ls-label">
                                <p class="ls-label-info">Nome</p>
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
                            <button type="submit"  class='ls-ico-pencil ls-btn' title='Editar' >Salvar informações da Secretária</button>
                        </fieldset>
                    </form>
                </div>
                <a href="<?=base_url()?>view-secretaria" class="ls-btn-danger" >Voltar</a>
            </div>
		</div>
	</div>
</div>
