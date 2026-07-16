<?php

/**
 * Single source of truth for the coverage drift test: a list of
 * [wrapperClass, extensionClass] pairs.
 */

return [
    [Microscrap\Bindings\GLFW\Init::class, Glfw\GLFW\GLFW::class],
    [Microscrap\Bindings\GLFW\Error::class, Glfw\GLFW\GLFWError::class],
    [Microscrap\Bindings\GLFW\Window::class, Glfw\GLFW\Window\GLFWWindow::class],
    [Microscrap\Bindings\GLFW\Monitor::class, Glfw\GLFW\Monitor\GLFWMonitor::class],
    [Microscrap\Bindings\GLFW\Input::class, Glfw\GLFW\Input\GLFWInput::class],
    [Microscrap\Bindings\GLFW\Context::class, Glfw\GLFW\Context\GLFWContext::class],
    [Microscrap\Bindings\GLFW\Vulkan::class, Glfw\GLFW\Vulkan\GLFWVulkan::class],
    [Microscrap\Bindings\GLFW\GL::class, Glfw\GLFW\GL\GLFWGL::class],
];
