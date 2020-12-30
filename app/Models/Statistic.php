<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Statistic
 *
 * @property int $id
 * @property int $period_from
 * @property int $period_to
 * @property int $subscribe
 * @property int $unsubscribe
 * @property int $views
 * @property int $visitors
 * @property int $reach
 * @property int $reach_subscribers
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic query()
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic wherePeriodFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic wherePeriodTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic whereReach($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic whereReachSubscribers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic whereSubscribe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic whereUnsubscribe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic whereViews($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic whereVisitors($value)
 * @mixin \Eloquent
 */
class Statistic extends Model
{
    use HasFactory;
}
