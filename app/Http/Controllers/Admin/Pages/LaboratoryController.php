<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\Pages\Laboratory;
use Illuminate\Http\Request;

class LaboratoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.lab.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lab.create');
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

        $hotel = Laboratory::create($request->all());

        if ($request->hasFile('image')) {
            $file_name = uploadImage($request, 'image', 'laboratory');
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

        updateSEO($hotel, 'App\Models\Pages\Laboratory', $request);

        $hotel->save();

        return redirect()->route('admin.laboratory.index')->with([
            'status' => "New laboratory created."
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pages\Laboratory  $laboratory
     * @return \Illuminate\Http\Response
     */
    public function show(Laboratory $laboratory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pages\Laboratory  $laboratory
     * @return \Illuminate\Http\Response
     */
    public function edit(Laboratory $laboratory)
    {
        $laboratory->load(['seo']);
        return view('admin.lab.edit')->with([
            'laboratory' => $laboratory
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pages\Laboratory  $laboratory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laboratory $laboratory)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $laboratory->update($request->all());

        if ($request->hasFile('image')) {
            $file_name = uploadImage($request, 'image', 'laboratory');

            if ($laboratory->image) {
                deleteImage($laboratory->image);
            }
            $laboratory->image = $file_name;
        }

        if ($request->fields) {
            $videos = array();
            foreach ($request->fields as $video) {
                if ($video !== null) {
                    $videos[] = $video;
                }
            }
            $laboratory->videos = json_encode($videos);
        }

        updateSEO($laboratory, 'App\Models\Pages\Laboratory', $request);
        $laboratory->save();

        return back()->with([
            'status' => "Laboratory Updated"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pages\Laboratory  $laboratory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laboratory $laboratory)
    {
        if ($laboratory->image) {
            deleteImage($laboratory->image);
        }

        $laboratory->seo()->delete();

        $laboratory->delete();

        return redirect()->route('admin.laboratory.index')->with([
            'status' => "Laboratory deleted."
        ]);
    }
}
