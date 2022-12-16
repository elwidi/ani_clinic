<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitBill extends Model
{
    use HasFactory;

    protected $table = 'visit_bill_item';
    protected $fillable = ['visit_id', 'bill_id', 'qty', 'total', 'notes'];

    // public function petVisit(){
    //     return $this->belongsTo(PetVisit::class, 'visit_id');
    // }
}
