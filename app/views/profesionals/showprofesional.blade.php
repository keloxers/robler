@extends('layouts.default')
@section('content')

<!-- - - - - - - - - - SECTION - - - - - - - - - -->

<!-- Breadcrumbs -->
<div class="pi-section-w pi-border-bottom pi-section-grey">
	<div class="pi-section pi-titlebar pi-breadcrumb-only">
		<div class="pi-breadcrumb">
			<ul>
				<li><a href="/profesionales">Profesionales</a></li>
				<li><a href="/profesionales/{{$profesionalscategorias->profesionalscategoria}}">{{$profesionalscategorias->profesionalscategoria}}</a></li>
			</ul>
		</div>
	</div>
</div>
<!-- End breadcrumbs -->

<!-- - - - - - - - - - END SECTION - - - - - - - - - -->

<div class="pi-section-w pi-section-base pi-section-parallax" style="background-image: url(img_external/gallery/mountains.jpg);">
	<div class="pi-texture" style="background: rgba(24, 28, 32, 0.8);"></div>
	<div class="pi-section pi-padding-top-30 pi-padding-bottom-40 pi-text-center">

		<h2 class="h1 pi-text-shadow pi-has-border pi-has-tall-border pi-has-base-border pi-has-short-border" style="font-size: 60px;">
			{{$profesional->profesional}}
		</h2>

		<p class="lead-18 pi-weight-300 pi-margin-bottom-30 pi-p-half">
			{{$profesional->descripcion}}
		</p>

	</div>
</div>



<!-- - - - - - - - - - SECTION - - - - - - - - - -->

<div class="pi-section-w pi-section-white piICheck piStylishSelect piSocials">
	<div class="pi-section">

		<div class="pi-row">

			<div class="pi-col-sm-6">



				<h2 class="h4 pi-has-bg pi-weight-700 pi-uppercase pi-letter-spacing pi-margin-bottom-30">
					Contacto
				</h2>

				<p class="h6 pi-uppercase pi-weight-700 pi-padding-top-20">
					<i class="icon-location pi-text-base" style="margin-right: 5px;"></i> {{$profesional->direccion}}
				</p>

				<p class="h6 pi-uppercase pi-weight-700">
					<i class="icon-mail pi-text-base" style="margin-right: 5px;"></i> <a href="mailto:{{$profesional->email}}" class="pi-link-dark">{{$profesional->email}}</a>
				</p>

				<p class="h6 pi-uppercase pi-weight-700  pi-padding-bottom-30">
					<i class="icon-phone pi-text-base" style="margin-right: 5px;"></i> {{$profesional->telefono}}
				</p>

				@if ($profesional->horarioatencion <> '')
						<p>
							Horario atención: <strong>{{$profesional->horarioatencion}}</strong>
						</p>
				@endif
				<br>
				<p>
					Redes Sociales:
				</p>

				<ul class="pi-social-icons pi-jump pi-colored-bg pi-small pi-round pi-padding-top-10  pi-padding-bottom-30">
					@if ($profesional->facebook <> '')
							<li><a href="{{$profesional->facebook}}" class="pi-social-icon-facebook"><i class="icon-facebook"></i></a></li>
					@endif
					@if ($profesional->twitter <> '')
							<li><a href="{{$profesional->twitter}}" class="pi-social-icon-twitter"><i class="icon-twitter"></i></a></li>
					@endif
					@if ($profesional->instagram <> '')
							<li><a href="{{$profesional->instagram}}" class="pi-social-icon-instagram"><i class="icon-instagram"></i></a></li>
					@endif
				</ul>
</p>
			</div>
		</div>

	</div>
</div>

<!-- - - - - - - - - - END SECTION - - - - - - - - - -->

</div>

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
