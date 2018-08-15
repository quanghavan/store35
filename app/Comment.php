<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // lấy ra product được comment
    public function product() 
    {
        return $this->belongsTo(Product::class);
    }

    //
    public function user() 
    {
        return $this->belongsTo(User::class);
    }
    //
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function scopeGetReply($query, $id)
    {
        return $query->where('parent_id', $id);
    }

    public function scopeGetReplyId($query, $id)
    {
        return $query->where('parent_id', $id)->pluck($id);
    }
}
