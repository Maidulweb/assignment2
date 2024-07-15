<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'start_date',
        'phone',
        'end_date',
        'number_min_five',
        'number_max_eight',
        'whole_num_zero',
        'max_whole_num_hunderd',
        'num_range',
        'insta_url',
        'photo'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
