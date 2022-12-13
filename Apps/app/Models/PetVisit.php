<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetVisit extends Model
{
    use HasFactory;

    protected $table = 'pet_visit_detail';
    protected $fillable = ['pet_id', 'vet_id', 'prognosis', 'weight', 'temperature', 'diagnose', 'note', 'admin_id', 'visit_date', 'status'];


    public function pet(){
        return $this->belongsTo(Pet::class, 'pet_id');
    }

    public function vet(){
        return $this->belongsTo(Vet::class, 'vet_id');
    }
}
