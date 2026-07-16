<?php

namespace Microscrap\Bindings\GLFW\Enums;

/**
 * Mod — values from glfw3.h
 */
enum Mod: int
{
    case GLFW_MOD_SHIFT = 0x0001;
    case GLFW_MOD_CONTROL = 0x0002;
    case GLFW_MOD_ALT = 0x0004;
    case GLFW_MOD_SUPER = 0x0008;
    case GLFW_MOD_CAPS_LOCK = 0x0010;
    case GLFW_MOD_NUM_LOCK = 0x0020;
}
