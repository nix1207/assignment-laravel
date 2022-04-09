<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Phone;
use Exception;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PhoneController extends Controller
{
    /**
     * @var Phone
     */
    protected $phone;

    /**
     * @var Category
     */
    protected $category;

    /**
     * @param Phone $phone
     * @param Category $category
     */
    public function __construct(Phone $phone, Category $category)
    {
        $this->phone = $phone;
        $this->category = $category;
    }
    /**
     * @return View
     */
    public function index()
    {
        $phones = $this->phone->get();
        $phones->load('category');

        return view('admin.phone.index', compact('phones'));
    }

    /**
     * @return View 
     */
    public function create()
    {
        $categories = $this->category->get();
        return view('admin.phone.add-phone', compact('categories'));
    }

    /**
     * 
     */
    public function store(ProductStoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $this->phone->create([
                'name' => $data['name'],
                'price' => $data['price'],
                'image_url' => Storage::put('public/phones', $data['image_url']),
                'status' => isset($data['status']) ? 1 : 0,
                'category_id' => $data['category_id'],
                'desc' => $data['desc']
            ]);
            DB::commit();
            return redirect()->back()->with('success', 'Thêm mới sản phẩm thành công');
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Có lỗi xảy ra vui lòng thử lại');
        }
    }

    /**
     *  @param Request $request
     */
    public function updateStatus(Request $request)
    {
        $data = $request->all();
        $this->phone->where('id', $data['id'])->update(
            ['status' => $data['status'] == 0 ? 1 : 0]
        );

        return response()->json(['message' => 'success']);
    }

    /**
     * @param Phone $phone
     */
    public function showPhone(Phone $phone)
    {
        $categories = $this->category->get();
        return view('admin.phone.show-phone', compact('phone', 'categories'));
    }

    /**
     * @param Request $request
     */
    public function update(ProductUpdateRequest $request, Phone $phone)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $this->phone->where('id', $phone->id)->update([
                'name' => $data['name'],
                'price' => $data['price'],
                'status' => isset($data['status']) ? 1 : 0,
                'desc' => $data['desc'],
                'category_id' => $data['category_id']
            ]);
            if (isset($data['image_url'])) {
                if ($phone->image_url != null) {
                    Storage::delete($phone->image_url);
                }
                $this->phone->where('id', $phone->id)->update([
                    'image_url' => Storage::put('public/phones', $data['image_url'])
                ]);
            }
            DB::commit();
            return redirect()->back()->with('success', 'Cập nhật sản phẩm thành công');
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Có lỗi xảy ra vui lòng thử lại');
        }
    }

    /**
     * 
     */
    public function delete (Request $request) 
    {
        $data = $request->all();
        $this->phone->where('id', $data['id'])->delete();

        return response()->json(['message' => 'success']);
    }
}
