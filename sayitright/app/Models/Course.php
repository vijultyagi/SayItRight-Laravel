<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Course
 * 
 * @property int $Id
 * @property string|null $Name
 * @property string|null $Description
 * @property string|null $Days
 * @property string|null $Timings
 *
 * @package App\Models
 */
class Course extends Model
{
	protected $table = 'Courses';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Id' => 'int'
	];

	protected $fillable = [
		'Id',
		'Name',
		'Description',
		'Days',
		'Timings'
	];
}
