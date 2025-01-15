<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\destinations;
class tours extends Model
{
    use HasFactory;
    protected $table = 'tours'; 

    public function customer()
    {
        return $this->belongsTo(destinations::class,'id');
    }
    protected $fillable = [
        'destination_id',
        'name',
        'start_date',
        'end_date',
        'price',
        'created_at',
        'updated_at',
    ];
}
