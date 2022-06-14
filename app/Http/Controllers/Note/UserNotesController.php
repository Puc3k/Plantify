<?php

namespace App\Http\Controllers\Note;

use App\Http\Controllers\Controller;
use App\Repository\UserNotesRepository;
use App\Repository\UserRepository;
use Illuminate\Http\Request;

class UserNotesController extends Controller
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function all()
    {

    }
}
