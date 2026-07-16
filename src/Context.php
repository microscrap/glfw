<?php

namespace Microscrap\Bindings\GLFW;

use Glfw\GLFW\Context\GLFWContext;
use Microscrap\Bindings\GLFW\DataObjects\GlfwWindow;

final class Context
{
    public static function makeContextCurrent(GlfwWindow|int $window): void
    {
        GLFWContext::glfwMakeContextCurrent(self::windowPtr($window));
    }

    public static function getCurrentContext(): ?GlfwWindow
    {
        return GlfwWindow::fromPtr(GLFWContext::glfwGetCurrentContext());
    }

    public static function swapBuffers(GlfwWindow|int $window): void
    {
        GLFWContext::glfwSwapBuffers(self::windowPtr($window));
    }

    public static function swapInterval(int $interval): void
    {
        GLFWContext::glfwSwapInterval($interval);
    }

    public static function extensionSupported(string $extension): bool
    {
        return GLFWContext::glfwExtensionSupported($extension);
    }

    public static function getProcAddress(string $procname): int
    {
        return GLFWContext::glfwGetProcAddress($procname);
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
}
