<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // هنا يمكنك معالجة البيانات (مثلاً إرسال بريد إلكتروني أو تخزين في قاعدة البيانات)
        return redirect()->back()->with('success', 'Your message has been sent!');
    }
}
