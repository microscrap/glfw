<?php

use Microscrap\Bindings\GLFW\Vulkan;
use Microscrap\Bindings\GLFW\DataObjects\GlfwWindow;

if (! function_exists('glfwVulkanSupported')) {
    function glfwVulkanSupported(): bool
    {
        return Vulkan::vulkanSupported();
    }
}

if (! function_exists('glfwGetRequiredInstanceExtensions')) {
    function glfwGetRequiredInstanceExtensions(): array
    {
        return Vulkan::getRequiredInstanceExtensions();
    }
}

if (! function_exists('glfwGetInstanceProcAddress')) {
    function glfwGetInstanceProcAddress(int $instance, string $procname): int
    {
        return Vulkan::getInstanceProcAddress($instance, $procname);
    }
}

if (! function_exists('glfwGetPhysicalDevicePresentationSupport')) {
    function glfwGetPhysicalDevicePresentationSupport(int $instance, int $device, int $queuefamily): bool
    {
        return Vulkan::getPhysicalDevicePresentationSupport($instance, $device, $queuefamily);
    }
}

if (! function_exists('glfwCreateWindowSurface')) {
    function glfwCreateWindowSurface(int $instance, GlfwWindow|int $window, int $allocator = 0): array
    {
        return Vulkan::createWindowSurface($instance, $window, $allocator);
    }
}
