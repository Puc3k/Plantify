<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\NotePlantUser;
use App\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Plant;
use App\Models\User;

class PlantController extends Controller
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
     $this->userRepository = $userRepository;
    }

    public function index()
    {
        $plants = Plant::all();

        return view('plants.list',[
        'plants'=> $plants,
        ]);
    }

    public function list()
    {
        $userPlants = $this->userRepository->list();

        return view('plants.userPlants',[
            'plants'=> $userPlants
            ]);

    }
    public function remove(Request $request)
    {
        $user = Auth::user();
        $plantId = (int)$request['plantId'];

        $plant = $this->userRepository->get($plantId);
        $user->removePlant($plant);

        return redirect()
            ->route('user.plant.list')
            ->with('message','Roślina prawidłowo usnięta z kolekcji!');
    }

    public function store(Request $request)
    {

        if ($request->isMethod('post')) {
            $userId = Auth::user()->id;
            $data = $request->all();
            $plantExist = NotePlantUser::where([['user_id',$userId],['plant_id', $data['plant_id']]])->first();
            if($plantExist === null){
                $plants = new NotePlantUser;
                $plants->user_id = $userId;
                $plants->plant_id = $data['plant_id'];
                //dd($plants);
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

    public function show(int $plantId)
    {
        $userNotes = $this->userRepository->getNotes($plantId);

        return view('plants.show',[
            'plant' => $this->userRepository->get($plantId),
            'notes'=>$userNotes
        ]);
    }
}
