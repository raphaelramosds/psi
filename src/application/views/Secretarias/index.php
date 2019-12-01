<div class="ls-main">
	<div class="container-fluid" >
		<div class="ls-box ls-board-box ls-no-border">

			<?php if (count($data_secretaria) == 0):?>
			<div class="ls-alert-info">
				<strong>Atenção:</strong> Não há nenhuma secretária cadastrada. Para registrar uma nova secretária, é necessário que ela faça o cadastro no sistema com o seu código que pode ser encontrado no <a href="<?=base_url('view-psycho')?>">Meu Perfil</a>
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
					<?php 
						$q = "SELECT * FROM ".$this->db->dbprefix('clinica')." as c
						WHERE c.id IN (SELECT cs.clinica_id FROM ". $this->db->dbprefix('clinica_secretaria') ." as cs WHERE cs.secretaria_id = $row->id)
						AND c.id_psicologo = $psicologo";
						$clinicas = $this->db->query($q)->result();

					?>
					<?php foreach($clinicas as $cs):?>
						<dd style="line-height: 20px;">
							<small><?=$cs->nome?></small>
							<?php 
								// Recuperar id da table clinica_secretaria a partir do ID da agenda
								$c = "SELECT * FROM ".$this->db->dbprefix('clinica_secretaria')." AS cs WHERE cs.clinica_id = $cs->id AND secretaria_id = $row->id";
								$result = $this->db->query($c)->row();	
							?>

							<a href="<?=base_url('ClinicaSecretaria/delete')?>/<?=$result->id?>" style="position:relative;left:5px;" aria-label="Retirar clínica" class="ls-color-danger ls-text-xs" title="Excluir">
							Retirar
							</a>

						</dd>
					</dt >
					<?php endforeach;?>

					<div class="ls-actions-btn">
					<a href="<?=base_url('update-secretaria')?>/<?=$row->id?>" class="ls-ico-search ls-btn">Perfil</a>
					<a  href="<?=base_url('clinica-secretaria')?>/<?=$row->id?>" class="ls-btn ls-ico-plus">Clínicas</a>
					<a href="<?=base_url('delete-secretaria')?>/<?=$row->id?>" class="ls-ico-remove ls-btn" title="Excluir">Desativar conta</a>
					</div>
				</div>
			</div>
			<?php endforeach;?>
            <hr>
        </div>
    </div>
</div> 