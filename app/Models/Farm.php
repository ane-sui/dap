<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Farm extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function crops():HasMany
    {
        return $this->hasMany(Crop::class);
    }
}
