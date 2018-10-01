<?php

namespace App\Http\Controllers\Api;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GuestController extends Controller
{

    /**
     * @api {get} /guest-news Get news for guest
     * @apiName Get news for guest
     * @apiVersion 0.1.0
     * @apiGroup Guest
     * @apiSampleRequest  /guest-news
     *
     */

    public function index() {
        $news = News::with('category')
            ->orderBy('id', 'desc')
            ->get();
        return response()->json(['news' => $news], 200);
    }
}
