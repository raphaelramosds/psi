<div class="ls-main">
	<div class="container-fluid">
		<h1 class="ls-title-intro">Clínicas</h1>
        <div class="ls-alert-warning">
            <strong class="ls-ico-location">Observação:</strong> 
            Ao escolher as clínicas abaixo, a secretária poderá ver as agendas que estão relacionadas a essas clínicas.
         </div>
		<div class="ls-box ls-board-box ls-no-border">
            <form action="<?=base_url('ClinicaSecretaria/add')?>" method="POST">
                <fieldset>
                    <div class="ls-label col-md-5">
                
                    <?php foreach($clinicas_disponiveis as $cs):?>
                        <label class="ls-label-text">
                            <input type="checkbox" name="clinica_id[]" value="<?=$cs->id?>">
                            <?=$cs->nome?>
                        </label>
                        <hr>
                    <?php endforeach;?>
                    </div>

                    <div class="ls-actions-btn">
                        <input type="hidden" name="secretaria_id" value="<?=$secretaria?>" class="ls-btn">
                        <input type="submit" value="Salvar" class="ls-btn">
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>