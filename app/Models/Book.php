<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function tag() {
        return $this->belongsTo(Tag::class);
    }

    public function loans() {
        return $this->hasMany(Loan::class);
    }
}
