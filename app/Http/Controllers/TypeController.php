<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeRequest;
use App\Models\Training;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function removeType($id){
        $type = Type::find($id);
        $trainType = Training::all()->where('typeId', '=', $id);
        foreach ($trainType as $train) {
            $train->update([
                "typeId" => null
            ]);
        }
        $type->delete();
        return back();
    }
    
    public function addType(TypeRequest $request){
        $params = $request->validated();
        Type::create($params);
        return back();
    }
}
