<?php

namespace Microscrap\Bindings\GLFW\Enums;

/**
 * OpenGL token subset used by Glfw\GLFW\GL\GLFWGL
 */
enum EnableCap: int
{
    case GL_SCISSOR_TEST = 0x0C11;
    case GL_DEPTH_TEST = 0x0B71;
    case GL_BLEND = 0x0BE2;
    case GL_CULL_FACE = 0x0B44;
}
