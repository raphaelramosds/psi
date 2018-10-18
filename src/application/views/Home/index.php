    <main class="ls-main ">
      <div class="container-fluid">

        <?php if (isset($update_info)):?>
          <div class='ls-background-primary ls-sm-space ls-sm-margin-bottom ls-text-md ls-ico-checkmark'><?=$update_info?></div>
        <?php endif;?>

        <h1 class="ls-title-intro ls-ico-home">Página inicial</h1>

        <?php if ($this->session->userdata('usuario')[1]['role'] == 1): ?>
          <div class="ls-box ls-board-box ls-no-border">
            <div id="sending-stats" class="row">

              <div class="col-sm-4 col-md-3">
                <div class="ls-box">
                  <div class="ls-box-head">
                    <h6 class="ls-title-4">Pacientes</h6>
                  </div>
                  <div class="ls-box-body">
                    <span class="ls-board-data " style="font-size:40px; font-family:sans-serif">
                     <strong><?=$counterpaciente?></strong>
                    </span>
                  </div>
                </div>
              </div>

              <div class="col-sm-4 col-md-3">
                <div class="ls-box">
                  <div class="ls-box-head">
                    <h6 class="ls-title-4">CLÍNICAS</h6>
                  </div>
                  <div class="ls-box-body">
                    <span class="ls-board-data " style="font-size:40px; font-family:sans-serif">
                     <strong><?=$counterclinica; ?></strong>
                    </span>
                  </div>
                </div>
              </div>

              <div class="col-sm-4 col-md-3">
                <div class="ls-box">
                  <div class="ls-box-head">
                    <h6 class="ls-title-4">Prontuários</h6>
                  </div>
                  <div class="ls-box-body">
                    <span class="ls-board-data " style="font-size:40px; font-family:sans-serif">
                     <strong><?=$countersprontuario?></strong>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <hr>
          </div>
        <?php endif ?>

        <?php if ($this->session->userdata('usuario')[1]['role'] == 2): ?>
        <div class="ls-box ls-board-box ls-no-border">
          <div id="sending-stats" class="row">
            <div class="col-sm-12">
              <div class="ls-box">
                  <div class="ls-box-head">
                  <h6 class="ls-title-4">HORÁRIOS REGISTRADOS NA AGENDA</h6>
                </div>
                <div class="ls-box-body">
                  <span class="ls-board-data">
                    <strong>
                      <?php
                      if(isset($counterhorarios)):  
                        echo count($counterhorarios); 
                      endif;
                      ?>
                        
                      </strong>
                  </span>
                </div>
                <div class="ls-box-footer">
                  <a href="<?=base_url('view-agenda')?>" class="ls-btn ls-btn-xs">Veja quais são</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php endif ?>

      </div>
    </main>
  </body>
</html>