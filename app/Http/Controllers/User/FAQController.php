<?php

namespace App\Http\Controllers\User;

use App\Models\FAQ;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FAQController extends Controller
{
    public function index()
    {
        $faqs = FAQ::all();
        return view(
            'user.pages.faq',
            [
                'title' => 'FAQ',
                'faqs' => $faqs
            ]
        );
    }
}
