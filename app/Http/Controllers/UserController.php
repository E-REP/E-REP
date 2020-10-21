<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

use App\User;

use App\Services\UserService;

class UserController extends Controller {
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    function getAuthUser() {
        return Auth::id();
    }

    function getProfile(User $user) {
        $profile = $this->userService->getProfile($user->id);

        return response()->json($profile);
    }

    function getReceivedVotes(Request $request, User $user) {
        $page = $request->query('page');
        $votes = $this->userService->getReceivedVotes($user->id, $page);

        return response()->json($votes);
    }

    function postUserVote(Request $request, User $user) {
        $validatedData = $request->validate([
            'description' => 'required|max:512',
            'value' => ['required', 'integer', Rule::in([-1, 1])]
        ]);

        $validatedData['receiver_id'] = $user->id;

        $vote = $this->userService->createVote(Auth::id(), $validatedData);

        return response()->json($vote);
    }

    function postProfileImage(Request $request, User $user) {
        // TODO: Make a middleware for permission to edit only your own profile
        if (Auth::id() !== $user->id) {
            return;
        }

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $image = $request->file('image');

        $path = $this->userService->updateImage($user->id, $image);

        return $path;
    }

    function deleteProfileImage(User $user) {
        // TODO: Make a middleware for permission to edit only your own profile
        if (Auth::id() !== $user->id) {
            return;
        }

        $this->userService->deleteImage($user->id);

        return;
    }

    function patchUser(Request $request, User $user) {
        // TODO: Make a middleware for permission to edit only your own profile
        if (Auth::id() !== $user->id) {
            return;
        }

        $validatedData = $request->validate([
            'name' => 'min:1|max:64',
        ]);

        $user = $this->userService->updateProfile($user->id, $validatedData);

        return $user;
    }
}
