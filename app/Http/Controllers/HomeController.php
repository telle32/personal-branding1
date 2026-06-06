<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Skill;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::orderBy('is_featured', 'desc')
            ->orderBy('order')
            ->take(6)
            ->get();

        $skills = Skill::orderBy('order')->get();

        $services = Service::where('is_active', true)
            ->orderBy('order')
            ->get();

        $testimonials = Testimonial::where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('home', compact('portfolios', 'skills', 'services', 'testimonials'));
    }
}

