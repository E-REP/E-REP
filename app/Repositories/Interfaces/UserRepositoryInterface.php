<?php

namespace App\Repositories\Interfaces;

interface UserRepositoryInterface {
    public function allUsers();

    public function getVotes($userId);

    public function getReceivedVotes($userId);

    public function getReceivedPaginatedVotes($userId, $offset, $limit);

    public function getReceivedVotesCount($userId);

    public function createVote($userId, $vote);

    public function updateUser($userId, $details);
}
