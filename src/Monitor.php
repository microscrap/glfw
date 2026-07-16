<?php

namespace Microscrap\Bindings\GLFW;

use Glfw\GLFW\Monitor\GLFWMonitor as ExtMonitor;
use Microscrap\Bindings\GLFW\DataObjects\GlfwMonitor;

final class Monitor
{
    public static function getMonitors(): array
    {
        return array_values(array_filter(array_map(static fn (int $ptr): ?GlfwMonitor => GlfwMonitor::fromPtr($ptr), ExtMonitor::glfwGetMonitors())));
    }

    public static function getPrimaryMonitor(): ?GlfwMonitor
    {
        return GlfwMonitor::fromPtr(ExtMonitor::glfwGetPrimaryMonitor());
    }

    public static function getMonitorPos(GlfwMonitor|int $monitor): array
    {
        return ExtMonitor::glfwGetMonitorPos(self::monitorPtr($monitor));
    }

    public static function getMonitorWorkarea(GlfwMonitor|int $monitor): array
    {
        return ExtMonitor::glfwGetMonitorWorkarea(self::monitorPtr($monitor));
    }

    public static function getMonitorPhysicalSize(GlfwMonitor|int $monitor): array
    {
        return ExtMonitor::glfwGetMonitorPhysicalSize(self::monitorPtr($monitor));
    }

    public static function getMonitorContentScale(GlfwMonitor|int $monitor): array
    {
        return ExtMonitor::glfwGetMonitorContentScale(self::monitorPtr($monitor));
    }

    public static function getMonitorName(GlfwMonitor|int $monitor): string
    {
        return ExtMonitor::glfwGetMonitorName(self::monitorPtr($monitor));
    }

    public static function setMonitorUserPointer(GlfwMonitor|int $monitor, int $pointer): void
    {
        ExtMonitor::glfwSetMonitorUserPointer(self::monitorPtr($monitor), $pointer);
    }

    public static function getMonitorUserPointer(GlfwMonitor|int $monitor): int
    {
        return ExtMonitor::glfwGetMonitorUserPointer(self::monitorPtr($monitor));
    }

    public static function setMonitorCallback(?callable $callback = null): void
    {
        ExtMonitor::glfwSetMonitorCallback($callback);
    }

    public static function getVideoModes(GlfwMonitor|int $monitor): array
    {
        return ExtMonitor::glfwGetVideoModes(self::monitorPtr($monitor));
    }

    public static function getVideoMode(GlfwMonitor|int $monitor): array
    {
        return ExtMonitor::glfwGetVideoMode(self::monitorPtr($monitor));
    }

    public static function setGamma(GlfwMonitor|int $monitor, float $gamma): void
    {
        ExtMonitor::glfwSetGamma(self::monitorPtr($monitor), $gamma);
    }

    public static function getGammaRamp(GlfwMonitor|int $monitor): array
    {
        return ExtMonitor::glfwGetGammaRamp(self::monitorPtr($monitor));
    }

    public static function setGammaRamp(GlfwMonitor|int $monitor, array $ramp): void
    {
        ExtMonitor::glfwSetGammaRamp(self::monitorPtr($monitor), $ramp);
    }

    private static function monitorPtr(GlfwMonitor|int $monitor): int
    {
        return $monitor instanceof GlfwMonitor ? $monitor->ptr : $monitor;
    }

    private static function nullableMonitorPtr(GlfwMonitor|int|null $monitor): int|null
    {
        if (is_null($monitor)) {
            return null;
        }

        return self::monitorPtr($monitor);
    }
}
