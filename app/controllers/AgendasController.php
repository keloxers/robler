<?php

class AgendasController extends BaseController {


	/**
	* Display a listing of the resource.
	*
	* @return Response
	*/
	public function index()
	{


		$agendas = DB::table('agendas')
		->orderBy('fecha', 'dec')
		->paginate(20);

		return View::make('agendas.index', array('agendas' => $agendas));

	}


	/**
	* Show the form for creating a new resource.
	*
	* @return Response
	*/
	public function create()
	{
		return View::make('agendas.create');
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
			'fecha' => 'required|datetime',
			'agenda' => 'required',
		];


		if (! Agenda::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Agenda::$errors);

		}

		$agenda = new Agenda;

		$agenda->fecha = Input::get('fecha');
		$agenda->agenda = Input::get('agenda');

		$agenda->save();

		return Redirect::to('/agendas');

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

		$agenda = Agenda::find($id);

		return View::make('agendas.show', array(
			'agenda' => $agenda,
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
		$agenda = Agenda::find($id);
		$title = "Editar Agenda";

		return View::make('agendas.edit', array('title' => $title, 'agenda' => $agenda));
	}

	/**
	* Update the specified resource in storage.
	*
	* @param  int  $id
	* @return Response
	*/
	public function update($id)
	{



		$agenda = Agenda::find($id);

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


		$agenda->fecha = Input::get('fecha');
		$agenda->agenda = Input::get('agenda');

		$agenda->save();

		return Redirect::to('/agendas');


	}

	/**
	* Remove the specified resource from storage.
	*
	* @param  int  $id
	* @return Response
	*/
	public function destroy($id)
	{

		$agenda = Agenda::find($id)->delete();

		return Redirect::to('/agendas');
	}



}
