<?php

namespace App\Http\Controllers\v1\Effect;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Effect\EffectCollection;
use App\Models\Effect;
use Illuminate\Http\Request;

class EffectController extends Controller
{
    public function index()
    {
        return new EffectCollection(Effect::all());
    }
}
