<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function alternatives()
    {
        return $this->belongsToMany(Medicine::class, 'medicine_alternative', 'medicine_id', 'alternative_id');
    }
}
