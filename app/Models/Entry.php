<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','price','description','date'];
    public function category(): BelongsTo{
        return $this->belongsTo(Category::class);
    }
}
