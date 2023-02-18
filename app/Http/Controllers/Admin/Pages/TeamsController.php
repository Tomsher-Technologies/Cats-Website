<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\Pages\Team;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.team.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|file|mimes:jpg,jpeg,png,gif,bmp,tiff,webp|max:1000',
        ]);

        $team = Team::create($request->all());

        if ($request->hasFile('image')) {
            $file_name = uploadImage($request, 'image', 'team');
            $team->image = $file_name;
        }

        $team->save();

        return redirect()->route('admin.teams.index')->with([
            'status' => "New team member created."
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pages\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pages\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('admin.team.edit')->with([
            'team' => $team
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pages\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'file|mimes:jpg,jpeg,png,gif,bmp,tiff,webp|max:1000',
        ]);

        $team->update($request->all());

        if ($request->hasFile('image')) {
            $file_name = uploadImage($request, 'image', 'team');

            if ($team->image) {
                deleteImage($team->image);
            }
            $team->image = $file_name;
        }

        $team->save();

        return back()->with([
            'status' => "Team member Updated"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pages\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        if ($team->image) {
            deleteImage($team->image);
        }

        $team->seo()->delete();

        $team->delete();

        return redirect()->route('admin.teams.index')->with([
            'status' => "Team member deleted."
        ]);
    }
}
