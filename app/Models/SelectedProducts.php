<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelectedProducts extends Model
{
    use HasFactory;
    protected $table = 'homepage_products';
    protected $guarded = ['id'];
}
