<?php


namespace App\Models\Groups;


use Illuminate\Database\Eloquent\Builder;

/**
 * App\Models\Groups\GroupVK
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
 * @method static Builder|GroupVK newModelQuery()
 * @method static Builder|GroupVK newQuery()
 * @method static Builder|GroupVK query()
 * @method static Builder|GroupVK whereCategory($value)
 * @method static Builder|GroupVK whereCreatedAt($value)
 * @method static Builder|GroupVK whereId($value)
 * @method static Builder|GroupVK whereMeta($value)
 * @method static Builder|GroupVK whereName($value)
 * @method static Builder|GroupVK whereProvider($value)
 * @method static Builder|GroupVK whereProviderId($value)
 * @method static Builder|GroupVK whereSlug($value)
 * @method static Builder|GroupVK whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class GroupVK extends Group
{
    protected $table = 'groups';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function (Builder $query) {
            return $query->where('type', '=', Group::TYPE_VK);
        });
    }
}
