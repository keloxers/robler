<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Agenda extends Eloquent {

		protected $table = 'agendas';

		protected $fillable = ['agenda'];


	public static $errors;

	public static function isValid($data, $rules)
		{

			$validation = Validator::make($data, $rules);

			if ($validation->passes()) return true;

				static::$errors = $validation->messages();

			return false;
		}


}
