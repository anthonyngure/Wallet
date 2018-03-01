<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\UserTrip
 *
 * @property int $id
 * @property int $user_id
 * @property int $matatu_trip_id
 * @property string $start_name
 * @property float $start_latitude
 * @property float $start_longitude
 * @property string $end_name
 * @property float $end_latitude
 * @property float $end_longitude
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserTrip whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserTrip whereEndLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserTrip whereEndLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserTrip whereEndName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserTrip whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserTrip whereMatatuTripId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserTrip whereStartLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserTrip whereStartLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserTrip whereStartName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserTrip whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserTrip whereUserId($value)
 * @mixin \Eloquent
 */
class UserTrip extends Model
{
    //
}
