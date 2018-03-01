<?php
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Database\Eloquent\SoftDeletes;
	
	/**
	 * App\MatatuTrip
	 *
	 * @property int                 $id
	 * @property int                 $matatu_id
	 * @property int                 $matatu_official_id
	 * @property float               $fare
	 * @property string              $start_time
	 * @property string              $start_address
	 * @property float               $start_latitude
	 * @property float               $start_longitude
	 * @property string              $destination_address
	 * @property float               $destination_latitude
	 * @property float               $destination_longitude
	 * @property string|null         $end_time
	 * @property string|null         $end_address
	 * @property float|null          $end_latitude
	 * @property float|null          $end_longitude
	 * @property \Carbon\Carbon|null $created_at
	 * @property \Carbon\Carbon|null $updated_at
	 * @property string|null         $delete_reason
	 * @property string|null         $delete_address
	 * @property float|null          $delete_latitude
	 * @property float|null          $delete_longitude
	 * @property \Carbon\Carbon|null $deleted_at
	 * @method static bool|null forceDelete()
	 * @method static \Illuminate\Database\Query\Builder|\App\MatatuTrip onlyTrashed()
	 * @method static bool|null restore()
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\MatatuTrip whereCreatedAt($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\MatatuTrip whereDeleteAddress($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\MatatuTrip whereDeleteLatitude($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\MatatuTrip whereDeleteLongitude($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\MatatuTrip whereDeleteReason($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\MatatuTrip whereDeletedAt($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\MatatuTrip whereDestinationAddress($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\MatatuTrip whereDestinationLatitude($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\MatatuTrip whereDestinationLongitude($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\MatatuTrip whereEndAddress($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\MatatuTrip whereEndLatitude($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\MatatuTrip whereEndLongitude($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\MatatuTrip whereEndTime($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\MatatuTrip whereFare($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\MatatuTrip whereId($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\MatatuTrip whereMatatuId($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\MatatuTrip whereMatatuOfficialId($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\MatatuTrip whereStartAddress($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\MatatuTrip whereStartLatitude($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\MatatuTrip whereStartLongitude($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\MatatuTrip whereStartTime($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\MatatuTrip whereUpdatedAt($value)
	 * @method static \Illuminate\Database\Query\Builder|\App\MatatuTrip withTrashed()
	 * @method static \Illuminate\Database\Query\Builder|\App\MatatuTrip withoutTrashed()
	 * @mixin \Eloquent
	 * @property string|null         $start_remarks
	 * @property string|null         $end_remarks
	 * @property string|null         $delete_remarks
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\MatatuTrip whereDeleteRemarks($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\MatatuTrip whereEndRemarks($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\MatatuTrip whereStartRemarks($value)
	 * @property int                 $start_stage_id
	 * @property int                 $destination_stage_id
	 * @property int                 $end_stage_id
	 * @property int                 $delete_stage_id
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\MatatuTrip whereDeleteStageId($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\MatatuTrip whereDestinationStageId($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\MatatuTrip whereEndStageId($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\MatatuTrip whereStartStageId($value)
	 */
	class MatatuTrip extends Model
	{
		//
		use SoftDeletes;
		
		protected $dates = ['deleted_at'];
		
		protected $guarded = ['id'];
		protected $hidden = [
			'matatu_id',
			'matatu_official_id',
			'start_stage_id',
			'end_stage_id',
			'delete_stage_id',
		];
		
		/**
		 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
		 */
		public function startStage()
		{
			return $this->belongsTo(Stage::class, 'start_stage_id');
		}
		
		/**
		 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
		 */
		public function endStage()
		{
			return $this->belongsTo(Stage::class, 'end_stage_id');
		}
		
		/**
		 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
		 */
		public function deleteStage()
		{
			return $this->belongsTo(Stage::class, 'delete_stage_id');
		}
	}
