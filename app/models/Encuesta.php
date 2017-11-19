<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Encuesta extends Eloquent {

		protected $table = 'encuestas';

		protected $fillable = ['encuesta'];


	public static $errors;

	public static function isValid($data, $rules)
		{

			$validation = Validator::make($data, $rules);

			if ($validation->passes()) return true;

				static::$errors = $validation->messages();

			return false;
		}





}
