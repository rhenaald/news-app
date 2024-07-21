<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Make sure this is imported

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author', 'slug', 'body']; // Changed 'author' to 'author_id'

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
