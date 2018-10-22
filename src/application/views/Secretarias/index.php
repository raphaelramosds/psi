<div class="ls-main">
	<div class="container-fluid" >
		<div class="ls-box ls-board-box ls-no-border">

			<?php if (count($data_secretaria) == 0):?>
			<div class="ls-alert-info">
            Não há secretária cadastrada
         	</div>
			<?php endif;?>

			<?php foreach ($data_secretaria as $row):?>
			<div class="card" style="width: 15rem;text-align:center;margin:0 auto;">
				<img class="card-img-top" style="border-radius: 50%;" src="<?=base_url('assets/images/ico-boilerplate.png')?>" alt="Card image cap">
				<hr>
				<div class="card-body">
					<h2 class="card-title"><?=$row->nome?></h5>
					<p class="card-text"><?=$row->endereco?></p>
					<p>Agendas de clínicas que podem ser alteradas:</p>
					<dt>
						<dd>Clínica 1 <a href="#" class="ls-ico-remove ls-color-danger" title="Excluir"></a></dd>
						<dd>Clínica 2 <a href="#" class="ls-ico-remove ls-color-danger" title="Excluir"></a></dd>
					</dt >

					<div class="ls-actions-btn">
					<a href="<?=base_url('update-secretaria')?>/<?=$row->id?>" class="ls-ico-search ls-btn">Perfil</a>
					<a href="<?=base_url('clinica-secretaria')?>/<?=$row->id?>" class="ls-btn ls-ico-plus">Clínicas</a>
					<a href="<?=base_url('delete-secretaria')?>/<?=$row->id?>" class="ls-ico-remove ls-btn" title="Excluir">Excluir</a>
					</div>
				</div>
			</div>
			<?php endforeach;?>
            <hr>
        </div>
    </div>
</div> 

