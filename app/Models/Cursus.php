<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cursus extends Model
{
    use HasFactory;

    protected $table = 'cursus';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'location'
    ];
}
