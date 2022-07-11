<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
{
    protected $table = 'category';
    protected $fillable = ['name'];
    use HasFactory;
    public function books(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Books::class);
    }
}
