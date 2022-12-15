<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;
    protected $table = 'pet';
    protected $fillable = [
        'owner_id',
        'name',
        'dob',
        'species',
        'race',
        'color',
        'pattern',
        'age',
        'blood_type',
        'desexing'
    ];

    public function owner(){
        return $this->belongsTo(Owner::class, 'owner_id');
    }
}
