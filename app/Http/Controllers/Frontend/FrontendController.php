<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Pages\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class FrontendController extends Controller
{
    public function catchAll(Request $request)
    {

        $view = "";
        $uriSegments = explode("/", parse_url($request->path(), PHP_URL_PATH));

        $pages = Cache::rememberForever('url_pages', function () {
            return Page::all();
        });

        try {
            $page = $pages->where('slug', $uriSegments[0])->firstOrFail();

            $functionName = Str::camel($page->page_name);

            if (!method_exists(FrontendController::class, $functionName)) {
                abort(404);
            }

            $view = $this->$functionName($page, $uriSegments[1] ?? null);

            return $view;
        } catch (\Exception $exception) {
            abort(404);
        }
        abort(404);
    }

    public function home()
    {
        return view('frontend.home');
    }
}
