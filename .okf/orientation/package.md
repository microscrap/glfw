---
type: Orientation
title: Package (0.7)
description: "microscrap/glfw 0.7.0 — LibGLFW PHP wrappers over ext-glfw; no ServiceProvider."
resource: .
tags: [orientation, glfw, microscrap, bindings, 0.7]
generated: { by: "okf-documentation-generator/cursor", at: "2026-08-09T03:00:00Z" }
status: draft
sources:
  - id: composer
    resource: composer.json
    title: Package name, version, PHP, autoload helpers
  - id: readme
    resource: README.md
    title: Package README
  - id: agents
    resource: AGENTS.md
    title: Agent rules for this package
---

# What it is

Composer package `microscrap/glfw` at **0.7.0** — PHP wrappers, enums, helpers, and opaque-handle DTOs over the [**php-io-extensions/glfw**](https://github.com/php-io-extensions/glfw) extension (`ext-glfw`).[^composer][^readme]

| Field | Value |
|-------|-------|
| Name | `microscrap/glfw` |
| Version | `0.7.0` |
| PHP | `^8.3`[^composer] |
| Namespace | `Microscrap\Bindings\GLFW\` → `src/`[^composer] |
| Require | `ext-glfw` `^0.5.0`[^composer] |
| Homepage | Ecosystem docs overview (see [Ecosystem docs](ecosystem-docs.md))[^composer] |
| Discovery | **None** — no provider / Chassis registration in this package[^agents] |
| Role | Bindings layer only (helpers + static wrappers + enums + `Glfw*` DTOs)[^agents] |

Autoloads `src/Helpers/glfw-*.php` global `glfw*` / `gl*` functions (each guarded with `function_exists`).[^composer]

# What it is not

- Not `php-io-extensions/glfw` (the native extension) — this package *wraps* that extension.
- Not a ScrapyardIO GFX / framebuffer registration package — do not invent GFX APIs or ServiceProviders here (`ogx` / `glfw-gfx` are separate).[^agents]
- Not the full OpenGL bindings surface — only a minimal GL convenience set for visual proofs; prefer `microscrap/open-gl` for draw/state API (see [Pair with open-gl / not GFX](pairing-open-gl.md)).
- Not a ServiceProvider package — no Chassis/Core/Machine coupling.[^agents]

# Public surface (summary)

| Layer | Location | Role |
|-------|----------|------|
| Helpers | `src/Helpers/glfw-*.php` | Exact C / extension names (`glfwCreateWindow`, `glClear`) |
| Wrappers | `src/{Init,Error,Window,Monitor,Input,Context,Vulkan,GL}.php` | Static API; drop `glfw` / `gl` prefix |
| Enums | `src/Enums/*` | Tokens from glfw3.h (+ a few GL enums for the convenience layer) |
| DTOs | `src/DataObjects/*` | `GlfwWindow`, `GlfwMonitor`, `GlfwCursor` — typed opaque handles |

# Wrapper inventory

| Class | Wraps | Subsystem |
|-------|-------|-----------|
| `Init` | `Glfw\GLFW\GLFW` | init/terminate, version, platform |
| `Error` | `Glfw\GLFW\GLFWError` | `glfwGetError` |
| `Window` | `Glfw\GLFW\Window\GLFWWindow` | windows, hints, attributes, event loop |
| `Monitor` | `Glfw\GLFW\Monitor\GLFWMonitor` | monitors, video modes, gamma |
| `Input` | `Glfw\GLFW\Input\GLFWInput` | keys, mouse, cursors, joystick/gamepad |
| `Context` | `Glfw\GLFW\Context\GLFWContext` | make current, swap, proc address |
| `Vulkan` | `Glfw\GLFW\Vulkan\GLFWVulkan` | Vulkan support + surface |
| `GL` | `Glfw\GLFW\GL\GLFWGL` | minimal OpenGL for visual demos |

# Related

| Topic | Concept |
|-------|---------|
| Call stack | [Helpers → wrappers → ext](../architecture/helpers-wrappers-ext.md) |
| Wrap rules | [1:1 extension wrap](../conventions/one-to-one-extension-wrap.md) |
| Enums | [Enums from glfw3.h](../conventions/enums-from-glfw3.md) |
| Tests | [Coverage drift guard](../conventions/coverage-drift.md) |
| Composition | [Pair with open-gl / not GFX](pairing-open-gl.md) |
| Docs site | [Ecosystem docs](ecosystem-docs.md) |
| Extension | `php-io-extensions/glfw` (`ext-glfw` ^0.5.0) |

[^composer]: Package name, version, PHP, autoload helpers
[^readme]: Package README
[^agents]: Agent rules for this package
