<?php

namespace Microscrap\Bindings\GLFW\Enums;

/**
 * ContextRobustness — values from glfw3.h
 */
enum ContextRobustness: int
{
    case GLFW_NO_ROBUSTNESS = 0;
    case GLFW_NO_RESET_NOTIFICATION = 0x00031001;
    case GLFW_LOSE_CONTEXT_ON_RESET = 0x00031002;
}
