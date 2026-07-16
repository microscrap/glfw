<?php

namespace Microscrap\Bindings\GLFW\Enums;

/**
 * ClientApi — values from glfw3.h
 */
enum ClientApi: int
{
    case GLFW_NO_API = 0;
    case GLFW_OPENGL_API = 0x00030001;
    case GLFW_OPENGL_ES_API = 0x00030002;
}
