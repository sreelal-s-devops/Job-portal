<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    public static $category=['IT','Finance','Sales','Administration'];
    public static $experience=['Entry Level','Experienced','Advanced'];


}
