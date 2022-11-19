<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PotensiDesa extends Model
{
    use HasFactory;

    protected $table = 'potensis';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
