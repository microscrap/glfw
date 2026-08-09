---
type: Convention
title: "1:1 extension wrap"
description: "Helpers delegate to wrappers; wrappers call Glfw\\GLFW\\*; Glfw* DTOs wrap opaque ptrs."
resource: src/
tags: [convention, bindings, glfw]
generated: { by: "okf-documentation-generator/cursor", at: "2026-08-09T03:00:00Z" }
status: draft
sources:
  - id: agents
    resource: AGENTS.md
    title: Agent wrap rules
  - id: readme
    resource: README.md
    title: Package README wrap description
  - id: window
    resource: src/Window.php
    title: Window wrapper class
  - id: helpers-window
    resource: src/Helpers/glfw-window.php
    title: Helper delegation example
  - id: dto
    resource: src/DataObjects/GlfwWindow.php
    title: GlfwWindow DTO
---

# Rule

Match peer bindings packages (`microscrap/open-gl`, `microscrap/ftdi`, `microscrap/posix`):[^agents][^readme]

1. Global helpers use exact extension method names (`glfwCreateWindow`, `glClearColor`).
2. Static wrappers drop the `glfw` / `gl` prefix (`Window::createWindow`, `GL::clearColor`).
3. Helpers never call the extension; only wrapper classes do.[^helpers-window][^window]
4. Token `#define`s from glfw3.h live in backed enums — see [Enums from glfw3.h](enums-from-glfw3.md).
5. Opaque handles are package DTOs (`GlfwWindow`, …) — see [GlfwWindow DTO vs GLFWWindow casing](../traps/glfw-window-dto-casing.md).[^dto][^agents]
6. Coverage Pest tests guard wrapper + helper completeness — see [Coverage drift guard](coverage-drift.md).
7. No exceptions thrown from `src/`; prefer `is_null($var)` over `$var === null`.[^agents]

# Architecture link

Full call-stack diagram: [Helpers → wrappers → ext](../architecture/helpers-wrappers-ext.md).

[^agents]: Agent wrap rules
[^readme]: Package README wrap description
[^window]: Window wrapper class
[^helpers-window]: Helper delegation example
[^dto]: GlfwWindow DTO
