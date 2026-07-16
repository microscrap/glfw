<?php

use Microscrap\Bindings\GLFW\Context;
use Microscrap\Bindings\GLFW\DataObjects\GlfwWindow;

if (! function_exists('glfwMakeContextCurrent')) {
    function glfwMakeContextCurrent(GlfwWindow|int $window): void
    {
        Context::makeContextCurrent($window);
    }
}

if (! function_exists('glfwGetCurrentContext')) {
    function glfwGetCurrentContext(): ?GlfwWindow
    {
        return Context::getCurrentContext();
    }
}

if (! function_exists('glfwSwapBuffers')) {
    function glfwSwapBuffers(GlfwWindow|int $window): void
    {
        Context::swapBuffers($window);
    }
}

if (! function_exists('glfwSwapInterval')) {
    function glfwSwapInterval(int $interval): void
    {
        Context::swapInterval($interval);
    }
}

if (! function_exists('glfwExtensionSupported')) {
    function glfwExtensionSupported(string $extension): bool
    {
        return Context::extensionSupported($extension);
    }
}

if (! function_exists('glfwGetProcAddress')) {
    function glfwGetProcAddress(string $procname): int
    {
        return Context::getProcAddress($procname);
    }
}
