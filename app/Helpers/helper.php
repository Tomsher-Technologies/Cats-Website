<?php

use App\Models\Pages\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

function getStatusText($status)
{
    if ($status) {
        return "Enabled";
    }
    return "Disabled";
}

function getLogDate($date)
{
    return $date->format('d-M-Y h:i:s');
}


function updateSEO($model, $className, Request $request)
{
    $model->seo()->updateOrCreate(
        [
            'seo_id' => $model->id,
            'seo_type' => $className,
        ],
        [
            'title' => ($request->seo_title) ?? $request->title,
            'description' => $request->seo_description,
            'keywords' => $request->seo_keyword,

            // Og
            'og_title' => ($request->og_title) ?? $request->title,
            'og_description' => $request->og_description,


            // Twitter
            'twitter_title' => ($request->twitter_title) ?? $request->title,
            'twitter_description' => $request->twitter_description,
        ]
    );
}


/**
 * Image Upload Helper
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  string $input
 * @param  string $path
 * @param  boolean $uniqueName
 * @return \Illuminate\Http\Response
 */
function uploadImage(Request $request, $input, $path, $uniqueName = true)
{
    if ($request->hasFile($input)) {

        $uploadedFile = $request->file($input);
        $filename =   time() . $uploadedFile->getClientOriginalName();
        if (!$uniqueName) {
            $filename = $uploadedFile->getClientOriginalName();
        }

        $name = Storage::disk('public')->putFileAs(
            $path,
            $uploadedFile,
            $filename
        );

        return Storage::url($name);
    }
    return null;
}

/**
 * Image Delete Helper
 *
 * @param  string $path
 * @return boolean
 */
function deleteImage($path)
{
    $fileName = 'public' . Str::remove('/storage', $path);
    if (Storage::exists($fileName)) {
        Storage::delete($fileName);
    }
}


function convertYoutube($url)
{
    $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
    $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';
    $youtube_id = "";
    if (preg_match($longUrlRegex, $url, $matches)) {
        $youtube_id = $matches[count($matches) - 1];
    }

    if (preg_match($shortUrlRegex, $url, $matches)) {
        $youtube_id = $matches[count($matches) - 1];
    }

    if ($youtube_id == "") {
        return $youtube_id;
    }

    return 'https://www.youtube.com/embed/' . $youtube_id;
}

function getSEOUrl($path)
{
    $uriSegments = explode(".", $path);
    $pages = Cache::rememberForever('url_pages',  function () {
        return Page::all();
    });

    $url_sub = "";
    $url = $pages->where('page_name', $uriSegments[0])->pluck('slug')->first();

    if (count($uriSegments) > 1) {
        switch ($uriSegments[0]) {
                // case 'university-staff':
                //     $url_sub = Staff::whereId($uriSegments[1])->get()->pluck('slug')->first();
                //     break;
            default:
                $url_sub = "";
        }
    }

    return $url !== null ? URL::to($url . "/" . $url_sub) . "/" : "";
}
