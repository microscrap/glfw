<?php

namespace DeptOfScrapyardRobotics\Tests\Feature;

use Microscrap\Bindings\GLFW\Enums\Platform;
use Microscrap\Bindings\GLFW\Init;

beforeEach(function (): void {
    if (! extension_loaded('glfw')) {
        $this->markTestSkipped('ext-glfw is not loaded');
    }
});

it('initializes and reports version + platform', function (): void {
    expect(Init::init())->toBeTrue();

    $version = Init::getVersion();
    expect($version)->toHaveKeys(['major', 'minor', 'rev']);
    expect($version['major'])->toBe(3);

    $string = Init::getVersionString();
    expect($string)->toContain('3.');

    $platform = Init::getPlatform();
    expect($platform)->toBeIn([
        Platform::GLFW_PLATFORM_COCOA->value,
        Platform::GLFW_PLATFORM_WAYLAND->value,
        Platform::GLFW_PLATFORM_X11->value,
        Platform::GLFW_PLATFORM_WIN32->value,
        Platform::GLFW_PLATFORM_NULL->value,
    ]);

    Init::terminate();
});

it('exposes the same surface via helpers', function (): void {
    expect(glfwInit())->toBeTrue();
    expect(glfwGetVersionString())->toBeString()->not->toBeEmpty();
    glfwTerminate();
});
