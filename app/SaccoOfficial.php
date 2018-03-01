<?php
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	
	/**
 * App\SaccoOfficial
 *
 * @property int                 $id
 * @property int                 $user_id
 * @property int                 $sacco_id
 * @property string              $title
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaccoOfficial whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaccoOfficial whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaccoOfficial whereSaccoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaccoOfficial whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaccoOfficial whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaccoOfficial whereUserId($value)
 * @mixin \Eloquent
 * @property string              $role
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaccoOfficial whereRole($value)
 * @property-read \App\User $user
 */
	class SaccoOfficial extends Model
	{
		//
		
		protected $guarded = ['id'];
		
		protected $hidden = ['sacco_id', 'user_id'];
		
		/**
		 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
		 */
		public function user()
		{
			return $this->belongsTo(User::class);
		}
	}
