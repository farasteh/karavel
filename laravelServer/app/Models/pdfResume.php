<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pdfResume extends Model
{
    use HasFactory;
    protected $fillable = [
        'options',
        'base_resume',
        'pdf_theme'
    ];
}
