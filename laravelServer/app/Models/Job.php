<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory,SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table  = 'jobs';
    protected $fillable = ['title' ,  'image'];

    public  function cat() {
        dd('ss');
    }
    public function CategoryJobs()
    {
        return $this->hasMany(CategoryJob::class , 'id_job', 'id');
    }

    public function advertisings() {
        return $this->hasMany(Advertising::class) ;
    }

}
