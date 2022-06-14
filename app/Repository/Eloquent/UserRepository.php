<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;

use App\Models\NotePlantUser;
use App\Repository\UserRepository as UserRepositoryInterface;
use App\Models\Plant;
use Illuminate\Support\Facades\Auth;
use Ramsey\Collection\Collection;
use App\Models\User;
use App\Models\Note;

class UserRepository implements UserRepositoryInterface
{
    private $plantModel;
    private $noteModel;

    public function __construct(Plant $plantModel, Note $noteModel)
    {
        $this->plantModel = $plantModel;
        $this->noteModel = $noteModel;
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

    public function getNotes(int $plantId)
    {

        $notes = NotePlantUser::join('users','note_plant_user.user_id','users.id')
        ->join('plants','note_plant_user.plant_id','plants.id')
        ->join('notes','note_plant_user.note_id','notes.id')
        ->where('note_plant_user.user_id', Auth::id())
        ->where('note_plant_user.plant_id',$plantId)
        ->get();

        return $notes;
    }
}


