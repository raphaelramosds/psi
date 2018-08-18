    <main class="ls-main ">
      <div class="container-fluid">

        <?php if (isset($update_info)):?>
          <div class='ls-background-primary ls-sm-space ls-sm-margin-bottom ls-text-md ls-ico-checkmark'><?=$update_info?></div>
        <?php endif;?>
        
        <h1 class="ls-title-intro ls-ico-home ls-txt-center ls-color-theme" style="font-size:55px"></h1>
        <div class="ls-box ls-board-box ls-no-border">
          <div id="sending-stats" class="row">

            <div class="col-sm-4 col-md-3">
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
                  <a href="<?=base_url('view-paciente')?>" class="ls-btn ls-btn-xs">Ver pacientes</a>
                </div>
              </div>
            </div>

            <div class="col-sm-4 col-md-3">
              <div class="ls-box">
                <div class="ls-box-head">
                  <h6 class="ls-title-4">CLÍNICAS</h6>
                </div>
                <div class="ls-box-body">
                  <span class="ls-board-data">
                    <strong><?=$counterclinica; ?></strong>
                  </span>
                </div>
                <div class="ls-box-footer">
                  <a href="<?=base_url('view-clinica')?>" class="ls-btn ls-btn-xs">Ver clínicas</a>
                </div>
              </div>
            </div>

            <div class="col-sm-4 col-md-3">
              <div class="ls-box">
                <div class="ls-box-head">
                  <h6 class="ls-title-4">Secretárias</h6>
                </div>
                <div class="ls-box-body">
                  <span class="ls-board-data">
                    <strong><?=$countersecretaria?></strong>
                  </span>
                </div>
                <div class="ls-box-footer">
                  <a href="<?=base_url('SecretariasController/view')?>" class="ls-btn ls-btn-xs">Ver secretárias</a>
                </div>
              </div>
            </div>

          </div>
          <hr>
        </div>
      </div>
    </main>
  </body>
</html>