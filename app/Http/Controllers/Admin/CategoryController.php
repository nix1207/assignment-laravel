<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use App\Models\Phone;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * @var Category
     */
    protected $category;

    /**
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * @return View
     */
    public function index() 
    {
        $categories = $this->category->orderBy('id', 'DESC')->get();
        return view('admin.category.index', compact('categories'));
    } 

    /**
     * @return View
     */
    public function addCategory() 
    {
        return view('admin.category.add-category');
    }

    /**
     * @param Request $request 
     * @return Redirect
     */
    public function store(CategoryStoreRequest $request)
    {
        DB::beginTransaction(); 
        try {
            $data = $request->all(); 
            $this->category->create([
                'name' => $data['name'], 
                'desc' => $data['desc'], 
                'status' => isset($data['status']) ? 1 : 0,
                'parent_id' => 0
            ]); 
            DB::commit();

            return redirect()->back()->with('success', 'Thêm mới danh mục thành công')->withInput();
        }catch (Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Có lỗi xảy ra vui lòng thử lại');
        }
    }

    /**
     * @param Category $category
     */
    public function showCategory(Category $category) 
    {
        return view('admin.category.show-category', compact('category'));
    } 

    /**
     * @param Request $request
     * @param Category $category
     */ 
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $data = $request->all();
        $this->category->where('id', $category->id)->update([
            'name' => $data['name'], 
            'desc' => $data['desc'], 
            'status' => isset($data['status']) ? 1 : 0,
        ]);

        return redirect()->back()->with('updateSuccess', 'Cập nhật danh mục thành công');
    }

    /**
     * @param Request $request
     */
    public function delete(Request $request) 
    {
        $data = $request->all();
        $category = $this->category->where('id', $data['id'])->first();
        if($category->phones) {
           $ids = $category->phones->pluck('id');
           Phone::whereIn('id', $ids)->delete();
           $category->delete();
           return response()->json(['message' => 'Deleted']);
        }
        else {
            return false;
        }  
    }

    /**
     * @param Request $request
     */
    public function updateStatus (Request $request) 
    {
        $data = $request->all();
        $this->category->where('id', $data['id'])->update([
            'status' => $data['status'] == 0 ? 1 : 0
        ]);

        return response()->json(['message' => 'true']);
    }

}
