---
type: Trap
title: "`function_exists` load order"
description: "Helpers skip definition when the name exists; microscrap/open-gl may win (or lose) for overlapping gl* names."
resource: src/Helpers/
tags: [trap, autoload, opengl, helpers]
generated: { by: "okf-documentation-generator/cursor", at: "2026-08-09T03:00:00Z" }
status: draft
sources:
  - id: readme
    resource: README.md
    title: README note on function_exists guards
  - id: helpers-gl
    resource: src/Helpers/glfw-gl.php
    title: Minimal gl* helpers with function_exists guards
  - id: style-audit
    resource: tests/Unit/StyleAuditTest.php
    title: StyleAudit requires function_exists guards
  - id: agents
    resource: AGENTS.md
    title: Prefer open-gl as canonical OpenGL binding
---

# Symptom

A subset of `gl*` calls behave like GLFW's visual-proof helpers (or like `microscrap/open-gl`) even though both packages are installed — unexpected which implementation runs.

# Cause

Every helper is defined only when the name is free:[^helpers-gl]

```php
if (! function_exists('glClearColor')) {
    function glClearColor(...): void
    {
        GL::clearColor(...);
    }
}
```

This package defines a **small** `gl*` set (`glClearColor`, `glClear`, `glViewport`, `glScissor`, `glEnable`, `glDisable`, `glGetError`, `glGetString`) for visual proofs.[^helpers-gl]

`microscrap/open-gl` defines a larger `gl*` surface. Under the guard, **whichever package's autoload files run first keeps the definition**.[^readme]

# Mitigation

- Prefer `microscrap/open-gl` as the **canonical** OpenGL binding when both are present.[^agents]
- Control Composer autoload / require order so the intended package's helpers register first for overlapping names.
- Prefer static calls (`Microscrap\Bindings\OpenGL\GL::*` or `Microscrap\Bindings\GLFW\GL::*`) when you must avoid global-name collisions entirely.
- Do not remove `function_exists` guards — StyleAudit requires them.[^style-audit]

# Related

* [Pair with open-gl / not GFX](../orientation/pairing-open-gl.md)
* [Helpers → wrappers → ext](../architecture/helpers-wrappers-ext.md)

[^readme]: README note on function_exists guards
[^helpers-gl]: Minimal gl* helpers with function_exists guards
[^style-audit]: StyleAudit requires function_exists guards
[^agents]: Prefer open-gl as canonical OpenGL binding
