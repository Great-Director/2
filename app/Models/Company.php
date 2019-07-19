<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 13 Jul 2019 18:36:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Company
 * 
 * @property string $name
 * @property string $grade
 * @property string $type
 * @property string $other
 *
 * @package App\Models
 */
class Company extends Eloquent
{
	protected $table = 'company';
	protected $primaryKey = 'name';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'grade',
		'type',
		'other'
	];
}
