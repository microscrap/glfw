<?php

namespace Microscrap\Bindings\GLFW\Enums;

/**
 * ContextCreationApi — values from glfw3.h
 */
enum ContextCreationApi: int
{
    case GLFW_NATIVE_CONTEXT_API = 0x00036001;
    case GLFW_EGL_CONTEXT_API = 0x00036002;
    case GLFW_OSMESA_CONTEXT_API = 0x00036003;
}
