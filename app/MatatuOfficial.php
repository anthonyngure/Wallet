<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\MatatuOfficial
 *
 * @property int $id
 * @property int $user_id
 * @property int $matatu_id
 * @property string $role
 * @property string $driving_licence_number
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MatatuOfficial whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MatatuOfficial whereDrivingLicenceNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MatatuOfficial whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MatatuOfficial whereMatatuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MatatuOfficial whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MatatuOfficial whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MatatuOfficial whereUserId($value)
 * @mixin \Eloquent
 * @property-read \App\User $user
 * @property-read \App\Matatu $matatu
 */
class MatatuOfficial extends Model
{
    //
	
	protected $guarded = ['id'];
	
	protected $hidden = ['user_id', 'matatu_id'];
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
		return $this->belongsTo(User::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function matatu()
	{
		return $this->belongsTo(Matatu::class);
	}
	
}
