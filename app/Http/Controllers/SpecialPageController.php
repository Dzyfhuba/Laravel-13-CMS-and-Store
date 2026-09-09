<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpecialPageController extends Controller
{
    public function show(\App\Models\SpecialPage $specialPage)
    {
        return inertia('SpecialPage', [
            'specialPage' => $specialPage,
        ]);
    }
}
