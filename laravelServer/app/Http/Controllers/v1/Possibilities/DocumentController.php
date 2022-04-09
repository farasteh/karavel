<?php

namespace App\Http\Controllers\v1\Possibilities;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Possibilities\DocumentCollection;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new DocumentCollection(Document::all());

    }
}
