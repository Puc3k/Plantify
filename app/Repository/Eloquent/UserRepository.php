<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;

use App\Repository\UserRepository as UserRepositoryInterface;
use App\Models\Plant;
use Illuminate\Support\Facades\Auth;


class UserRepository implements UserRepositoryInterface
{
    private $plantModel;

    public function __construct(Plant $plantModel)
    {
        $this->plantModel = $plantModel;
    }

    public function list()
    {
        $user = Auth::user();

        return $user->plants()->paginate();
    }
    public function get(int $plantId)
    {
      return $this->plantModel->find($plantId);

    }
}
