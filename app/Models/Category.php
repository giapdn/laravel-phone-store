<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static find(string $id)
 *
 */
class Category extends Model
{
    use HasFactory;

    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
