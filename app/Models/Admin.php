<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 08 Jul 2018 22:55:29 +0800.
 */

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class Admin
 * 
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $head_img
 * @property string $password
 * @property string $uuid
 * @property int $status
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Admin extends Authenticatable
{
	protected $casts = [
		'status' => 'int'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'username',
		'email',
		'head_img',
		'password',
		'uuid',
		'status',
		'remember_token'
	];
}
