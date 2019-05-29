<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::paginate(config('categories.paginate'));

        return view('categories.index', ['categories' => $categories]);
    }

    public function create() {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request) {
        $data = $request->only([
            'name',
            'description',
        ]);
        
        try {
            $category = Category::create($data);
        } catch (Exception $e) {
            return back()->with('status', __('message.create_fail'));
        }
        
        return redirect('categories/' . $category->id)->with('status', __('message.create_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $category = Category::findOrFail($id);

        if (!$category) {
            return back()->with('status', __('message.not_found'));
        }

        return view('categories.show', ['category' => $category]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $category = Category::find($id);
        
        if (!$category) {
            return back()->with('status', __('message.not_found'));
        }
        
        return view('categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id) {
        $data = $request->only([
            'name',
            'description',
        ]);
        
        try {
            $category = Category::find($id);
            $category->update($data);
        } catch (Exception $e) {
            return back()->with('status', __('message.update_fail'));
        }
        
        return redirect('categories/' . $id)->with('status', __('message.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        try {
            $category = Category::find($id);
            $category->delete();
            $result = [
                'status' => true,
                'msg' => __('message.delete_success'),
            ];
        } catch (Exception $e) {
            $result = [
                'status' => false,
                'msg' => __('message.delete_fail'),
            ];
        }
        
        return response()->json($result);
    }
}
