<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumption extends Model
{
    use HasFactory;
    public $timestamps=false;

    protected $table = 'consumption';

    protected $fillable = [
        'idB',
        'date',
        'KW',
        'mc',
    ];

    public function building()
    {
        return $this->belongsTo(Building::class, 'idB');
    }
}