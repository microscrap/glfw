<?php

namespace Microscrap\Bindings\GLFW\DataObjects;

/**
 * Typed handle for GLFWcursor*.
 */
final readonly class GlfwCursor
{
    public function __construct(
        public int $ptr,
    ) {}

    public static function fromPtr(int $ptr): ?self
    {
        if ($ptr <= 0) {
            return null;
        }

        return new self($ptr);
    }
}
