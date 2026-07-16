<?php

namespace Microscrap\Bindings\GLFW;

use Glfw\GLFW\GLFWError;

final class Error
{
    public static function getError(): array
    {
        return GLFWError::glfwGetError();
    }
}
