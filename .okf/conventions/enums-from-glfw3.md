---
type: Convention
title: Enums from glfw3.h
description: "GLFW_* / GL_* tokens live as int-backed PHP enums with FULLY UPPERCASE cases; no class constants."
resource: src/Enums/
tags: [convention, enums, glfw, sdk]
generated: { by: "okf-documentation-generator/cursor", at: "2026-08-09T03:00:00Z" }
status: draft
sources:
  - id: readme
    resource: README.md
    title: Enums note and TrueFalse caveat
  - id: true-false
    resource: src/Enums/TrueFalse.php
    title: TrueFalse enum example
  - id: style-audit
    resource: tests/Unit/StyleAuditTest.php
    title: StyleAudit backed-enum / uppercase / no-class-const checks
  - id: agents
    resource: AGENTS.md
    title: Enum case naming rule
---

# Why enums live here

The native **ext-glfw** exposes methods but token constants from glfw3.h (`GLFW_TRUE`, `GLFW_KEY_A`, …) are transcribed in this package as PHP enums for the wrapped API surface.[^readme]

# Rules

- Use **int-backed** enums under `Microscrap\Bindings\GLFW\Enums\`.[^true-false]
- Case names are **FULLY UPPERCASE** and keep the C macro spelling (e.g. `TrueFalse::GLFW_TRUE`, `WindowHint::GLFW_VISIBLE`).[^agents][^true-false]
- `TrueFalse` holds `GLFW_TRUE` / `GLFW_FALSE` because `Bool` is reserved in PHP.[^readme]
- No class-level constants in `src/` — StyleAudit fails on `T_CONST`.[^style-audit][^agents]
- Wrapper methods accept `EnumType|int` and unwrap with the enum's `value`.

# Enum inventory (0.7.0)

| Group | Enums |
|-------|-------|
| Boolean / sentinel | `TrueFalse`, `DontCare` |
| Init / platform | `InitHint`, `Platform`, `AnglePlatformType` |
| Window / context | `WindowHint`, `WindowAttrib`, `ClientApi`, `ContextCreationApi`, `ContextRobustness`, `OpenGLProfile`, `ReleaseBehavior` |
| Input | `Key`, `MouseButton`, `Mod`, `Action`, `InputMode`, `CursorMode`, `CursorShape` |
| Joystick / gamepad | `Joystick`, `JoystickEvent`, `Hat`, `GamepadButton`, `GamepadAxis` |
| Errors | `ErrorCode` |
| Minimal GL convenience | `ClearBufferMask`, `EnableCap`, `StringName` |

# Related

* [1:1 extension wrap](one-to-one-extension-wrap.md)
* [Coverage drift guard](coverage-drift.md)

[^readme]: Enums note and TrueFalse caveat
[^true-false]: TrueFalse enum example
[^style-audit]: StyleAudit backed-enum / uppercase / no-class-const checks
[^agents]: Enum case naming rule
