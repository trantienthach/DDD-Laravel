<?php

namespace DDD\UI\FormRequests\Api;

use Illuminate\Http\JsonResponse;

interface BaseFormRequestInterface
{
    public function errorResponse(): ?JsonResponse;

    public function failedAuthorization(): void;

    public function validationFailed(): void;

    public function prepareForValidation();

    public function passedValidation();

    public function validated(): array;

    public function validate(): void;

    public function setContainer($app);

    public function authorize(): bool;

    public function rules(): array;

    public function messages(): array;

    public function attributes(): array;

    public function defaults(): array;
}
