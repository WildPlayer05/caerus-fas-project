<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;
    public $timestamps=false;

    protected $table = 'building';

    protected $fillable = [
        'city',
        'CAP',
        'street',
        'civicNumber',
        'idU',
        'nEmployees',
        'surface',
    ];

    // 🔗 relazione: un building appartiene a un user
    public function user()
    {
        return $this->belongsTo(User::class, 'idU');
    }

    // 🔗 relazione: un building ha molte consumption
    public function consumptions()
    {
        return $this->hasMany(Consumption::class, 'idB');
    }
}