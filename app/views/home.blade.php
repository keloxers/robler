@extends('layouts.default')
@section('content')


@if (count($articulo_tapa))

<div class="tp-banner-container">
<div class="tp-banner pi-revolution-slider" >
<ul class="">

<!-- SLIDE  -->

@foreach ($articulo_tapa as $articulo)
<?php
$texto = $articulo->texto;
$archivos = DB::table('archivos')
->where('padre', '=', 'articulo')
->where('padre_id', '=', $articulo->id)
->first();

if (preg_match('/^.{1,460}\b/s', $articulo->copete, $match))
{ $texto = $match[0]; }
$categoria = Categoria::find($articulo->categorias_id);
?>


<!-- SLIDE  -->
<li data-transition="fade" data-slotamount="1" data-masterspeed="1500" >
<!-- MAIN IMAGE -->
<img src="/img_external/revolution-slider/back-2.jpg"  alt=""  data-bgfit="cover" data-bgposition="center top" data-bgrepeat="no-repeat">
<!-- LAYERS -->


@if (count($archivos)>0 )
<!-- LAYER NR. 1 -->
<div class="tp-caption sfb"
	 data-x="583"
	 data-y="60"
	 data-speed="800"
	 data-start="1500"
	 data-easing="Power4.easeOut"
	 data-endspeed="300"
	 data-endeasing="Power1.easeIn"
	 data-captionhidden="on"
	 style="z-index: 1">
	 <a href="/articulos/show/{{ $articulo->url_seo }}">
		 <img src="/uploads/crop/{{ $archivos->archivo }}" alt="">
	 </a>
</div>
@endif

<!-- LAYER NR. 2 -->
<div class="tp-caption sft str"
	 data-x="45" data-hoffset="0"
	 data-y="100"
	 data-speed="500"
	 data-start="2400"
	 data-easing="Back.easeInOut"
	 data-endspeed="300"
	 style="z-index: 4; font-size: 36px; color: #fff; letter-spacing: -1px; text-shadow: 0 1px 0 rgba(0,0,0,0.2); font-weight: 300; line-height: 60px;">
	 {{ $articulo->articulo }}
</div>

<!-- LAYER NR. 3 -->
<div class="tp-caption sft str"
	 data-x="45" data-hoffset="0"
	 data-y="365"
	 data-speed="500"
	 data-start="2600"
	 data-easing="Back.easeInOut"
	 data-endspeed="300"
	 style="z-index: 5; font-size: 18px; color: rgba(250,250,250,0.85); font-weight: 100; line-height: 28px;">
	 {{ $texto }}
</div>

<!-- LAYER NR. 4 -->
<div class="tp-caption sft str"
	 data-x="45" data-hoffset="0"
	 data-y="310"
	 data-speed="500"
	 data-start="2800"
	 data-easing="Back.easeInOut"
	 data-endspeed="300"
	 style="z-index: 6;">
	 <a href="/articulos/show/{{ $articulo->url_seo }}" class="btn pi-btn-turquoise">
		<i class="icon-book-open pi-icon-left"></i> Leer
	</a>
</div>

</li>

@endforeach

</ul>
</div>
</div>

<span class="revolution-slider"></span>

<!-- - - - - - - - - - END SECTION - - - - - - - - - -->





@endif













<?php

$fecha=date("Y-m-d");

$turno = DB::table('turnos')
					->where('fecha', '=', $fecha)
					->first();
if ($turno) {

?>

<!-- Title bar -->
<div class="pi-section-w pi-section-base pi-section-base-gradient">
	<div class="pi-texture" style="background: url(img/hexagon.png) repeat;"></div>
	<div class="pi-section" style="padding: 15px 40px 12px;">

		<div class="pi-row">
			<div class="pi-col-sm-8 pi-center-text-xs">
				<h1 class="h2 pi-weight-300 pi-margin-bottom-5">
					Farmacia de Turno: {{ $turno->turno }}
				</h1>
			</div>
		</div>

	</div>
</div>
<!-- End title bar -->

<?php
				}
?>





@if (Auditoriavoto::voto())
<br>


<!-- - - - - - - - - - END SECTION - - - - - - - - - -->

<div class="pi-section-w pi-shadow-inside-top pi-section-base">
	<div class="pi-texture" style="background: url(img/hexagon.png) repeat;"></div>
	<div class="pi-section">

		<!-- Row -->
		<div class="pi-row">

			<!-- Col 8 -->
			<div class="pi-col-sm-12 pi-text-left pi-center-text-sm">
				<p class="lead-30 pi-text-white">
					{{$encuesta->encuesta}} <span class="pi-weight-400">?</span>
				</p>
			</div>
			<!-- End col 8 -->

			<!-- Col 4 -->
			<div class="pi-col-sm-12 pi-center-text-sm pi-center-text-sm">
				<p>
					@foreach ($respuestas as $respuesta)
							<a href="/encuestas/votar/{{$respuesta->id}}" class="btn pi-btn-base-2 pi-btn-big">
								{{$respuesta->respuesta}}
							</a>
					@endforeach
				</p>
			</div>
			<!-- End col 4 -->

		</div>
		<!-- End row -->

	</div>
</div>

<!-- - - - - - - - - - END SECTION - - - - - - - - - --></div>

@endif





@if (Sentry::check() && Sentry::getUser()->hasAccess('admin') && $encuesta)

<br>
<link rel="stylesheet" type="text/css" href="/css/counters.css"/>

<!-- - - - - - - - - - SECTION - - - - - - - - - -->

<div class="pi-section-w pi-section-parallax" style="background-image: url(img_external/gallery/modern-skyscraper.jpg);">
	<div class="pi-texture pi-section-overlay-base"></div>
	<div class="pi-section pi-padding-top-50 pi-padding-bottom-20">

		<div class="pi-text-center pi-padding-bottom-20">
			<h6 class="pi-uppercase pi-letter-spacing-3">
				{{$encuesta->encuesta}}
			</h6>
		</div>

		<?php $votos = DB::table('auditoriavotos')->where('encuestas_id', $encuesta->id)->count(); ?>


		@if ($votos > 0)
						<!-- Row -->
						<div class="pi-row pi-grid-small-margins pi-text-center">

							<?php $i=intval(12 / count($respuestas)); ?>

							@foreach ($respuestas as $respuesta)

							<?php

							$voto = DB::table('auditoriavotos')->where('respuestas_id', $respuesta->id)->count();

							$voto = number_format(($voto * 100 / $votos),2);

							?>

							<!-- Col 3 -->
							<div class="pi-col-sm-{{$i}} pi-col-2xs-6 pi-padding-bottom-20">
								<div class="pi-counter pi-counter-simple" data-count-from="0" data-count-to="230" data-easing="easeInCirc" data-duration="1000" data-frames-per-second="0">
									<div class="pi-counter-count pi-counter-count-big pi-text-white pi-weight-600 pi-text-shadow">

										<p>
											<i class="icon-thumbs-up"></i>
										</p>
										<div class="lead-18">{{$voto}} %</div>

									</div>
									<p class="lead-18">{{$respuesta->respuesta}}</p>
								</div>
							</div>
							<!-- End col 3 -->

							@endforeach


						</div>
						<!-- End row -->
			@endif
	</div>
</div>

<!-- - - - - - - - - - END SECTION - - - - - - - - - -->












@endif







<div id="page"><!-- - - - - - - - - - SECTION - - - - - - - - - -->

<div class="pi-section-w pi-section-white">
	<div class="pi-section">

		<div class="pi-row">

			<div class="pi-col-sm-9">

			<div class="pi-row pi-padding-bottom-20 isotope" data-isotope-mode="masonry">



				@foreach ($articulos as $articulo)

							<?php
							$texto = $articulo->texto;
							$archivos = DB::table('archivos')
							->where('padre', '=', 'articulo')
							->where('padre_id', '=', $articulo->id)
							->first();

							if (preg_match('/^.{1,460}\b/s', $articulo->copete, $match))
							{ $texto = $match[0]; }
							$categoria = Categoria::find($articulo->categorias_id);
							?>


				<div class="pi-col-xs-6 isotope-item">
					<div class="pi-portfolio-item pi-portfolio-description-box pi-portfolio-item-round-corners">
						@if (count($archivos)>0 )
						<div class="pi-img-w pi-img-round-corners pi-img-hover-zoom">
							<a href="/articulos/show/{{ $articulo->url_seo }}">
								<img src="/uploads/big/{{ $archivos->archivo }}" alt="">
							</a>
						</div>
						@endif
						<div class="pi-portfolio-description pi-portfolio-description-round-corners">

							<ul class="pi-portfolio-cats">
								<li><i class="icon-clock"></i>{{ $articulo->created_at }}</li>
								<li><i class="icon-eye"></i>{{ $articulo->visitas }}</li>
							</ul>

							<h2 class="h4"><a href="/articulos/show/{{ $articulo->url_seo }}" class="pi-link-no-style">{{ $articulo->articulo }}</a>
							</h2>

							<p>{{ $texto }}...</p>
							<b>{{ $articulo->visitas }} visitas</b><br>
							<a href="/articulos/show/{{ $articulo->url_seo }}" class="btn pi-btn-turquoise">
					 			<i class="icon-book-open pi-icon-left"></i> Leer
					 		</a>
							<br>

						</div>
					</div>
				</div>

				<div class="pi-col-xs-6 isotope-item">
					<div class="pi-portfolio-item pi-portfolio-description-box pi-portfolio-item-round-corners">


<?php

				$banners_hil = DB::table('banners')
										->where('posicion', '=', 'homeinterlinea')
										->orderby('visitas')
										->first();
				if ($banners_hil) {
 ?>


																		@if ($banners_hil->link <> "")
																				<a href="{{ $banners_hil->link }}">
																		@endif
																		<img src="/publicidades/{{ $banners_hil->file }}" alt="">
																		@if ($banners_hil->link <> "")
																			</a>
																		@endif

<?php
		$id = $banners_hil->id;
		$banners_hil = Banner::find($id);
		$banners_hil->visitas = $banners_hil->visitas + 1;
		$banners_hil->save();
		}
 ?>




			</div>
		</div>

				@endforeach





















			</div>











				<div class="pi-pagenav pi-padding-bottom-20">

					{{ $articulos->links()}}

				</div>

			</div>

			<div class="pi-sidebar pi-col-sm-3">

				<!-- Search -->
				<div class="pi-sidebar-block pi-padding-bottom-60 pi-margin-top-minus-5">
					<h3 class="h6 pi-uppercase pi-weight-700 pi-letter-spacing pi-has-bg pi-margin-bottom-20">
						Buscar
					</h3>

					<script>
					  (function() {
					    var cx = '010195671577222309523:zef_etpvv30';
					    var gcse = document.createElement('script'); gcse.type = 'text/javascript'; gcse.async = true;
					    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
					        '//www.google.com/cse/cse.js?cx=' + cx;
					    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(gcse, s);
					  })();
					</script>

					<!-- Place this tag where you want both of the search box and the search results to render -->
					<gcse:search></gcse:search>


				</div>
				<!-- End search -->

				<!-- Categories -->
				<div class="pi-sidebar-block pi-padding-bottom-40">
					<h3 class="h6 pi-uppercase pi-weight-700 pi-letter-spacing pi-has-bg pi-margin-bottom-15">
						Categorias
					</h3>
					<ul class="pi-list-with-icons pi-list-icons-right-open">
						@foreach ($categorias as $categoria)
						<li><a href="/categorias/{{ $categoria->id }}">{{ $categoria->categoria}}</a></li>
						@endforeach
					</ul>
				</div>
				<!-- End categories -->


				<!-- Tweets -->
				<div class="pi-sidebar-block pi-padding-bottom-40">
					<h3 class="h6 pi-uppercase pi-weight-700 pi-letter-spacing pi-has-bg pi-margin-bottom-20">
						Ultimos Tweets
					</h3>
					<a class="twitter-timeline" href="https://twitter.com/virasorovirtual" data-widget-id="457138837286699008">Tweets por @virasorovirtual</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

				</div>
				<!-- End tweets -->

				<!-- Tweets -->
				<div class="pi-sidebar-block pi-padding-bottom-40">
					<h3 class="h6 pi-uppercase pi-weight-700 pi-letter-spacing pi-has-bg pi-margin-bottom-20">
						Facebook
					</h3>
					<div class="fb-page" data-href="https://www.facebook.com/virasorovirtual" data-tabs="timeline" data-height="1000" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/virasorovirtual"><a href="https://www.facebook.com/virasorovirtual">VirasoroVirtual</a></blockquote></div></div>


				</div>
				<!-- End tweets -->


				<div class="pi-sidebar-block pi-padding-bottom-40">
								<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
								<!-- lateralVV300x600 -->
								<ins class="adsbygoogle"
								     style="display:block"
								     data-ad-client="ca-pub-0796827730614625"
								     data-ad-slot="5943085626"
								     data-ad-format="auto"></ins>
								<script>
								(adsbygoogle = window.adsbygoogle || []).push({});
								</script>
				</div>












				<div class="pi-sidebar-block pi-padding-bottom-40">

								@foreach ($banners_lateral as $banner)

								<div class="pi-row">
									<div class="pi-section-w pi-center-text-xs pi-text-center">


												@if ($banner->link <> "")
														<a href="{{ $banner->link }}">
												@endif
												<img src="/publicidades/{{ $banner->file }}" alt="">
												@if ($banner->link <> "")
													</a>
												@endif

									</div>
								</div>
								<br>
								@endforeach
				</div>













			</div>

		</div>




	</div>
</div>

<!-- - - - - - - - - - END SECTION - - - - - - - - - --></div>



<div id="page"><!-- - - - - - - - - - SECTION - - - - - - - - - -->

	<!-- Title bar -->
	<div class="pi-section-w pi-section-base pi-section-base-gradient">
		<div class="pi-texture" style="background: url(img/hexagon.png) repeat;"></div>
		<div class="pi-section" style="padding: 15px 40px 12px;">

			<div class="pi-row">
				<div class="pi-col-sm-12 pi-center-text-xs">
					<h1 class="h2 pi-weight-300 pi-margin-bottom-5">Gracias a estras empresas Ud. puede leer las noticas de VirasoroVirtual.com</h1>
				</div>
			</div>

		</div>
	</div>
	<!-- End title bar -->



<div id="page"><!-- - - - - - - - - - SECTION - - - - - - - - - -->
<div class="pi-section-w pi-section-white piTooltips">
	<div class="pi-section pi-padding-bottom-80">

		<div class="pi-row pi-grid-small-margins">

			<div class="pi-col-md-12">


								<a href="http://vender.virasorovirtual.com">
										<img src="/publicidades/vendervirasorovirtual.gif" alt="">
								</a>

</div>

		</div>

	</div>
</div>
<!-- - - - - - - - - - END SECTION - - - - - - - - - --></div>




<div id="page"><!-- - - - - - - - - - SECTION - - - - - - - - - -->
	<div class="pi-section-w pi-section-white">
		<div class="pi-section">
			<div class="pi-row pi-padding-bottom-10 isotope" data-isotope-mode="masonry">
				@foreach ($banners_smalls as $banners_small)


						<div class="pi-col-sm-4 pi-col-xs-6 isotope-item">
							<div class="pi-img-w pi-img-round-corners pi-img-hover-zoom">
								@if ($banners_small->link <> "")
										<a href="{{ $banners_small->link }}">
								@endif


								<img src="/publicidades/{{ $banners_small->file }}" alt="">


								@if ($banners_small->link <> "")
									</a>
								@endif


							</div>
						</div>


				@endforeach

			</div>
		</div>
	</div>
</div>



<br>
<div id="page"><!-- - - - - - - - - - SECTION - - - - - - - - - -->

	<!-- Title bar -->
	<div class="pi-section-w pi-section-base pi-section-base-gradient">
		<div class="pi-texture" style="background: url(img/hexagon.png) repeat;"></div>
		<div class="pi-section" style="padding: 15px 40px 12px;">

			<div class="pi-row">
				<div class="pi-col-sm-8 pi-center-text-xs">
					<h1 class="h2 pi-weight-300 pi-margin-bottom-5">Pronostico del tiempo</h1>
				</div>
			</div>

		</div>
	</div>
	<!-- End title bar -->


	<div class="pi-section-w pi-section-white">

		<div class="pi-row">
			<div class="pi-section-w pi-center-text-xs pi-text-center">
				<br>
				<div align="center" >
					<div id="cont_45dad13cc976c360654861b1384f63e4"><script type="text/javascript" async src="https://www.tiempo.com/wid_loader/45dad13cc976c360654861b1384f63e4"></script></div>
				</div>
			</div>
		</div>
	</div>
</div>
<br>








<div id="page"><!-- - - - - - - - - - SECTION - - - - - - - - - -->



	<!-- Title bar -->
	<div class="pi-section-w pi-section-base pi-section-base-gradient">
		<div class="pi-texture" style="background: url(img/hexagon.png) repeat;"></div>
		<div class="pi-section" style="padding: 15px 40px 12px;">

			<div class="pi-row">
				<div class="pi-col-sm-8 pi-center-text-xs">
					<h1 class="h2 pi-weight-300 pi-margin-bottom-5">Más vistas de la semana</h1>
				</div>
			</div>

		</div>
	</div>
	<!-- End title bar -->







	<div id="page"><!-- - - - - - - - - - SECTION - - - - - - - - - -->

		<div class="pi-section-w pi-section-white">
			<div class="pi-section">

				<!-- Row -->
				<div class="pi-row">



					@foreach ($articulos_masvistos as $articulo)
					<?php
					$texto = $articulo->texto;
					$archivos = DB::table('archivos')
					->where('padre', '=', 'articulo')
					->where('padre_id', '=', $articulo->id)
					->first();

					if (preg_match('/^.{1,110}\b/s', $articulo->texto, $match))
					{ $texto = $match[0]; }
					$categoria = Categoria::find($articulo->categorias_id);
					?>


					<!-- Col 4 -->
					<div class="pi-col-xs-3">

						<!-- Post item -->
						<div class="pi-img-w pi-img-round-corners pi-img-shadow">
							<a href="/articulos/show/{{ $articulo->url_seo }}">
								@if (count($archivos)>0 )
								<img src="/uploads/crop/{{ $archivos->archivo }}" alt="">
								@endif
								<span class="pi-img-overlay pi-img-overlay-white">
								</span>
							</a>
						</div>

						<h2 class="h5 pi-margin-bottom-5">
							<a href="/articulos/show/{{ $articulo->url_seo }}" class="pi-link-dark">{{ $articulo->articulo }}</a>
						</h2>
						<ul class="pi-meta pi-margin-bottom-10">
							<li><i class="icon-clock"></i>{{ $articulo->created_at }}</li>
							<li><i class="icon-eye"></i>{{ $articulo->visitas }} visitas</li>
						</ul>
						<p>
							{{ $texto }}... <a href="/articulos/show/{{ $articulo->url_seo }}" class="pi-italic">Leer</a>
						</p>
						<!-- End post item -->

					</div>
					<!-- End col 4 -->


					@endforeach
				</div>
				<!-- End row -->
			</div>
		</div>
	</div>



</div>
</div>
</div>

<script src="/scripts/pi.counter.js"></script>
<script src="/scripts/pi.init.counter.js"></script>


@stop
