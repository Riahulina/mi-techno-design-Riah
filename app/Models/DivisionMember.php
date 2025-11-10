<?php
namespace App\Models;

use App\Models\DivisionMember; 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DivisionMember extends Model
{
    use HasFactory;

    protected $fillable = ['division_id','name','role','team_number','team_name','image'];


    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function members()
{
    return $this->hasMany(DivisionMember::class);
}

}

