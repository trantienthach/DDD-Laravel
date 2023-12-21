<?php

namespace DDD\Domain\DomainEvents\Core;

class RepositoryEntityDeleted extends CoreRepositoryEvent
{
    protected string $action = 'deleted';
}
