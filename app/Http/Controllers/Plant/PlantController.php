<?php

namespace App\Http\Controllers\Plant;

use App\Models\UserPlant;
use Illuminate\Http\Request;
use App\Models\Plant;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use MongoDB\Driver\Session;

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
            $plantExist = UserPlant::where('plant_id', $data['plant_id'])->first();
            if($plantExist === null){
                $plants = new UserPlant;
                $plants->user_id = Auth::user()->id;
                $plants->plant_id = $data['plant_id'];
                $plants->save();
                $request->session()->flash('message','Roślina prawidłowo dodana do kolekcji!');
                return redirect('user-collection');
            }else{
                $request->session()->flash('message-error','Roślina istnieje już w kolekcji!');
                return redirect('user-collection');
            }
        }
    }

    public function userPlants()
    {

        $userId = Auth::id();
        $userPlants = User::find($userId);
        $plants = $userPlants->plants;

        return view('plants.userPlants',[
            'plants'=> $plants,
        ]);
    }

    public function destroy(Request $request, int $plantId)
    {
        $plant = UserPlant::where('plant_id',$plantId)
            ->where('user_id',Auth::id())
            ->get();
        //dd($plant);
        UserPlant::destroy($plant);
        $request->session()->flash('message','Roślina została usnięta z katalogu.');
        return redirect('user-collection');
    }
}
