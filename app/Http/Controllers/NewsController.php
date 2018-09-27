<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Middleware\Moderator;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{

    /**
     * @api {get} /get-news Get news for guest
     * @apiName Get news for guest
     * @apiVersion 0.1.0
     * @apiGroup Guest
     * @apiSampleRequest  /get-news
     *
     */


    public function indexForGuest() {
        $news = News::with('category')
            ->orderBy('id', 'desc')
            ->get();
        return response()->json(['news' => $news], 200);
    }

    /**
     * @api {get} /news Get news
     * @apiName Get news
     * @apiVersion 0.1.0
     * @apiGroup News
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  /news
     *
     */

    public function index()
    {
        if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('moderator')) {
            $news = News::with('category')
                ->orderBy('id', 'desc')
                ->get();
            return response()->json(['news' => $news], 200);
        }
        return response()->json(['message' => 'this action denies for you!!!']);
    }

    /**
     * @api {post} /news Add news
     * @apiName Add news
     * @apiVersion 0.1.0
     * @apiGroup News
     * @apiParam {String} name name of news
     * @apiParam {String} description description of news
     * @apiParam {Number} category_id category_id for news
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  /news
     *
     */
    public function store(Request $request)
    {
        if ( Auth::user()->hasRole('admin')) {
        $v = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ]);
        $category = Category::find($request->category_id);
            if ($category){
                $news = News::create($request->all());

                return response()->json(['created' => $news], 201);
            }
            return response()->json(['message' => 'category with such ID not found']);

        }
        return response()->json(['message' => 'this action denies for you!!!']);
    }


    /**
     * @api {get} /news/{id} Get one news
     * @apiName Get one categories
     * @apiVersion 0.1.0
     * @apiGroup News
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  /news/{id}
     *
     */

    public function show(News $news)
    {
        if (Auth::user()->hasRole('admin')) {
            $news = News::with('category')->find($news->id);
            return response()->json(['news' => $news]);
        }
        return response()->json(['message' => 'this action denies for you!!!']);
    }


    /**
     * @api {put} /news/{id} Update news
     * @apiName Update news
     * @apiVersion 0.1.0
     * @apiGroup News
     * @apiParam {String} name name of news
     * @apiParam {String} description description of news
     * @apiParam {Number} category_id category_id for news
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  /news/{id}
     *
     */

    public function update(Request $request, $id)
    {
        $v = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('moderator')) {
            $news = News::find($id);
            $category = Category::find($request->category_id);
            if ($category) {
                $news->update($request->all());
                return response()->json(['update news' => $news]);
            }

            return response()->json(['message' => 'news with such ID not found']);
        }
        return response()->json(['message' => 'this action denies for you!!!']);

    }

    /**
     * @api {delete} /news/{id} Delete news
     * @apiName Delete news
     * @apiVersion 0.1.0
     * @apiGroup News
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  /news/{id}
     *
     */

    public function destroy($id)
    {
        if ( Auth::user()->hasRole('admin')) {
            $news = News::find($id);
            if ($news){
                $news->delete();
                return response()->json(['deleted' => $news]);
            }
            return response()->json(['message' => 'news with such ID not found']);

        }
        return response()->json(['message' => 'this action denies for you!!!']);
    }
}
