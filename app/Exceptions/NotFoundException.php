<?php

declare(strict_types=1);

namespace App\Exceptions;

use RuntimeException;

/**
 * Thrown when a domain resource cannot be located.
 */
class NotFoundException extends RuntimeException {}
