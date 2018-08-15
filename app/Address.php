<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    // lấy ra các user cùng 1 address
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function scopeSeft($query)
    {
        return $query->pluck('address', 'id');
    }
}
