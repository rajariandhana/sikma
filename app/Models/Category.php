<?php

namespace App\Models;

use App\Models\Entry;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;
    protected $fillable=['name','color'];
    public function entries(): HasMany{
        return $this->hasMany(Entry::class);
    }
}
