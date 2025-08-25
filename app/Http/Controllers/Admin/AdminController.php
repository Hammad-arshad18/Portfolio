<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Education;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $stats = [
            'total_projects' => Project::count(),
            'total_skills' => Skill::count(),
            'total_experiences' => Experience::count(),
            'total_education' => Education::count(),
            'unread_messages' => ContactMessage::unread()->count(),
            'total_messages' => ContactMessage::count(),
        ];

        $recent_messages = ContactMessage::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_messages'));
    }
}
