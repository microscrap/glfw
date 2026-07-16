<?php

namespace Microscrap\Bindings\GLFW\Enums;

/**
 * InitHint — values from glfw3.h
 */
enum InitHint: int
{
    case GLFW_JOYSTICK_HAT_BUTTONS = 0x00050001;
    case GLFW_ANGLE_PLATFORM_TYPE = 0x00050002;
    case GLFW_PLATFORM = 0x00050003;
    case GLFW_COCOA_CHDIR_RESOURCES = 0x00051001;
    case GLFW_COCOA_MENUBAR = 0x00051002;
    case GLFW_X11_XCB_VULKAN_SURFACE = 0x00052001;
    case GLFW_WAYLAND_LIBDECOR = 0x00053001;
}
