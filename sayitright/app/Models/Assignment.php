<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Assignment
 * 
 * @property int $Id
 * @property string|null $Topic
 * @property string|null $Description
 * @property string|null $DueDate
 * @property float|null $Points
 * @property int|null $CourseId
 *
 * @package App\Models
 */
class Assignment extends Model
{
	protected $table = 'Assignment';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Id' => 'int',
		'Points' => 'float',
		'CourseId' => 'int'
	];

	protected $fillable = [
		'Id',
		'Topic',
		'Description',
		'DueDate',
		'Points',
		'CourseId'
	];
}
