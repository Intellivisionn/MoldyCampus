<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $table = 'majors';

    protected $primaryKey = 'id';

    protected $fillable = ['major_name'];
}
