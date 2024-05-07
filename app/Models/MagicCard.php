<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class MagicCard extends Model
{
    use HasFactory;



    protected $fillable = ['name', 'description', 'power', 'toughness', 'image_data', 'user_id'];



    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
