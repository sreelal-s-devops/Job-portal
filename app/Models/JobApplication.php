<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;
    protected $fillable=['user_id','work_id','cvname'];
    public function work(){
        return $this->belongsTo(Work::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
