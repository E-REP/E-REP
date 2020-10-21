<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

use App\Services\Interfaces\UserServiceInterface;
use App\Repositories\UserRepository;

class UserService implements UserServiceInterface {
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getProfile($userId) {
        $details = $this->getProfileDetails($userId);
        $reputation = $this->getReputation($userId);

        $details['reputation'] = $reputation;

        return $details;
    }

    public function getReceivedVotes($userId, $page = 1, $limit = 5) {
        if (is_null($page) || $page <= 0) {
            $page = 1;
        }

        $offset = ($page - 1) * $limit;
        $votes = $this->userRepository->getReceivedPaginatedVotes($userId, $offset, $limit);
        $count = $this->userRepository->getReceivedVotesCount($userId);

        $data = array(
            'count' => $count,
            'items' => $votes
        );

        return $data;
    }

    public function createVote($userId, $vote) {
        $vote = $this->userRepository->createVote($userId, $vote);

        return $vote;
    }

    public function updateImage($userId, $image) {
        $path = $image->store('images');

        $this->deleteImage($userId);

        $this->userRepository->updateUser($userId, array('image_path' => $path));

        return $path;
    }

    public function deleteImage($userId) {
        $user = $this->userRepository->getUser($userId);

        if ($user->image_path) {
            Storage::delete("{$user->image_path}");

            $this->userRepository->updateUser($userId, array('image_path' => null));
        }

    }

    public function updateProfile($userId, $details) {
        $user = $this->userRepository->updateUser($userId, $details);

        return $user;
    }

    private function getProfileDetails($userId) {
        $user = $this->userRepository->getUser($userId);

        return array(
            'id' => $user->id,
            'name' => $user->name,
            'image_path' => $user->image_path,
            'created_at' => $user->created_at
        );
    }

    private function getReputation($userId) {
        $votes = $this->userRepository->getReceivedVotes($userId);
        $reputation = 0;

        foreach ($votes as $vote) {
            $reputation += $vote->value;
        }

        return $reputation;
    }
}
