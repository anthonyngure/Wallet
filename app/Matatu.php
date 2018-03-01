<?php
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	
	/**
 * App\Matatu
 *
 * @property int                                                                 $id
 * @property string                                                              $licence_plate
 * @property string                                                              $seats_capacity
 * @property string                                                              $name
 * @property string                                                              $color
 * @property \Carbon\Carbon|null                                                 $created_at
 * @property \Carbon\Carbon|null                                                 $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Matatu whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Matatu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Matatu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Matatu whereLicencePlate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Matatu whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Matatu whereSeatsCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Matatu whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int                                                                 $sacco_id
 * @property string                                                              $image
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Matatu whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Matatu whereSaccoId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\MatatuOfficial[] $officials
 * @property-read \App\Sacco $sacco
 */
	class Matatu extends Model
	{
		//
		protected $guarded = ['id'];
		protected $hidden = ['sacco_id'];
		
		/**
		 * @return \Illuminate\Database\Eloquent\Relations\HasMany
		 */
		public function officials()
		{
			return $this->hasMany(MatatuOfficial::class);
		}
		
		/**
		 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
		 */
		public function sacco()
		{
			return $this->belongsTo(Sacco::class);
		}
	}
