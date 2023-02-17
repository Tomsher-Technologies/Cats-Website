<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\Pages\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.hospital.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hospital.create');
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
        ]);

        $hotel = Hospital::create($request->all());

        if ($request->hasFile('image')) {
            $file_name = uploadImage($request, 'image', 'hotels');
            $hotel->image = $file_name;
        }

        if ($request->fields) {
            $videos = array();
            foreach ($request->fields as $video) {
                if ($video !== null) {
                    $videos[] = $video;
                }
            }
            $hotel->videos = json_encode($videos);
        }

        updateSEO($hotel, 'App\Models\Pages\Hospital', $request);

        $hotel->save();

        return redirect()->route('admin.hospital.index')->with([
            'status' => "New hospital created."
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Hospital $hospital)
    {
        $hospital->load(['seo']);
        return view('admin.hospital.edit')->with([
            'hospital' => $hospital
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hospital $hospital)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $hospital->update($request->all());

        if ($request->hasFile('image')) {
            $file_name = uploadImage($request, 'image', 'hotels');

            if ($hospital->image) {
                deleteImage($hospital->image);
            }
            $hospital->image = $file_name;
        }

        if ($request->fields) {
            $videos = array();
            foreach ($request->fields as $video) {
                if ($video !== null) {
                    $videos[] = $video;
                }
            }
            $hospital->videos = json_encode($videos);
        }

        updateSEO($hospital, 'App\Models\Pages\Hospital', $request);
        $hospital->save();

        return back()->with([
            'status' => "Hospital Updated"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hospital $hospital)
    {
        if ($hospital->image) {
            deleteImage($hospital->image);
        }

        $hospital->seo()->delete();

        $hospital->delete();

        return redirect()->route('admin.hospital.index')->with([
            'status' => "Hospital deleted."
        ]);
    }
}
