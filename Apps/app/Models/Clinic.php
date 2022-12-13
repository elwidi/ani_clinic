<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;

    protected $table = "klinik";
    protected $fillable = ['nama_klinik', 'alamat', 'no_tlp', 'operational_hours'];
}
