<?php

namespace DDD\Domain\DomainEvents\Core;

class RepositoryEntityDeleting extends CoreRepositoryEvent
{
    protected string $action = 'deleting';
}
