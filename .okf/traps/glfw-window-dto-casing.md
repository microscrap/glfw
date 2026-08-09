---
type: Trap
title: GlfwWindow DTO vs GLFWWindow casing
description: "Package DTOs are GlfwWindow/Monitor/Cursor so they do not collide with extension GLFWWindow classes on APFS."
resource: src/DataObjects/GlfwWindow.php
tags: [trap, macos, apfs, dto, casing]
generated: { by: "okf-documentation-generator/cursor", at: "2026-08-09T03:00:00Z" }
status: draft
sources:
  - id: readme
    resource: README.md
    title: macOS note on Glfw* vs GLFW* naming
  - id: dto
    resource: src/DataObjects/GlfwWindow.php
    title: GlfwWindow DTO
  - id: window
    resource: src/Window.php
    title: Window wrapper uses GlfwWindow DTO and aliases ExtWindow
  - id: agents
    resource: AGENTS.md
    title: DTO naming rule
---

# Symptom

Autoload / class-map conflicts, wrong class loaded, or “class already exists” style failures when a package DTO is named like the extension class (`GLFWWindow` vs `GLFWwindow`) on a case-insensitive filesystem (macOS APFS default).

# Cause

The extension exposes classes such as `Glfw\GLFW\Window\GLFWWindow`. On case-insensitive filesystems, filenames that differ only by letter case collide.[^readme]

This package therefore uses distinctly cased DTO names:[^dto][^agents]

| Package DTO | Role | Extension class (do not mirror as filename) |
|-------------|------|-----------------------------------------------|
| `GlfwWindow` | Opaque `GLFWwindow*` handle (`ptr`) | `Glfw\GLFW\Window\GLFWWindow` |
| `GlfwMonitor` | Opaque monitor handle | `Glfw\GLFW\Monitor\GLFWMonitor` |
| `GlfwCursor` | Opaque cursor handle | (cursor APIs via Input) |

Wrappers import the extension class under an alias (e.g. `as ExtWindow`) and return/accept the package DTO.[^window]

# Mitigation

- Always use `Microscrap\Bindings\GLFW\DataObjects\Glfw*` for public handle types.
- Never rename DTOs to `GLFWWindow` / `GLFWwindow` to “match C” — that reintroduces the collision.[^readme]
- Keep DTO files under `src/DataObjects/Glfw*.php` with the `Glfw` prefix casing shown above.

# Related

* [1:1 extension wrap](../conventions/one-to-one-extension-wrap.md)
* [Helpers → wrappers → ext](../architecture/helpers-wrappers-ext.md)
* [Package (0.7)](../orientation/package.md)

[^readme]: macOS note on Glfw* vs GLFW* naming
[^dto]: GlfwWindow DTO
[^window]: Window wrapper uses GlfwWindow DTO and aliases ExtWindow
[^agents]: DTO naming rule
