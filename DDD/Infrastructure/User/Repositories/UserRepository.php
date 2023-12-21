<?php

namespace DDD\Infrastructure\User\Repositories;

use DDD\Domain\Aggregates\User\Entities\User;
use DDD\Domain\Aggregates\User\Repositories\UserRepositoryInterface;
use DDD\Infrastructure\Core\Repositories\CoreRepository;

class UserRepository extends CoreRepository implements UserRepositoryInterface
{
    public function model()
    {
        return User::class;
    }
}
