<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Pages\Hospital;
use App\Models\Pages\Hotel;
use App\Models\Pages\Laboratory;
use App\Models\Pages\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\URL;

class FrontendController extends Controller
{
    public function catchAll(Request $request)
    {

        $view = "";
        $uriSegments = explode("/", parse_url($request->path(), PHP_URL_PATH));

        Cache::flush();

        $pages = Cache::rememberForever('url_pages', function () {
            return Page::all();
        });

        // try {
        $page = $pages->where('slug', $uriSegments[0])->firstOrFail();

        $functionName = Str::camel($page->page_name);

        if (!method_exists(FrontendController::class, $functionName)) {
            abort(404);
        }

        $view = $this->$functionName($page, $uriSegments[1] ?? null);

        return $view;
        // } catch (\Exception $exception) {
        //     abort(404);
        // }
        abort(404);
    }

    public function home()
    {
        $page = Cache::rememberForever('home_page',  function () {
            return Page::with(['seo',  'blocks'])->wherePageName('home')->first();
        });

        $blocks = $page->blocks->keyBy('name');

        $pages =  Cache::rememberForever('url_pages',  function () {
            return Page::all();
        });

        $pages = $pages->keyBy('page_name');

        return view('frontend.home')->with([
            'page' => $page,
            'pages' => $pages,
            'blocks' => $blocks,
        ]);
    }

    public function hospital($page)
    {
        $page->load(['seo', 'blocks']);
        $this->loadSEO($page);

        $hospitals = Hospital::whereStatus(true)->get();

        return view('frontend.hospital')->with([
            'page' => $page,
            'hospitals' => $hospitals,
        ]);
    }

    public function laboratory($page)
    {
        $page->load(['seo', 'blocks']);
        $this->loadSEO($page);

        $labs = Laboratory::whereStatus(true)->get();

        return view('frontend.labs')->with([
            'page' => $page,
            'labs' => $labs,
        ]);
    }

    public function teams($page)
    {
        $page->load(['seo', 'blocks']);
        $this->loadSEO($page);
        return view('frontend.teams');
    }

    public function customerFacilities($page)
    {
        $page->load(['seo', 'blocks']);
        $this->loadSEO($page);
        $blocks = $page->blocks->keyBy('name');
        return view('frontend.com_page')->with([
            'page' => $page,
            'blocks' => $blocks,
        ]);
    }

    public function seeYourCat($page)
    {
        $page->load(['seo', 'blocks']);
        $this->loadSEO($page);
        $blocks = $page->blocks->keyBy('name');
        return view('frontend.com_page')->with([
            'page' => $page,
            'blocks' => $blocks,
        ]);
    }

    public function ourRescueTeam($page)
    {
        $page->load(['seo', 'blocks']);
        $this->loadSEO($page);
        $blocks = $page->blocks->keyBy('name');
        return view('frontend.teams')->with([
            'page' => $page,
            'blocks' => $blocks,
        ]);
    }

    public function ourTeam($page)
    {
        $page->load(['seo', 'blocks']);
        $this->loadSEO($page);
        $blocks = $page->blocks->keyBy('name');
        return view('frontend.teams')->with([
            'page' => $page,
            'blocks' => $blocks,
        ]);
    }

    public function hotel($page)
    {
        $page->load(['seo', 'blocks']);
        $this->loadSEO($page);
        $blocks = $page->blocks->keyBy('name');

        $hotels = Hotel::whereStatus(true)->orderBy('sort_order')->get();

        return view('frontend.hotel')->with([
            'page' => $page,
            'blocks' => $blocks,
            'hotels' => $hotels,
        ]);
    }




    public function loadSEO($model)
    {
        // Load Defaults
        SEOTools::setTitle($model->title);
        OpenGraph::setTitle($model->title);
        TwitterCard::setTitle($model->title);

        if ($model->seo) {
            SEOMeta::setTitle($model->seo->title);
            SEOMeta::setDescription($model->seo->description);
            SEOMeta::addKeyword($model->seo->keywords);

            OpenGraph::setTitle($model->seo->og_title);
            OpenGraph::setDescription($model->seo->og_description);
            OpenGraph::setUrl(URL::full());
            OpenGraph::addProperty('locale', 'en_US');
            // image

            JsonLd::setTitle($model->seo->title);
            JsonLd::setDescription($model->seo->description);
            JsonLd::setType('Page');

            TwitterCard::setTitle($model->seo->twitter_title);
            TwitterCard::setDescription($model->seo->twitter_description);

            if ($model->featuredImage()) {
                SEOTools::jsonLd()->addImage(URL::to($model->featuredImage()));
            } else {
                SEOTools::jsonLd()->addImage(URL::to(asset('images/logo.png')));
            }

            SEOMeta::addKeyword($model->seo->keywords);
        }
    }
}
