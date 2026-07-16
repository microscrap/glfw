<?php

use Microscrap\Bindings\GLFW\Error;

if (! function_exists('glfwGetError')) {
    function glfwGetError(): array
    {
        return Error::getError();
    }
}
