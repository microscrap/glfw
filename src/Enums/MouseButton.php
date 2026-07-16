<?php

namespace Microscrap\Bindings\GLFW\Enums;

/**
 * MouseButton — values from glfw3.h
 */
enum MouseButton: int
{
    case GLFW_MOUSE_BUTTON_1 = 0;
    case GLFW_MOUSE_BUTTON_2 = 1;
    case GLFW_MOUSE_BUTTON_3 = 2;
    case GLFW_MOUSE_BUTTON_4 = 3;
    case GLFW_MOUSE_BUTTON_5 = 4;
    case GLFW_MOUSE_BUTTON_6 = 5;
    case GLFW_MOUSE_BUTTON_7 = 6;
    case GLFW_MOUSE_BUTTON_8 = 7;
    case GLFW_MOUSE_BUTTON_LAST = 7;
    case GLFW_MOUSE_BUTTON_LEFT = 0;
    case GLFW_MOUSE_BUTTON_RIGHT = 1;
    case GLFW_MOUSE_BUTTON_MIDDLE = 2;
}
