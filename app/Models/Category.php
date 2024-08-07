<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'name', 
        'slug', 
        'color', 
        ]; 

    protected $hidden =[];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
