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

    public function getUserNote(int $plantId, int $userId)
    {
        $note = NotePlantUser::join('notes','note_plant_user.note_id','notes.id')
            ->where('note_plant_user.user_id', Auth::id())
            ->where('note_plant_user.plant_id',$plantId)
            ->first();

        return $note;
    }

    public function createNote(int $userId, array $data)
    {
        $note = new Note();
        $note->user_id = $userId;
        $note->title = $data['title'];
        $note->description = $data['description'];
        $note->date = $data['date'];
        $note->save();

        return $note->id;
    }

    public function updateNote(int $plantId, int $userId, int $noteId): void
    {
        NotePlantUser::where([
            ['plant_id', '=', $plantId],
            ['user_id', '=', $userId],
        ])->update(
            ['note_id'=>$noteId]
        );
    }

    public function updateModel(User $user, array $data): void
    {
        $user->email = $data['email'] ?? $user->email;
        $user->name = $data['name'] ?? $user->name;
        $user->phone = $data['phone'] ?? $user->phone;
        $user->avatar = $data['avatar'] ?? null;

        $user->save();
    }
}


