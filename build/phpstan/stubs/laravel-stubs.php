<?php

// phpstan stub file for project-specific adjustments

namespace Illuminate\Database\Eloquent\Factories {
    /**
     * @template TModel of \Illuminate\Database\Eloquent\Model
     */
    trait HasFactory {}
}

// Common helpers for model array properties
namespace {
    /**
     * @param array $arr
     * @return array<string>
     */
    function _ensure_string_array(array $arr): array { return $arr; }
}
