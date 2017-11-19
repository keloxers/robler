@extends('layouts.default')

@section('content')

<div id="page"><!-- - - - - - - - - - SECTION - - - - - - - - - -->
<div class="pi-section-w pi-section-white piICheck piStylishSelect">
	<div class="pi-section pi-padding-bottom-80">

		<div class="pi-text-center pi-margin-bottom-60">
			<h1 class="pi-uppercase pi-weight-700 pi-has-border pi-has-tall-border pi-has-short-border pi-margin-bottom-70">
				Agregar un nuevo Partido
			</h1>
		</div>


		<!-- Row -->
		<div class="pi-row">

			<!-- Col 6 -->
			<div class="pi-col-xs-8">

				<h4 class="pi-has-bg pi-weight-700 pi-uppercase pi-letter-spacing pi-margin-bottom-25">
					Ingrese los datos por favor
				</h4>

				<hr class="pi-divider-gap-10">

				<!-- Forms -->
				{{ Form::open(array('route' => 'padlepartidos.store', 'class' => 'panel-body wrapper-lg')) }}



					<!-- First name form -->
					<div class="form-group">
								<label>Fecha</label>
								{{ Form::text('fecha', '', array('class' => 'form-control input-lg', 'id' =>'fecha', 'placeholder' => 'AAAA-MM-DD')) }}

								<br> <?php
									if ($errors->first('fecha')) {
											?>
										<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ban-circle"></i> <strong>Ups... error!</strong>
										<div class="alert-link">{{ $errors->first('fecha') }}</div>
									</div>
								<?php } ?>

					</div>
					<!-- End first name form -->



					<!-- Message -->
					<div class="form-group">
						<label for="exampleInputMessage-3">Categoria</label>


								{{ Form::select( 'padlecategorias_id', Padlecategoria::All()->
										lists('padlecategoria', 'id'), Input::get('padlecategoria'), array( "placeholder" => "", 'class' => 'form-control input-lg')) }}

					</div>
					<!-- End message form -->

					<!-- Message -->
					<div class="form-group">
						<label for="exampleInputMessage-3">Zona</label>


								{{ Form::select( 'padlezonas_id', Padlezona::All()->
										lists('padlezona', 'id'), Input::get('padlezona'), array( "placeholder" => "", 'class' => 'form-control input-lg')) }}

					</div>
					<!-- End message form -->



					<!-- Message -->
					<div class="form-group">
						<label for="exampleInputMessage-3">Ganador 1</label>


								{{ Form::select( 'ganador1', Padlejugador::All()->
										lists('padlejugador', 'id'), Input::get('ganador1'), array( "placeholder" => "", 'class' => 'form-control input-lg')) }}

					</div>
					<!-- End message form -->



					<!-- Message -->
					<div class="form-group">
						<label for="exampleInputMessage-3">Ganador 2</label>


								{{ Form::select( 'ganador2', Padlejugador::All()->
										lists('padlejugador', 'id'), Input::get('ganador2'), array( "placeholder" => "", 'class' => 'form-control input-lg')) }}

					</div>
					<!-- End message form -->



					<!-- Message -->
					<div class="form-group">
						<label for="exampleInputMessage-3">Perdedor 1</label>


								{{ Form::select( 'perdedor1', Padlejugador::All()->
										lists('padlejugador', 'id'), Input::get('perdedor1'), array( "placeholder" => "", 'class' => 'form-control input-lg')) }}

					</div>
					<!-- End message form -->



					<!-- Message -->
					<div class="form-group">
						<label for="exampleInputMessage-3">Perdedor 2</label>


								{{ Form::select( 'perdedor2', Padlejugador::All()->
										lists('padlejugador', 'id'), Input::get('perdedor2'), array( "placeholder" => "", 'class' => 'form-control input-lg')) }}
					</div>
					<!-- End message form -->

					<hr class="pi-divider-gap-10">

					<!-- Submit button -->
					<p>
						<button type="submit" class="btn pi-btn-base pi-btn-big pi-uppercase pi-weight-700 pi-letter-spacing">
							<i class="icon-check pi-icon-left"></i>Grabar Partido
						</button>
					</p>
					<!-- End submit button -->

				</form>
				<!-- End forms -->

			</div>
			<!-- End col 6 -->


	</div>
</div>
<!-- - - - - - - - - - END SECTION - - - - - - - - - -->


@stop
