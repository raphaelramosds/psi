<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<html class="ls-theme-light-green">
  <head>
    <title>Sistema para psicólogos</title>
    <meta name="viewport" content = "width=device-width, initial-scale=1, user-scalable=no">
    <!-- Styles -->
    <link href="<?=base_url('assets/css/locastyle.css')?>" rel="stylesheet" type="text/css">
    <link href="<?=base_url('assets/css/links_style.css')?>" rel="stylesheet" type="text/css">
    <link rel="icon" sizes="10x5" href="<?=base_url('assets/images/logo.png')?>">
  </head>
  <body>
		<style>input, select{ font-weight:normal; }</style>
    <div class="ls-topbar ">
      <div class="ls-notification-topbar">
        <div data-ls-module="dropdown" class="ls-dropdown ls-user-account">
          <a href="#" class="ls-ico-user">
            <!-- Adcionar uma imagem de perfil: <img src="<?=base_url('')?>" alt="" /> -->
            <span class="ls-name">
              <?=$this->session->userdata('usuario')[0]['nome']?>
            </span>
          </a>
          <nav class="ls-dropdown-nav ls-user-menu">
            <ul>
              <li><a href = "<?=base_url('HomeController/loggout')?>">Encerrar sessão</a></li>
            </ul>
          </nav>
        </div>
      </div>
      <span class="ls-show-sidebar ls-ico-menu"></span>

      <h1 class="ls-brand-name" style="position:relative;left:20px;">
        <a href="<?=base_url('home')?>">
          <img src="<?=base_url('assets/images/logo.png')?>" style="height:40px;width:35px;position:relative; bottom:3px;" class="img-responsive" alt="Logotipo do sistema">
          <strong style="position:relative;bottom:10px;">Psicologia</strong>

        </a> 
      </h1>
    </div>
    <style>
      .ls-menu ul li{ border:none; }
      
    </style>

    <aside class="ls-sidebar">
      <div class="ls-sidebar-inner "> 
          <nav class="ls-menu">
            <ul>
              <?php if ($this->session->userdata('usuario')[1]['role'] == 1  ): ?>
                <li><a href = "<?=base_url('home')?>" class="ls-ico-home">Início</a></li>
                <li><a href = "<?=base_url('view-psycho')?>" class="ls-ico-user">Meu perfil</a></li>
                <li><a href = "#" class="ls-ico-bukets">Cadastro</a>
                  <ul>
                    <li><a href = "<?=base_url('view-clinica')?>" class="ls-ico-location">Clínicas</a></li>
                    <li><a href = "<?=base_url('view-paciente')?>" class="ls-ico-accessibility">Pacientes</a></li>
                    <li><a href = "<?=base_url('view-secretaria')?>" class="ls-ico-panel-pabx">Secretária</a></li>
                  </ul>
                </li>
                <li><a href="<?=base_url('cid')?>" class="ls-ico-eye">Consultar doença</a></li>
                <li><a href="<?=base_url('view-agenda')?>" class="ls-ico-calendar">Agenda</a></li>
                <?php endif ?>
                <li><a href = "<?=base_url('HomeController/loggout')?>" class="ls-ico-export" style="color:#1DD1A4;">Sair</a></li>
            </ul>
          </nav>
      </div>
    </aside>

    <script src="<?=base_url('assets/js/jquery.js')?>"></script>
    <script src="<?=base_url('assets/js/locastyle.js')?>"></script>

