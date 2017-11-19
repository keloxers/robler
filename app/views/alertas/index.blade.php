@extends('layouts.default')

@section('content')
<link rel="stylesheet" type="text/css" href="/css/tables.css"/>


<div id="page"><!-- - - - - - - - - - SECTION - - - - - - - - - -->
<div class="pi-section-w pi-section-white piTooltips">
	<div class="pi-section pi-padding-bottom-80">

		<div class="pi-text-center">
			<h1 class="pi-uppercase pi-weight-700 pi-has-border pi-has-tall-border pi-has-short-border pi-margin-bottom-70">
				{{ $title }}
			</h1>
		</div>

<a href='/alertas/create' class='btn pi-btn-orange pi-btn-small'>Crear nuevo Alerta</a><br>

<?php if (count($alertas)>0 )  { ?>




									<table class="pi-table pi-table-hovered pi-table-zebra">

										<thead>

											<tr>
												<th>Alerta</th>
												<th>Mensaje</th>
												<th>Creado</th>
												<th align="center">Accion</th>
											</tr>
										</thead>
										<tbody>

												<?php

											foreach ($alertas as $alerta)
												{


														echo "<tr>";
												        echo "<td>" . $alerta->alerta . "</td>";
																echo "<td>" . $alerta->mensaje . "</td>";
																echo "<td>" . $alerta->created_at . "</td>";
												        echo "<td align='center'>" ;

														echo "<a href='/alertas/" . $alerta->id . "/edit' class='btn pi-btn-orange pi-btn-small'>Editar</a> ";
														echo "<a href='/alertas/" . $alerta->id . "/delete' class='btn pi-btn-orange pi-btn-small'>Eliminar</a> ";

														print "</td>";
														print "</tr>";


												}


											?>

									</tbody>
								</table>

									{{ $alertas->links()}}

		<?php

			}

		?>


</div>
</div>
</div>

@stop
