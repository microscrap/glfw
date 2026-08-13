<?php

use Microscrap\Bindings\GLFW\Input;
use Microscrap\Bindings\GLFW\DataObjects\GlfwCursor;
use Microscrap\Bindings\GLFW\DataObjects\GlfwWindow;
use Microscrap\Bindings\GLFW\Enums\CursorShape;
use Microscrap\Bindings\GLFW\Enums\InputMode;
use Microscrap\Bindings\GLFW\Enums\Key;
use Microscrap\Bindings\GLFW\Enums\MouseButton;

if (! function_exists('glfwGetInputMode')) {
    function glfwGetInputMode(GlfwWindow|int $window, InputMode|int $mode): int
    {
        return Input::getInputMode($window, $mode);
    }
}

if (! function_exists('glfwSetInputMode')) {
    function glfwSetInputMode(GlfwWindow|int $window, InputMode|int $mode, int $value): void
    {
        Input::setInputMode($window, $mode, $value);
    }
}

if (! function_exists('glfwRawMouseMotionSupported')) {
    function glfwRawMouseMotionSupported(): bool
    {
        return Input::rawMouseMotionSupported();
    }
}

if (! function_exists('glfwGetKeyName')) {
    function glfwGetKeyName(Key|int $key, int $scancode): string
    {
        return Input::getKeyName($key, $scancode);
    }
}

if (! function_exists('glfwGetKeyScancode')) {
    function glfwGetKeyScancode(Key|int $key): int
    {
        return Input::getKeyScancode($key);
    }
}

if (! function_exists('glfwGetKey')) {
    function glfwGetKey(GlfwWindow|int $window, Key|int $key): int
    {
        return Input::getKey($window, $key);
    }
}

if (! function_exists('glfwGetMouseButton')) {
    function glfwGetMouseButton(GlfwWindow|int $window, MouseButton|int $button): int
    {
        return Input::getMouseButton($window, $button);
    }
}

if (! function_exists('glfwGetCursorPos')) {
    function glfwGetCursorPos(GlfwWindow|int $window): array
    {
        return Input::getCursorPos($window);
    }
}

if (! function_exists('glfwGetCursorX')) {
    function glfwGetCursorX(GlfwWindow|int $window): float
    {
        return Input::getCursorX($window);
    }
}

if (! function_exists('glfwGetCursorY')) {
    function glfwGetCursorY(GlfwWindow|int $window): float
    {
        return Input::getCursorY($window);
    }
}

if (! function_exists('glfwSetCursorPos')) {
    function glfwSetCursorPos(GlfwWindow|int $window, float $xpos, float $ypos): void
    {
        Input::setCursorPos($window, $xpos, $ypos);
    }
}

if (! function_exists('glfwCreateCursor')) {
    function glfwCreateCursor(array $image, int $xhot, int $yhot): ?GlfwCursor
    {
        return Input::createCursor($image, $xhot, $yhot);
    }
}

if (! function_exists('glfwCreateStandardCursor')) {
    function glfwCreateStandardCursor(CursorShape|int $shape): ?GlfwCursor
    {
        return Input::createStandardCursor($shape);
    }
}

if (! function_exists('glfwDestroyCursor')) {
    function glfwDestroyCursor(GlfwCursor|int $cursor): void
    {
        Input::destroyCursor($cursor);
    }
}

if (! function_exists('glfwSetCursor')) {
    function glfwSetCursor(GlfwWindow|int $window, GlfwCursor|int|null $cursor = null): void
    {
        Input::setCursor($window, $cursor);
    }
}

if (! function_exists('glfwSetKeyCallback')) {
    function glfwSetKeyCallback(GlfwWindow|int $window, ?callable $callback = null): void
    {
        Input::setKeyCallback($window, $callback);
    }
}

if (! function_exists('glfwSetCharCallback')) {
    function glfwSetCharCallback(GlfwWindow|int $window, ?callable $callback = null): void
    {
        Input::setCharCallback($window, $callback);
    }
}

if (! function_exists('glfwSetCharModsCallback')) {
    function glfwSetCharModsCallback(GlfwWindow|int $window, ?callable $callback = null): void
    {
        Input::setCharModsCallback($window, $callback);
    }
}

if (! function_exists('glfwSetMouseButtonCallback')) {
    function glfwSetMouseButtonCallback(GlfwWindow|int $window, ?callable $callback = null): void
    {
        Input::setMouseButtonCallback($window, $callback);
    }
}

if (! function_exists('glfwSetCursorPosCallback')) {
    function glfwSetCursorPosCallback(GlfwWindow|int $window, ?callable $callback = null): void
    {
        Input::setCursorPosCallback($window, $callback);
    }
}

if (! function_exists('glfwSetCursorEnterCallback')) {
    function glfwSetCursorEnterCallback(GlfwWindow|int $window, ?callable $callback = null): void
    {
        Input::setCursorEnterCallback($window, $callback);
    }
}

if (! function_exists('glfwSetScrollCallback')) {
    function glfwSetScrollCallback(GlfwWindow|int $window, ?callable $callback = null): void
    {
        Input::setScrollCallback($window, $callback);
    }
}

if (! function_exists('glfwSetDropCallback')) {
    function glfwSetDropCallback(GlfwWindow|int $window, ?callable $callback = null): void
    {
        Input::setDropCallback($window, $callback);
    }
}

if (! function_exists('glfwJoystickPresent')) {
    function glfwJoystickPresent(int $jid): bool
    {
        return Input::joystickPresent($jid);
    }
}

if (! function_exists('glfwGetJoystickAxes')) {
    function glfwGetJoystickAxes(int $jid): array
    {
        return Input::getJoystickAxes($jid);
    }
}

if (! function_exists('glfwGetJoystickButtons')) {
    function glfwGetJoystickButtons(int $jid): array
    {
        return Input::getJoystickButtons($jid);
    }
}

if (! function_exists('glfwGetJoystickHats')) {
    function glfwGetJoystickHats(int $jid): array
    {
        return Input::getJoystickHats($jid);
    }
}

if (! function_exists('glfwGetJoystickName')) {
    function glfwGetJoystickName(int $jid): string
    {
        return Input::getJoystickName($jid);
    }
}

if (! function_exists('glfwGetJoystickGUID')) {
    function glfwGetJoystickGUID(int $jid): string
    {
        return Input::getJoystickGUID($jid);
    }
}

if (! function_exists('glfwSetJoystickUserPointer')) {
    function glfwSetJoystickUserPointer(int $jid, int $pointer): void
    {
        Input::setJoystickUserPointer($jid, $pointer);
    }
}

if (! function_exists('glfwGetJoystickUserPointer')) {
    function glfwGetJoystickUserPointer(int $jid): int
    {
        return Input::getJoystickUserPointer($jid);
    }
}

if (! function_exists('glfwJoystickIsGamepad')) {
    function glfwJoystickIsGamepad(int $jid): bool
    {
        return Input::joystickIsGamepad($jid);
    }
}

if (! function_exists('glfwSetJoystickCallback')) {
    function glfwSetJoystickCallback(?callable $callback = null): void
    {
        Input::setJoystickCallback($callback);
    }
}

if (! function_exists('glfwUpdateGamepadMappings')) {
    function glfwUpdateGamepadMappings(string $mapping): bool
    {
        return Input::updateGamepadMappings($mapping);
    }
}

if (! function_exists('glfwGetGamepadName')) {
    function glfwGetGamepadName(int $jid): string
    {
        return Input::getGamepadName($jid);
    }
}

if (! function_exists('glfwGetGamepadState')) {
    function glfwGetGamepadState(int $jid): array
    {
        return Input::getGamepadState($jid);
    }
}

if (! function_exists('glfwGetGamepadButton')) {
    function glfwGetGamepadButton(int $jid, int $button): int
    {
        return Input::getGamepadButton($jid, $button);
    }
}

if (! function_exists('glfwGetGamepadAxis')) {
    function glfwGetGamepadAxis(int $jid, int $axis): float
    {
        return Input::getGamepadAxis($jid, $axis);
    }
}

if (! function_exists('glfwSetClipboardString')) {
    function glfwSetClipboardString(GlfwWindow|int|null $window, string $value): void
    {
        Input::setClipboardString($window, $value);
    }
}

if (! function_exists('glfwGetClipboardString')) {
    function glfwGetClipboardString(GlfwWindow|int|null $window = null): string
    {
        return Input::getClipboardString($window);
    }
}

if (! function_exists('glfwGetTime')) {
    function glfwGetTime(): float
    {
        return Input::getTime();
    }
}

if (! function_exists('glfwSetTime')) {
    function glfwSetTime(float $time): void
    {
        Input::setTime($time);
    }
}

if (! function_exists('glfwGetTimerValue')) {
    function glfwGetTimerValue(): int
    {
        return Input::getTimerValue();
    }
}

if (! function_exists('glfwGetTimerFrequency')) {
    function glfwGetTimerFrequency(): int
    {
        return Input::getTimerFrequency();
    }
}
