<?php

namespace Microscrap\Bindings\GLFW\Enums;

/**
 * GamepadAxis — values from glfw3.h
 */
enum GamepadAxis: int
{
    case GLFW_GAMEPAD_AXIS_LEFT_X = 0;
    case GLFW_GAMEPAD_AXIS_LEFT_Y = 1;
    case GLFW_GAMEPAD_AXIS_RIGHT_X = 2;
    case GLFW_GAMEPAD_AXIS_RIGHT_Y = 3;
    case GLFW_GAMEPAD_AXIS_LEFT_TRIGGER = 4;
    case GLFW_GAMEPAD_AXIS_RIGHT_TRIGGER = 5;
    case GLFW_GAMEPAD_AXIS_LAST = 5;
}
