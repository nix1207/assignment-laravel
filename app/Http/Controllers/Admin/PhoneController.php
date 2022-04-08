<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    /**
     * @var Phone
     */
    protected $phone;

    /**
     * @param Phone $phone
     */
    public function __construct(Phone $phone)
    {
        $this->phone = $phone;
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
}
