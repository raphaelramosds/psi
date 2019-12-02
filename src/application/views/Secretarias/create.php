<link href="<?=base_url('assets/css/locastyle.css')?>" rel="stylesheet" type="text/css">
<link rel="icon" sizes="10x5" href="<?=base_url('assets/images/logo.png')?>">
<link rel="apple-touch-icon" href="<?=base_url('assets/images/ico-boilerplate.png')?>">
<link rel="stylesheet" href="<?=base_url('assets/css/links_style.css')?>" type="text/css">

<div style="max-width:700px;margin:0 auto;">
    <div class="container-fluid">
        <h1 class="ls-title-intro ls-txt-center">Cadastro de secretária</h1>
        <div class="ls-box ls-board-box ls-no-border">
            <?php if(isset($erro_secretaria)):?>
            <?=$erro_secretaria?>
            <?php endif;?>
            <?php if (isset($erro_user)):?>
                <div class='ls-sm-space' style='font-size:20px; color:red;'><?=$erro_user?></div>
            <?php endif;?>
            <form action="<?=base_url('Usuarios/add')?>" method="POST"  data-ls-module="form" class="ls-form ls-form-horizontal row">
                <fieldset>
                    <label class="ls-label col-md-12">
                        <b class="ls-label-text">Informações do usuário <span class="ls-color-danger">*</span></b>
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
                        <b class="ls-label-text">Email <span class="ls-color-danger">*</span></b>
                        <input type="email" name="email" placeholder="exemplo@dominio.com">
                    </label>    

                    <label class="ls-label col-md-12">
                        <b class="ls-label-text">Nome <span class="ls-color-danger">*</span></b>
                        <input type="text" name="nome" required="required" placeholder="Seu nome completo">
                    </label>

                    <label class="ls-label col-md-4 cpl-xs-12">
                        <b class="ls-label-text">Sexo</b>
                        <div class="ls-custom-select">
                            <select class="ls-custom" name="sexo">
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                            </select>
                        </div>
                    </label>

                    <label class="ls-label col-md-4 cpl-xs-12">
                        <b class="ls-label-text">Telefone</b>
                        <input type="text" name="telefone" class="ls-mask-phone8_with_ddd" placeholder="(99) 9999-9999">
                    </label>

                    <label class="ls-label col-md-4 cpl-xs-12">
                        <b class="ls-label-text">Endereço</b>
                        <input type="text" name="endereco">
                    </label>
                    

                    <label class="ls-label col-md-12">
                        <?php if($this->session->flashdata('erro_secretaria')):?>
                        <div class='ls-sm-space' style='font-size:20px; color:red;'>
                            <?=$this->session->flashdata('erro_secretaria')?>
                        </div>
                        <?php endif;?>
                        <br>
                        <b class="ls-label-text">Código do psicólogo</b><span class="ls-color-danger">*</span>
                        <input type="number" name="codigopsicologo" required>
                    </label>
                    
                    <div class="ls-actions-btn">
                        <input type="hidden" name="role" value="2">
                        <input type="hidden" name="usuario_idusuario">
                        <button type="submit" class="ls-btn">Salvar dados</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
