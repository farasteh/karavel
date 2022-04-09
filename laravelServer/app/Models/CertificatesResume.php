<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CertificatesResume extends Model
{
    use HasFactory , SoftDeletes;
    protected $table= 'certificates_resumes';
//    public function getCertificate()
//    {
//        return $this->hasOne(Certificate::class , 'id' , 'certificate');
//    }
}
