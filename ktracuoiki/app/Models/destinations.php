<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\tours;
class destinations extends Model
{
    use HasFactory;
    protected $table = 'destinations'; 

    public function tours()
    {
        return $this->hasMany(tours::class,'id');
    }
    protected $fillable = [
        'name',
        'city',
        'country',
        'description',
        'created_at',
        'updated_at',
    ];
}
