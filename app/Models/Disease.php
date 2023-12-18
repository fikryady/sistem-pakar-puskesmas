<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('nama', 'like', '%' . $search . '%');
        });
    }

    protected $fillable = ['kd', 'nama', 'keterangan', 'solusi'];

    public function rules()
    {
        return $this->hasMany(Rule::class);
    }

    public function symptoms()
    {
    return $this->belongsToMany(Symptom::class, 'rules');
    }
}
