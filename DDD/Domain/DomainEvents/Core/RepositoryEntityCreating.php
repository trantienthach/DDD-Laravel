<?php

namespace DDD\Domain\DomainEvents\Core;

use DDD\Domain\Aggregates\Core\Repositories\CoreRepositoryInterface;

class RepositoryEntityCreating extends CoreRepositoryEvent
{
    protected string $action = 'creating';

    public function __construct(CoreRepositoryInterface $repository, array $model)
    {
        parent::__construct($repository);

        $this->model = $model;
    }
}
