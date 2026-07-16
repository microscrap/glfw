<?php

namespace Microscrap\Bindings\GLFW\Enums;

/**
 * InputMode — values from glfw3.h
 */
enum InputMode: int
{
    case GLFW_CURSOR = 0x00033001;
    case GLFW_STICKY_KEYS = 0x00033002;
    case GLFW_STICKY_MOUSE_BUTTONS = 0x00033003;
    case GLFW_LOCK_KEY_MODS = 0x00033004;
    case GLFW_RAW_MOUSE_MOTION = 0x00033005;
}
