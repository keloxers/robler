<?php

class TurnosController extends BaseController {


	/**
	* Display a listing of the resource.
	*
	* @return Response
	*/
	public function index()
	{


		$turnos = DB::table('turnos')
		->orderBy('fecha', 'dec')
		->paginate(20);

		return View::make('turnos.index', array('turnos' => $turnos));

	}


	/**
	* Show the form for creating a new resource.
	*
	* @return Response
	*/
	public function create()
	{
		return View::make('turnos.create');
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
			'fecha' => 'required|date',
			'turno' => 'required',
		];


		if (! Turno::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Turno::$errors);

		}

		$turno = new Turno;

		$turno->fecha = Input::get('fecha');
		$turno->turno = Input::get('turno');

		$turno->save();





		return Redirect::to('/turnos');

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

		$turno = Turno::find($id);

		return View::make('turnos.show', array(
			'turno' => $turno,
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
		$turno = Turno::find($id);
		$title = "Editar Turno";

		return View::make('turnos.edit', array('title' => $title, 'turno' => $turno));
	}

	/**
	* Update the specified resource in storage.
	*
	* @param  int  $id
	* @return Response
	*/
	public function update($id)
	{



		$turno = Turno::find($id);

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


		$turno->fecha = Input::get('fecha');
		$turno->turno = Input::get('turno');

		$turno->save();

		return Redirect::to('/turnos');


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
