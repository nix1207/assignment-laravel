<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Phone;
use Illuminate\Http\Request;

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
}
