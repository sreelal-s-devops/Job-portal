<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;
    protected $fillable =['user_id','title','description','salary','location','category','experience'];
    public static $category=['IT','Finance','Sales','Administration'];
    public static $experience=['Entry Level','Mid Level','Expert Level'];

    public function ScopeFilter(Builder $query, array $filter):Builder
    {
        return $query->when($filter['jobname']?? null,function($query,$jobname){
                $query->where('title','LIKE','%'.$jobname.'%');
            })->when($filter['max']?? null,function($query,$max){
                $query->where('salary','<=',$max);
            })->when($filter['min']?? null,function($query,$min){
                $query->where('salary','>=',$min);
            })->when($filter['experience']?? null,function($query,$experience){
                $query->where('experience','=',$experience);
            })->when($filter['category']?? null,function($query,$category){
                $query->where('category','=',$category);
            });
    }
    public function jobapplication(){
        return $this->hasmany(JobApplication::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
   
}
