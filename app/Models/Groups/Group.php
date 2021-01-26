<?php

namespace App\Models\Groups;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Groups\Group
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
 * @method static \Illuminate\Database\Eloquent\Builder|Group newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Group newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Group query()
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Group extends Model
{
    use HasFactory, CrudTrait;

    const PROVIDER_VK = 'Vk';
    const PROVIDER_YOUTUBE = 'Youtube';

    const SUPPORTED_GROUPS = [
        self::PROVIDER_VK,
        self::PROVIDER_YOUTUBE
    ];

    const LIST_GROUP = [
        self::PROVIDER_YOUTUBE => 'Youtube',
        self::PROVIDER_VK => 'Вконтакте'
    ];

    protected $fillable = [
        'name',
        'provider',
        'provider_id',
        'slug',
        'category'
    ];

    protected $casts = [
        'meta' => 'array'
    ];

    protected $attributes = [
        'meta' => '{}'
    ];

    public function getProviderAttribute($value)
    {
        return self::LIST_GROUP[$value];
    }
}
