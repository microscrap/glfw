<?php

namespace Microscrap\Bindings\GLFW\Enums;

/**
 * JoystickEvent — values from glfw3.h
 */
enum JoystickEvent: int
{
    case GLFW_CONNECTED = 0x00040001;
    case GLFW_DISCONNECTED = 0x00040002;
}
