<?php 
    if ($this->session->userdata('usuario')[1]['role'] == 2  ):
        $id = $this->session->userdata('usuario')[0]['id'];
        $psicologo = $this->session->userdata('usuario')[0]['psicologo_id'];
        $c = "SELECT * FROM ".$this->db->dbprefix('clinica')." as c WHERE c.id IN (SELECT cs.clinica_id FROM ".$this->db->dbprefix('clinica_secretaria')." as cs WHERE cs.secretaria_id = $id) AND c.id_psicologo = $psicologo";
        $clinicas = $this->db->query($c)->result();
    endif;
                        
?> 

<div class="ls-main">
	<div class="container-fluid">
		<h1 class="ls-title-intro ls-ico-calendar">Agenda</h1>
		<?php if($this->session->userdata('success')):?>
		<div class='ls-background-primary ls-sm-space ls-sm-margin-bottom ls-text-md ls-ico-checkmark'><?=$this->session->userdata('success')?></div>
		<?php endif;?>
		<div class="ls-box">
            <?php if($this->session->flashdata('add_paciente')):?>
            <div class="ls-alert-success">
                <strong class=""></strong> <?=$this->session->flashdata('add_paciente')?>
            </div>
            <?php endif;?>
			<h5 class='ls-title-3'>Procurar agenda</h5>	
			<hr>
			<form method="POST" action="<?=base_url('Agenda/search')?>" class="ls-form ls-form-horizontal row">
				<fieldset>
					<label class="ls-label col-md-6">
						<b class="ls-label-text">Filtrar por Clínica</b>
                        <div class="ls-custom-select">
                            <select name="clinica_id" class="ls-select" required>
                            <?php if ($this->session->userdata('usuario')[1]['role'] == 1  ): ?>
                                <?php foreach($clinica as $d): ?>
                                <option value="<?=$d->id?>"><?=$d->nome?></option>
                                <?php endforeach;?>

                            <?php else:?>
                                <?php foreach($clinicas as $c):?>
                                <option value="<?=$c->id?>"><?=$c->nome?></option>
                                <?php endforeach;?>

                            <?php endif;?>
                            <!--Recuperar agendas relacionadas a secretária-->
                            </select>
                        </div>
					</label>


					<label class="ls-label col-md-6">
						<b class="ls-label-text">Filtrar por mês e ano</b>	
                        <input type="month" name="mes" required>
						
					</label>

					<button type="submit" class='ls-btn' >Buscar agenda</button>
                
                    <?php if ($this->session->userdata('usuario')[1]['role'] == 1  ): ?>
                    <a data-ls-module="modal" data-target="#modalLarge" class="ls-btn-primary" class='ls-btn' style="color:white;">Abrir novo horário</a>
                    <?php endif;?>

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
        <?php $meses = array('Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'); ?>

        <div class="container-fluid">

            <h1><?php 
            
                list($ano, $mesnumero) = explode('-',$mes);
                echo $meses[$mesnumero - 1]." de ".$ano."<hr>";

            ?>
            
            </h1>

            <?php foreach($agendas as $a):?>

            <?php 
                $numero_dia = date('w', strtotime($a->dia));
            ?>

            <div class="row row-striped float-left" style="width:270px;">
                <div class="col-2 text-right">
                    <h1 class="display-4"><span class="badge badge-secondary"><?=date('d',strtotime($a->dia))?></span></h1>
                    <h2 ><?=$diasemana[$numero_dia]?></h2>
                    <div class="ls-actions-btn">
                        <!-- <a href="#" class="ls-btn-primary-danger ls-ico-remove" ></a> -->
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
                        <?php if($d->nomepaciente == NULL):?>
                            <a class="ls-tag-success editar" data-ls-module="modal"  data-target="#encaixar" data-id="<?=$d->id?>">Livre</a>
                        <?php else:?>
                            
                            <a class="ls-tag-danger editar" data-ls-module="modal"  data-target="#encaixar" data-id="<?=$d->id?>">Ocupado</a>
                        <?php endif;?>

                        <?=$d->horario?>

                        <!-- Query para recuperar possível nome do paciente que já está cadastrado -->
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
    // Preencher campos no modal

    $('.editar').click(function(){
        id = $(this).data('id')

        $('#idagenda').val(id)

        $.ajax({
            type:'ajax',
            dataType:'json',
            method:'post',
            url:'<?=base_url('Agenda/recuperarPaciente')?>',
            data:{'id':id},
            success:function(data){
                $('#nomedopaciente').val(data[0].nomepaciente)
                $('#email').val(data[0].email)
                $('#telefone').val(data[0].telefone)
            }
        })
	    
    })

</script>

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
	<form action="<?=base_url('Agenda/add')?>" method="POST" class="ls-form ls-form-horizontal row" data-ls-module="form">
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


                   <div id="dynamic_fields" class="col-xs-12">
                   </div>


                    <div class="ls-actions-btn">
                        <input type="hidden" name="psicologo_id" value="<?=$this->session->userdata('usuario')[0]['id']?>">
                        <button type="button" class="ls-btn" id="maishorarios">Adcionar horário</button>
                        <button type="button" class="ls-btn" data-ls-module="modal" data-target="#dinamic" class="ls-btn-primary"> Registrar horários de forma dinâmica</button>
                        <button type="submit" class="ls-btn-primary">Salvar dados da Agenda</button>
                    </div>
                
                    <style>
                        .altura{ height:2em; }
                    </style>
                    <script>
                    i = 0

                    $(document).on('click', '#maishorarios', function(){
                        $('#dynamic_fields').append(
                            "<div id='field"+i+"'>" +
                                "<input class='altura' type='time' name='hora[]' required />" +
                                "<button class='altura btn_remove ls-cursor-pointer ls-ico-remove ls-btn-danger ls-xs-margin-left ls-no-margin' type='button' id='"+i+"'></button> <hr>" +
                            "</div>"
                        );
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
            <form action="<?=base_url('Agenda/add')?>" method="POST" class="ls-form ls-form-horizontal row" data-ls-module="form">
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
                        <input type="hidden" name="psicologo_id" value="<?=$this->session->userdata('usuario')[0]['id']?>">
                        <button type="submit" class="ls-btn-primary">Salvar dados da Agenda</button>
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
        <h4 class="ls-modal-title">Encaixar o paciente</h4>
        <p>Encaixe o paciente ao pedir seu nome, telefone e email</p>
        </div>
        <div class="ls-modal-body">
            <p><b>Importante:</b> Pesquise o nome do paciente para ver se ele está cadastrado no sistema</p>
            <div class="col-12">
                <input type="text" name="nomePesquisa" id='nome'>
                <button type="button" id="procurarPacientes" class="ls-ico-search ls-btn"></button>
            </div>

            <hr>

            <div id="listapacientes" class="col-12">
                
            </div>

                    
            <hr>

            <form method="post" action="<?php echo base_url('Agenda/update')?>" class="ls-form ls-form-horizontal row">
                <fieldset>
                    <label class="ls-label col-12">
                        <b class="ls-label-text">Paciente</b>
                        <input type="text" name="nomepaciente" id="nomedopaciente">
                    </label>

                    <label class="ls-label col-12">
                        <b class="ls-label-text">Telefone</b>
                        <input type="text" name="telefone" class="ls-mask-phone8_with_ddd" placeholder="(99) 9999-9999" id="telefone">
                    </label>

                    <label class="ls-label col-12">
                        <b class="ls-label-text">Email</b>
                        <input type="text" name="email" placeholder="exemplo@gmail.com" id="email">
                    </label>


                    <label class="ls-label col-12">
                        <input type="hidden" name="id" id="idagenda" value="">
                        <button type='submit' id="atualizar" class="ls-btn-primary">Encaixar</button>
                        <?php if($this->session->userdata('usuario')[1]['role'] == 2):?>
                        <button type="button" class="ls-btn ls-tooltip-top-left" aria-label="Se você não encontrar o paciente, cadastre ele clicando aqui" data-ls-module="modal" data-target="#adicionarPaciente">Adicionar paciente</button>
                        <?php endif;?>
                    </label>
                </fieldset>
            </form>
        </div>
    </div>
</div>

<script>
$('#procurarPacientes').click(function(){
    nome = $('#nome').val()
    $.ajax({
        type:'ajax',
        dataType:'json',
        method:'post',
        url:'<?=base_url('Agenda/recuperarPacientes')?>',
        data:{'nomePesquisa': nome},
        success:function(data){
            $('#listapacientes .ls-box').remove()
            $('#listapacientes .ls-alert-warning').remove()

            if(data.length == 0){
                $('#listapacientes').append("<div class='ls-alert-warning'><strong>Não encontrado:</strong> Cheque duas vezes. Você pode ter esquecido algum detalhe.</div>")
            }

            else{
                for(i=0; i < data.length; i++){

                    $('#listapacientes').append(
                        "<div class='ls-box'>" +
                        "<p><b>Nome: </b>" + data[i].nome + "</p>" +
                        "<p><b>Telefone: </b>" + data[i].telefone + "</p>" +
                        "<p><b>Email: </b>" + data[i].email + "</p>"+
                        "</div>") 
                }
            }
        },
        error:function(){ alert('Fatal') }
    })
    
})

</script>


    <div class="ls-modal" id="adicionarPaciente">
        <div class="ls-modal-box">
            <div class="ls-modal-header">
                <button data-dismiss="modal">&times;</button>
                <h4 class="ls-modal-title">Adicione pacientes</h4>
            </div>
            
            <div class="ls-modal-body" id="myModalBody">
                <form method="post" action="<?php echo base_url('Secretarias/addpaciente')?>" class="ls-form ls-form-horizontal row">
                    <fieldset>
                        <label class="ls-label col-12">
                            <b class="ls-label-text">Nome completo</b>
                            <input type="text" name="nome">
                        </label>
                        <label class="ls-label col-12">
                            <b class="ls-label-text">Telefone</b>
                            <input type="text" name="telefone" class="ls-mask-phone8_with_ddd" placeholder="(99) 9999-9999">
                        </label>
                        <label class="ls-label col-12">
                            <b class="ls-label-text">Email</b>
                            <input type="text" name="email">
                        </label>

                    </fieldset>
            </div>
            <div class="ls-modal-footer">
                <input type="hidden" value="<?=$this->session->userdata('usuario')[0]['psicologo_id']?>" name="id_psicologo">
                <button type="submit" class="ls-btn-primary">Salvar</button>
            </div>
            </form>
        </div>
    </div>



