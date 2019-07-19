<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 13 Jul 2019 18:35:55 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Project
 * 
 * @property string $peo_name
 * @property int $pro_id
 * @property \Carbon\Carbon $pro_time
 * @property string $pro_name
 * @property string $por_type
 * @property string $pro_region
 * @property string $pro_intro
 * @property float $pro_area
 * @property float $pro_money
 * @property string $pro_num
 * @property string $pro_state
 * @property string $des_com
 * @property string $company
 * @property string $members
 * @property string $con_sta
 * @property string $propor
 * @property float $invo
 * @property float $colle
 * @property string $other
 * @property string $sign
 * @property string $veri
 * @property string $reco
 *
 * @package App\Models
 */
class Project extends Eloquent
{
	protected $table = 'project';
	protected $primaryKey = 'pro_id';
	public $timestamps = false;

	protected $casts = [
		'pro_area' => 'float',
		'pro_money' => 'float',
		'invo' => 'float',
		'colle' => 'float'
	];

	protected $dates = [
		'pro_time'
	];

	protected $fillable = [
		'peo_name',
		'pro_time',
		'pro_name',
		'por_type',
		'pro_region',
		'pro_intro',
		'pro_area',
		'pro_money',
		'pro_num',
		'pro_state',
		'des_com',
		'company',
		'members',
		'con_sta',
		'propor',
		'invo',
		'colle',
		'other',
		'sign',
		'veri',
		'reco'
	];

	// public function getMembersAttribute($value)
   // {
   //     return explode(',', $value);
   // }

    public function setMembersAttribute($value)
    {
        $this->attributes['members'] = implode(',', $value);
    }
}

