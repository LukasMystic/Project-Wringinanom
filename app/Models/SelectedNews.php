<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelectedNews extends Model
{
    use HasFactory;
    protected $table = 'homepage_news';
    protected $guarded = ['id'];
}
