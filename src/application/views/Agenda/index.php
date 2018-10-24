<div class="ls-main">
	<div class="container-fluid">
		<h1 class="ls-title-intro ls-ico-calendar">Agenda</h1>
		<?php if($this->session->userdata('success')):?>
		<div class='ls-background-primary ls-sm-space ls-sm-margin-bottom ls-text-md ls-ico-checkmark'><?=$this->session->userdata('success')?></div>
		<?php endif;?>
		<div class="ls-box">
			<h5 class='ls-title-3'>Procurar agenda</h5>	
			<hr>
			<form method="POST" action="<?=base_url('AgendaController/search')?>" class="ls-form ls-form-horizontal row">
				<fieldset>
					<label class="ls-label col-md-6">
						<b class="ls-label-text">Filtrar por Clínica</b>
                        <div class="ls-custom-select">
                            <select name="clinica_id" class="ls-select" required>
                            <?php foreach($clinica as $d): ?>
                            <option value="<?=$d->id?>"><?=$d->nome?></option>
                            <?php endforeach;?>
                            </select>
                        </div>
					</label>

					<label class="ls-label col-md-6">
						<b class="ls-label-text">Filtrar por mês e ano</b>	
                        <input type="month" name="mes" required>
						
					</label>

					<button type="submit" class='ls-btn' >Buscar agenda</button>
                    <a data-ls-module="modal" data-target="#modalLarge" class="ls-btn-primary" class='ls-btn' style="color:white;">Abrir novo horário</a>

				</fieldset>
			</form>
		</div>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <?php if($this->session->flashdata('vazio')):?>

        <div class="ls-alert-info">
            <strong class="ls-ico-search"></strong> <?=$this->session->flashdata('vazio')?>
         </div>
        <?php endif;?>

        <?php if(isset($agendas)):?>

        <?php $diasemana = array('Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb');?>



        <div class="container-fluid">

            <?php foreach($agendas as $a):?>

            <?php 
                $numero_dia = date('w', strtotime($a->dia));
            ?>

            <div class="row row-striped float-left" style="width:270px;">
                <div class="col-2 text-right">
                    <h1 class="display-4"><span class="badge badge-secondary"><?=date('d',strtotime($a->dia))?></span></h1>
                    <h2 ><?=$diasemana[$numero_dia]?></h2>
                    <div class="ls-actions-btn">
                        <a href="#" class="ls-btn-primary-danger ls-ico-remove" ></a>
                        <a href="#" class="ls-btn-primary-success ls-ico-search" onclick="descobrir(<?=$a->id ?>)"></a>
                    </div>
                        
                </div>
                <div class="col-10" style="position:relative; left:50px;bottom:25px; display:none;" id="horario<?=$a->id?>">

                    <?php 
                        $this->db->from('agenda');
                        $this->db->where('dia',$a->dia);
                        $details = $this->db->get()->result();
                    ?>                  
                    <?php foreach($details as $d):?>
                        <br>
                        <?php if($d->paciente_id == NULL):?>
                            <a class="ls-tag-success" data-ls-module="modal" data-target="#encaixar">Livre</a>
                        <?php else:?>

                            <a class="ls-tag-danger" data-ls-module="modal" data-target="#encaixar">Ocupado</a>
                        <?php endif;?>

                        <?=$d->horario?>
                    <?php endforeach;?>
                    
                </div>
            </div>

            <?php endforeach;?>
        </div>

        <?php endif;?>

		</div>
	</div>
</div>

<script>
    function descobrir(dia){
        y = document.getElementById('horario' + dia)  

        if(y.style.display == "none"){
            y.style.display = "block"
        }
        else{
            y.style.display = "none"
        }
    }
</script>



<style>
.row-striped:nth-of-type(odd){
  background-color: #efefef;
}

.row-striped:nth-of-type(even){
  background-color: #ffffff;
}

.row-striped {
    padding: 15px 0;
}
</style>


<div class="ls-modal" id="modalLarge">
  <div class="ls-modal-large">
    <div class="ls-modal-header">
      <button data-dismiss="modal">&times;</button>
      <h4 class="ls-modal-title">Cadastrar nova Agenda</h4>
    </div>
    <div class="ls-modal-body">
	<form action="<?=base_url('AgendaController/add')?>" method="POST" class="ls-form ls-form-horizontal row" data-ls-module="form">
                <fieldset>
                    <label class="ls-label col-md-12 col-lg-12 col-xs-12">
                        <b class="ls-label-text">Clínica</b>
                        <div class="ls-custom-select">
                            <select name="clinica_id" class="ls-select" required>
                            <?php foreach($clinica as $d): ?>
                            <option value="<?=$d->id?>"><?=$d->nome?></option>
                            <?php endforeach;?>
                            </select>
                        </div>
                    </label>

                    <label class="ls-label col-md-6 col-xs-12">
                        <b class="ls-label-text">Do dia</b>
                        <input type="date" name="diainicio" required>
                    </label>

                    <label class="ls-label col-md-6 col-xs-12">
                        <b class="ls-label-text">Até</b>
                        <input type="date" name="diafim" required>
                    </label>

                    <label class="ls-label col-md-12 col-xs-12">
                        <b class="ls-label-text">Horários de atendimento</b>
                    </label>


                   <div id="dynamic_fields" class="col-md-4 col-xs-12">
                   </div>


                    <div class="ls-actions-btn">
                        <input type="hidden" name="paciente_id" value="<?=NULL?>">
                        <input type="hidden" name="psicologo_id" value="<?=$this->session->userdata('usuario')[0]['id']?>">
                        <button type="button" class="ls-btn" id="maishorarios">Adcionar horário</button>
                        <button type="button" class="ls-btn" data-ls-module="modal" data-target="#dinamic" class="ls-btn-primary" class='ls-btn'> Registrar horários de forma dinâmica</button>
                        <button type="submit" class="ls-btn">Salvar dados da Agenda</button>
                    </div>

                    <script>
                    i = 0

                    $(document).on('click', '#maishorarios', function(){
                        $('#dynamic_fields').append(
                            "<div id='field"+i+"'>" +
                                "<input type='time' name='hora[]' required>" +
                                "<button class='btn_remove' type='button' id='"+i+"'>Remover</button>" +
                            "</div>")
                        i++	
                    })

                    $(document).on('click', '.btn_remove', function(){
                        button_id = $(this).attr('id')
                        $('#field'+button_id).remove()
                        i--
                    })

                    </script>
    
                </fieldset>
            </form>
    </div>
    <div class="ls-modal-footer">
      <button class="ls-btn ls-float-right" data-dismiss="modal">Fechar</button>
    </div>
  </div>
</div>


<div class="ls-modal" id="dinamic">
  <div class="ls-modal-large">
        <div class="ls-modal-header">
        <button data-dismiss="modal">&times;</button>
        <h4 class="ls-modal-title">Cadastrar nova Agenda com Intervalo de horário</h4>
        </div>
        <div class="ls-modal-body">
            <form action="<?=base_url('AgendaController/add')?>" method="POST" class="ls-form ls-form-horizontal row" data-ls-module="form">
            <fieldset>
                    <label class="ls-label col-md-12 col-lg-12 col-xs-12">
                        <b class="ls-label-text">Clínica</b>
                        <div class="ls-custom-select">
                            <select name="clinica_id" class="ls-select" required>
                            <?php foreach($clinica as $d): ?>
                            <option value="<?=$d->id?>"><?=$d->nome?></option>
                            <?php endforeach;?>
                            </select>
                        </div>
                    </label>

                    <label class="ls-label col-md-6 col-xs-12">
                        <b class="ls-label-text">Do dia</b>
                        <input type="date" name="diainicio" required>
                    </label>

                    <label class="ls-label col-md-6 col-xs-12">
                        <b class="ls-label-text">Até</b>
                        <input type="date" name="diafim" required>
                    </label>


                    <label class="ls-label col-md-6 ">
                        <b class="ls-label-text">Duração das consultas</b>
                        <p class="ls-label-info">Opcional</p>
                        <input type="time" name="intervalo">
                   </label>

                    <label class="ls-label col-md-6 ">
                        <b class="ls-label-text">Quantas consultas para esses dias?</b>
                        <p class="ls-label-info">Opcional</p>
                        <input type="number" name="qtde">
                   </label>

                   <label class="ls-label col-md-6">
                        <b class="ls-label-text">Horário</b>
                        <input type='time' name='hora[]' required>
                   </label>


                    <div class="ls-actions-btn">
                        <input type="hidden" name="paciente_id" value="<?=NULL?>">
                        <input type="hidden" name="psicologo_id" value="<?=$this->session->userdata('usuario')[0]['id']?>">
                        <button type="submit" class="ls-btn">Salvar dados da Agenda</button>
                    </div>


            </fieldset>     
            </form>
            <div class="ls-modal-footer">
                <button class="ls-btn ls-float-right" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<div class="ls-modal" id="encaixar">
    <div class="ls-modal-small">
        <div class="ls-modal-header">
        <button data-dismiss="modal">&times;</button>
        <h4 class="ls-modal-title">Informações do horário</h4>
        </div>
        <div class="ls-modal-body">
        <form method="POST" action="<?=base_url('AgendaController/update')?>" class="ls-form ls-form-horizontal row">
            <fieldset>
                <label class="ls-label col-12">
                    <b class="ls-label-text">Paciente</b>
                    <input type="text" value="<?=''?>">
                </label>
            </fieldset>
        </div>
        <div class="ls-modal-footer">
        <!-- Id da Agenda -->
        <input type="hidden" name="id" value="<?=0?>">
        <button type="submit" class="ls-btn-primary">Salvar</button>
        </div>
    </div>
</div>