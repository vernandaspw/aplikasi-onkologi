<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topography extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'icd0topography';

    public $incrementing = false;
    protected $primaryKey = 'CODE';

    protected $guarded = ['CODE'];
}
