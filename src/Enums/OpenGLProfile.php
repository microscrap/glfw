<?php

namespace Microscrap\Bindings\GLFW\Enums;

/**
 * OpenGLProfile — values from glfw3.h
 */
enum OpenGLProfile: int
{
    case GLFW_OPENGL_ANY_PROFILE = 0;
    case GLFW_OPENGL_CORE_PROFILE = 0x00032001;
    case GLFW_OPENGL_COMPAT_PROFILE = 0x00032002;
}
