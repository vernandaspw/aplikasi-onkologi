<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rorecek\Ulid\HasUlid;

class DataTumorMetastasis extends Model
{
    use HasFactory, HasUlid;

    protected $connection = 'mysql';
    protected $guarded = ['id'];
    protected $table = 'cancer_data_tumor_metastasis';
}
