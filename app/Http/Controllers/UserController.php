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

    function getProfile(User $user) {
        $profile = $this->userService->getProfile($user->id);

        return $profile;
    }

    function getReceivedVotes(Request $request, User $user) {
        $page = $request->query('page');
        $votes = $this->userService->getReceivedVotes($user->id, $page);

        return $votes;
    }

    function postUserVote(Request $request, User $user) {
        $validatedData = $request->validate([
            'description' => 'required|max:512',
            'value' => ['required', 'integer', Rule::in([-1, 1])]
        ]);

        $validatedData['receiver_id'] = $user->id;

        $vote = $this->userService->createVote(Auth::id(), $validatedData);

        return $vote;
    }

    function postProfileImage(Request $request) {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $image = $request->file('image');

        // TODO: Pass authed User ID
        $path = $this->userService->updateImage(Auth::id(), $image);

        return $path;
    }

    function deleteProfileImage() {
        $this->userService->deleteImage(1);
        return 'kekw';
    }

    function patchUser(Request $request, User $user) {
        // TODO: Check if user is editing his own profile

        $validatedData = $request->validate([
            'name' => 'min:1|max:64',
        ]);

        $user = $this->userService->updateProfile($user->id, $validatedData);

        return $user;
    }
}
