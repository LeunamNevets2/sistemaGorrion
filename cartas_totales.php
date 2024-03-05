<?php
include_once "encabezado.php";
?>


	<div class="card-deck row">
		<?php foreach($cartas as $carta){?>
		<div class="col-xs-12 col-sm-6 col-md-3" style="color: <?=  $carta['color']?> !important">
		<div class="card text-center"style="background-color:rgba(217, 217, 217, 1)">
				<div class="card-body">
				<h4 class="card-title" style="font-size: 23px;margin-top:4% ">
						<i class="fa <?= $carta['icono']?>"></i>
						<?= $carta['titulo']?>
					</h4>
					<h2 style="font-size: 25px;"><?= $carta['total']?></h2>

				</div>

			</div>
		</div>
		<?php }?>
	</div>
