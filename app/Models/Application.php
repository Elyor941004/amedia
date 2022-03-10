<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $table = 'application';
    use HasFactory;
    protected $fillable = [
        'theme',
        'message',
        'name',
        'file',
        'status'
    ];
}
