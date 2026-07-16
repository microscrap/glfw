<?php

namespace Microscrap\Bindings\GLFW\Enums;

/**
 * Platform — values from glfw3.h
 */
enum Platform: int
{
    case GLFW_PLATFORM_ERROR = 0x00010008;
    case GLFW_PLATFORM_UNAVAILABLE = 0x0001000E;
    case GLFW_PLATFORM = 0x00050003;
    case GLFW_PLATFORM_WIN32 = 0x00060001;
    case GLFW_PLATFORM_COCOA = 0x00060002;
    case GLFW_PLATFORM_WAYLAND = 0x00060003;
    case GLFW_PLATFORM_X11 = 0x00060004;
    case GLFW_PLATFORM_NULL = 0x00060005;
}
