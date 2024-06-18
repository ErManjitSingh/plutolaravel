<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActivityPrice extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'start_date', 'end_date', 'actual_price', 'sale_price', 'discount_price'];

    public function product()
    {
       return $this->belongsTo(Product::class);
    }
}
