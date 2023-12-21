<?php

namespace DDD\Package\Supports\Migration;

class NameParser
{
    /**
     * The migration name.
     * @var string
     */
    protected $name;

    /**
     * The array data.
     * @var array
     */
    protected $data = [];

    /**
     * The available schema actions.
     *
     * @var array
     */
    protected $actions = [
        'create' => [
            'create',
            'make',
        ],
        'delete' => [
            'delete',
            'remove',
        ],
        'add' => [
            'add',
            'update',
            'append',
            'insert',
        ],
        'drop' => [
            'destroy',
            'drop',
        ],
    ];

    public function __construct($name)
    {
        $this->name = $name;
        $this->data = $this->fetchData();
    }

    /**
     * Fetch the migration name to an array data.
     * @return array
     */
    protected function fetchData()
    {
        return explode('_', $this->name);
    }

    public function getAction()
    {
        return head($this->data);
    }

    /**
     * Determine whether the current schema action is an creating action.
     * @return bool
     */
    public function isCreate()
    {
        return in_array($this->getAction(), $this->actions['create']);
    }

    public function getTableName()
    {
        $matches = array_reverse($this->getMatches());

        return array_shift($matches);
    }

    public function getMatches()
    {
        preg_match($this->getPattern(), $this->name, $matches);

        return $matches;
    }

    public function getPattern()
    {
        switch ($action = $this->getAction()) {
            case 'create':
                return "/{$action}_(.*)_to_(.*)_table/";

                break;
            default:
                break;
        }
    }
}
