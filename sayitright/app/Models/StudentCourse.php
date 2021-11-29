<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class StudentCourse
 * 
 * @property int $Id
 * @property int|null $CourseId
 * @property int|null $ProfessorId
 * @property int|null $StudentId
 *
 * @package App\Models
 */
class StudentCourse extends Model
{
	protected $table = 'StudentCourses';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Id' => 'int',
		'CourseId' => 'int',
		'ProfessorId' => 'int',
		'StudentId' => 'int'
	];

	protected $fillable = [
		'Id',
		'CourseId',
		'ProfessorId',
		'StudentId'
	];
}
