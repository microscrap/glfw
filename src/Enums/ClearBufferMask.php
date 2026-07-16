<?php

namespace Microscrap\Bindings\GLFW\Enums;

/**
 * OpenGL token subset used by Glfw\GLFW\GL\GLFWGL
 */
enum ClearBufferMask: int
{
    case GL_COLOR_BUFFER_BIT = 0x00004000;
    case GL_DEPTH_BUFFER_BIT = 0x00000100;
    case GL_STENCIL_BUFFER_BIT = 0x00000400;
}
