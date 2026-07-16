<?php

use Microscrap\Bindings\GLFW\Monitor;
use Microscrap\Bindings\GLFW\DataObjects\GlfwMonitor;

if (! function_exists('glfwGetMonitors')) {
    function glfwGetMonitors(): array
    {
        return Monitor::getMonitors();
    }
}

if (! function_exists('glfwGetPrimaryMonitor')) {
    function glfwGetPrimaryMonitor(): ?GlfwMonitor
    {
        return Monitor::getPrimaryMonitor();
    }
}

if (! function_exists('glfwGetMonitorPos')) {
    function glfwGetMonitorPos(GlfwMonitor|int $monitor): array
    {
        return Monitor::getMonitorPos($monitor);
    }
}

if (! function_exists('glfwGetMonitorWorkarea')) {
    function glfwGetMonitorWorkarea(GlfwMonitor|int $monitor): array
    {
        return Monitor::getMonitorWorkarea($monitor);
    }
}

if (! function_exists('glfwGetMonitorPhysicalSize')) {
    function glfwGetMonitorPhysicalSize(GlfwMonitor|int $monitor): array
    {
        return Monitor::getMonitorPhysicalSize($monitor);
    }
}

if (! function_exists('glfwGetMonitorContentScale')) {
    function glfwGetMonitorContentScale(GlfwMonitor|int $monitor): array
    {
        return Monitor::getMonitorContentScale($monitor);
    }
}

if (! function_exists('glfwGetMonitorName')) {
    function glfwGetMonitorName(GlfwMonitor|int $monitor): string
    {
        return Monitor::getMonitorName($monitor);
    }
}

if (! function_exists('glfwSetMonitorUserPointer')) {
    function glfwSetMonitorUserPointer(GlfwMonitor|int $monitor, int $pointer): void
    {
        Monitor::setMonitorUserPointer($monitor, $pointer);
    }
}

if (! function_exists('glfwGetMonitorUserPointer')) {
    function glfwGetMonitorUserPointer(GlfwMonitor|int $monitor): int
    {
        return Monitor::getMonitorUserPointer($monitor);
    }
}

if (! function_exists('glfwSetMonitorCallback')) {
    function glfwSetMonitorCallback(?callable $callback = null): void
    {
        Monitor::setMonitorCallback($callback);
    }
}

if (! function_exists('glfwGetVideoModes')) {
    function glfwGetVideoModes(GlfwMonitor|int $monitor): array
    {
        return Monitor::getVideoModes($monitor);
    }
}

if (! function_exists('glfwGetVideoMode')) {
    function glfwGetVideoMode(GlfwMonitor|int $monitor): array
    {
        return Monitor::getVideoMode($monitor);
    }
}

if (! function_exists('glfwSetGamma')) {
    function glfwSetGamma(GlfwMonitor|int $monitor, float $gamma): void
    {
        Monitor::setGamma($monitor, $gamma);
    }
}

if (! function_exists('glfwGetGammaRamp')) {
    function glfwGetGammaRamp(GlfwMonitor|int $monitor): array
    {
        return Monitor::getGammaRamp($monitor);
    }
}

if (! function_exists('glfwSetGammaRamp')) {
    function glfwSetGammaRamp(GlfwMonitor|int $monitor, array $ramp): void
    {
        Monitor::setGammaRamp($monitor, $ramp);
    }
}
