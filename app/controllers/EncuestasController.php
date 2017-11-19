<?php

class EncuestasController extends BaseController {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

				$title = "Encuestas";
        $encuestas = DB::table('encuestas')
													->orderBy('id', 'desc')->paginate(10);
        return View::make('encuestas.index', array('encuestas' => $encuestas, 'title' => $title));

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('banners.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{


		$rules = [
			'empresa' => 'required',
			'file' => 'required',
		];


		if (! Banner::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Banner::$errors);

		}

		$banner = new Banner;

		$banner->empresa = Input::get('empresa');
		$banner->file = Input::get('file');
		$banner->link = Input::get('link');
		$banner->posicion = Input::get('posicion');
		$banner->activo = Input::get('activo');


		$banner->save();

		return Redirect::to('/banners');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($url_seo)
	{

		$page = DB::table('banners')->where('url_seo', '=', $url_seo)->first();;

		$id = $page->id;

		$page = Page::find($id);

		$page->visitas++;
		$page->save();

		// show the view and pass the nerd to it

		return View::make('pages.show', array(
											'page' => $page));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$banner = Banner::find($id);
		$title = "Editar Banner";

        return View::make('banners.edit', array('title' => $title, 'banner' => $banner));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$banner = Banner::find($id);


		$rules = [
			'empresa' => 'required',
			'file' => 'required',
		];


		if (! Banner::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Banner::$errors);

		}

		$banner->empresa = Input::get('empresa');
		$banner->file = Input::get('file');
		$banner->link = Input::get('link');
		$banner->posicion = Input::get('posicion');
		$banner->activo = Input::get('activo');


		$banner->save();

		return Redirect::to('/banners');


	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

		$input = Input::all();


		$banner = Banner::find($id)->delete();

		return Redirect::to('/banners');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function votar($id)
	{

		if ( Auditoriavoto::voto() ) {

			$respuesta = Respuesta::find($id);

			$auditoriavoto = new Auditoriavoto;

			$ip = Auditoriavoto::get_client_ip();
			$os = Auditoriavoto::get_client_os();
			$browser = Auditoriavoto::get_client_browser();

			$sess = Session::getId();

			$auditoriavoto->ip = $ip;
			$auditoriavoto->encuestas_id = $respuesta->encuestas_id;
			$auditoriavoto->respuestas_id = $id;
			$auditoriavoto->os = $os;
			$auditoriavoto->browser = $browser;
			$auditoriavoto->session = $sess;
			$auditoriavoto->cookie = str_random(12);

			$auditoriavoto->save();

			setcookie("cookie_vv", $auditoriavoto->cookie, 2147483647);
			setcookie("cookie_id", $auditoriavoto->id, 2147483647);



		}


		return Redirect::to('/');
	}





}
