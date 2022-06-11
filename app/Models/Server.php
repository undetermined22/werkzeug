<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Server extends Model
{
    use HasUuid, HasFactory;


    protected $casts = [
        'status' => 'boolean',
    ];
}
