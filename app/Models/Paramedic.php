<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paramedic extends Model
{
    use HasFactory;
    protected $connection = 'sqlsrv_Sphaira';
    protected $table = 'Paramedic';
    protected $guarded = ['ParamedicID'];
    protected $primaryKey = 'ParamedicID';

    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
}
