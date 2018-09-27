<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    /**
     * @api {get} /category Get categories
     * @apiName Get categories
     * @apiVersion 0.1.0
     * @apiGroup Category
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  /category
     *
     */

    public function index()
    {
        if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('moderator')) {
            $category = Category::with('news')
                ->orderBy('id', 'desc')
                ->get();
            return response()->json(['categories' => $category], 200);
        }
        return response()->json(['message' => 'this action denies for you!!!']);
    }


    /**
     * @api {post} /category Add categories
     * @apiName Add category
     * @apiVersion 0.1.0
     * @apiGroup Category
     * @apiParam {String} name name of category
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  /category
     *
     */
    public function store(Request $request)
    {
        if (Auth::user()->hasRole('admin')){
        $v = $request->validate([
            'name' => 'required|unique:categories',
        ]);
            $caregory = Category::create($request->all());
            return response()->json(['created' => $caregory], 201);
        }
        return response()->json(['message' => 'this action denies for you!!!']);
    }


    /**
     * @api {get} /category/{id} Get one category
     * @apiName Get one categories
     * @apiVersion 0.1.0
     * @apiGroup Category
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  /category/{id}
     *
     */

    public function show($id)
    {
        if (Auth::user()->hasRole('admin')) {
            $category = Category::with('news')
                ->find($id);
            if ($category)
                return response()->json(['category' => $category]);

            return response()->json(['message' => 'category not found or incorrect route!!!']);
        }
        return response()->json(['message' => 'this action denies for you!!!']);
    }

    /**
     * @api {put} /category/{id} Update category
     * @apiName Update category
     * @apiVersion 0.1.0
     * @apiGroup Category
     * @apiParam {String} name name of category
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  /category/{id}
     *
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->hasRole('admin')) {
            $v = $request->validate([
                'name' => 'required',
            ]);
            $category = Category::find($id);
            if ($category) {
                $category->update($request->all());

                return response()->json(['update category' => $category]);
            }
            return response()->json(['message' => 'category not found or incorrect route!!!']);
        }
        return response()->json(['message' => 'this action denies for you!!!']);
    }


    /**
     * @api {delete} /category/{id} Delete category
     * @apiName Delete category
     * @apiVersion 0.1.0
     * @apiGroup Category
     * @apiPermission Authorization
     * @apiHeader  Authorization token
     * @apiSampleRequest  /category/{id}
     *
     */

    public function destroy($id)
    {
        if (Auth::user()->hasRole('admin')) {
            $category = Category::find($id);
            if ($category) {
                $category->delete();
                return response()->json(['deleted' => $category]);
            }

            return response()->json(['message' => 'category not found or incorrect route!!!']);
        }
        return response()->json(['message' => 'this action denies for you!!!']);
    }
}

