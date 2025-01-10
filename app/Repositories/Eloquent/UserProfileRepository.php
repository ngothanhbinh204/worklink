<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Contracts\UserProfileRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class UserProfileRepository extends BaseRepository implements UserProfileRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    // Your custom methods here
}