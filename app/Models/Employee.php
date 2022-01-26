<?php

namespace App\Models;

use App\Models\Comms;
use App\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id', 'name', 'email', 'notes'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function comms()
    {
        return $this->hasMany(Comms::class);
    }
}
