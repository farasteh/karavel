<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryJob extends Model
{
    use HasFactory,SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table  = 'category_jobs';
    protected $fillable = ['id_job','title'];

    public function CategoryWork()
    {
        return $this->hasMany(CategoryWork::class,'categry_job_id', 'id');
    }
}
