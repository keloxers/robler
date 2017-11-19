@extends('layouts.default')

@section('content')

<div id="page"><!-- - - - - - - - - - SECTION - - - - - - - - - -->
<div class="pi-section-w pi-section-white piICheck piStylishSelect">
	<div class="pi-section pi-padding-bottom-80">

		<div class="pi-text-center pi-margin-bottom-60">
			<h1 class="pi-uppercase pi-weight-700 pi-has-border pi-has-tall-border pi-has-short-border pi-margin-bottom-70">
				Agregar un Jugador
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
				{{ Form::open(array('route' => 'padlejugadors.store', 'files' => true, 'class' => 'panel-body wrapper-lg')) }}



					<!-- Message -->
					<div class="form-group">
						<label for="exampleInputMessage-3">Categoria</label>


								{{ Form::select( 'padlecategorias_id', Padlecategoria::All()->
										lists('padlecategoria', 'id'), Input::get('padlecategoria'), array( "placeholder" => "", 'class' => 'form-control input-lg')) }}

					</div>
					<!-- End message form -->



					<!-- First name form -->
					<div class="form-group">
						<label for="titular">Jugador</label>

						<div class="pi-input-with-icon">
							<div class="pi-input-icon"><i class="icon-pencil"></i></div>
							{{ Form::text('padlejugador', '', array('class' => 'form-control', 'id' => 'turno', 'placeholder' => 'Ingrese Apellido, Nombre')) }}
								<?php if ($errors->first('padlejugador')) { ?>
										<div class="pi-alert-danger fade in">
											<button type="button" class="pi-close" data-dismiss="alert">
												<i class="icon-cancel"></i>
											</button>
											<p>
												<strong>Oh !</strong> {{ $errors->first('padlejugador') }}.
											</p>
										</div>
								<?php } ?>

						</div>
					</div>
					<!-- End first name form -->



					<hr class="pi-divider-gap-10">

					<!-- Submit button -->
					<p>
						<button type="submit" class="btn pi-btn-base pi-btn-big pi-uppercase pi-weight-700 pi-letter-spacing">
							<i class="icon-check pi-icon-left"></i>Grabar Jugador
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
