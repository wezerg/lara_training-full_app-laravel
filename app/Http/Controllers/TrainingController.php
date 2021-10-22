<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function listView(){
        $training = Training::all();
        return view('training.list', compact('training'));
    }

    public function detailView($id){
        $training = Training::find($id);
        return view('training.detail', compact('training'));
    }
}
