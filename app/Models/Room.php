<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

/**
 * App\Models\Room
 *
 * @property int $id
 * @property string $slug
 * @property string $fd24_id
 * @property string $title
 * @property string $description
 * @property int $order
 * @property string $pictures
 * @property int $category_id
 * @property int|null $room_type_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Feature[] $features
 * @property-read int|null $features_count
 * @property-read null $translated
 * @property-read \Illuminate\Database\Eloquent\Collection|\TCG\Voyager\Models\Translation[] $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Room newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Room newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Room query()
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereFd24Id($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room wherePictures($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereRoomTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereTranslation(string $field, string $operator, string $value = null, string $locales = null, string $default = true)
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room withTranslation($locale = null, $fallback = true)
 * @method static \Illuminate\Database\Eloquent\Builder|Room withTranslations($locales = null, $fallback = true)
 * @mixin \Eloquent
 */
class Room extends Model
{
    use HasFactory, Translatable;

    protected $translatable = ['title', 'description'];

    protected $fillable = [
        'title',
        'slug',
        'order',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function room_type()
    {
        return $this->belongsTo(RoomType::class);
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class);
    }
}
