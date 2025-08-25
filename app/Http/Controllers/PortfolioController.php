<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Experience;
use App\Models\Education;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        $skills = Skill::active()->ordered()->get();
        $projects = Project::active()->featured()->ordered()->get();
        $experiences = Experience::active()->ordered()->get();
        $education = Education::active()->ordered()->get();

        return view('portfolio.index', compact('profile', 'skills', 'projects', 'experiences', 'education'));
    }

    public function resume()
    {
        $profile = Profile::first();
        $skills = Skill::active()->ordered()->get();
        $experiences = Experience::active()->ordered()->get();
        $education = Education::active()->ordered()->get();

        return view('portfolio.resume', compact('profile', 'skills', 'experiences', 'education'));
    }

    public function projects()
    {
        $projects = Project::active()->ordered()->get();

        return view('portfolio.projects', compact('projects'));
    }
}
