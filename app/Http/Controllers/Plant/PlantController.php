<?php

namespace App\Http\Controllers\Plant;

use App\Repository\PlantRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    private PlantRepository $plantRepository;

    public function __construct(PlantRepository $plantRepository)
    {
        $this->plantRepository = $plantRepository;
    }

    public function index(Request $request)
    {
        $phrase = $request->get('phrase');
        $size = $request->get('size', 15);

        $resultPaginator = $this->plantRepository->filterBy($phrase, $size);
        $resultPaginator->appends([
            'phrase' => $phrase,
        ]);

//        $plants = Plant::all();

        return view('plants.list', [
            'plants' => $resultPaginator,
            'phrase' => $phrase
        ]);
    }
}
