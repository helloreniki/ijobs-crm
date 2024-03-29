<?php

namespace App\Models;

use App\Models\Skill;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
       'name', 'email', 'address', 'country', 'website', 'contacted', 'my_rating', 'notes'
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['company_name'] ?? false, fn($query, $searchTearm) =>
            $query->where('name', 'like', '%' . $searchTearm . '%')
        );


        $sortDirection = request('sortByRating'); // asc / desc

        // if($sortAsc){ $direction = 'true'; } else { $sortDirection = 'desc'; }

        $query->when($filters['sortByRating'] ?? false, fn($query, $sortDirection) =>
            $query->orderBy('my_rating', $sortDirection)
        );

        $query->when($filters['sortByName'] ?? false, fn($query, $sortDirectionName) =>
            $query->orderBy('name', $sortDirectionName)
        );
    }

}
