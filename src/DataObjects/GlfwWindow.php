<?php

namespace Microscrap\Bindings\GLFW\DataObjects;

/**
 * Typed handle for GLFWwindow*.
 */
final readonly class GlfwWindow
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
