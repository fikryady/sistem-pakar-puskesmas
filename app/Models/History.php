<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
{
    $query->when($filters['search'] ?? false, function ($query, $search) {
        return $query->where(function ($query) use ($search) {
            $query->where('kd_konsultasi', 'like', '%' . $search . '%')
                  ->orWhereHas('user', function ($query) use ($search) {
                      $query->where('name', 'like', '%' . $search . '%');
                  });
        });
    });
}
    protected $fillable = ['kd_konsultasi','tgl', 'user_id', 'disease_id', 'bayes_value'];

    protected $casts = [
        'symptom_ids' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function disease()
    {
        return $this->belongsTo(Disease::class);
    }

    public function symptom()
    {
        return $this->belongsTo(Symptom::class);
    }
}
