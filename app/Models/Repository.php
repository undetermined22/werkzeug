<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Repository extends Model
{
    use HasUuid, HasFactory;

    /**
     * Get all of the environments for the Repository
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function environments(): HasMany
    {
        return $this->hasMany(Environment::class);
    }
}
