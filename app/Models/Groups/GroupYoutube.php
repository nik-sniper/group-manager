<?php


namespace App\Models\Groups;


use Illuminate\Database\Eloquent\Builder;

/**
 * App\Models\Groups\GroupYoutube
 *
 * @property int $id
 * @property string $name
 * @property string $provider_id
 * @property string $provider
 * @property string|null $slug
 * @property string|null $category
 * @property array $meta
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static Builder|GroupYoutube newModelQuery()
 * @method static Builder|GroupYoutube newQuery()
 * @method static Builder|GroupYoutube query()
 * @method static Builder|GroupYoutube whereCategory($value)
 * @method static Builder|GroupYoutube whereCreatedAt($value)
 * @method static Builder|GroupYoutube whereId($value)
 * @method static Builder|GroupYoutube whereMeta($value)
 * @method static Builder|GroupYoutube whereName($value)
 * @method static Builder|GroupYoutube whereProvider($value)
 * @method static Builder|GroupYoutube whereProviderId($value)
 * @method static Builder|GroupYoutube whereSlug($value)
 * @method static Builder|GroupYoutube whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class GroupYoutube extends Group
{
    protected $table = 'groups';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function (Builder $query) {
            return $query->where('type', '=', Group::TYPE_YOUTUBE);
        });
    }
}
