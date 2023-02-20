<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\Pages\Page;
use App\Models\Pages\PageBlock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PageController extends Controller
{
    public function index()
    {
        return view('admin.page.index');
    }

    public function edit(Page $page)
    {
        $page->load(['seo', 'blocks']);
        return view('admin.page.edit')->with([
            'page' => $page
        ]);
    }

    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:pages,slug,' . $page->id,
        ]);

        $page->update($request->all());

        if ($request->hasFile('image')) {
            $file_name = uploadImage($request, 'image', 'page');

            if ($page->featured_image) {
                deleteImage($page->featured_image);
            }
            $page->featured_image = $file_name;
            $page->save();
        }

        if ($request->block_id) {
            foreach ($request->block_id as $key => $id) {
                $block =  PageBlock::where('id', $id)->first();

                if ($block->has_heading) {
                    $block->heading = $request->block_heading[$id];
                }
                if ($block->has_content) {
                    $block->content = $request->block_content[$id];
                }

                if ($block->has_button) {
                    $block->button_text = $request->block_button_text[$id];
                    $block->button_link = $request->block_button_url[$id];
                }

                $block->save();
            }
        }

        updateSEO($page, 'App\Models\Pages\Page', $request);

        Cache::flush('url_pages');

        return back()->with(['status' => "Page updated"]);
    }
}
