<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Hasfactory;
    protected $guarded = ['id'];
}
