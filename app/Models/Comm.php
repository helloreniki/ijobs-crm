<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comm extends Model
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

    public function scopeFilter($query, array $filters)
    {
        if ($filters['q'] ?? false) {
            $query->where('content', 'like', '%' . request('q') . '%');
        }

        // only comms with top rating companies, rating > 4

        $query->when($filters['topRatingCompany'] ?? false, fn($query) =>
            $query->whereHas('employee.company', fn($query) =>
                $query->where('my_rating', '>', '4')
            )
        );

    }
}
