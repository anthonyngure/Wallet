<?php
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	
	/**
	 * App\Sacco
	 *
	 * @property int                                                                $id
	 * @property string                                                             $name
	 * @property string                                                             $address
	 * @property string                                                             $contact
	 * @property string                                                             $route
	 * @property \Carbon\Carbon|null                                                $created_at
	 * @property \Carbon\Carbon|null                                                $updated_at
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sacco whereAddress($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sacco whereContact($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sacco whereCreatedAt($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sacco whereId($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sacco whereName($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sacco whereRoute($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sacco whereUpdatedAt($value)
	 * @mixin \Eloquent
	 * @property string                                                             $email
	 * @property string                                                             $phone
	 * @property string                                                             $postal_address
	 * @property-read \Illuminate\Database\Eloquent\Collection|\App\SaccoOfficial[] $officials
	 * @property-read \Illuminate\Database\Eloquent\Collection|\App\SaccoRoute[]    $routes
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sacco whereEmail($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sacco wherePhone($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sacco wherePostalAddress($value)
	 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Matatu[]        $matatus
	 * @property int                                                                $route_id
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sacco whereRouteId($value)
	 */
	class Sacco extends Model
	{
		//
		
		protected $guarded = ['id'];
		
		/**
		 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
		 */
		public function route()
		{
			return $this->belongsTo(Route::class);
		}
		
		/**
		 * @return \Illuminate\Database\Eloquent\Relations\HasMany
		 */
		public function officials()
		{
			return $this->hasMany(SaccoOfficial::class);
		}
		
		
		/**
		 * @return \Illuminate\Database\Eloquent\Relations\HasMany
		 */
		public function matatus()
		{
			return $this->hasMany(Matatu::class);
		}
	}
