@extends('layouts.default')
@section('content')
<link rel="stylesheet" type="text/css" href="/css/tables.css"/>




	<div id="page"><!-- - - - - - - - - - SECTION - - - - - - - - - -->

		<div class="pi-section-w pi-section-white">
			<div class="pi-section">

				<a href='/padlepartidos/create' class='btn pi-btn-base pi-btn-small'>Nuevo partido</a><br>

				<hr class="pi-divider-gap-70">

				<h2 class="h4 pi-weight-700 pi-uppercase pi-has-bg pi-margin-bottom-25">
					Partidos Jugados - Resultados
				</h2>

<?php if (count($padlepartidos)>0 )  { ?>

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
							Partido
						</th>
						<th>
							Categoria
						</th>
						<th>
							Zona
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




				@foreach ($padlepartidos as $padlepartido)

					<!-- Table row -->
					<tr>
						<td>
							Ganó {{$padlepartido->ganador1}} - {{$padlepartido->ganador2}} a {{$padlepartido->perdedor1}} - {{$padlepartido->perdedor1}}
						</td>
						<td>
							{{$padlepartido->padlecategorias_id}}
						</td>
						<td>
							{{$padlepartido->padlecategorias_id}}
						</td>

						<td>
							<a href='/padlepartido/{{$padlepartido->id}}/edit' class='btn btn-xs btn-primary'>Editar</a>
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
	{{ $padlepartidos->links()}}
</div>



			</div>
		</div>

		<!-- - - - - - - - - - END SECTION - - - - - - - - - --></div>





	@stop
