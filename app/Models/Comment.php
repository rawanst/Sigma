<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = "comments";
    protected $fillable = ['title', 'content', 'training'];

    public function getTraining(){
        return $this->belongsTo(Training::class, 'id', 'training');
    }

}
