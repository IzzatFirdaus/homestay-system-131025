<?php

declare(strict_types=1);

namespace App\Exceptions;

use RuntimeException;

/**
 * Domain-level import failure wrapper to distinguish recoverable errors.
 */
class ImportException extends RuntimeException {}
