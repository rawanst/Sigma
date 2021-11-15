<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $table = "chapters";
    protected $fillable = ['title', 'description', 'number_of_chapter', 'training'];

    public function getTraining(){
        return $this->belongsTo(Training::class, 'id', 'training');
    }
}
