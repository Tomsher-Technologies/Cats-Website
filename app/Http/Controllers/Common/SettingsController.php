<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\Common\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->keyBy('name');
        $contact_details = $settings->where('group', 'contact_details');
        $social_links = $settings->where('group', 'social_media');

        return view('admin.common.settings')->with([
            'settings' => $settings,
            'contact_details' => $contact_details,
            'social_links' => $social_links
        ]);
    }

    public function update(Request $request)
    {
        if ($request->social_media) {
            foreach ($request->social_media as $key => $link) {
                Setting::where('name', $key)->update(['value' => $link]);
            }
        }

        if ($request->contact_details) {
            foreach ($request->contact_details as $key => $link) {
                Setting::where('name', $key)->update(['value' => $link]);
            }
        }

        return back()->with(['status' => "Settings updated"]);
    }
}
