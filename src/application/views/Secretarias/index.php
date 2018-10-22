<div class="ls-main">
	<div class="container-fluid">
		<div class="ls-box ls-board-box ls-no-border">

			<?php if (count($data_secretaria) == 0):?>
			<div class="ls-alert-info">
            Não há secretária cadastrada
         	</div>
			<?php endif;?>

			<?php foreach ($data_secretaria as $row):?>
			<div class="card" style="width: 100%;text-align:center">
				<img class="card-img-top" style="border-radius: 50%;" src="<?=base_url('assets/images/ico-boilerplate.png')?>" alt="Card image cap">
				<hr>
				<div class="card-body">
					<h2 class="card-title"><?=$row->nome?></h5>
					<p class="card-text"><?=$row->endereco?></p>

					<div class="ls-actions-btn">
					<a href="<?=base_url('update-secretaria')?>/<?=$row->id?>" class="ls-ico-search ls-btn">Ver mais informações</a>
					<a href="<?=base_url('delete-secretaria')?>/<?=$row->id?>" class="ls-ico-remove ls-btn" title="Excluir">Excluir Conta</a>
					</div>
				</div>
			</div>
			<?php endforeach;?>
            <hr>
        </div>
    </div>
</div> 

