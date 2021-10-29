<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatTraining extends Model
{
    use HasFactory;

    protected $table = 'cat_training';
    public $timestamps = false;
    protected $fillable = ['categoryId', 'trainingId'];
}
