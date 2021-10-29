<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\CatTraining;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function removeCat($id){
        $cat = Category::find($id);
        $catTrain = CatTraining::all()->where('categoryId', '=', $id);
        foreach ($catTrain as $catT) {
            $catT->delete();
        }
        $cat->delete();
        return back();
    }

    public function addCat(CategoryRequest $request){
        $params = $request->validated();
        Category::create($params);
        return back();
    }
}
