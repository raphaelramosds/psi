<div class="ls-main">
	<div class="container-fluid">
		<h1 class="ls-title-intro ls-ico-location">Clínicas cadastradas</h1>
		<div class="ls-box ls-board-box ls-no-border">
			
			<?php if(isset($add_clinica)):?>
				<div class='ls-background-primary ls-sm-space ls-sm-margin-bottom ls-text-md ls-ico-checkmark'><?=$add_clinica?></div>
			<?php elseif(isset($delete_clinica)):?>
				<div class='ls-background-primary ls-sm-space ls-sm-margin-bottom ls-text-md ls-ico-checkmark'><?=$delete_clinica?></div>
			<?php elseif(isset($update_clinica)):?>
				<div class='ls-background-primary ls-sm-space ls-sm-margin-bottom ls-text-md ls-ico-checkmark'><?=$update_clinica?></div>
			<?php endif;?>

			<form  action="<?=base_url('Clinicas/search')?>" class="ls-form ls-form-inline" method="POST">
				<label class="ls-label" role="search">
					<input type="text" id="q" name="nome" aria-label="Faça sua busca pela clínica" placeholder="Nome da clínica" required="" class="ls-field">
				</label>
				<input type="submit" value="Buscar" class="ls-btn" title="Buscar">
				<a href="<?=base_url()?>create-clinica" class="ls-ico-plus ls-btn">Adcionar uma clínica</a>
			</form>
			<table class="ls-table ls-table-striped ">
				<tr>
					<th>Nome</th>
					<th>Telefone</th>
					<th>Estado</th>
					<th>Cidade</th>
					<th class="ls-txt-center"></th>
				</tr>
				<?php foreach ($dataclinica as $value): ?>
				<tr id="clinica<?=$value->id?>">
					<td><?=$value->nome?></td>
					<td><?=$value->telefone?></td>
					<td><?=$value->estado?></td>
					<td><?=$value->cidade?></td>
					<td class="ls-txt-left">
						<div data-ls-module='dropdown' class='ls-dropdown'>
							<a href="$" class="ls-btn" onclick="preencher(<?=$value->id?>)">Ação</a>
							<ul class="ls-dropdown-nav">
								<li>
									<a href="<?=base_url('update-clinica')?>/<?=$value->id?>" class='ls-ico-pencil ls-color-black ls-no-bghover' title='Editar'>Editar</a>
								</li>
								<li>
									<a data-ls-module="modal" data-target="#confirmacaoRetirar" class='ls-ico-remove ls-color-danger' title='Excluir'>Excluir</a>
								</li>								
							</ul>
						</div>
					</td>
				</tr>
				<?php endforeach ?>
			</table>
			<div class="ls-pagination-filter">
				<?php if(isset($pagination)): ?>
				<?=$pagination?>
				<?php endif;?>
			</div>
		</div>
	</div>
</div>

<!-- Confirmação da retiradas -->

<div class="ls-modal" id="confirmacaoRetirar">
  <div class="ls-modal-box">
    <div class="ls-modal-header">
      <button data-dismiss="modal">&times;</button>
      <h4 class="ls-modal-title">Modal title</h4>
    </div>
    <div class="ls-modal-body" id="myModalBody">
    	Tem certeza que deseja excluir?
    	<input type="hidden" id="excludente" type="number">
    </div>
    <div class="ls-modal-footer">
      <button class="ls-btn ls-float-right" data-dismiss="modal">Close</button>
      <button type="submit" class="ls-btn-danger" id="retirar">Sim</button>
    </div>
  </div>
</div><!-- /.modal -->


<script>
	
	function preencher(request){$("#excludente").val(request);}

	$('#retirar').click(function(){
	    $.ajax({
	        type:'ajax',
	        dataType:'json',
	        method:'post',
	        url: "<?=base_url('Clinicas/delete')?>",
	        data:{
	            clinica:$("#excludente").val(),
	        },
	        success:function(data){
	            alert(data);
	            $("#clinica" + $("#excludente").val() ).hide();

	        }
	    })
	})

</script>