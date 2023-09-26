<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

/**
 * App\Models\RoomType
 *
 * @property int $id
 * @property string $slug
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read null $translated
 * @property-read \Illuminate\Database\Eloquent\Collection|\TCG\Voyager\Models\Translation[] $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|RoomType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoomType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoomType query()
 * @method static \Illuminate\Database\Eloquent\Builder|RoomType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomType whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomType whereTranslation(string $field, string $operator, string $value = null, string $locales = null, string $default = true)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomType withTranslation($locale = null, $fallback = true)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomType withTranslations($locales = null, $fallback = true)
 * @mixin \Eloquent
 */
class RoomType extends Model
{
    use HasFactory, Translatable;

    protected $fillable = [
        'title',
        'slug',
    ];

    protected $translatable = ['title'];
}
