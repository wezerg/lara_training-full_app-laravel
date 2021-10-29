<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrainingRequest;
use App\Http\Requests\TrainingUpdateRequest;
use App\Models\Category;
use App\Models\CatTraining;
use App\Models\Chapter;
use App\Models\Training;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        if (Auth::user()) {
            if (Auth::user()->role === 'Admin') {
                $training = Training::all();
                return view('training.myTrain', compact('training'));
            }
            $training = Training::all()->where('userId', "=", Auth::user()->id);
            return view('training.myTrain', compact('training'));
        }
    }   

    public function addTrainingView(){
        if (Auth::user()) {
            $category = Category::all();
            $type = Type::all();
            return view('training.add', compact(['category', 'type']));
        }
        else{
            return redirect('/');
        }
    }

    public function addTraining(TrainingRequest $request){
        $params = $request->validated();
        $file = Storage::put('public', $params['image']);
        $params['image'] = str_replace('public/', "", $file);
        $tempCat = $params['category'];
        $tempChapter = $params['chapter'];
        unset($params['category']);
        unset($params['chapter']);
        $params['userId'] = Auth::user()->id;
        $training = Training::create($params);
        $category = [];
        foreach ($tempCat as $cat) {
            array_push($category, ['categoryId' => $cat, 'trainingId' => $training->id]);
        }
        $chapter = [];
        foreach ($tempChapter as $chap) {
            if ($chap['name'] && $chap['content'] && $chap['time']) {
                array_push($chapter, ["name" => $chap['name'], 
                                    "content" => $chap['content'], 
                                    "time" => $chap['time'], 
                                    'trainingId' => $training->id]
                );
            }
        }
        foreach ($category as $cat) {
            CatTraining::create($cat);
        }
        foreach ($chapter as $chap) {
            Chapter::create($chap);
        }
        return redirect('/');
    }

    public function editTrainingView($id){
        $train = Training::find($id);
        $category = Category::all();
        $type = Type::all();
        return view('training.edit', compact(['train', 'category', 'type']));
    }

    public function editTraining(TrainingUpdateRequest $request, $id){
        $params = $request->validated();
        $training = Training::find($id);
        if ((Auth::user() && Auth::user()->id === $training->userId) || (Auth::user() && Auth::user()->role === 'Admin')) {
            # code...
        }
        if (array_key_exists('image', $params)) {
            if ($training->image) {
                if (Storage::exists("public/$training->image")) {
                    Storage::delete("public/$training->image");
                }
            }
            $file = Storage::put('public', $params['image']);
            $params['image'] = str_replace('public/', "", $file);
            $training->update([
                'name' => $params['name'],
                'description' => $params['description'],
                'price' => $params['price'],
                'image' => $params['image'],
                'typeId' => $params['typeId'],
            ]);
        }
        else{
            $training->update([
                'name' => $params['name'],
                'description' => $params['description'],
                'price' => $params['price'],
                'typeId' => $params['typeId'],
            ]);
        }
        
        $tempCat = CatTraining::all()->where('trainingId', '=', $training->id);
        foreach ($tempCat as $cat) {
            $cat->delete();
        }
        $category = [];
        if (array_key_exists('category', $params)) {
            foreach ($params['category'] as $cat) {
                array_push($category, ['categoryId' => $cat, 'trainingId' => $training->id]);
            }
            $training->getCategory()->attach($category);
        }
        $chapter = [];
        foreach ($params['chapter'] as $key => $chap) {
            if ($chap['name'] && $chap['content'] && $chap['time']) {
                $chapter[$key] = ["name" => $chap['name'], 
                                    "content" => $chap['content'], 
                                    "time" => $chap['time'], 
                                    'trainingId' => $training->id];
            }
        }
        foreach ($chapter as $key => $value) {
            Chapter::find($key)->update($value);
        }
        return back();
    }

    public function removeTraining($id){
        $train = Training::find($id);
        if ((Auth::user() && Auth::user()->id === $train->userId) || (Auth::user() && Auth::user()->role === 'Admin')) {
            $chapter = Chapter::all()->where('trainingId', '=', $id);
            $catTrain = CatTraining::all()->where('trainingId', '=', $id);
            foreach ($catTrain as $cat) {
                $cat->delete();
            }
            foreach ($chapter as $chap) {
                $chap->delete();
            }
            if (Storage::exists("public/$train->image")) {
                Storage::delete("public/$train->image");
            }
            $train->delete();
            return back();
        }
        else{
            return redirect('/');
        }
    }
}
