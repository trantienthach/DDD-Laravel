<?php

namespace DDD\Domain\DomainEvents\Core;

class RepositoryEntityUpdating extends CoreRepositoryEvent
{
    protected string $action = 'updating';
}
