<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use illuminate\Support\Str;

class Question extends Model
{
    protected $fillable = ['title','slug','body','category_id','user_id'];
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getPathAttribute()
    {
        return asset("api/question/$this->slug");
    }

    // public function setSlugAttribute(Request $request)
    // {
    //     $this->attributes['slug'] = str::slug($request->title);
    // }
}