<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AssignmentSubmission
 * 
 * @property int $Id
 * @property int|null $AssignmentId
 * @property int|null $StudentId
 * @property Carbon|null $SubmittedOn
 * @property float|null $Points
 *
 * @package App\Models
 */
class AssignmentSubmission extends Model
{
	protected $table = 'AssignmentSubmission';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Id' => 'int',
		'AssignmentId' => 'int',
		'StudentId' => 'int',
		'Points' => 'float'
	];

	protected $dates = [
		'SubmittedOn'
	];

	protected $fillable = [
		'Id',
		'AssignmentId',
		'StudentId',
		'SubmittedOn',
		'Points'
	];
}
