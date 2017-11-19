@extends('layouts.default')
@section('content')
<link rel="stylesheet" type="text/css" href="/css/tables.css"/>

<!-- - - - - - - - - - SECTION - - - - - - - - - -->

<!-- Breadcrumbs -->
<div class="pi-section-w pi-border-bottom pi-section-grey">
	<div class="pi-section pi-titlebar pi-breadcrumb-only">
		<div class="pi-breadcrumb pi-center-text-xs">
			<ul>
				<li>Profesionales</li>
			</ul>
		</div>
	</div>
</div>
<!-- End breadcrumbs -->

<!-- - - - - - - - - - END SECTION - - - - - - - - - -->


	<!-- - - - - - - - - - SECTION - - - - - - - - - -->

	<div class="pi-section-w pi-section-white">
		<div class="pi-section pi-padding-bottom-30">

			<!-- Portfolio gallery -->
			<div id="isotope" class="pi-row pi-liquid-col-xs-2 pi-liquid-col-sm-3 pi-gallery pi-gallery-small-margins pi-text-center isotope">


				<?php if (count($profesionalscategorias)>0 )  { ?>

								@foreach ($profesionalscategorias as $profesionalscategoria)

								<?php

									$cantidad = DB::table('profesionals')
											->where('profesionalscategorias_id',$profesionalscategoria->id)
											->where('estado','publicado')
											->count();

								 ?>


											<!-- Portfolio item -->
											<div class="Beautiful Morning pi-gallery-item pi-padding-bottom-40 isotope-item">
												<h3 class="h6 pi-weight-700 pi-uppercase pi-letter-spacing pi-margin-bottom-5"><a href="/profesionales/{{$profesionalscategoria->profesionalscategoria}}" class="pi-link-dark">{{$profesionalscategoria->profesionalscategoria}}</a></h3>
												<ul class="pi-meta">
													<li><i class="icon-tag"></i><a href="/profesionales/{{$profesionalscategoria->profesionalscategoria}}">{{$cantidad}} profesionales</a></li>
												</ul>
											</div>
											<!-- End portfolio item -->

								@endforeach

				<?php } ?>




			</div>
			<!-- End portfolio gallery -->

		</div>
	</div>

	<!-- - - - - - - - - - END SECTION - - - - - - - - - -->


	<!-- - - - - - - - - - SECTION - - - - - - - - - -->
	<div class="pi-section-w pi-shadow-inside-top pi-section-base">
		<div class="pi-texture" style="background: url(img/hexagon.png) repeat;"></div>
		<div class="pi-section pi-padding-top-60 pi-padding-bottom-40 pi-text-center">

			<p class="lead-30">
				<span class="pi-text-white">Desea estar en esta lista? Contactese al <span class="pi-weight-400">(03756) 15610566</span></span>
				<br><br>
				<a href="mailto:webmaster@virasorovitual.com">
				<button class="btn pi-btn-base-2 pi-btn-big" style="margin-left: 25px;">
					<i class="icon-mail pi-icon-left"></i> webmaster@virasorovirtual.com
				</button>
				</a>
			</p>

		</div>
	</div>
	<!-- - - - - - - - - - END SECTION - - - - - - - - - -->



	@stop
