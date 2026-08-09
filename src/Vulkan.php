<?php

namespace Microscrap\Bindings\GLFW;

use Glfw\GLFW\Vulkan\GLFWVulkan;
use Microscrap\Bindings\GLFW\DataObjects\GlfwWindow;

final class Vulkan
{
    public static function vulkanSupported(): bool
    {
        return GLFWVulkan::glfwVulkanSupported();
    }

    public static function getRequiredInstanceExtensions(): array
    {
        return GLFWVulkan::glfwGetRequiredInstanceExtensions();
    }

    public static function getInstanceProcAddress(int $instance, string $procname): int
    {
        return GLFWVulkan::glfwGetInstanceProcAddress($instance, $procname);
    }

    public static function getPhysicalDevicePresentationSupport(int $instance, int $device, int $queuefamily): bool
    {
        return GLFWVulkan::glfwGetPhysicalDevicePresentationSupport($instance, $device, $queuefamily);
    }

    public static function createWindowSurface(int $instance, GlfwWindow|int $window, int $allocator = 0): array
    {
        return GLFWVulkan::glfwCreateWindowSurface($instance, self::windowPtr($window), $allocator);
    }

    private static function windowPtr(GlfwWindow|int $window): int
    {
        return $window instanceof GlfwWindow ? $window->ptr : $window;
    }
}
