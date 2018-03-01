<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\RouteStage
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $route_id
 * @property int $stage_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RouteStage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RouteStage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RouteStage whereRouteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RouteStage whereStageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RouteStage whereUpdatedAt($value)
 */
class RouteStage extends Model
{
    //
}
