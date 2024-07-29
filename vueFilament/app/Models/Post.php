<?php

namespace App\Models;

use App\Models\Category;
use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'thumbnail'
    ];

    public function getImage()
    {
        return Media::where('id', $this->thumbnail)->first();
    }

    public function categories(): BelongsToMany
{
    return $this->belongsToMany(Category::class);
}
    //public function postImages(): BelongsTo
    //{
    //    return $this->belongsTo(PostImage::class, 'post_id', 'id');
    //}

}
