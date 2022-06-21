<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;


use App\Repository\PlantRepository as PlantInterface;
use App\Models\Plant;


class PlantRepository implements PlantInterface
{
    private $plantModel;

    public function __construct(Plant $plantModel)
    {
        $this->plantModel = $plantModel;
    }

    public function filterBy(?string $phrase, int $size = 15)
    {
        $query = $this->plantModel
            ->orderBy('name');

        if($phrase)
        {
            $query->whereRaw('name like ?',["$phrase%"])->orWhereRaw('latinName like ?',["$phrase%"]);
        }

        return $query
            ->paginate($size);
    }

}
