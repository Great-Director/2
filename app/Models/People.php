<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 13 Jul 2019 18:35:09 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class People
 * 
 * @property int $p_id
 * @property string $name
 * @property string $gender
 * @property string $national
 * @property int $age
 * @property string $id_card
 * @property string $address
 * @property string $edu
 * @property string $major
 * @property string $collage
 * @property \Carbon\Carbon $sta
 * @property string $degree
 * @property string $title
 * @property string $title_num
 * @property \Carbon\Carbon $title_time
 * @property string $reg_num1
 * @property string $reg
 * @property string $reg_num
 * @property \Carbon\Carbon $reg_sta
 * @property \Carbon\Carbon $reg_end
 * @property string $tel_num
 * @property string $other
 * @property \Carbon\Carbon $ent_time
 * @property \Carbon\Carbon $con_start
 * @property \Carbon\Carbon $con_end
 * @property \Carbon\Carbon $con_for
 * @property string $depar
 * @property string $p_com
 * @property string $onjob
 * @property int $now_num
 *
 * @package App\Models
 */
class People extends Eloquent
{
	protected $table = 'peoples';
	protected $primaryKey = 'name';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'p_id' => 'int',
		'age' => 'int',
		'now_num' => 'int'
	];

	protected $dates = [
		'sta',
		'title_time',
		'reg_sta',
		'reg_end',
		'ent_time',
		'con_start',
		'con_end',
		'con_for'
	];

	protected $fillable = [
		'p_id',
		'gender',
		'national',
		'age',
		'id_card',
		'address',
		'edu',
		'major',
		'collage',
		'sta',
		'degree',
		'title',
		'title_num',
		'title_time',
		'reg_num1',
		'reg',
		'reg_num',
		'reg_sta',
		'reg_end',
		'tel_num',
		'other',
		'ent_time',
		'con_start',
		'con_end',
		'con_for',
		'depar',
		'p_com',
		'onjob',
		'now_num',
	
		//'img'
	];

	public function setImgAttribute($img)
{
    if (is_array($img)) {
        $this->attributes['img'] = json_encode($img);
    }
}

 public function getImgAttribute($img)
 {
     return json_decode($img, true);
 }
}
