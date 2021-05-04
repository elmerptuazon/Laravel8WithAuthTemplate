<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;

class Comment extends Model
{
    use UsesUuid, HasFactory;

    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "comments";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "post_id",
        "content",
        "author",
    ];
}
