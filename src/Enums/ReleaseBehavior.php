<?php

namespace Microscrap\Bindings\GLFW\Enums;

/**
 * ReleaseBehavior — values from glfw3.h
 */
enum ReleaseBehavior: int
{
    case GLFW_ANY_RELEASE_BEHAVIOR = 0;
    case GLFW_RELEASE_BEHAVIOR_FLUSH = 0x00035001;
    case GLFW_RELEASE_BEHAVIOR_NONE = 0x00035002;
}
