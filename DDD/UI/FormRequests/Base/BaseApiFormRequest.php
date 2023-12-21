<?php

namespace DDD\UI\FormRequests\Base;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

abstract class BaseApiFormRequest extends Request
{
    /**
     * @var \Illuminate\Contracts\Container\Container
     */
    protected $app;

    /**
     * @var \Illuminate\Contracts\Validation\Validator
     */
    protected $validator;

    protected $errorMessage = 'The given data was invalid.';

    protected $statusCode = 422;

    protected $afterValidateMergeData = [];

    public function errorResponse(): ?JsonResponse
    {
        return response()->json([
            'message' => $this->errorMessage,
            'errors' => $this->validator->errors()->messages(),
        ], $this->statusCode);
    }

    public function failedAuthorization(): void
    {
        throw new AuthorizationException();
    }

    public function validationFailed(): void
    {
        throw new ValidationException($this->validator, $this->errorResponse());
    }

    public function prepareForValidation()
    {
    }

    public function passedValidation()
    {
    }

    public function validated(): array
    {
        return $this->validator->validated();
    }

    public function validate(): void
    {
        if ($this->authorize() === false) {
            $this->failedAuthorization();
        }

        $this->setDefaults();

        $this->prepareForValidation();

        $this->validator = $this->app
            ->make('validator')
            ->make($this->all(), $this->rules(), $this->messages(), $this->attributes());

        if ($this->validator->fails()) {
            $this->validationFailed();
        }

        if (!blank($this->afterValidateMergeData)) {
            $this->validator->setData(
                array_merge(
                    $this->validator->getData(),
                    $this->validator->parseData($this->afterValidateMergeData)
                )
            );
        }

        $this->passedValidation();
    }

    public function mergeDataAfterValidate($data = [])
    {
        $this->afterValidateMergeData = $data;

        return $this;
    }

    public function setContainer($app)
    {
        $this->app = $app;
    }

    public function authorize(): bool
    {
        return true;
    }

    abstract public function rules(): array;

    public function messages(): array
    {
        return [];
    }

    public function attributes(): array
    {
        return [];
    }

    public function defaults(): array
    {
        return [];
    }

    private function setDefaults(): void
    {
        $defaults = [];
        foreach ($this->defaults() as $key => $default) {
            if (is_null($this->$key)) {
                $defaults[$key] = $default;
            }
        }

        $this->merge($defaults);
    }

    public function throw($key, $message = null)
    {
        if (is_array($key)) {
            $errors = $key;
        } else {
            $errors = [$key => $message];
        }

        throw ValidationException::withMessages($errors);
    }
}
