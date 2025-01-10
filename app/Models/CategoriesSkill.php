<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesSkill extends Model
{
    use HasFactory;

    protected $fillable = ['category_name'];
    public function skills()
    {
         return $this->hasMany(Skill::class, 'category_id');
    }
}