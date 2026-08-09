---
type: Orientation
title: "Pair with open-gl / not GFX"
description: "This package owns windows/context; full GL API is microscrap/open-gl; ogx/glfw-gfx are separate."
resource: .
tags: [orientation, opengl, gfx, composition]
generated: { by: "okf-documentation-generator/cursor", at: "2026-08-09T03:00:00Z" }
status: draft
sources:
  - id: readme
    resource: README.md
    title: Package README (bindings role and GL convenience set)
  - id: composer
    resource: composer.json
    title: Package require and keywords
  - id: agents
    resource: AGENTS.md
    title: Agent scope rules
  - id: package-orient
    resource: "/orientation/package.md"
    title: Package orientation concept
---

# Composition boundary

`microscrap/glfw` is **bindings only** for LibGLFW: init, windows, monitors, input, context, Vulkan surface helpers, plus a **minimal** OpenGL convenience set for visual proofs.[^readme][^agents]

| Concern | Package |
|---------|---------|
| GLFW window + context + input | `microscrap/glfw` (this package) |
| Full OpenGL draw / state API | `microscrap/open-gl` |
| GFX / framebuffer registration | **out of scope** — `ogx` / `glfw-gfx` (do not invent here)[^agents] |
| ServiceProvider / Chassis | **out of scope**[^agents] |

# Typical flow (OpenGL demo)

1. Depend on this package (and optionally `microscrap/open-gl` for the full GL surface).
2. `glfwInit` / `Init::init()`, create a window, `glfwMakeContextCurrent` / `Context::makeContextCurrent`.
3. Issue GL calls via this package's small `gl*` / `GL::*` set **or** via `microscrap/open-gl`.
4. `glfwSwapBuffers` / `Context::swapBuffers`, then destroy / terminate.

# Caveats

- This package's `GL` class wraps only the extension's convenience GL slice (`clear`, `viewport`, `enable`, …) — not a full OpenGL binding.[^readme]
- Overlapping `gl*` helpers with `microscrap/open-gl` — see [`function_exists` load order](../traps/function-exists-load-order.md).
- On Retina displays, viewport sizing uses framebuffer pixels — see [macOS Retina: window vs framebuffer](../traps/macos-retina-window-vs-framebuffer.md).

# Related

* [Package (0.7)](package.md)
* [`function_exists` load order](../traps/function-exists-load-order.md)
* [macOS Retina: window vs framebuffer](../traps/macos-retina-window-vs-framebuffer.md)

[^readme]: Package README (bindings role and GL convenience set)
[^composer]: Package require and keywords
[^agents]: Agent scope rules
[^package-orient]: Package orientation concept
