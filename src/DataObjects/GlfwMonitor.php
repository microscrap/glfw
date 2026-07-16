<?php

namespace Microscrap\Bindings\GLFW\DataObjects;

/**
 * Typed handle for GLFWmonitor*.
 */
final readonly class GlfwMonitor
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
