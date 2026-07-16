<?php

namespace Microscrap\Bindings\GLFW;

use Glfw\GLFW\GL\GLFWGL;
use Microscrap\Bindings\GLFW\Enums\ClearBufferMask;
use Microscrap\Bindings\GLFW\Enums\EnableCap;
use Microscrap\Bindings\GLFW\Enums\StringName;

final class GL
{
    public static function clearColor(float $red, float $green, float $blue, float $alpha): void
    {
        GLFWGL::glClearColor($red, $green, $blue, $alpha);
    }

    public static function clear(ClearBufferMask|int $mask): void
    {
        GLFWGL::glClear($mask instanceof ClearBufferMask ? $mask->value : $mask);
    }

    public static function viewport(int $x, int $y, int $width, int $height): void
    {
        GLFWGL::glViewport($x, $y, $width, $height);
    }

    public static function scissor(int $x, int $y, int $width, int $height): void
    {
        GLFWGL::glScissor($x, $y, $width, $height);
    }

    public static function enable(EnableCap|int $cap): void
    {
        GLFWGL::glEnable($cap instanceof EnableCap ? $cap->value : $cap);
    }

    public static function disable(EnableCap|int $cap): void
    {
        GLFWGL::glDisable($cap instanceof EnableCap ? $cap->value : $cap);
    }

    public static function getError(): int
    {
        return GLFWGL::glGetError();
    }

    public static function getString(StringName|int $name): string
    {
        return GLFWGL::glGetString($name instanceof StringName ? $name->value : $name);
    }
}
