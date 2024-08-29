<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Morphology extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'icd0morphology';

    public $incrementing = false;
    protected $primaryKey = 'CODE';

    protected $guarded = ['CODE'];
}
