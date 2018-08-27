<div class="ls-main">
	<div class="container-fluid">
		<h1 class="ls-title-intro ls-ico-eye">Consultar Doenças</h1>
			<p><b>Observação:</b> Digite o nome ou código da doença abaixo para filtrá-la</p>
			<table class="ls-table" id="tabela">
				<tr>
					<th>Código</th>
					<th>Nome</th>
				</tr>
				<tr>
					<th><input type="text" id = "codigo" placeholder="Código da doença" /></th>
					<th><input type="text" id = "nome"  placeholder="Nome da doença"/></th>
				</tr>
				<?php foreach($cid->doenca as $row): ?>
				<tr>
					<td><?=$row->codigo?></td>
					<td><?=$row->nome?></td>
				</tr>
				<?php endforeach;?>
			</table>
		</div>
	</div>
</div>

<script>
$(function(){
	$("#tabela input").keyup(function(){        
	    var index 	= $(this).parent().index();
	    var nth 	= "#tabela td:nth-child("+(index+1).toString()+")";
	    var valor 	= $(this).val().toUpperCase();
	    $("#tabela tr").show();
	    $(nth).each(function(){
	        if($(this).text().toUpperCase().indexOf(valor) < 0){
	            $(this).parent().hide();
	        }
	    });
	});

	$("#tabela input").blur(function(){
	    $(this).val("");
	}); 
});
</script>