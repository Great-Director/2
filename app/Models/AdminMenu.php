<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 13 Jul 2019 18:33:42 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AdminMenu
 * 
 * @property int $id
 * @property int $parent_id
 * @property int $order
 * @property string $title
 * @property string $icon
 * @property string $uri
 * @property string $permission
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class AdminMenu extends Eloquent
{
	protected $table = 'admin_menu';

	protected $casts = [
		'parent_id' => 'int',
		'order' => 'int'
	];

	protected $fillable = [
		'parent_id',
		'order',
		'title',
		'icon',
		'uri',
		'permission'
	];
}
