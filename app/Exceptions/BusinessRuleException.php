<?php

declare(strict_types=1);

namespace App\Exceptions;

use RuntimeException;

/**
 * Raised when a business rule prevents an operation from completing.
 */
class BusinessRuleException extends RuntimeException {}
