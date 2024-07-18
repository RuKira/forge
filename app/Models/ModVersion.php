<?php

namespace App\Models;

use App\Models\Scopes\DisabledScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModVersion extends Model
{
    use HasFactory, SoftDeletes;

    protected static function booted(): void
    {
        static::addGlobalScope(new DisabledScope);
    }

    public function mod(): BelongsTo
    {
        return $this->belongsTo(Mod::class);
    }

    public function sptVersion(): BelongsTo
    {
        return $this->belongsTo(SptVersion::class);
    }
}
