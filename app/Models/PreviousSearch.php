<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreviousSearch extends Model
{
    use HasFactory;

    protected $fillable = ['word','updated_at'];
}
