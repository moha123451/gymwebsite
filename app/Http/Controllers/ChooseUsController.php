<?php
namespace App\Http\Controllers;

use App\Models\ChooseUsItem;

class ChooseUsController extends Controller
{
    public function index()
    {
        // استرجاع العناصر من قاعدة البيانات
        $chooseUsItems = ChooseUsItem::all();

        // تمرير البيانات إلى view
        return view('index', compact('chooseUsItems'));
    }
}

