<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Plant;

class PlantController extends Controller
{
    public function list()
    {
        $user = Auth::user();

        return view('plants.userPlants',[
            'plants'=> $user->plants()->paginate()
            ]);

    }
    public function remove(Request $request)
    {
        $user = Auth::user();
        $plantId = (int)$request['plantId'];
        $plant = Plant::find($plantId);
        $user->removePlant($plant);

        return redirect()
            ->route('user.plant.list')
            ->with('message','Roślina prawidłowo usnięta z kolekcji!');
    }
    public function show()
    {

    }
}
