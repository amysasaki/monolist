<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['code', 'name', 'url', 'image_url'];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('type')->withTimestamps();
    }

    public function want_users()
    {
        return $this->users()->where('type', 'want');
    }
    
    public function count_want()
    {
        return $this->want_users()->count();
    }
    
    public function have_users()
    {
        return $this->users()->where('type', 'have');
    }
    
    public function count_have() 
     {
        return $this->have_users()->count();
    }
}