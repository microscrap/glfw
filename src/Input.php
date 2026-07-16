<?php

namespace Microscrap\Bindings\GLFW;

use Glfw\GLFW\Input\GLFWInput;
use Microscrap\Bindings\GLFW\DataObjects\GlfwCursor;
use Microscrap\Bindings\GLFW\DataObjects\GlfwWindow;
use Microscrap\Bindings\GLFW\Enums\CursorShape;
use Microscrap\Bindings\GLFW\Enums\InputMode;
use Microscrap\Bindings\GLFW\Enums\Key;
use Microscrap\Bindings\GLFW\Enums\MouseButton;

final class Input
{
    public static function getInputMode(GlfwWindow|int $window, InputMode|int $mode): int
    {
        return GLFWInput::glfwGetInputMode(self::windowPtr($window), $mode instanceof InputMode ? $mode->value : $mode);
    }

    public static function setInputMode(GlfwWindow|int $window, InputMode|int $mode, int $value): void
    {
        GLFWInput::glfwSetInputMode(self::windowPtr($window), $mode instanceof InputMode ? $mode->value : $mode, $value);
    }

    public static function rawMouseMotionSupported(): bool
    {
        return GLFWInput::glfwRawMouseMotionSupported();
    }

    public static function getKeyName(Key|int $key, int $scancode): string
    {
        return GLFWInput::glfwGetKeyName($key instanceof Key ? $key->value : $key, $scancode);
    }

    public static function getKeyScancode(Key|int $key): int
    {
        return GLFWInput::glfwGetKeyScancode($key instanceof Key ? $key->value : $key);
    }

    public static function getKey(GlfwWindow|int $window, Key|int $key): int
    {
        return GLFWInput::glfwGetKey(self::windowPtr($window), $key instanceof Key ? $key->value : $key);
    }

    public static function getMouseButton(GlfwWindow|int $window, MouseButton|int $button): int
    {
        return GLFWInput::glfwGetMouseButton(self::windowPtr($window), $button instanceof MouseButton ? $button->value : $button);
    }

    public static function getCursorPos(GlfwWindow|int $window): array
    {
        return GLFWInput::glfwGetCursorPos(self::windowPtr($window));
    }

    public static function setCursorPos(GlfwWindow|int $window, float $xpos, float $ypos): void
    {
        GLFWInput::glfwSetCursorPos(self::windowPtr($window), $xpos, $ypos);
    }

    public static function createCursor(array $image, int $xhot, int $yhot): ?GlfwCursor
    {
        return GlfwCursor::fromPtr(GLFWInput::glfwCreateCursor($image, $xhot, $yhot));
    }

    public static function createStandardCursor(CursorShape|int $shape): ?GlfwCursor
    {
        return GlfwCursor::fromPtr(GLFWInput::glfwCreateStandardCursor($shape instanceof CursorShape ? $shape->value : $shape));
    }

    public static function destroyCursor(GlfwCursor|int $cursor): void
    {
        GLFWInput::glfwDestroyCursor(self::cursorPtr($cursor));
    }

    public static function setCursor(GlfwWindow|int $window, GlfwCursor|int|null $cursor = null): void
    {
        GLFWInput::glfwSetCursor(self::windowPtr($window), self::nullableCursorPtr($cursor));
    }

    public static function setKeyCallback(GlfwWindow|int $window, ?callable $callback = null): void
    {
        GLFWInput::glfwSetKeyCallback(self::windowPtr($window), $callback);
    }

    public static function setCharCallback(GlfwWindow|int $window, ?callable $callback = null): void
    {
        GLFWInput::glfwSetCharCallback(self::windowPtr($window), $callback);
    }

    public static function setCharModsCallback(GlfwWindow|int $window, ?callable $callback = null): void
    {
        GLFWInput::glfwSetCharModsCallback(self::windowPtr($window), $callback);
    }

    public static function setMouseButtonCallback(GlfwWindow|int $window, ?callable $callback = null): void
    {
        GLFWInput::glfwSetMouseButtonCallback(self::windowPtr($window), $callback);
    }

    public static function setCursorPosCallback(GlfwWindow|int $window, ?callable $callback = null): void
    {
        GLFWInput::glfwSetCursorPosCallback(self::windowPtr($window), $callback);
    }

    public static function setCursorEnterCallback(GlfwWindow|int $window, ?callable $callback = null): void
    {
        GLFWInput::glfwSetCursorEnterCallback(self::windowPtr($window), $callback);
    }

    public static function setScrollCallback(GlfwWindow|int $window, ?callable $callback = null): void
    {
        GLFWInput::glfwSetScrollCallback(self::windowPtr($window), $callback);
    }

    public static function setDropCallback(GlfwWindow|int $window, ?callable $callback = null): void
    {
        GLFWInput::glfwSetDropCallback(self::windowPtr($window), $callback);
    }

    public static function joystickPresent(int $jid): bool
    {
        return GLFWInput::glfwJoystickPresent($jid);
    }

    public static function getJoystickAxes(int $jid): array
    {
        return GLFWInput::glfwGetJoystickAxes($jid);
    }

    public static function getJoystickButtons(int $jid): array
    {
        return GLFWInput::glfwGetJoystickButtons($jid);
    }

    public static function getJoystickHats(int $jid): array
    {
        return GLFWInput::glfwGetJoystickHats($jid);
    }

    public static function getJoystickName(int $jid): string
    {
        return GLFWInput::glfwGetJoystickName($jid);
    }

    public static function getJoystickGUID(int $jid): string
    {
        return GLFWInput::glfwGetJoystickGUID($jid);
    }

    public static function setJoystickUserPointer(int $jid, int $pointer): void
    {
        GLFWInput::glfwSetJoystickUserPointer($jid, $pointer);
    }

    public static function getJoystickUserPointer(int $jid): int
    {
        return GLFWInput::glfwGetJoystickUserPointer($jid);
    }

    public static function joystickIsGamepad(int $jid): bool
    {
        return GLFWInput::glfwJoystickIsGamepad($jid);
    }

    public static function setJoystickCallback(?callable $callback = null): void
    {
        GLFWInput::glfwSetJoystickCallback($callback);
    }

    public static function updateGamepadMappings(string $mapping): bool
    {
        return GLFWInput::glfwUpdateGamepadMappings($mapping);
    }

    public static function getGamepadName(int $jid): string
    {
        return GLFWInput::glfwGetGamepadName($jid);
    }

    public static function getGamepadState(int $jid): array
    {
        return GLFWInput::glfwGetGamepadState($jid);
    }

    public static function setClipboardString(GlfwWindow|int|null $window, string $value): void
    {
        GLFWInput::glfwSetClipboardString(self::nullableWindowPtr($window), $value);
    }

    public static function getClipboardString(GlfwWindow|int|null $window = null): string
    {
        return GLFWInput::glfwGetClipboardString(self::nullableWindowPtr($window));
    }

    public static function getTime(): float
    {
        return GLFWInput::glfwGetTime();
    }

    public static function setTime(float $time): void
    {
        GLFWInput::glfwSetTime($time);
    }

    public static function getTimerValue(): int
    {
        return GLFWInput::glfwGetTimerValue();
    }

    public static function getTimerFrequency(): int
    {
        return GLFWInput::glfwGetTimerFrequency();
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

    private static function cursorPtr(GlfwCursor|int $cursor): int
    {
        return $cursor instanceof GlfwCursor ? $cursor->ptr : $cursor;
    }

    private static function nullableCursorPtr(GlfwCursor|int|null $cursor): int|null
    {
        if (is_null($cursor)) {
            return null;
        }

        return self::cursorPtr($cursor);
    }
}
