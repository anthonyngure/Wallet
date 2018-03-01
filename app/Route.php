<?php
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	
	/**
	 * App\Route
	 *
	 * @mixin \Eloquent
	 * @property int                 $id
	 * @property string              $name
	 * @property string              $number
	 * @property string              $pick_up_instructions
	 * @property \Carbon\Carbon|null $created_at
	 * @property \Carbon\Carbon|null $updated_at
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\Route whereCreatedAt($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\Route whereId($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\Route whereName($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\Route whereNumber($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\Route wherePickUpInstructions($value)
	 * @method static \Illuminate\Database\Eloquent\Builder|\App\Route whereUpdatedAt($value)
	 */
	class Route extends Model
	{
		//
		protected $guarded = ['id'];
		
		public function stages()
		{
			return $this->belongsToMany(Stage::class, 'route_stages');
		}
	}
