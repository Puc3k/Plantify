<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlantController extends Controller
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
     $this->userRepository = $userRepository;
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

    public function show(int $plantId)
    {
        return view('plants.show',[
            'plant' => $this->userRepository->get($plantId),
        ]);
    }
}
