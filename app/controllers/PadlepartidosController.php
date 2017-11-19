<?php

class PadlepartidosController extends BaseController {


	/**
	* Display a listing of the resource.
	*
	* @return Response
	*/
	public function index()
	{


		$padlepartidos = DB::table('padlepartidos')
		->orderBy('id', 'asc')
		->paginate(30);

		return View::make('padlepartidos.index', array('padlepartidos' => $padlepartidos));

	}


	/**
	* Show the form for creating a new resource.
	*
	* @return Response
	*/
	public function create()
	{
		return View::make('padlepartidos.create');
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
			'padlejugador' => 'required',
		];


		if (! Padlejugador::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Padlejugador::$errors);

		}

		$padlejugador = new Padlejugador;

		$padlejugador->padlecategorias_id = Input::get('padlecategorias_id');
		$padlejugador->padlejugador = Input::get('padlejugador');

		$padlejugador->save();





		return Redirect::to('/padlejugadors');

	}

	/**
	* Display the specified resource.
	*
	* @param  int  $id
	* @return Response
	*/
	public function show($id)
	{


		// $turno = DB::table('turnos')
		// 	->where('id', '=', $id)
		// 	->first();

		$padlejugador = Padlejugador::find($id);

		return View::make('padlejugadors.show', array(
			'padlejugador' => $padlejugador,
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
		$padlejugador = Padlejugador::find($id);
		$title = "Editar Jugador";

		return View::make('padlejugadors.edit', array('title' => $title, 'padlejugador' => $padlejugador));
	}

	/**
	* Update the specified resource in storage.
	*
	* @param  int  $id
	* @return Response
	*/
	public function update($id)
	{



		$padlejugador = Padlejugador::find($id);


				$rules = [
					'padlejugador' => 'required',
				];


				if (! Padlejugador::isValid(Input::all(),$rules)) {

					return Redirect::back()->withInput()->withErrors(Padlejugador::$errors);

				}


				$padlejugador->padlecategorias_id = Input::get('padlecategorias_id');
				$padlejugador->padlejugador = Input::get('padlejugador');

				$padlejugador->save();





				return Redirect::to('/padlejugadors');


	}

	/**
	* Remove the specified resource from storage.
	*
	* @param  int  $id
	* @return Response
	*/
	public function destroy($id)
	{

		$turno = Turno::find($id)->delete();

		return Redirect::to('/turnos');
	}



}
