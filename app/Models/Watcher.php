<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Watcher extends Model
{
    use HasFactory;
    protected $fillable = [
        'repository_id',
        'user_id',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    public function repository(): BelongsTo
    {
        return $this->belongsTo(Repository::class);
    }
}
