<?php

class ProfesionalsController extends BaseController {


	/**
	* Display a listing of the resource.
	*
	* @return Response
	*/
	public function index()
	{


		$profesionals = DB::table('profesionals')
		->orderBy('id', 'dec')
		->paginate(10);

		return View::make('profesionals.index', array('profesionals' => $profesionals));

	}


	/**
	* Show the form for creating a new resource.
	*
	* @return Response
	*/
	public function create($id)
	{
		$profesionalscategorias_id = $id;

		$profesionalscategoria = Profesionalscategoria::find($id);

		return View::make('profesionals.create', array('profesionalscategorias_id' => $profesionalscategorias_id, 'profesionalscategoria' => $profesionalscategoria->profesionalscategoria));
	}

	/**
	* Store a newly created resource in storage.
	*
	* @return Response
	*/
	public function store()
	{

		// var_dump(Input::All());
		// die;
		//

		// 'categorias_id' => 'exists:rubros,id'

		$rules = [
			'profesionalscategorias_id' => 'required',
			'profesional' => 'required',
			'email' => 'required',
			'telefono' => 'required',

		];


		if (! Profesional::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Profesional::$errors);

		}

		$profesional = new Profesional;

		//$clasificado->users_id = Sentry::getUser()->id;
		$profesional->profesionalscategorias_id = Input::get('profesionalscategorias_id');
		$profesional->profesional = Input::get('profesional');
		$profesional->descripcion = Input::get('descripcion','');
		$profesional->direccion = Input::get('direccion','');
		$profesional->facebook = Input::get('facebook','');
		$profesional->twitter = Input::get('twitter','');
		$profesional->email = Input::get('email','');
		$profesional->instagram = Input::get('instagram','');
		$profesional->telefono = Input::get('telefono','');
		$profesional->horarioatencion = Input::get('horarioatencion','');
		$profesional->estado = 'publicado';

		$profesional->save();

		return Redirect::to('/profesionales/' . Input::get('profesionalscategoria','') );


	}

	/**
	* Display the specified resource.
	*
	* @param  int  $id
	* @return Response
	*/
	public function show($id)
	{


		// $clasificado = DB::table('clasificados')
		// 	->where('id', '=', $id)
		// 	->first();

		$clasificado = Clasificado::find($id);



		$clasificado->visitas++;
		$clasificado->save();
		// show the view and pass the nerd to it



		return View::make('clasificados.show', array(
			'clasificado' => $clasificado,
		));
	}




	/**
	* Show the form for editing the specified resource.
	*
	* @param  int  $id
	* @return Response
	*/
	public function edit($id)
	{
		$articulo = Articulo::find($id);
		$title = "Editar Articulo";

		return View::make('articulos.edit', array('title' => $title, 'articulo' => $articulo));
	}

	/**
	* Update the specified resource in storage.
	*
	* @param  int  $id
	* @return Response
	*/
	public function update($id)
	{



		$articulo = Articulo::find($id);

		// $rules = [
		// 	'articulo' => 'required|unique:articulos,articulo,' . $id,
		// 	'rubros_id' => 'exists:rubros,id',
		// 	'proveedors_id' => 'exists:proveedors,id',
		// 	'precio_base' => 'required|numeric',
		// 	'utilidad' => 'required|numeric',
		// 	'precio_publico' => 'required|numeric',
		// 	'iva' => 'required|numeric'
		// ];
		//
		//
		//
		// if (! Articulo::isValid(Input::all(),$rules)) {
		//
		// 	return Redirect::back()->withInput()->withErrors(Articulo::$errors);
		//
		// }


		$articulo->articulo = Input::get('articulo');
		$articulo->categorias_id = Input::get('categorias_id');
		$articulo->copete = Input::get('copete');
		$articulo->tipo = Input::get('tipo');
		$articulo->texto = Input::get('texto');

		$articulo->save();

		return Redirect::to('/articulos/ver');


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


		$clasificado = Clasificado::find($id)->delete();

		return Redirect::to('/clasificados');
	}


	/**
	* Remove the specified resource from storage.
	*
	* @param  int  $id
	* @return Response
	*/
	public function publicar($id)
	{

		$clasificado = Clasificado::find($id);
		$clasificado->estado = 'publicado';
		$clasificado->save();

		return Redirect::to('/clasificados');
	}


	/**
	* Remove the specified resource from storage.
	*
	* @param  int  $id
	* @return Response
	*/
	public function espera($id)
	{

		$clasificado = Clasificado::find($id);
		$clasificado->estado = 'espera';
		$clasificado->save();

		return Redirect::to('/clasificados');
	}





	/**
	* Display the specified resource.
	*
	* @param  int  $id
	* @return Response
	*/
	public function showcategorias()
	{


		$profesionalscategorias = DB::table('profesionalscategorias')
			->orderby('profesionalscategoria')
			->get();

		return View::make('profesionals.showcategorias', array(
			'profesionalscategorias' => $profesionalscategorias,
		));
	}


		/**
		* Display the specified resource.
		*
		* @param  int  $id
		* @return Response
		*/
		public function showall($profesionalscategoria)
		{


			$profesionalscategorias = DB::table('profesionalscategorias')
				->where('profesionalscategoria',$profesionalscategoria)
				->first();

				if ($profesionalscategorias) {

					$profesionalscategorias_id = $profesionalscategorias->id;

					$profesionals = DB::table('profesionals')
						->where('profesionalscategorias_id',$profesionalscategorias_id)
						->where('estado','publicado')
						->get();

						return View::make('profesionals.showall', array(
							'profesionals' => $profesionals,
							'profesionalscategoria' => $profesionalscategorias->profesionalscategoria,
							'profesionalscategorias_id' => $profesionalscategorias_id,
						));



				}

		}





		/**
		* Display the specified resource.
		*
		* @param  int  $id
		* @return Response
		*/
		public function showprofesional($id)
		{


			$profesional = DB::table('profesionals')
				->where('id',$id)
				->where('estado','publicado')
				->first();

				if ($profesional) {

					$id = $profesional->id;

					$profesional = Profesional::find($id);
					$profesional->visitas = $profesional->visitas + 1;
					$profesional->save();

					$profesionalscategorias = DB::table('profesionalscategorias')
						->where('id',$profesional->profesionalscategorias_id)
						->first();


						return View::make('profesionals.showprofesional', array(
							'profesional' => $profesional,
							'profesionalscategorias' => $profesionalscategorias,
						));



				}

		}

}
