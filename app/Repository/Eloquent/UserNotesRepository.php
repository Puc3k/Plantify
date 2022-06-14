<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;

use App\Models\User;
use App\Repository\UserNotesRepository as UserNotesInterface;
use App\Models\Plant;
use Illuminate\Support\Collection;


class UserNotesRepository implements UserNotesInterface
{
    private $plantModel;

    public function __construct(Plant $plantModel)
    {
        $this->plantModel = $plantModel;
    }

    public function updateModel(User $user, array $data)
    {
        return 0;
    }
    public function all()
    {
        return 0;
    }
    public function get(int $id)
    {
     return 0;
    }
}
