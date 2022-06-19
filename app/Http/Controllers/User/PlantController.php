<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserNotes;
use App\Models\Note;
use App\Models\NotePlantUser;
use App\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Plant;
use App\Models\User;
use Illuminate\Support\Carbon;

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

        return view('plants.list', [
            'plants' => $plants,
        ]);
    }

    public function list()
    {
        $userPlants = $this->userRepository->list();

        return view('plants.userPlants', [
            'plants' => $userPlants
        ]);

    }

    public function edit(int $plantId)
    {
        return view('plants.edit', [
            'plant' => $this->userRepository->get($plantId),
            'user' => Auth::user(),
            'currentDate' => Carbon::today()->toDateString()
        ]);
    }

    public function update(UpdateUserNotes $request)
    {
        $data = $request->validated();

        $userId = Auth::id();
        $plantId = $data['plantId'];

        $note = new Note();
        $note->user_id = $userId;
        $note->title = $data['title'];
        $note->description = $data['description'];
        $note->date = $data['date'];
        $note->save();

        $noteid = $note->id;

        $userNote = NotePlantUser::where([
            ['plant_id', '=', $plantId],
            ['user_id', '=', $userId],
        ])->update(
            ['note_id'=>$noteid]
        );

//        $userNote->note_id = $noteid;
//
//        $userNote->save();

//        NotePlantUser::update(
//            ['user_id'=>$userId,
//            'plant_id'=>$plantId,
//            'note_id'=>$noteid]
//            );

        return redirect()
            ->route('user.plant.show', ['plantId' => $data['plantId']])
            ->with('message', 'Notatka została prawidłowo dodana!');
    }

    public function remove(Request $request)
    {
        $user = Auth::user();
        $plantId = (int)$request['plantId'];

        $plant = $this->userRepository->get($plantId);
        $user->removePlant($plant);

        return redirect()
            ->route('user.plant.list')
            ->with('message', 'Roślina prawidłowo usnięta z kolekcji!');
    }

    public function store(Request $request)
    {

        if ($request->isMethod('post')) {
            $userId = Auth::user()->id;
            $data = $request->all();
            $plantExist = NotePlantUser::where([['user_id', $userId], ['plant_id', $data['plant_id']]])->first();
            if ($plantExist === null) {
                $plants = new NotePlantUser;
                $plants->user_id = $userId;
                $plants->plant_id = $data['plant_id'];
                //dd($plants);
                $plants->save();
                $request->session()->flash('message', 'Roślina prawidłowo dodana do kolekcji!');
                return redirect('user-collection');
            } else {
                $request->session()->flash('message-error', 'Roślina istnieje już w kolekcji!');
                return redirect('user-collection');
            }
        }
    }

    public function userPlants()
    {

        $userId = Auth::id();
        $userPlants = User::find($userId);
        $plants = $userPlants->plants;

        return view('plants.userPlants', [
            'plants' => $plants,
        ]);
    }

    public function show(int $plantId)
    {
        $userNotes = $this->userRepository->getNotes($plantId);

        return view('plants.show', [
            'plant' => $this->userRepository->get($plantId),
            'notes' => $userNotes
        ]);
    }
}
