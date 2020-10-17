<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{
    use HasFactory;
    use SoftDeletes;

    const TYPE_PERSON = 'person';
    const TYPE_CORPORATE = 'corporate';
    const TYPES = [
        self::TYPE_PERSON,
        self::TYPE_CORPORATE
    ];

    protected $guarded = [];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
