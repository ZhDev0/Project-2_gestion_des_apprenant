<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apprenant extends Model
{
    use HasFactory;
    protected $table='apprenant';
    protected $col = ['Nom'];
    protected $coll = ['Prenom'];
    protected $colll = ['email'];
}
