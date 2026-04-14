<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'description',
        'photo_path',
        'latitude',
        'longitude',
        'damage_type',
        'ai_photo_path',
        'status',
        'operator_id',
        'rejection_note',
        'evidence_photo_path',
        'verified_at',
        'completed_at',
    ];

    protected $casts = [
        'verified_at' => 'datetime',
        'completed_at' => 'datetime',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
    ];

    /**
     * Relasi ke pelapor (User)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke operator yang menangani
     */
    public function operator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'operator_id');
    }
}
