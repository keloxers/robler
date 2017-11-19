@extends('layouts.default')
@section('content')
<link rel="stylesheet" type="text/css" href="/css/tables.css"/>




	<div id="page"><!-- - - - - - - - - - SECTION - - - - - - - - - -->

		<div class="pi-section-w pi-section-white">
			<div class="pi-section">

				<a href='/padlejugadors/create' class='btn pi-btn-base pi-btn-small'>Nuevo jugador</a><br>

				<hr class="pi-divider-gap-70">

				<h2 class="h4 pi-weight-700 pi-uppercase pi-has-bg pi-margin-bottom-25">
					Jugadores
				</h2>

<?php if (count($padlejugadors)>0 )  { ?>

<!-- Table -->
		<div class="pi-responsive-table-sm">
			<table class="pi-table pi-table-hovered pi-table-zebra">

				<!-- Table head -->
				<thead>

					<!-- Table row -->
					<tr>
						<!-- <th style="width: 50px;">
							<i class="icon-clock pi-tooltip pi-tooltip-base" data-placement="right" title="" data-original-title="Consectetur adipisicing elit, sed do eiusmod tempor incididunt"></i>
						</th> -->
						<th>
							Jugador
						</th>
						<th>
							Categoria
						</th>
						<th>
							Puntos
						</th>
						<th>
							Accion
						</th>

					</tr>
					<!-- End table row -->

				</thead>
				<!-- End table head -->

				<!-- Table body -->
				<tbody>




				@foreach ($padlejugadors as $padlejugador)

					<!-- Table row -->
					<tr>
						<td>
							{{$padlejugador->padlejugador}}
						</td>
						<td>
							{{$padlejugador->padlecategorias_id}}
						</td>
						<td>
							
						</td>

						<td>
							<a href='/padlejugadors/{{$padlejugador->id}}/edit' class='btn btn-xs btn-primary'>Editar</a>
						</td>
					</tr>
					<!-- End table row -->






				@endforeach


</tbody>
<!-- End table body -->

</table>
</div>
<!-- End table -->

<?php
}
?>


<div class="pi-pagenav pi-text-center">
	{{ $padlejugadors->links()}}
</div>



			</div>
		</div>

		<!-- - - - - - - - - - END SECTION - - - - - - - - - --></div>





	@stop
