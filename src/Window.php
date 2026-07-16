<?php

namespace Microscrap\Bindings\GLFW;

use Glfw\GLFW\Window\GLFWWindow as ExtWindow;
use Microscrap\Bindings\GLFW\DataObjects\GlfwMonitor;
use Microscrap\Bindings\GLFW\DataObjects\GlfwWindow;
use Microscrap\Bindings\GLFW\Enums\WindowAttrib;
use Microscrap\Bindings\GLFW\Enums\WindowHint;

final class Window
{
    public static function defaultWindowHints(): void
    {
        ExtWindow::glfwDefaultWindowHints();
    }

    public static function windowHint(WindowHint|int $hint, int $value): void
    {
        ExtWindow::glfwWindowHint($hint instanceof WindowHint ? $hint->value : $hint, $value);
    }

    public static function windowHintString(WindowHint|int $hint, string $value): void
    {
        ExtWindow::glfwWindowHintString($hint instanceof WindowHint ? $hint->value : $hint, $value);
    }

    public static function createWindow(int $width, int $height, string $title, GlfwMonitor|int|null $monitor = null, GlfwWindow|int|null $share = null): ?GlfwWindow
    {
        return GlfwWindow::fromPtr(ExtWindow::glfwCreateWindow($width, $height, $title, self::nullableMonitorPtr($monitor), self::nullableWindowPtr($share)));
    }

    public static function destroyWindow(GlfwWindow|int $window): void
    {
        ExtWindow::glfwDestroyWindow(self::windowPtr($window));
    }

    public static function windowShouldClose(GlfwWindow|int $window): bool
    {
        return ExtWindow::glfwWindowShouldClose(self::windowPtr($window));
    }

    public static function setWindowShouldClose(GlfwWindow|int $window, int $value): void
    {
        ExtWindow::glfwSetWindowShouldClose(self::windowPtr($window), $value);
    }

    public static function getWindowTitle(GlfwWindow|int $window): string
    {
        return ExtWindow::glfwGetWindowTitle(self::windowPtr($window));
    }

    public static function setWindowTitle(GlfwWindow|int $window, string $title): void
    {
        ExtWindow::glfwSetWindowTitle(self::windowPtr($window), $title);
    }

    public static function setWindowIcon(GlfwWindow|int $window, array $images): void
    {
        ExtWindow::glfwSetWindowIcon(self::windowPtr($window), $images);
    }

    public static function getWindowPos(GlfwWindow|int $window): array
    {
        return ExtWindow::glfwGetWindowPos(self::windowPtr($window));
    }

    public static function setWindowPos(GlfwWindow|int $window, int $xpos, int $ypos): void
    {
        ExtWindow::glfwSetWindowPos(self::windowPtr($window), $xpos, $ypos);
    }

    public static function getWindowSize(GlfwWindow|int $window): array
    {
        return ExtWindow::glfwGetWindowSize(self::windowPtr($window));
    }

    public static function setWindowSizeLimits(GlfwWindow|int $window, int $minwidth, int $minheight, int $maxwidth, int $maxheight): void
    {
        ExtWindow::glfwSetWindowSizeLimits(self::windowPtr($window), $minwidth, $minheight, $maxwidth, $maxheight);
    }

    public static function setWindowAspectRatio(GlfwWindow|int $window, int $numer, int $denom): void
    {
        ExtWindow::glfwSetWindowAspectRatio(self::windowPtr($window), $numer, $denom);
    }

    public static function setWindowSize(GlfwWindow|int $window, int $width, int $height): void
    {
        ExtWindow::glfwSetWindowSize(self::windowPtr($window), $width, $height);
    }

    public static function getFramebufferSize(GlfwWindow|int $window): array
    {
        return ExtWindow::glfwGetFramebufferSize(self::windowPtr($window));
    }

    public static function getWindowFrameSize(GlfwWindow|int $window): array
    {
        return ExtWindow::glfwGetWindowFrameSize(self::windowPtr($window));
    }

    public static function getWindowContentScale(GlfwWindow|int $window): array
    {
        return ExtWindow::glfwGetWindowContentScale(self::windowPtr($window));
    }

    public static function getWindowOpacity(GlfwWindow|int $window): float
    {
        return ExtWindow::glfwGetWindowOpacity(self::windowPtr($window));
    }

    public static function setWindowOpacity(GlfwWindow|int $window, float $opacity): void
    {
        ExtWindow::glfwSetWindowOpacity(self::windowPtr($window), $opacity);
    }

    public static function iconifyWindow(GlfwWindow|int $window): void
    {
        ExtWindow::glfwIconifyWindow(self::windowPtr($window));
    }

    public static function restoreWindow(GlfwWindow|int $window): void
    {
        ExtWindow::glfwRestoreWindow(self::windowPtr($window));
    }

    public static function maximizeWindow(GlfwWindow|int $window): void
    {
        ExtWindow::glfwMaximizeWindow(self::windowPtr($window));
    }

    public static function showWindow(GlfwWindow|int $window): void
    {
        ExtWindow::glfwShowWindow(self::windowPtr($window));
    }

    public static function hideWindow(GlfwWindow|int $window): void
    {
        ExtWindow::glfwHideWindow(self::windowPtr($window));
    }

    public static function focusWindow(GlfwWindow|int $window): void
    {
        ExtWindow::glfwFocusWindow(self::windowPtr($window));
    }

    public static function requestWindowAttention(GlfwWindow|int $window): void
    {
        ExtWindow::glfwRequestWindowAttention(self::windowPtr($window));
    }

    public static function getWindowMonitor(GlfwWindow|int $window): ?GlfwMonitor
    {
        return GlfwMonitor::fromPtr(ExtWindow::glfwGetWindowMonitor(self::windowPtr($window)));
    }

    public static function setWindowMonitor(GlfwWindow|int $window, GlfwMonitor|int|null $monitor, int $xpos, int $ypos, int $width, int $height, int $refreshRate): void
    {
        ExtWindow::glfwSetWindowMonitor(self::windowPtr($window), self::nullableMonitorPtr($monitor), $xpos, $ypos, $width, $height, $refreshRate);
    }

    public static function getWindowAttrib(GlfwWindow|int $window, WindowAttrib|int $attrib): int
    {
        return ExtWindow::glfwGetWindowAttrib(self::windowPtr($window), $attrib instanceof WindowAttrib ? $attrib->value : $attrib);
    }

    public static function setWindowAttrib(GlfwWindow|int $window, WindowAttrib|int $attrib, int $value): void
    {
        ExtWindow::glfwSetWindowAttrib(self::windowPtr($window), $attrib instanceof WindowAttrib ? $attrib->value : $attrib, $value);
    }

    public static function setWindowUserPointer(GlfwWindow|int $window, int $pointer): void
    {
        ExtWindow::glfwSetWindowUserPointer(self::windowPtr($window), $pointer);
    }

    public static function getWindowUserPointer(GlfwWindow|int $window): int
    {
        return ExtWindow::glfwGetWindowUserPointer(self::windowPtr($window));
    }

    public static function setWindowPosCallback(GlfwWindow|int $window, ?callable $callback = null): void
    {
        ExtWindow::glfwSetWindowPosCallback(self::windowPtr($window), $callback);
    }

    public static function setWindowSizeCallback(GlfwWindow|int $window, ?callable $callback = null): void
    {
        ExtWindow::glfwSetWindowSizeCallback(self::windowPtr($window), $callback);
    }

    public static function setWindowCloseCallback(GlfwWindow|int $window, ?callable $callback = null): void
    {
        ExtWindow::glfwSetWindowCloseCallback(self::windowPtr($window), $callback);
    }

    public static function setWindowRefreshCallback(GlfwWindow|int $window, ?callable $callback = null): void
    {
        ExtWindow::glfwSetWindowRefreshCallback(self::windowPtr($window), $callback);
    }

    public static function setWindowFocusCallback(GlfwWindow|int $window, ?callable $callback = null): void
    {
        ExtWindow::glfwSetWindowFocusCallback(self::windowPtr($window), $callback);
    }

    public static function setWindowIconifyCallback(GlfwWindow|int $window, ?callable $callback = null): void
    {
        ExtWindow::glfwSetWindowIconifyCallback(self::windowPtr($window), $callback);
    }

    public static function setWindowMaximizeCallback(GlfwWindow|int $window, ?callable $callback = null): void
    {
        ExtWindow::glfwSetWindowMaximizeCallback(self::windowPtr($window), $callback);
    }

    public static function setFramebufferSizeCallback(GlfwWindow|int $window, ?callable $callback = null): void
    {
        ExtWindow::glfwSetFramebufferSizeCallback(self::windowPtr($window), $callback);
    }

    public static function setWindowContentScaleCallback(GlfwWindow|int $window, ?callable $callback = null): void
    {
        ExtWindow::glfwSetWindowContentScaleCallback(self::windowPtr($window), $callback);
    }

    public static function pollEvents(): void
    {
        ExtWindow::glfwPollEvents();
    }

    public static function waitEvents(): void
    {
        ExtWindow::glfwWaitEvents();
    }

    public static function waitEventsTimeout(float $timeout): void
    {
        ExtWindow::glfwWaitEventsTimeout($timeout);
    }

    public static function postEmptyEvent(): void
    {
        ExtWindow::glfwPostEmptyEvent();
    }

    private static function windowPtr(GlfwWindow|int $window): int
    {
        return $window instanceof GlfwWindow ? $window->ptr : $window;
    }

    private static function nullableWindowPtr(GlfwWindow|int|null $window): int|null
    {
        if (is_null($window)) {
            return null;
        }

        return self::windowPtr($window);
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
