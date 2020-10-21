<?php

namespace App\Services\Interfaces;

interface UserServiceInterface {
    function getProfile($userId);

    function getReceivedVotes($userId);

    function updateImage($userId, $image);

    function deleteImage($userId);

    function updateProfile($userId, $details);

    function createVote($userId, $vote);
}
