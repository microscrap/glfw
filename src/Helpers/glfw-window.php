<?php

use Microscrap\Bindings\GLFW\Window;
use Microscrap\Bindings\GLFW\DataObjects\GlfwMonitor;
use Microscrap\Bindings\GLFW\DataObjects\GlfwWindow;
use Microscrap\Bindings\GLFW\Enums\WindowAttrib;
use Microscrap\Bindings\GLFW\Enums\WindowHint;

if (! function_exists('glfwDefaultWindowHints')) {
    function glfwDefaultWindowHints(): void
    {
        Window::defaultWindowHints();
    }
}

if (! function_exists('glfwWindowHint')) {
    function glfwWindowHint(WindowHint|int $hint, int $value): void
    {
        Window::windowHint($hint, $value);
    }
}

if (! function_exists('glfwWindowHintString')) {
    function glfwWindowHintString(WindowHint|int $hint, string $value): void
    {
        Window::windowHintString($hint, $value);
    }
}

if (! function_exists('glfwCreateWindow')) {
    function glfwCreateWindow(int $width, int $height, string $title, GlfwMonitor|int|null $monitor = null, GlfwWindow|int|null $share = null): ?GlfwWindow
    {
        return Window::createWindow($width, $height, $title, $monitor, $share);
    }
}

if (! function_exists('glfwDestroyWindow')) {
    function glfwDestroyWindow(GlfwWindow|int $window): void
    {
        Window::destroyWindow($window);
    }
}

if (! function_exists('glfwWindowShouldClose')) {
    function glfwWindowShouldClose(GlfwWindow|int $window): bool
    {
        return Window::windowShouldClose($window);
    }
}

if (! function_exists('glfwSetWindowShouldClose')) {
    function glfwSetWindowShouldClose(GlfwWindow|int $window, int $value): void
    {
        Window::setWindowShouldClose($window, $value);
    }
}

if (! function_exists('glfwGetWindowTitle')) {
    function glfwGetWindowTitle(GlfwWindow|int $window): string
    {
        return Window::getWindowTitle($window);
    }
}

if (! function_exists('glfwSetWindowTitle')) {
    function glfwSetWindowTitle(GlfwWindow|int $window, string $title): void
    {
        Window::setWindowTitle($window, $title);
    }
}

if (! function_exists('glfwSetWindowIcon')) {
    function glfwSetWindowIcon(GlfwWindow|int $window, array $images): void
    {
        Window::setWindowIcon($window, $images);
    }
}

if (! function_exists('glfwGetWindowPos')) {
    function glfwGetWindowPos(GlfwWindow|int $window): array
    {
        return Window::getWindowPos($window);
    }
}

if (! function_exists('glfwSetWindowPos')) {
    function glfwSetWindowPos(GlfwWindow|int $window, int $xpos, int $ypos): void
    {
        Window::setWindowPos($window, $xpos, $ypos);
    }
}

if (! function_exists('glfwGetWindowSize')) {
    function glfwGetWindowSize(GlfwWindow|int $window): array
    {
        return Window::getWindowSize($window);
    }
}

if (! function_exists('glfwSetWindowSizeLimits')) {
    function glfwSetWindowSizeLimits(GlfwWindow|int $window, int $minwidth, int $minheight, int $maxwidth, int $maxheight): void
    {
        Window::setWindowSizeLimits($window, $minwidth, $minheight, $maxwidth, $maxheight);
    }
}

if (! function_exists('glfwSetWindowAspectRatio')) {
    function glfwSetWindowAspectRatio(GlfwWindow|int $window, int $numer, int $denom): void
    {
        Window::setWindowAspectRatio($window, $numer, $denom);
    }
}

if (! function_exists('glfwSetWindowSize')) {
    function glfwSetWindowSize(GlfwWindow|int $window, int $width, int $height): void
    {
        Window::setWindowSize($window, $width, $height);
    }
}

if (! function_exists('glfwGetFramebufferSize')) {
    function glfwGetFramebufferSize(GlfwWindow|int $window): array
    {
        return Window::getFramebufferSize($window);
    }
}

if (! function_exists('glfwGetWindowFrameSize')) {
    function glfwGetWindowFrameSize(GlfwWindow|int $window): array
    {
        return Window::getWindowFrameSize($window);
    }
}

if (! function_exists('glfwGetWindowContentScale')) {
    function glfwGetWindowContentScale(GlfwWindow|int $window): array
    {
        return Window::getWindowContentScale($window);
    }
}

if (! function_exists('glfwGetWindowOpacity')) {
    function glfwGetWindowOpacity(GlfwWindow|int $window): float
    {
        return Window::getWindowOpacity($window);
    }
}

if (! function_exists('glfwSetWindowOpacity')) {
    function glfwSetWindowOpacity(GlfwWindow|int $window, float $opacity): void
    {
        Window::setWindowOpacity($window, $opacity);
    }
}

if (! function_exists('glfwIconifyWindow')) {
    function glfwIconifyWindow(GlfwWindow|int $window): void
    {
        Window::iconifyWindow($window);
    }
}

if (! function_exists('glfwRestoreWindow')) {
    function glfwRestoreWindow(GlfwWindow|int $window): void
    {
        Window::restoreWindow($window);
    }
}

if (! function_exists('glfwMaximizeWindow')) {
    function glfwMaximizeWindow(GlfwWindow|int $window): void
    {
        Window::maximizeWindow($window);
    }
}

if (! function_exists('glfwShowWindow')) {
    function glfwShowWindow(GlfwWindow|int $window): void
    {
        Window::showWindow($window);
    }
}

if (! function_exists('glfwHideWindow')) {
    function glfwHideWindow(GlfwWindow|int $window): void
    {
        Window::hideWindow($window);
    }
}

if (! function_exists('glfwFocusWindow')) {
    function glfwFocusWindow(GlfwWindow|int $window): void
    {
        Window::focusWindow($window);
    }
}

if (! function_exists('glfwRequestWindowAttention')) {
    function glfwRequestWindowAttention(GlfwWindow|int $window): void
    {
        Window::requestWindowAttention($window);
    }
}

if (! function_exists('glfwGetWindowMonitor')) {
    function glfwGetWindowMonitor(GlfwWindow|int $window): ?GlfwMonitor
    {
        return Window::getWindowMonitor($window);
    }
}

if (! function_exists('glfwSetWindowMonitor')) {
    function glfwSetWindowMonitor(GlfwWindow|int $window, GlfwMonitor|int|null $monitor, int $xpos, int $ypos, int $width, int $height, int $refreshRate): void
    {
        Window::setWindowMonitor($window, $monitor, $xpos, $ypos, $width, $height, $refreshRate);
    }
}

if (! function_exists('glfwGetWindowAttrib')) {
    function glfwGetWindowAttrib(GlfwWindow|int $window, WindowAttrib|int $attrib): int
    {
        return Window::getWindowAttrib($window, $attrib);
    }
}

if (! function_exists('glfwSetWindowAttrib')) {
    function glfwSetWindowAttrib(GlfwWindow|int $window, WindowAttrib|int $attrib, int $value): void
    {
        Window::setWindowAttrib($window, $attrib, $value);
    }
}

if (! function_exists('glfwSetWindowUserPointer')) {
    function glfwSetWindowUserPointer(GlfwWindow|int $window, int $pointer): void
    {
        Window::setWindowUserPointer($window, $pointer);
    }
}

if (! function_exists('glfwGetWindowUserPointer')) {
    function glfwGetWindowUserPointer(GlfwWindow|int $window): int
    {
        return Window::getWindowUserPointer($window);
    }
}

if (! function_exists('glfwSetWindowPosCallback')) {
    function glfwSetWindowPosCallback(GlfwWindow|int $window, ?callable $callback = null): void
    {
        Window::setWindowPosCallback($window, $callback);
    }
}

if (! function_exists('glfwSetWindowSizeCallback')) {
    function glfwSetWindowSizeCallback(GlfwWindow|int $window, ?callable $callback = null): void
    {
        Window::setWindowSizeCallback($window, $callback);
    }
}

if (! function_exists('glfwSetWindowCloseCallback')) {
    function glfwSetWindowCloseCallback(GlfwWindow|int $window, ?callable $callback = null): void
    {
        Window::setWindowCloseCallback($window, $callback);
    }
}

if (! function_exists('glfwSetWindowRefreshCallback')) {
    function glfwSetWindowRefreshCallback(GlfwWindow|int $window, ?callable $callback = null): void
    {
        Window::setWindowRefreshCallback($window, $callback);
    }
}

if (! function_exists('glfwSetWindowFocusCallback')) {
    function glfwSetWindowFocusCallback(GlfwWindow|int $window, ?callable $callback = null): void
    {
        Window::setWindowFocusCallback($window, $callback);
    }
}

if (! function_exists('glfwSetWindowIconifyCallback')) {
    function glfwSetWindowIconifyCallback(GlfwWindow|int $window, ?callable $callback = null): void
    {
        Window::setWindowIconifyCallback($window, $callback);
    }
}

if (! function_exists('glfwSetWindowMaximizeCallback')) {
    function glfwSetWindowMaximizeCallback(GlfwWindow|int $window, ?callable $callback = null): void
    {
        Window::setWindowMaximizeCallback($window, $callback);
    }
}

if (! function_exists('glfwSetFramebufferSizeCallback')) {
    function glfwSetFramebufferSizeCallback(GlfwWindow|int $window, ?callable $callback = null): void
    {
        Window::setFramebufferSizeCallback($window, $callback);
    }
}

if (! function_exists('glfwSetWindowContentScaleCallback')) {
    function glfwSetWindowContentScaleCallback(GlfwWindow|int $window, ?callable $callback = null): void
    {
        Window::setWindowContentScaleCallback($window, $callback);
    }
}

if (! function_exists('glfwPollEvents')) {
    function glfwPollEvents(): void
    {
        Window::pollEvents();
    }
}

if (! function_exists('glfwWaitEvents')) {
    function glfwWaitEvents(): void
    {
        Window::waitEvents();
    }
}

if (! function_exists('glfwWaitEventsTimeout')) {
    function glfwWaitEventsTimeout(float $timeout): void
    {
        Window::waitEventsTimeout($timeout);
    }
}

if (! function_exists('glfwPostEmptyEvent')) {
    function glfwPostEmptyEvent(): void
    {
        Window::postEmptyEvent();
    }
}
