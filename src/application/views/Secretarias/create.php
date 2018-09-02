<div class="ls-main">
    <div class="container-fluid">
        <div class="ls-box ls-board-box ls-no-border">
            <header class="ls-info-header ls-no-border">
                <h2 class="ls-title-3 ls-ico-panel-pabx">Cadastro de Secretária</h2>
            </header>
            <?php if (isset($erro_user)):?>
                <div class='ls-sm-space' style='font-size:20px; color:red;'><?=$erro_user?></div>
            <?php endif;?>
            <form action="<?=base_url('UsuariosController/add')?>" method="POST"  data-ls-module="form" class="ls-form ls-form-horizontal row">
                <fieldset>
                    <label class="ls-label col-md-12">
                        <b class="ls-label-text">Informações do usuário</b>
                        <p class="ls-label-info">Digite o nome de usuário. Ex.: usuario123</p>
                        <input type="text" name ="username" required="required" placeholder="Nome de usuário">
                    </label>

                    <label class="ls-label col-md-6 col-xs-12">
                        <div class="ls-prefix-group">
                            <input id="password_field" class="ls-login-bg-password" name="senha" type="password" placeholder="Senha" required >
                            <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye" data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#password_field" href="#"></a>
                        </div>
                    </label>

                    <label class="ls-label col-md-6 col-xs-12">
                        <?php if (isset($erro_senha)): ?>
                            <div class='ls-sm-space ' style='font-size:20px; color:red;'><?=$erro_senha?></div>
                        <?php endif ?>
                        <b class="ls-label-text ls-hidden-accessible">Confirmação</b>
                        <div class="ls-prefix-group">
                            <input id="password_confirm" class="ls-login-bg-password" name="confirm_senha" type="password" placeholder="Confirme sua senha" required >
                            <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye" data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#password_confirm" href="#"></a>
                        </div>
                    </label>


                    <label class="ls-label col-md-12">
                        <b class="ls-label-text">Email</b>
                        <input type="email" name="email" placeholder="exemplo@dominio.com">
                    </label>    


                    <label class="ls-label col-md-12">
                        <b class="ls-label-text">Informações da Secretária</b>
                        <p class="ls-label-info">Algumas informações não são obrigadas</p>
                        <input type="text" name="nome" required="required" placeholder="Seu nome completo">
                    </label>

                    <label class="ls-label col-md-4 cpl-xs-12">
                        <p class="ls-label-info ">Sexo</p>
                        <div class="ls-custom-select">
                            <select class="ls-custom" name="sexo">
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                            </select>
                        </div>
                    </label>

                    <label class="ls-label col-md-4 cpl-xs-12">
                        <p class="ls-label-info ">Telefone</p>
                        <input type="text" name="telefone" class="ls-mask-phone8_with_ddd" placeholder="(99) 9999-9999">
                    </label>

                    <label class="ls-label col-md-4 cpl-xs-12">
                        <p class="ls-label-info ">Endereço</p>
                        <input type="text" name="endereco">
                    </label>
                    
                    <!-- Foreign Keys -->
                    <label class="ls-label col-md-12">
                        <p class="ls-label-info">Clinica</p>
                        <div class="ls-custom-select">
                            <select name="clinica_id" class="ls-custom" required="required">
                                <?php foreach ($clinicas as $row): ?>
                                <option value="<?=$row->id?>"><?=$row->nome?></option>
                                <?php endforeach;?>
                            </select> 
                        </div>
                    </label>
                    
                    <div class="ls-actions-btn">
                        <input type="hidden" name="role" value="2">
                        <input type="hidden" name="usuario_idusuario">
                        <input type="hidden" name="psicologo_id" value="<?=$psicologo_id?>">
                        <button type="submit" class="ls-btn">Salvar dados</button>
                        <a href="<?=base_url('view-secretaria')?>" class="ls-btn-danger">Voltar</a>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>