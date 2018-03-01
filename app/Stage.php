<?php
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	
	/**
 * App\Route
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $address
 * @property float $latitude
 * @property float $longitude
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Stage whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Stage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Stage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Stage whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Stage whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Stage whereUpdatedAt($value)
 */
	class Stage extends Model
	{
		//
		protected $guarded = ['id'];
		
		protected $hidden = ['pivot'];
		
	}
