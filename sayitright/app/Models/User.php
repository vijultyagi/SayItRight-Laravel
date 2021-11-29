<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $Id
 * @property string $Name
 * @property string $PhoneNo
 * @property string $Email
 * @property string|null $Address
 * @property string|null $NameRecordingPath
 * @property string $UserName
 * @property string $Password
 * @property int $UserType
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'Users';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Id' => 'int',
		'UserType' => 'int'
	];

	protected $fillable = [
		'Id',
		'Name',
		'PhoneNo',
		'Email',
		'Address',
		'NameRecordingPath',
		'UserName',
		'Password',
		'UserType'
	];
}
