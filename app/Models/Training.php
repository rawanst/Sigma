<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $table = "trainings";
    protected $fillable = ['title', 'extract', 'description',  'picture', 'price', 'published_on', 'user'];


    public function user()
    {
        return $this->hasOne(User::class,'id','user');
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class,'trainings_categories','training', 'category');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class,'training','id');
    }
    public function countComments()
    {
        return sizeof($this->comments);
    }
    public function chapters()
    {
        return $this->hasMany(Chapter::class,'training','id');
    }
    public function countChapters()
    {
        return sizeof($this->chapters);
    }
    public function types()
    {
        return $this->belongsToMany(Type::class,'trainings_types','training', 'type');
    }

}
