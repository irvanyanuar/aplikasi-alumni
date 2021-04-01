<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    use HasFactory;
    protected $table = 'colleges';

    public function regency()
    {
        return $this->belongsTo('App\Models\Regency', 'regency_id', 'id');
    }
}
