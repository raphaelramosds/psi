<main class="ls-main ">
  <div class="container-fluid">
    <h1 class="ls-title-intro ls-ico-home ls-txt-center">Página inicial</h1>
    <div class="ls-box ls-board-box">
      <header class="ls-info-header ls-txt-center">
        <h2 class="ls-title-3 ls-ico-docs">Relatórios</h2>
        <p class="ls-float-none-xs ls-small-info">Quantidade de registros no sistema</p>
      </header>
      <div id="sending-stats" class="row">
        <div class="col-sm-6 col-md-3">
          <div class="ls-box">
            <div class="ls-box-head">
              <h6 class="ls-title-4">Pacientes</h6>
            </div>
            <div class="ls-box-body">
              <span class="ls-board-data">
                <strong><?=$counterpaciente?></strong>
              </span>
            </div>
            <div class="ls-box-footer">
              <a href="<?=base_url()?>PacientesController" class="ls-btn ls-btn-xs">Ver pacientes</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="ls-box">
            <div class="ls-box-head">
              <h6 class="ls-title-4">CLÍNICAS</h6>
            </div>
            <div class="ls-box-body">
              <span class="ls-board-data">
                <strong><?=$countersclinica; ?></strong>
              </span>
            </div>
            <div class="ls-box-footer">
              <a href="<?=base_url()?>ClinicasController" class="ls-btn ls-btn-xs">Ver clínicas</a>
            </div>
          </div>
        </div>
      </div>
      <hr>
    </div>
  </div>
</main>
