<?php

use Microscrap\Bindings\GLFW\GL;
use Microscrap\Bindings\GLFW\Enums\ClearBufferMask;
use Microscrap\Bindings\GLFW\Enums\EnableCap;
use Microscrap\Bindings\GLFW\Enums\StringName;

if (! function_exists('glClearColor')) {
    function glClearColor(float $red, float $green, float $blue, float $alpha): void
    {
        GL::clearColor($red, $green, $blue, $alpha);
    }
}

if (! function_exists('glClear')) {
    function glClear(ClearBufferMask|int $mask): void
    {
        GL::clear($mask);
    }
}

if (! function_exists('glViewport')) {
    function glViewport(int $x, int $y, int $width, int $height): void
    {
        GL::viewport($x, $y, $width, $height);
    }
}

if (! function_exists('glScissor')) {
    function glScissor(int $x, int $y, int $width, int $height): void
    {
        GL::scissor($x, $y, $width, $height);
    }
}

if (! function_exists('glEnable')) {
    function glEnable(EnableCap|int $cap): void
    {
        GL::enable($cap);
    }
}

if (! function_exists('glDisable')) {
    function glDisable(EnableCap|int $cap): void
    {
        GL::disable($cap);
    }
}

if (! function_exists('glGetError')) {
    function glGetError(): int
    {
        return GL::getError();
    }
}

if (! function_exists('glGetString')) {
    function glGetString(StringName|int $name): string
    {
        return GL::getString($name);
    }
}
