<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::query()->get();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return vieW('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->status = $request->status;
        $category->save();

        toastr('Created Successfully!', 'success');

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::query()->findOrFail($id);
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $category = Category::query()->findOrFail($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->status = $request->status;
        $category->save();

        toastr('Updated Successfully!', 'success');

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::query()->findOrFail($id);
        $product = Product::where('category_id', $category->id)->count();
        if ($product > 0) {
            return response([
                'status' => 'error',
                'message' => 'Đang có sản phẩm chứa danh mục này bạn phải xóa sản phẩm đó trước!',
            ]);
        } else {
            $category->delete();
            return response([
                'status' => 'success',
                'message' => 'Xóa thành công!'
            ]);
        }
    }

    public function changeStatus(Request $request)
    {
        $category = Category::findOrFail($request->id);
        $category->status = $request->status == 'true' ? 1 : 0;
        $category->save();

        return response([
            'message' => 'Cập nhật trạng thái thành công',
        ]);
    }
}
