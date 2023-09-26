<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

/**
 * App\Models\Localization
 *
 * @property int $id
 * @property string $slug
 * @property string $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read null $translated
 * @property-read \Illuminate\Database\Eloquent\Collection|\TCG\Voyager\Models\Translation[] $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Localization newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Localization newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Localization query()
 * @method static \Illuminate\Database\Eloquent\Builder|Localization whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Localization whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Localization whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Localization whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Localization whereTranslation(string $field, string $operator, string $value = null, string $locales = null, string $default = true)
 * @method static \Illuminate\Database\Eloquent\Builder|Localization whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Localization withTranslation($locale = null, $fallback = true)
 * @method static \Illuminate\Database\Eloquent\Builder|Localization withTranslations($locales = null, $fallback = true)
 * @mixin \Eloquent
 */
class Localization extends Model
{
    use HasFactory, Translatable;

    protected $translatable = ['text'];
}
