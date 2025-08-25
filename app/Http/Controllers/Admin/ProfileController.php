<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $profile = Profile::firstOrCreate([]);
        return view('admin.profile.index', compact('profile'));
    }

    public function edit()
    {
        $profile = Profile::firstOrCreate([]);
        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'bio' => 'required|string',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'github_url' => 'nullable|url|max:255',
            'linkedin_url' => 'nullable|url|max:255',
            'profile_image' => 'nullable|image|max:2048',
            'cv_file' => 'nullable|mimes:pdf|max:5120',
        ]);

        $profile = Profile::firstOrCreate([]);
        $data = $request->except(['profile_image', 'cv_file']);

        if ($request->hasFile('profile_image')) {
            if ($profile->profile_image) {
                Storage::disk('public')->delete($profile->profile_image);
            }
            $data['profile_image'] = $request->file('profile_image')->store('profile', 'public');
        }

        if ($request->hasFile('cv_file')) {
            if ($profile->cv_file) {
                Storage::disk('public')->delete($profile->cv_file);
            }
            $data['cv_file'] = $request->file('cv_file')->store('cv', 'public');
        }

        $profile->update($data);

        return redirect()->route('admin.profile.index')->with('success', 'Profile updated successfully.');
    }
}
