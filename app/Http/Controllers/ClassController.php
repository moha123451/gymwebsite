<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\GymClass;

class ClassController extends Controller
{

    public function index()
    {

       $training=GymClass::all();
       dd($training);
    return view('index', compact('trainingClasses'));
}
public function show($id)
{
    $class = GymClass::findOrFail($id);
    return view('classes.show', compact('class'));
}

    }

