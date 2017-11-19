@extends('layouts.default')

@section('content')
<link rel="stylesheet" type="text/css" href="/css/counters.css"/>


<?php if (count($clasificadoscategorias)>0 )  { ?>


			<div id="page"><!-- - - - - - - - - - SECTION - - - - - - - - - -->

			<div class="pi-section-w pi-section-white">
			<div class="pi-section">


			@if(Session::has('success'))
			    <div class="alert-box success">
			        <h2>{{ Session::get('success') }}</h2>
			    </div>
			@endif

			<div class="pi-text-center pi-margin-bottom-50">
				<h1 class="pi-uppercase pi-weight-700 pi-has-border pi-has-tall-border pi-has-short-border">
					Clasificados
				</h1>
				<a href="/clasificados/create" class="btn pi-btn-orange pi-btn-bigger">
					Agrega tu clasificado gratis !
				</a>
				<!-- <a href="/clasificados/create" class="btn pi-btn-turquoise pi-btn-no-border pi-shadow pi-btn-bigger">
					Clasificados mas vistos !
				</a>
				<a href="/clasificados/create" class="btn pi-btn-green pi-btn-no-border pi-shadow pi-btn-bigger">
					Ultimos Clasificados !
				</a> -->

			</div>


			<div id="isotope" class="pi-row pi-grid-small-margins pi-padding-bottom-40 isotope" data-isotope-mode="masonry">






											@foreach ($clasificadoscategorias as $clasificadoscategoria)


											<?php

														$total = DB::table('clasificados')
														->where('clasificadoscategorias_id','=',$clasificadoscategoria->id)
														->count();

											?>


															<!-- echo "<a href='/articulos/" . $articulo->id . "/edit' class='btn btn-xs btn-primary'>Editar</a> "; -->



											<div class="Photography pi-col-sm-4 pi-col-xs-6 isotope-item">
												<div class="pi-icon-box-vertical pi-icon-box-vertical-icon-bigger pi-text-center">

													<div class="pi-icon-box-icon pi-icon-box-icon-circle pi-icon-box-icon-base" style="background: #bbea76;">
														<a href="/clasificadoscategorias/{{ $clasificadoscategoria->id }}" class="pi-link-white">
																<img src="/img/glyphicons/png/{{ $clasificadoscategoria->icon }}" alt="" />
														</a>
													</div>

													<!-- Counters item -->

																	<div class="pi-counter pi-counter-simple" data-count-from="0" data-count-to="{{$total}}" data-easing="easeInCirc" data-duration="1000" data-frames-per-second="0">


																	<span class="pi-counter-number">0</span> Clasificados


																	</div>

																<!-- End counters item -->


													<h5><a href='/clasificadoscategorias/{{ $clasificadoscategoria->id }}' class='pi-link-dark'>{{$clasificadoscategoria->clasificadoscategoria}}</a></h5>

													<p>
														<a href="/clasificadoscategorias/{{ $clasificadoscategoria->id }}" class="btn pi-btn-lime pi-btn-small">
															Ver
														</a>
													</p>
													<br>
												</div>
											</div>




											@endforeach



</div>


</div>
</div>

<!-- - - - - - - - - - END SECTION - - - - - - - - - --></div>



		<?php
						}
		?>



<script src="/3dParty/jquery-1.11.0.min.js"></script>
<script src="/scripts/pi.easings.js"></script>
<script src="/3dParty/inview.js"></script>
<script src="/scripts/pi.counter.js"></script>
<script src="/scripts/pi.init.counter.js"></script>

@stop
