<?php

namespace App\Http\Controllers\v1\language;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\v1\language\LanguageCollection;
use App\Models\Language;

class languageController extends Controller
{
    public function index()
    {
        return new languageCollection(Language::all());
    }
}
