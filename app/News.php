<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title',
        'content',
        'avatar',
        'created_at',
        'updated_at',
    ];

    public function scopeGetNews($query)
    {
    	return $query->latest()->take(config('app.news'));
    }

    public function scopeGetNewsSide($query)
    {
        return $query->latest()->take(config('app.per_page'));
    }

    public function scopeSearch($query, $key)
    {
        return $query->where('title', 'like', $key . '%')->paginate(config('app.per_page'));
    }
}
