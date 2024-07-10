<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;
class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'photo_path',
        'title',
        'description',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    /**
     * Get the location that owns the service.
     */
}
