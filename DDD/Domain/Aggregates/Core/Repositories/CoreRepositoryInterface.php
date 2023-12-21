<?php

namespace DDD\Domain\Aggregates\Core\Repositories;

use Illuminate\Database\Eloquent\Model;

interface CoreRepositoryInterface
{
    /**
     * Append sort by id desc to query.
     *
     * @param bool $bool
     *
     * @return $this
     */
    public function appendIdSort($bool = true);

    /**
     * Sync relations.
     *
     * @param $id
     * @param $relation
     * @param $attributes
     * @param bool $detaching
     *
     * @return mixed
     */
    public function sync($id, $relation, $attributes, $detaching = true);

    /**
     * SyncWithoutDetaching.
     *
     * @param $id
     * @param $relation
     * @param $attributes
     *
     * @return mixed
     */
    public function syncWithoutDetaching($id, $relation, $attributes);

    /**
     * Retrieve all data of repository with conditions, pagination|collection.
     *
     * @param array    $where    ['columnName' => 'equalValue'] or [['columnName', '>', 'gtValue']]
     * @param int|null $limit
     * @param array    $columns
     * @param bool     $paginate
     * @param ?string     $paginationType
     *
     * @return mixed
     */
    public function search($where = [], $limit = null, $columns = ['*'], $paginate = true, $paginationType = null);

    /**
     * Set the columns to be selected.
     *
     * @param array|mixed $columns
     *
     * @return $this
     */
    public function selectColumns($columns = ['*']);

    /**
     * Add a "group by" clause to the query.
     *
     * @param array|string ...$groups
     *
     * @return $this
     */
    public function groupBy(...$groups);


    public function useIndex($indexes = []);

    public function havingRaw($raw, $bindings = []);

    /**
     * Retrieve all data of repository by cms structure.
     *
     * @param array    $where    ['columnName' => 'equalValue'] or [['columnName', '>', 'gtValue']]
     * @param int|null $limit
     * @param array    $columns
     * @param bool     $paginate
     *
     * @return mixed
     */
    public function cmsSearch($where = [], $limit = null, $skip = 0, $columns = ['*']);

    /**
     * Apply query LIKE for specific columns.
     *
     * @param string|null $value
     * @param array|null  $columns
     * @param string      $operation
     *
     * @return $this
     */
    public function whereColumnsLike($value = null, array $columns = [], $operation = 'or');

    /**
     * Apply directly query LIKE for specific columns.
     *
     * @param string|null $value
     * @param string      $operation
     *
     * @return $this
     */
    public function applyWhereColumnsLike($value, array $columns = [], $operation = 'or');

    /**
     * Retrieve all data of repository.
     *
     * @param array $columns
     *
     * @return mixed
     */
    public function all($columns = ['*']);

    /**
     * Query lazily, by chunking the results of a query by comparing IDs.
     *
     * @param  int  $chunkSize
     * @param  string|null  $column
     * @param  string|null  $alias
     * @return \Illuminate\Support\LazyCollection
     *
     * @throws \InvalidArgumentException
     */
    public function lazyById($chunkSize = 1000, $column = null, $alias = null);

    /**
     * Retrieve all data of repository, paginated.
     *
     * @param null  $limit
     * @param array $columns
     *
     * @return mixed
     */
    public function paginate($limit = null, $columns = ['*']);

    /**
     * Set the "limit" value of the query.
     *
     * @param int $limit
     *
     * @return $this
     */
    public function take($limit);

    /**
     * Retrieve data of repository with limit applied.
     *
     * @param int   $limit
     * @param array $columns
     *
     * @return mixed
     */
    public function limit($limit, $columns = ['*']);

    /**
     * Retrieve all data of repository, simple paginated.
     *
     * @param null  $limit
     * @param array $columns
     *
     * @return mixed
     */
    public function simplePaginate($limit = null, $columns = ['*']);

    /**
     * Find data by id.
     *
     * @param       $id
     * @param array $columns
     *
     * @return mixed
     */
    public function find($id, $columns = ['*']);

    /**
     * Find data by id or throw exception.
     *
     * @param       $id
     * @param array $columns
     *
     * @return mixed
     */
    public function findOrFail($id, $columns = ['*']);

    /**
     * Retrieve first data of repository.
     *
     * @param array $columns
     *
     * @return mixed
     */
    public function first($columns = ['*']);

    /**
     * Receive first data by field and value.
     *
     * @param       $field
     * @param       $value
     * @param array $columns
     *
     * @return mixed
     */
    public function firstByField($field, $value = null, $columns = ['*']);

    /**
     * Receive first data by multiple fields.
     *
     * @param array $columns
     *
     * @return mixed
     */
    public function firstWhere(array $where, $columns = ['*']);

    /**
     * Find data by field and value.
     *
     * @param string $field
     * @param mixed  $value
     * @param array  $columns
     *
     * @return mixed
     */
    public function findByField($field, $value, $columns = ['*']);

    /**
     * Find data by multiple fields.
     *
     * @param array $columns
     *
     * @return mixed
     */
    public function findWhere(array $where, $columns = ['*']);

    /**
     * Find data by multiple values in one field.
     *
     * @param       $field
     * @param array $columns
     *
     * @return mixed
     */
    public function findWhereIn($field, array $values, $columns = ['*']);

    /**
     * Find data by excluding multiple values in one field.
     *
     * @param       $field
     * @param array $columns
     *
     * @return mixed
     */
    public function findWhereNotIn($field, array $values, $columns = ['*']);

    /**
     * Find data by between values in one field.
     *
     * @param       $field
     * @param array $columns
     *
     * @return mixed
     */
    public function findWhereBetween($field, array $values, $columns = ['*']);

    /**
     * Model will action without firing any model events for any model type.
     *
     * @return void
     */
    public function withoutDispatch();

    /**
     * Save a new entity in repository.
     *
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * Update a entity in repository by id.
     *
     * @param $id
     *
     * @return mixed
     */
    public function update(array $attributes, $id);

    /**
     * Update a entity in repository by id  quietly.
     *
     * @param $id
     *
     * @return mixed
     */
    public function updateQuietly(array $attributes, $id);

    /**
     * Update or Create an entity in repository.
     *
     * @return mixed
     */
    public function updateOrCreate(array $attributes, array $values = []);

    /**
     * Delete a entity in repository by id.
     *
     * @param $id
     *
     * @return int
     */
    public function delete($id);

    /**
     * Delete multiple entities by given condition.
     *
     * @return int
     */
    public function deleteWhere(array $where);

    /**
     * Restore a entity in repository by id.
     *
     * @param Model|mixed $id
     *
     * @return mixed
     */
    public function restore($id);

    /**
     * Order collection by a given column.
     *
     * @param string $column
     * @param string $direction
     *
     * @return $this
     */
    public function orderBy($column, $direction = 'asc');

    /**
     * Load relations.
     *
     * @param $relations
     *
     * @return $this
     */
    public function with($relations);

    /**
     * Load with trashed.
     *
     * @param bool $withTrashed
     *
     * @return $this
     */
    public function withTrashed($withTrashed = true);

    /**
     * Load relation with closure.
     *
     * @param string  $relation
     * @param \Closure $closure
     *
     * @return $this
     */
    public function whereHas($relation, $closure);

    /**
     * Count results of repository.
     *
     * @param string $columns
     *
     * @return int
     */
    public function count(array $where = [], $columns = '*');

    /**
     * Check if exists results of repository.
     *
     * @return bool
     */
    public function exists(array $where = []);

    /**
     * Add subselect queries to count the relations.
     *
     * @param mixed $relations
     *
     * @return $this
     */
    public function withCount($relations);

    /**
     * Set hidden fields.
     *
     * @return $this
     */
    public function hidden(array $fields);

    /**
     * Set visible fields.
     *
     * @return $this
     */
    public function visible(array $fields);

    /**
     * Add Query Scope.
     *
     * @return $this
     */
    public function scopeQuery(\Closure $scope);

    /**
     * Reset Query Scope.
     *
     * @return $this
     */
    public function resetScopeQuery();

    /**
     * Reset Query Scope.
     *
     * @return $this
     */
    public function resetScope();

    /**
     * Reset The Repository.
     *
     * @return $this
     */
    public function resetRepository();

    /**
     * add sort to the repository.
     *
     * @param string $orderBy
     * @param string $sortBy
     *
     * @return $this
     */
    public function addSort($orderby, $sortBy = 'desc');

    /**
     * add default sort to the repository.
     *
     * @param string $sortBy
     * @param string $orderBy
     *
     * @return $this
     */
    public function defaultSort($orderby, $sortBy = 'desc');

    /**
     * Apply eloquent model scope in current Query.
     *
     * @return $this
     */
    public function modelScopes($scopes);

    /**
     * Passing params to model scopes in current Query
     * Only accept scope with no params passing.
     *
     * @example : $scopes = ['scopeName' => 'paramsOfScope']
     *
     * @return $this
     */
    public function modelScopeParams($scopeParams);

    /**
     * Get Searchable Fields.
     *
     * @return array
     */
    public function getFieldsSearchable();

    /**
     * Returns the current Model instance.
     *
     * @return Model
     */
    public function getModel();

    /**
     * Returns the new Model instance.
     *
     * @return Model
     */
    public function getNewModel();

    /**
     * Retrieve first data of repository, or return new Entity.
     *
     * @return mixed
     */
    public function firstOrNew(array $attributes = [], array $values = []);

    /**
     * Retrieve first data of repository, or create new Entity.
     *
     * @return mixed
     */
    public function firstOrCreate(array $attributes = [], array $values = []);

    /**
     * Lock the table where conditions.
     *
     * @param array $where
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function lockForUpdateByCondition($where);

    public function dd();

    /**
     * @return \Illuminate\Database\Query\Builder
     */
    public function getQuery();

    /**
     * Load cms collection entry data.
     *
     * @param array $filter
     * @param array $fields
     * @param array $options
     *
     * @return $this
     */
    public function withCmsCollectionEntry($filter = [], $fields = [], $options = []);

    public function distinct($columns = []);

    public function throwEntityNotFoundException();

    /**
     * Trigger static method calls to the model.
     *
     * @param $method
     * @param $arguments
     *
     * @return mixed
     */
    public static function __callStatic($method, $arguments);

    /**
     * Trigger method calls to the model.
     *
     * @param string $method
     * @param array  $arguments
     *
     * @return mixed
     */
    public function __call($method, $arguments);
}
