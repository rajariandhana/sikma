<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Preset extends Model
{
    use HasFactory;
    protected $fillable=['price','category_id'];
    public function category(): BelongsTo{
        return $this->belongsTo(Category::class);
    }
}
