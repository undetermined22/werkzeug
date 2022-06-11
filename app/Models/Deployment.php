<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Deployment extends Model
{
    use HasUuid, HasFactory;

    /**
     * Get the repository that owns the Deployment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function repository(): BelongsTo
    {
        return $this->belongsTo(Repository::class);
    }

    /**
     * Get the environment that owns the Deployment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function environment(): BelongsTo
    {
        return $this->belongsTo(Environment::class);
    }
}
