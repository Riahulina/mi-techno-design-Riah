<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progja extends Model
{
    use HasFactory;

    protected $fillable = [
        'division_id',
        'name',
        'description',
        'status',
        'success_rate',
        'start_date',
        'end_date',
    ];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }
}
