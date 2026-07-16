<?php

namespace Microscrap\Bindings\GLFW\Enums;

/**
 * CursorMode — values from glfw3.h
 */
enum CursorMode: int
{
    case GLFW_CURSOR_NORMAL = 0x00034001;
    case GLFW_CURSOR_HIDDEN = 0x00034002;
    case GLFW_CURSOR_DISABLED = 0x00034003;
    case GLFW_CURSOR_CAPTURED = 0x00034004;
}
