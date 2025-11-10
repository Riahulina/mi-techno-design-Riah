<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedbacks'; // pastikan Laravel tahu tabelnya
    protected $fillable = [
        'progja_id', 
        'user_id', 
        'rating_manfaat', 
        'komentar'
    ];

    public function progja()
    {
        return $this->belongsTo(Progja::class);
    }
}
