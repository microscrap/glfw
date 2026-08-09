---
type: Convention
title: Coverage drift guard
description: "Pest CoverageTest and StyleAudit keep the wrap complete and stylistically honest."
resource: tests/Unit/
tags: [convention, tests, coverage, pest]
generated: { by: "okf-documentation-generator/cursor", at: "2026-08-09T03:00:00Z" }
status: draft
sources:
  - id: coverage
    resource: tests/Unit/CoverageTest.php
    title: Coverage drift Pest test
  - id: coverage-map
    resource: tests/Support/CoverageMap.php
    title: Wrapper/extension class pairs
  - id: snapshot
    resource: tests/Support/extension-methods-0.5.0.php
    title: Committed 0.5.0 extension method snapshot
  - id: name-transform
    resource: tests/Support/NameTransform.php
    title: Wrapper/helper name transforms
  - id: style-audit
    resource: tests/Unit/StyleAuditTest.php
    title: StyleAudit Pest test
  - id: agents
    resource: AGENTS.md
    title: Coverage update rule
  - id: readme
    resource: README.md
    title: Coverage drift highlight
---

# Purpose

When **ext-glfw** gains methods, this package must grow matching wrapper methods and helpers. A Pest suite fails if coverage drifts.[^readme][^coverage]

# CoverageTest

`tests/Unit/CoverageTest.php`:[^coverage]

1. Loads extension methods from the live `glfw` extension when available; otherwise from `tests/Support/extension-methods-0.5.0.php`.[^snapshot]
2. For each `[wrapperClass, extensionClass]` in `tests/Support/CoverageMap.php`, asserts:[^coverage-map]
   - every extension method has a wrapper method (via `NameTransform::wrapperMethod`)[^name-transform]
   - every extension method has a global helper (`function_exists`)
3. Asserts the stub snapshot keys stay in sync with the coverage map.

Current map pairs:[^coverage-map]

| Wrapper | Extension |
|---------|-----------|
| `Init` | `Glfw\GLFW\GLFW` |
| `Error` | `Glfw\GLFW\GLFWError` |
| `Window` | `Glfw\GLFW\Window\GLFWWindow` |
| `Monitor` | `Glfw\GLFW\Monitor\GLFWMonitor` |
| `Input` | `Glfw\GLFW\Input\GLFWInput` |
| `Context` | `Glfw\GLFW\Context\GLFWContext` |
| `Vulkan` | `Glfw\GLFW\Vulkan\GLFWVulkan` |
| `GL` | `Glfw\GLFW\GL\GLFWGL` |

When the extension grows: update the wrap **and** refresh `tests/Support/extension-methods-0.5.0.php`.[^agents]

# StyleAudit

`tests/Unit/StyleAuditTest.php` enforces package style on `src/`:[^style-audit]

- no class constants (`T_CONST`)
- no `throw`
- every helper guarded by `function_exists`
- every enum is backed (`int` or `string`)
- every enum case name is fully uppercase

# Related

* [Helpers → wrappers → ext](../architecture/helpers-wrappers-ext.md)
* [Enums from glfw3.h](enums-from-glfw3.md)
* [1:1 extension wrap](one-to-one-extension-wrap.md)

[^coverage]: Coverage drift Pest test
[^coverage-map]: Wrapper/extension class pairs
[^snapshot]: Committed 0.5.0 extension method snapshot
[^name-transform]: Wrapper/helper name transforms
[^style-audit]: StyleAudit Pest test
[^agents]: Coverage update rule
[^readme]: Coverage drift highlight
