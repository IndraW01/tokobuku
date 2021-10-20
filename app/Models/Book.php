<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['category'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function scopeFilter($query, $filters)
    {
        if($filters['search'] ?? false){
            $query->where(fn($query) => $query->where("judul", "like", "%" . $filters['search'] . "%"));
        }

    }
}
