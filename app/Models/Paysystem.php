<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

/**
 * App\Models\Paysystem
 *
 * @property int $id
 * @property int $order
 * @property string $title
 * @property string $slug
 * @property string $picture
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read null $translated
 * @property-read \Illuminate\Database\Eloquent\Collection|\TCG\Voyager\Models\Translation[] $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Paysystem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Paysystem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Paysystem query()
 * @method static \Illuminate\Database\Eloquent\Builder|Paysystem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paysystem whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paysystem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paysystem whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paysystem wherePicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paysystem whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paysystem whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paysystem whereTranslation(string $field, string $operator, string $value = null, string $locales = null, string $default = true)
 * @method static \Illuminate\Database\Eloquent\Builder|Paysystem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paysystem withTranslation($locale = null, $fallback = true)
 * @method static \Illuminate\Database\Eloquent\Builder|Paysystem withTranslations($locales = null, $fallback = true)
 * @mixin \Eloquent
 */
class Paysystem extends Model
{
    use HasFactory, Translatable;

    protected $translatable = ['title', 'description'];
}
