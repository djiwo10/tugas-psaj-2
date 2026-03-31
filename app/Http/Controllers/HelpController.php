<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;

class HelpController extends Controller
{
    public function index()
{
    $faqs = Faq::where('is_active', true)
        ->orderBy('sort')
        ->get();

    return view('dashboard.help', compact('faqs'));
}
}
