<?php

declare(strict_types=1);

namespace App\Exceptions;

use RuntimeException;

/**
 * Thrown when domain-level validation constraints are violated.
 */
class ValidationException extends RuntimeException
{
    /**
     * @param  string  $message  Localized error message.
     * @param  array<string, mixed>  $context  Optional structured details.
     */
    public function __construct(string $message, public readonly array $context = [])
    {
        parent::__construct($message);
    }
}
