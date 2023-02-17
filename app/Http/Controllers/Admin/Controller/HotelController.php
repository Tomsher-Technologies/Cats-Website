<?php

namespace App\Http\Controllers\Admin\Controller;

use App\Http\Controllers\Controller;
use App\Models\Pages\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $per_page = $request->per_page ?? 15;

        $query = Hotel::query();

        if ($request->q) {
            $query = $query->where('name', 'LIKE', '%' . $request->q . '%')
                ->orwhere('slug', $request->q);
        }

        $hotels =  $query->paginate($per_page);

        return view('admin.hotels.index')->with([
            'hotels' => $hotels,
            'per_page' => $per_page,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hotels.create');
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

        $hotel = Hotel::create($request->all());

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

        $hotel->save();

        return redirect()->route('admin.rooms.index')->with([
            'status' => "New room created."
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        // $hotel->load('seo');
        // return view('admin.hotels.show')->with([
        //     'hotel' => $hotel
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        $hotel->load(['seo']);
        return view('admin.hotels.edit')->with([
            'hotel' => $hotel
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $hotel->update($request->all());

        if ($request->hasFile('image')) {
            $file_name = uploadImage($request, 'image', 'hotels');

            if ($hotel->image) {
                deleteImage($hotel->image);
            }
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

        $hotel->save();

        return back()->with([
            'status' => "Room Updated"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        if ($hotel->image) {
            deleteImage($hotel->image);
        }

        $hotel->delete();

        return redirect()->route('admin.rooms.index')->with([
            'status' => "Room deleted."
        ]);
    }
}
