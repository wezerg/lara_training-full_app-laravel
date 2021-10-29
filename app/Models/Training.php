<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;
    protected $table = 'training';
    protected $fillable = ['name', 'description', 'price', 'image', 'typeId', 'userId'];

    public function getOwner(){
        return $this->hasOne(User::class, 'id', 'userId');
    }

    public function getChapter(){
        return $this->hasMany(Chapter::class, 'trainingId', 'id');
    }

    public function getCategory(){
        return $this->belongsToMany(Category::class, 'cat_training', 'trainingId', 'categoryId');
    }

    public function getType(){
        return $this->hasOne(Type::class, 'id', 'typeId');
    }
}
