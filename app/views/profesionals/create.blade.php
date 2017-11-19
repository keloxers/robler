@extends('layouts.default')

@section('content')

<div id="page"><!-- - - - - - - - - - SECTION - - - - - - - - - -->
<div class="pi-section-w pi-section-white piICheck piStylishSelect">
	<div class="pi-section pi-padding-bottom-80">

		<div class="pi-text-center pi-margin-bottom-60">
			<h1 class="pi-uppercase pi-weight-700 pi-has-border pi-has-tall-border pi-has-short-border pi-margin-bottom-70">
				Agregar un profesional
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
				{{ Form::open(array('route' => 'profesionals.store', 'files' => true, 'class' => 'panel-body wrapper-lg', 'enctype' => 'multipart/form-data')) }}
			<!-- {{ Form::open(array('route' => 'archivos.store', 'files' => true, 'class'=>'panel-body wrapper-lg', 'enctype' => 'multipart/form-data')) }} -->



					<!-- Message -->
					<div class="form-group">
						<label for="exampleInputMessage-3">Categoria</label>
						<br>
							{{$profesionalscategoria}}
							{{ Form::hidden('profesionalscategorias_id', $profesionalscategorias_id) }}
							{{ Form::hidden('profesionalscategoria', $profesionalscategoria) }}
					</div>
					<!-- End message form -->




					<!-- First name form -->
					<div class="form-group">
						<label for="titular">Profesional</label>

						<div class="pi-input-with-icon">
							<div class="pi-input-icon"><i class="icon-pencil"></i></div>
							{{ Form::text('profesional', '', array('class' => 'form-control', 'id' => 'profesional', 'placeholder' => 'Profesional')) }}
								<?php if ($errors->first('profesional')) { ?>
										<div class="pi-alert-danger fade in">
											<button type="button" class="pi-close" data-dismiss="alert">
												<i class="icon-cancel"></i>
											</button>
											<p>
												<strong>Oh !</strong> {{ $errors->first('profesional') }}.
											</p>
										</div>
								<?php } ?>

						</div>
					</div>
					<!-- End first name form -->



						<!-- First name form -->
						<div class="form-group">
							<label for="titular">Descripcion</label>

							<div class="pi-input-with-icon">
								<div class="pi-input-icon"><i class="icon-pencil"></i></div>
								{{ Form::text('descripcion', '', array('class' => 'form-control', 'id' => 'descripcion', 'placeholder' => 'Descripcion')) }}
										<?php if ($errors->first('descripcion')) { ?>
												<div class="pi-alert-danger fade in">
													<button type="button" class="pi-close" data-dismiss="alert">
														<i class="icon-cancel"></i>
													</button>
													<p>
														<strong>Oh !</strong> {{ $errors->first('descripcion') }}.
													</p>
												</div>
										<?php } ?>
							</div>
						</div>
						<!-- End first name form -->


						<!-- First name form -->
						<div class="form-group">
							<label for="titular">Direccion</label>

							<div class="pi-input-with-icon">
								<div class="pi-input-icon"><i class="icon-pencil"></i></div>
								{{ Form::text('direccion', '', array('class' => 'form-control', 'id' => 'direccion', 'placeholder' => 'Direccion')) }}

							<?php if ($errors->first('direccion')) { ?>
									<div class="pi-alert-danger fade in">
										<button type="button" class="pi-close" data-dismiss="alert">
											<i class="icon-cancel"></i>
										</button>
										<p>
											<strong>Oh !</strong> {{ $errors->first('direccion') }}.
										</p>
									</div>
							<?php } ?>

							</div>
						</div>
						<!-- End first name form -->

						<!-- First name form -->
						<div class="form-group">
							<label for="titular">Facebook</label>

							<div class="pi-input-with-icon">
								<div class="pi-input-icon"><i class="icon-pencil"></i></div>
								{{ Form::text('facebook', '', array('class' => 'form-control', 'id' => 'facebook', 'placeholder' => 'Facebook')) }}

							<?php if ($errors->first('facebook')) { ?>
									<div class="pi-alert-danger fade in">
										<button type="button" class="pi-close" data-dismiss="alert">
											<i class="icon-cancel"></i>
										</button>
										<p>
											<strong>Oh !</strong> {{ $errors->first('facebook') }}.
										</p>
									</div>
							<?php } ?>

							</div>
						</div>
						<!-- End first name form -->


												<!-- First name form -->
												<div class="form-group">
													<label for="titular">Twitter</label>

													<div class="pi-input-with-icon">
														<div class="pi-input-icon"><i class="icon-pencil"></i></div>
														{{ Form::text('twitter', '', array('class' => 'form-control', 'id' => 'twitter', 'placeholder' => 'Twitter')) }}

													<?php if ($errors->first('twitter')) { ?>
															<div class="pi-alert-danger fade in">
																<button type="button" class="pi-close" data-dismiss="alert">
																	<i class="icon-cancel"></i>
																</button>
																<p>
																	<strong>Oh !</strong> {{ $errors->first('twitter') }}.
																</p>
															</div>
													<?php } ?>

													</div>
												</div>
												<!-- End first name form -->


						<!-- First name form -->
						<div class="form-group">
							<label for="titular">Email contacto</label>

							<div class="pi-input-with-icon">
								<div class="pi-input-icon"><i class="icon-pencil"></i></div>
								{{ Form::text('email', '', array('class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email')) }}

							<?php if ($errors->first('email')) { ?>
									<div class="pi-alert-danger fade in">
										<button type="button" class="pi-close" data-dismiss="alert">
											<i class="icon-cancel"></i>
										</button>
										<p>
											<strong>Oh !</strong> {{ $errors->first('email') }}.
										</p>
									</div>
							<?php } ?>

							</div>
						</div>
						<!-- End first name form -->



												<!-- First name form -->
												<div class="form-group">
													<label for="titular">Instagram</label>

													<div class="pi-input-with-icon">
														<div class="pi-input-icon"><i class="icon-pencil"></i></div>
														{{ Form::text('instagram', '', array('class' => 'form-control', 'id' => 'instagram', 'placeholder' => 'Instagram')) }}

													<?php if ($errors->first('instagram')) { ?>
															<div class="pi-alert-danger fade in">
																<button type="button" class="pi-close" data-dismiss="alert">
																	<i class="icon-cancel"></i>
																</button>
																<p>
																	<strong>Oh !</strong> {{ $errors->first('instagram') }}.
																</p>
															</div>
													<?php } ?>

													</div>
												</div>
												<!-- End first name form -->


												<!-- First name form -->
												<div class="form-group">
													<label for="titular">Telefono</label>

													<div class="pi-input-with-icon">
														<div class="pi-input-icon"><i class="icon-pencil"></i></div>
														{{ Form::text('telefono', '', array('class' => 'form-control', 'id' => 'telefono', 'placeholder' => 'Telefono')) }}

													<?php if ($errors->first('telefono')) { ?>
															<div class="pi-alert-danger fade in">
																<button type="button" class="pi-close" data-dismiss="alert">
																	<i class="icon-cancel"></i>
																</button>
																<p>
																	<strong>Oh !</strong> {{ $errors->first('telefono') }}.
																</p>
															</div>
													<?php } ?>

													</div>
												</div>
												<!-- End first name form -->


												<!-- First name form -->
												<div class="form-group">
													<label for="titular">Horarios de Atencion</label>

													<div class="pi-input-with-icon">
														<div class="pi-input-icon"><i class="icon-pencil"></i></div>
														{{ Form::text('horarioatencion', '', array('class' => 'form-control', 'id' => 'horarioatencion', 'placeholder' => 'Horario de atencion')) }}

													<?php if ($errors->first('horarioatencion')) { ?>
															<div class="pi-alert-danger fade in">
																<button type="button" class="pi-close" data-dismiss="alert">
																	<i class="icon-cancel"></i>
																</button>
																<p>
																	<strong>Oh !</strong> {{ $errors->first('horarioatencion') }}.
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
							<i class="icon-check pi-icon-left"></i>grabar profesional
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
