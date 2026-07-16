<?php

namespace Microscrap\Bindings\GLFW\Enums;

/**
 * Action — values from glfw3.h
 */
enum Action: int
{
    case GLFW_RELEASE = 0;
    case GLFW_PRESS = 1;
    case GLFW_REPEAT = 2;
}
