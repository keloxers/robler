@extends('layouts.default')
@section('content')
<link rel="stylesheet" type="text/css" href="/css/tables.css"/>




	<div id="page"><!-- - - - - - - - - - SECTION - - - - - - - - - -->

		<div class="pi-section-w pi-section-white">
			<div class="pi-section">

				<a href='/agendas/create' class='btn pi-btn-base pi-btn-small'>Nuevo evento en la agenda</a><br>

				<hr class="pi-divider-gap-70">

				<h2 class="h4 pi-weight-700 pi-uppercase pi-has-bg pi-margin-bottom-25">
					Eventos de la Agenda
				</h2>

<?php if (count($agendas)>0 )  { ?>

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
							Fecha
						</th>
						<th>
							Agenda
						</th>
						<th>
							Estado
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




				@foreach ($agendas as $agenda)

					<!-- Table row -->
					<tr>
						<td>
							{{$agenda->fecha}}
						</td>
						<td>
							{{$agenda->agenda}}
						</td>
						<td>
							{{$agenda->estado}}
						</td>

						<td>
							<a href='/agendas/{{$agenda->id}}/edit' class='btn btn-xs btn-primary'>Editar</a>
							<a href='/agendas/{{$agenda->id}}/delete' class='btn btn-xs btn-primary'>Eliminar</a>
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
	{{ $agendas->links()}}
</div>



			</div>
		</div>

		<!-- - - - - - - - - - END SECTION - - - - - - - - - --></div>





	@stop
