<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rorecek\Ulid\HasUlid;

class Stadium extends Model
{
    use HasFactory, HasUlid;

    protected $connection = 'mysql';
    protected $table = 'cancer_m_stadium';
}
