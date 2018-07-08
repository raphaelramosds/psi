<!DOCTYPE html>
<html class="ls-theme-light-green">
  <head>
    <title>Prontuários em um Sistema inteligente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link href="<?=base_url()?>assets/css/locastyle.css" rel="stylesheet" type="text/css">
    <!-- <link rel="icon" sizes="192x192" href=""> -->
    <link rel="apple-touch-icon" href="<?=base_url()?>assets/images/ico-boilerplate.png">
    <script type="text/javascript" src="<?=base_url()?>assets/js/jquery.js"></script>
    <script src="<?=base_url()?>assets/js/locastyle.js" type="text/javascript"></script>
  </head>
  <body>
  <div class="ls-topbar ">
  <div class="ls-notification-topbar">
    <!-- Dropdown com detalhes da conta de usuário -->
    <div data-ls-module="dropdown" class="ls-dropdown ls-user-account">
      <a href="#" class="ls-ico-user">
        <img src="assets/images/locastyle/avatar-example.jpg" alt="" />
        <span class="ls-name">
          <?=$nomepsicologo
          ?>
        </span>
      </a>
      <nav class="ls-dropdown-nav ls-user-menu">
        <ul>
          <li><a href="<?=base_url()?>PsicologosController">Meu Perfil</a></li>
          <li><a href="<?=base_url()?>HomeController/loggout">Encerrar sessão</a></li>
         </ul>
      </nav>
    </div>
  </div>
  <span class="ls-show-sidebar ls-ico-menu"></span>
  <!-- Nome do produto/marca com sidebar -->
    <h1 class="ls-brand-name">
      <a href="<?=base_url()?>HomeController" class="ls-ico">
        <img src="<?= base_url()?>assets/images/logo.png" height="30px" width="60px">
      </a>
    </h1>
  </div>
  <!---->
  <aside class="ls-sidebar">
    <div class="ls-sidebar-inner">
        <nav class="ls-menu">
          <ul>
              <li><a href="<?=base_url()?>HomeController" class="ls-ico-home">Início</a></li>
              <li><a href="<?=base_url()?>PsicologosController" class="ls-ico-user">Meu perfil</a></li>
              <li>
                <a href="#" class="ls-ico-bukets">Cadastro</a>
                <ul>
                  <li><a href="<?=base_url()?>ClinicasController" class="ls-ico-location">Clínicas</a></li>
                  <li><a href="<?=base_url()?>PacientesController" class="ls-ico-accessibility">Pacientes</a></li>
                  <!-- <li><a href="<?=base_url()?>sessoescontroller">Sessões</a></li> -->
                </ul>
              </li>
              <li>
                <a href="<?=base_url()?>HomeController/loggout" class="ls-ico-export" style="color:#1DD1A4;">Sair</a>
              </li>
          </u>
        </nav>
    </div>
  </aside>
