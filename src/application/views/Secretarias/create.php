<div class="ls-main">
    <div class="container-fluid">
        <div class="ls-box ls-board-box ls-no-border">
            <header class="ls-info-header ls-no-border">
                <h2 class="ls-title-3 ls-ico-panel-pabx">Cadastro de Secretária</h2>
            </header>
            <form action="<?=base_url('UsuariosController/add')?>" method="POST"  data-ls-module="form">
                <fieldset>
                    <label for="" class="ls-label">
                        <b class="ls-label-text">Informações do usuário</b>
                        <p class="ls-label-info">Digite o nome de usuário. Ex.: usuario123</p>
                        <?php if (isset($erro_user)):?>
                        <div class='ls-sm-space' style='font-size:20px; color:red;'><?=$erro_user?></div>
                        <?php endif;?>
                        <input type="text" name ="username" required="required">
                    </label>

                    <label for="" class="ls-label">
                        <b class="ls-label-text">Senha</b>
                        <p class="ls-label-info">Para sua segurança use letras e números</p>
                        <div class="ls-prefix-group">
                            <input id="password_field" class="ls-login-bg-password" name="senha" type="password" placeholder="Senha" required >
                            <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye" data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#password_field" href="#"></a>
                        </div>
                    </label>

                    <label for="" class="ls-label">
                        <?php if (isset($erro_senha)): ?>
                            <div class='ls-sm-space ' style='font-size:20px; color:red;'><?=$erro_senha?></div>
                        <?php endif ?>
                        <b class="ls-label-text ls-hidden-accessible">Confirmação</b>
                        <div class="ls-prefix-group">
                            <input id="password_confirm" class="ls-login-bg-password" name="confirm_senha" type="password" placeholder="Confirme sua senha" required >
                            <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye" data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#password_confirm" href="#"></a>
                        </div>
                    </label>
                    <hr>

                    <label class="ls-label">
                        <b class="ls-label-text">Informações da Secretária</b>
                        <p class="ls-label-info">Algumas informações não são obrigadas</p>
                        <input type="text" name="nome" required="required" placeholder="Seu nome completo">
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
                        <input type="text" name="telefone" class="ls-mask-phone8_with_ddd">
                    </label>

                    <label for="" class="ls-label">
                        <p class="ls-label-info">Endereço</p>
                        <input type="text" name="endereco">
                    </label>

                  <label for="" class="ls-label">
                        <p class="ls-label-info">Email</p>
                        <input type="email" name="email">
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
                    
                    <input type="hidden" name="role" value="2">
                    <input type="hidden" name="usuario_idusuario">
                    <input type="hidden" name="psicologo_id" value="<?=$psicologo_id?>">
                    <hr>
                </fieldset>
                <button type="submit" class="ls-btn">Salvar dados</button>
                <a href="<?=base_url('view-secretaria')?>" class="ls-btn-danger">Voltar</a>
            </form>
        </div>
    </div>
</div>