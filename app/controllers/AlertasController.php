<?php

class AlertasController extends BaseController {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

				$title = "Alertas";
        $alertas = DB::table('alertas')
													->orderBy('id', 'desc')->paginate(20);
        return View::make('alertas.index', array('alertas' => $alertas, 'title' => $title));

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('alertas.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{


		$rules = [
			'alerta' => 'required',
			'mensaje' => 'required',
		];


		if (! Alerta::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Alerta::$errors);

		}

		$alerta = new Alerta;

		$alerta->alerta = Input::get('alerta');
		$alerta->mensaje = Input::get('mensaje');


		$alerta->save();

		return Redirect::to('/alertas');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		$alerta = Alerta::find($id);


		return View::make('alertas.show', array(
											'alerta' => $alerta));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$alerta = Alerta::find($id);
		$title = "Editar Alerta";

        return View::make('alertas.edit', array('title' => $title, 'alerta' => $alerta));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$alerta = Alerta::find($id);


		$rules = [
			'alerta' => 'required',
			'mensaje' => 'required',
		];


		if (! Alerta::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Alerta::$errors);

		}

		$alerta->alerta = Input::get('alerta');
		$alerta->mensaje = Input::get('mensaje');

		$alerta->save();

		return Redirect::to('/alertas');


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


		$alerta = Alerta::find($id)->delete();

		return Redirect::to('/alertas');
	}






}
