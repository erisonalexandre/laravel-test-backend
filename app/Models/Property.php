<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    const TYPE_PERSON = 'person';
    const TYPE_CORPORATE = 'corporate';
    const TYPES = [
        self::TYPE_PERSON => self::TYPE_PERSON,
        self::TYPE_CORPORATE => self::TYPE_CORPORATE
    ];
}
