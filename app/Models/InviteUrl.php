<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InviteUrl extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'code',
        'expires_at',
    ];
}
