<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comms extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'content',
        'type',
        'date',
        'date_of_next_contact'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
