<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BmiController extends Controller
{
    public function calculate(Request $request)
    {
        // حساب الـ BMI باستخدام البيانات المدخلة
        $height = $request->input('height');
        $weight = $request->input('weight');
        $bmi = $weight / (($height / 100) * ($height / 100)); // معادلة الـ BMI

        // تصنيف الـ BMI
        $status = '';
        if ($bmi < 18.5) {
            $status = 'Underweight';
        } elseif ($bmi >= 18.5 && $bmi < 25) {
            $status = 'Healthy';
        } elseif ($bmi >= 25 && $bmi < 30) {
            $status = 'Overweight';
        } else {
            $status = 'Obese';
        }

        // إرجاع النتيجة إلى الـ View
        return view('bmi-result', compact('bmi', 'status'));
    }
}
