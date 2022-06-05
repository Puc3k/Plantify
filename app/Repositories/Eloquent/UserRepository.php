<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;

use App\Repositories\PlantRepository as PlantRepositoryInterface;
use App\Models\Plant;
use Illuminate\Support\Facades\Auth;


class UserRepository implements PlantRepositoryInterface
{
    private $plantModel;

    public function __construct(Plant $plantModel)
    {
        $this->plantModel = $plantModel;
    }

    public function list()
    {
        $user = Auth::user();

        return view('plants.usePlant',[
           'plants'=> $user->plants()->paginate()
        ]);
    }
    public function get(int $plantId)
    {
        return view('plant.show',[
            'plant'=>$this->plantModel->find($plantId)
        ]);

    }
}
