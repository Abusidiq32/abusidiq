<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioCategory extends Model
{
    use HasFactory;
    public function items()
    {
        return $this->hasMany(PortfolioItem::class, 'category_id');
    }
}
