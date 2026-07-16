<?php

use Microscrap\Bindings\GLFW\Init;
use Microscrap\Bindings\GLFW\Enums\InitHint;
use Microscrap\Bindings\GLFW\Enums\Platform;

if (! function_exists('glfwInit')) {
    function glfwInit(): bool
    {
        return Init::init();
    }
}

if (! function_exists('glfwTerminate')) {
    function glfwTerminate(): void
    {
        Init::terminate();
    }
}

if (! function_exists('glfwInitHint')) {
    function glfwInitHint(InitHint|int $hint, int $value): void
    {
        Init::initHint($hint, $value);
    }
}

if (! function_exists('glfwInitAllocator')) {
    function glfwInitAllocator(mixed $allocator = null): void
    {
        Init::initAllocator($allocator);
    }
}

if (! function_exists('glfwInitVulkanLoader')) {
    function glfwInitVulkanLoader(int $loader = 0): void
    {
        Init::initVulkanLoader($loader);
    }
}

if (! function_exists('glfwGetVersion')) {
    function glfwGetVersion(): array
    {
        return Init::getVersion();
    }
}

if (! function_exists('glfwGetVersionString')) {
    function glfwGetVersionString(): string
    {
        return Init::getVersionString();
    }
}

if (! function_exists('glfwSetErrorCallback')) {
    function glfwSetErrorCallback(?callable $callback = null): void
    {
        Init::setErrorCallback($callback);
    }
}

if (! function_exists('glfwGetPlatform')) {
    function glfwGetPlatform(): int
    {
        return Init::getPlatform();
    }
}

if (! function_exists('glfwPlatformSupported')) {
    function glfwPlatformSupported(Platform|int $platform): bool
    {
        return Init::platformSupported($platform);
    }
}
