<?php

namespace Microscrap\Bindings\GLFW\Enums;

/**
 * Hat — values from glfw3.h
 */
enum Hat: int
{
    case GLFW_HAT_CENTERED = 0;
    case GLFW_HAT_UP = 1;
    case GLFW_HAT_RIGHT = 2;
    case GLFW_HAT_DOWN = 4;
    case GLFW_HAT_LEFT = 8;
}
