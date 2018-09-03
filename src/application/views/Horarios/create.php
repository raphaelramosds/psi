<div class="ls-main">
	<div class="container-fluid">
		<div class="ls-box ls-board-box ls-no-border">
			<header class="ls-info-header ls-no-border">
				<h2 class="ls-title-3">Meus horários</h2>
			</header>

			<form action="<?=base_url('HorariosController/add')?>" method="POST" class="ls-form ls-form-horizontal row" data-ls-module="form">
				<fieldset>
					<div class='col-md-12' id='field'>

					</div>
					<div class="ls-actions-btn">
						<input type="hidden" value="<?=$agenda?>" name="agenda_id">
						<span id="more" class="ls-btn ls-ico-plus" style="cursor:pointer;">Adcionar horário</span>
						<span id="remover" class="ls-btn ls-btn-danger ls-ico-minus" style="cursor:pointer;">Remover horário</span>
						<button type="submit" class="ls-btn">Salvar</button>
					</div>			
				</fieldset>
			</form>

		</div>
	</div>
</div>


<script>
	var c = 1;

	$('#more').click(function(){
		// Tove Lo - Habits (Stay High)
		var content = "<div class='col-md-12' id='content"+ c +"'>" +
							"<label class='ls-label col-md-4 col-xs-12'>" +
								"<p class='ls-label-info'>Disponível das</p>"+ 
								"<input type='time' name='hinicial[]' required='required'>" +
							"</label>" +

							"<label class='ls-label col-md-4 col-xs-12'>" +
								"<p class='ls-label-info'>Áté as</p>"+ 
								"<input type='time' name='hfinal[]' required='required'>" +
							"</label>" +

							"<label class='ls-label col-md-4 col-xs-12'>" + 
								"<p class='ls-label-info'>Selecione o dia desse mês:</p>" +
								"<div class='ls-custom-select'>" +
									"<select name='dia[]' class='ls-custom' required='required'>" +
										"<?php for($i = 1; $i <= 31; $i++):?>" +
										"<option value='<?=$i?>'><?=$i?></option>" + 
										"<?php endfor;?>" +
									"</select>" +
								"</div>" +
							"</label>" +
					  "</div>";

		$(content).appendTo('#field')
		c++
	});

	$("#remover").click(function(){
		c--
		$("#content"+c).remove()

	});

	

</script>

