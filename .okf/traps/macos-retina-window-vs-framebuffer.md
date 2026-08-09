---
type: Trap
title: "macOS Retina: window vs framebuffer"
description: "Window size is logical points; glViewport needs framebuffer pixel size from glfwGetFramebufferSize."
resource: src/Window.php
tags: [trap, macos, retina, viewport, framebuffer]
generated: { by: "okf-documentation-generator/cursor", at: "2026-08-09T03:00:00Z" }
status: draft
sources:
  - id: window
    resource: src/Window.php
    title: getWindowSize and getFramebufferSize wrappers
  - id: helpers-window
    resource: src/Helpers/glfw-window.php
    title: glfwGetWindowSize / glfwGetFramebufferSize helpers
  - id: gl
    resource: src/GL.php
    title: GL::viewport convenience wrap
  - id: readme
    resource: README.md
    title: OpenGL clear example using createWindow sizes
---

# Symptom

On macOS Retina (or other high-DPI) displays, the GL viewport covers only a corner of the window, looks half-sized, or rendering appears stretched / letterboxed after `glfwCreateWindow(640, 480, …)` followed by `glViewport(0, 0, 640, 480)`.

# Cause

GLFW separates **window size** (screen coordinates / logical points) from **framebuffer size** (pixels).[^window]

| API | Meaning |
|-----|---------|
| `glfwGetWindowSize` / `Window::getWindowSize` | Logical window dimensions |
| `glfwGetFramebufferSize` / `Window::getFramebufferSize` | Pixel dimensions of the GL framebuffer |

`glViewport` expects **pixel** coordinates. On Retina, framebuffer size is often 2× window size, so feeding window size into `glViewport` under-covers the drawable.[^gl][^helpers-window]

These are existing GLFW window APIs exposed by this bindings package — not ScrapyardIO GFX / framebuffer registration.

# Mitigation

1. After making the context current, call `glfwGetFramebufferSize($window)` (or `Window::getFramebufferSize`).
2. Pass those `[width, height]` values to `glViewport` / `GL::viewport`.
3. Prefer `glfwSetFramebufferSizeCallback` to update the viewport when the drawable resizes (including DPI changes).
4. Do not invent separate GFX framebuffer objects in this package to “fix” DPI — use the GLFW size queries above.

# Related

* [Helpers → wrappers → ext](../architecture/helpers-wrappers-ext.md)
* [Pair with open-gl / not GFX](../orientation/pairing-open-gl.md)

[^window]: getWindowSize and getFramebufferSize wrappers
[^helpers-window]: glfwGetWindowSize / glfwGetFramebufferSize helpers
[^gl]: GL::viewport convenience wrap
[^readme]: OpenGL clear example using createWindow sizes
