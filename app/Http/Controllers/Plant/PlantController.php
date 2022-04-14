<?php

namespace App\Http\Controllers\Plant;

use App\Models\UserPlant;
use Illuminate\Http\Request;
use App\Models\Plant;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class PlantController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $plants = Plant::all();

        return view('plants.list',[
        'plants'=> $plants,
        ]);
    }
    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $plants = new UserPlant;
            $plants->user_id = Auth::user()->id;
            $plants->plant_id = $data['plant_id'];

            $plants->save();
        }


        return redirect('user-collection')->with('message','Roślina prawidłowo dodana do kolekcji!');
    }
    public function show()
    {

        $userId = Auth::id();
        $userPlants = User::find($userId);
        $plants = $userPlants->plants;

        return view('plants.show',[
            'plants'=> $plants,
        ]);
    }

}
