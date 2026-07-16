<?php

namespace Microscrap\Bindings\GLFW\Enums;

/**
 * OpenGL token subset used by Glfw\GLFW\GL\GLFWGL
 */
enum StringName: int
{
    case GL_VENDOR = 0x1F00;
    case GL_RENDERER = 0x1F01;
    case GL_VERSION = 0x1F02;
    case GL_EXTENSIONS = 0x1F03;
}
