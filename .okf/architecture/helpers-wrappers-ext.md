---
type: Architecture
title: "Helpers → wrappers → ext"
description: "Global helpers delegate to static wrappers; only wrappers call Glfw\\GLFW\\*. Name transforms and DTO unwrap."
resource: src/
tags: [architecture, bindings, glfw, helpers]
generated: { by: "okf-documentation-generator/cursor", at: "2026-08-09T03:00:00Z" }
status: draft
sources:
  - id: window
    resource: src/Window.php
    title: Window static wrapper
  - id: gl
    resource: src/GL.php
    title: GL static wrapper
  - id: helpers-window
    resource: src/Helpers/glfw-window.php
    title: Sample helper file with function_exists guards
  - id: helpers-gl
    resource: src/Helpers/glfw-gl.php
    title: Minimal gl* helper file
  - id: composer
    resource: composer.json
    title: Autoload files list for helpers
  - id: readme
    resource: README.md
    title: Two calling styles and name transforms
  - id: name-transform
    resource: tests/Support/NameTransform.php
    title: Coverage name transform rules
  - id: agents
    resource: AGENTS.md
    title: Agent wrap rules
---

# Call stack

```
app / tests
    │
    ├─ glfwCreateWindow(...)           # global helpers (exact extension names)
    │       └─► Window::createWindow() # Microscrap\Bindings\GLFW\Window
    │               └─► ExtWindow::glfwCreateWindow(...)
    │                       └─► GlfwWindow::fromPtr(...)
    │
    ├─ glClearColor(...)               # minimal GL helpers
    │       └─► GL::clearColor()
    │               └─► GLFWGL::glClearColor(...)
    │
    └─ Window::createWindow(...)       # OO-ish static style (same path into ext)
            └─► ExtWindow::glfwCreateWindow(...)
```

Rules:[^agents][^readme]

1. Helpers call the matching `Microscrap\Bindings\GLFW\*` wrapper only.
2. Wrappers are the only layer that call `Glfw\GLFW\*`.
3. Helpers never touch the extension class directly.

# Name transforms

| Style | Example | Rule |
|-------|---------|------|
| Helper | `glfwCreateWindow()` / `glClear()` | Exact extension method name[^readme][^name-transform] |
| Wrapper | `Window::createWindow()` / `GL::clearColor()` | Drop leading `glfw` or `gl`[^readme][^name-transform] |
| Extension | `GLFWWindow::glfwCreateWindow()` / `GLFWGL::glClearColor()` | Native extension API |

# Autoload

Composer `autoload.files` registers helper modules:[^composer]

- `src/Helpers/glfw-init.php`
- `src/Helpers/glfw-error.php`
- `src/Helpers/glfw-window.php`
- `src/Helpers/glfw-monitor.php`
- `src/Helpers/glfw-input.php`
- `src/Helpers/glfw-context.php`
- `src/Helpers/glfw-gl.php`
- `src/Helpers/glfw-vulkan.php`

Each function is wrapped in `if (! function_exists(...))` so a prior definition wins.[^helpers-window][^helpers-gl]

# Objects and errors

- Opaque handles become package DTOs (`GlfwWindow`, `GlfwMonitor`, `GlfwCursor`) with public `ptr`; wrappers unwrap via `->ptr`.[^window][^readme]
- Flag parameters accept `EnumType|int`; wrapper unwraps via enum `value`.[^window]
- C-style errors: no exceptions from `src/`; use `glfwGetError()` / `Error::getError()`. Creation returns `null` on failure.[^readme]
- Note: the underlying extension may still throw `RuntimeException` from some calls; those propagate as-is.[^readme]

# Related

* [1:1 extension wrap](../conventions/one-to-one-extension-wrap.md)
* [Enums from glfw3.h](../conventions/enums-from-glfw3.md)
* [Coverage drift guard](../conventions/coverage-drift.md)
* [`function_exists` load order](../traps/function-exists-load-order.md)
* [GlfwWindow DTO vs GLFWWindow casing](../traps/glfw-window-dto-casing.md)

[^window]: Window static wrapper
[^gl]: GL static wrapper
[^helpers-window]: Sample helper file with function_exists guards
[^helpers-gl]: Minimal gl* helper file
[^composer]: Autoload files list for helpers
[^readme]: Two calling styles and name transforms
[^name-transform]: Coverage name transform rules
[^agents]: Agent wrap rules
