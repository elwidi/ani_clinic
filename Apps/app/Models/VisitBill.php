<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitBill extends Model
{
    use HasFactory;

    protected $table = 'visit_bill';
    protected $fillable = ['pet_visit_id', 'payment_status', 'paid_with', 'account_no', 'payment_date'];


    public function petVisit(){
        return $this->belongsTo(PetVisit::class, 'visit_id');
    }

    public function billDetail(){
        return $this->hasMany(VisitBillDetail::class, 'visit_bill_id');
    }
}
