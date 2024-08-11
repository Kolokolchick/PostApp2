<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'author_id'];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function scopeFilterByAll($query, array $filters)
    {
        if (isset($filters['title'])) {
            $query->where('title', 'like', '%' . $filters['title'] . '%');
        }

        if (isset($filters['body'])) {
            $query->where('body', 'like', '%' . $filters['body'] . '%');
        }

        if (isset($filters['author_id'])) {
            $query->where('author_id', $filters['author_id']);
        }

        if (isset($filters['created_at'])) {
            $query->whereDate('created_at', $filters['created_at']);
        }

        if (isset($filters['updated_at'])) {
            $query->whereDate('updated_at', $filters['updated_at']);
        }

        return $query;
    }

    public function scopeSortBy($query, $sortBy, $sortOrder = 'asc')
    {
        if ($sortBy && in_array($sortBy, $this->fillable)) {
            return $query->orderBy($sortBy, $sortOrder);
        }
        
        return $query->orderBy('created_at', 'desc');
    }
}
