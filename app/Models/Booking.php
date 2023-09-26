<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Booking
 *
 * @property int $id
 * @property string|null $fd24_id
 * @property int|null $contact_id
 * @property int|null $paysystem_id
 * @property string $date_in
 * @property string $date_out
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Booking newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Booking newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Booking query()
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereContactId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereDateIn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereDateOut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereFd24Id($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking wherePaysystemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Booking whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'fd24_id',
    ];

    public $additional_attributes = ['count', 'total'];

    public function rooms() {
        return $this->belongsToMany(Room::class);
    }

    public function paysystem() {
        return $this->belongsTo(Paysystem::class);
    }

    public function contact() {
        return $this->belongsTo(Contact::class);
    }

    public function getCountAttribute() {
        $count = 0;
        $this->rooms()->withPivot(['count'])->get()->each(function ($room) use (&$count) {$count += $room->pivot->count;});

        return $count;
    }

    public function getTotalAttribute() {
        $total = 0;
        $this->rooms()->withPivot(['count', 'price'])->get()->each(function ($room) use (&$total) {$total += $room->pivot->count * $room->pivot->price;});

        return $total;
    }
}
