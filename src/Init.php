<?php

namespace Microscrap\Bindings\GLFW;

use Glfw\GLFW\GLFW;
use Microscrap\Bindings\GLFW\Enums\InitHint;
use Microscrap\Bindings\GLFW\Enums\Platform;

final class Init
{
    public static function init(): bool
    {
        return GLFW::glfwInit();
    }

    public static function terminate(): void
    {
        GLFW::glfwTerminate();
    }

    public static function initHint(InitHint|int $hint, int $value): void
    {
        GLFW::glfwInitHint($hint instanceof InitHint ? $hint->value : $hint, $value);
    }

    public static function initAllocator(mixed $allocator = null): void
    {
        GLFW::glfwInitAllocator($allocator);
    }

    public static function initVulkanLoader(int $loader = 0): void
    {
        GLFW::glfwInitVulkanLoader($loader);
    }

    public static function getVersion(): array
    {
        return GLFW::glfwGetVersion();
    }

    public static function getVersionString(): string
    {
        return GLFW::glfwGetVersionString();
    }

    public static function setErrorCallback(?callable $callback = null): void
    {
        GLFW::glfwSetErrorCallback($callback);
    }

    public static function getPlatform(): int
    {
        return GLFW::glfwGetPlatform();
    }

    public static function platformSupported(Platform|int $platform): bool
    {
        return GLFW::glfwPlatformSupported($platform instanceof Platform ? $platform->value : $platform);
    }
}
