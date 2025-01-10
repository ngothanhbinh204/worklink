<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $category_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Skill> $skills
 * @property-read int|null $skills_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoriesSkill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoriesSkill newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoriesSkill query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoriesSkill whereCategoryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoriesSkill whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoriesSkill whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoriesSkill whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CategoriesSkill extends Model
{
    use HasFactory;

    protected $fillable = ['category_name'];
    public function skills()
    {
         return $this->hasMany(Skill::class, 'category_id');
    }
}