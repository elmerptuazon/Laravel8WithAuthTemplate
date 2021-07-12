<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    use HasFactory;

    
      /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "order_details";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "order_number",
        "product_code",
        "quantity",
        "gross_sales",
    ];
}
