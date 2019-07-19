<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 13 Jul 2019 18:36:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Contact
 * 
 * @property int $id
 * @property string $name
 * @property string $gender
 * @property \Carbon\Carbon $age
 * @property int $tel
 * @property string $company
 * @property string $other
 *
 * @package App\Models
 */
class Contact extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'tel' => 'int'
	];

	protected $dates = [
		'age'
	];

	protected $fillable = [
		'name',
		'gender',
		'age',
		'tel',
		'company',
		'other'
	];
}
