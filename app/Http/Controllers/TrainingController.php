<?php

namespace App\Http\Controllers;

use App\Models\CatTraining;
use App\Models\Chapter;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function myTrainView(){
        $training = Training::all()->where('userId', "=", Auth::user()->id);
        return view('training.myTrain', compact('training'));
    }

    public function editTrainingView($id){
        $train = Training::find($id);
        return view('training.edit', compact('train'));
    }

    public function editTraining(){
        dd('faire code fdp');
    }

    public function removeTraining($id){
        $train = Training::find($id);
        $chapter = Chapter::all()->where('trainingId', '=', $id);
        $catTrain = CatTraining::all()->where('trainingId', '=', $id);
        foreach ($catTrain as $cat) {
            $cat->delete();
        }
        foreach ($chapter as $chap) {
            $chap->delete();
        }
        $train->delete();
        return back();
    }
}
