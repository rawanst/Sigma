<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrainingStoreRequest;
use App\Http\Requests\TrainingUpdatePictureRequest;
use App\Http\Requests\TrainingUpdateRequest;
use App\Models\Category;
use App\Models\Training;
use App\Models\Type;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class TrainingController extends Controller
{
    public function list() {
        $trainings = Training::orderBy('updated_at','DESC')->get();
        return view('trainings.list', compact('trainings'));
    }

    public function add(){
        $categories = Category::all();
        $types = Type::all();
        return view('trainings.add', compact(['categories','types']));
    }

    public function details($id){
        $training = Training::find($id);
        $categories = Category::all();
        $users = User::all();
        return view('trainings.details', compact(['training','categories','users']));
    }

    public function delete($id){
        $training = Training::find($id);
        if(Storage::exists("public/$training->picture") === true){
            Storage::delete("public/$training->picture");
        }
        $training->categories()->detach();
        $training->delete();
        return redirect()->route('trainingList');
    }

    public function store(TrainingStoreRequest $request){
        $params = $request -> validated();
        $file = Storage::put('public', $params['picture']);
        $params['picture'] = substr($file,7);
        $params['user'] = auth()->user()->id;
        $training = Training::create($params);
        if (!empty($params['categories']))
        {
            $training->categories()->attach($params['categories']);
        }
        if (!empty($params['types']))
        {
            $training->types()->attach($params['types']);
        }
        return redirect()->route('trainingList');
    }

    public function update($id, TrainingUpdateRequest $request){
        $params = $request ->validated();
        $training = Training::find($id);
        $training->update($params);
        $training->categories()->detach();
        if(!empty($params['checkBoxCategories'])){
            $training->categories()->attach($params['checkBoxCategories']);
        }
        if(!empty($params['checkBoxTypes'])){
            $training->categories()->attach($params['checkBoxTypes']);
        }
        return redirect()->route('trainingDetails', $id);
    }

    public function updatePicture ($id, TrainingUpdatePictureRequest $request)
    {
        $params = $request ->validated();
        $training = Training::find($id);
        if(Storage::exists('public/$training->picture')){
            Storage::delete('public/$training->picture');
        }
        $file = Storage::put('public', $params['picture']);
        $params['picture'] = substr($file,7);
        $training->picture = $params['picture'];
        $training->save();
        return redirect()->route('trainingDetails', $id);
    }
}
