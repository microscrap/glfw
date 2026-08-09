---
okf_version: "0.2"
---

# microscrap/glfw Knowledge Bundle

Package knowledge for `microscrap/glfw` (LibGLFW bindings over **ext-glfw**, v0.7.0).
Read this index first; open only the concepts needed for the task.

**Trust rule:** Prefer `status: stable`. Treat `deprecated` as historical only. New agent-written concepts stay `status: draft` until a human verifies them.
**Placement:** This bundle lives at the **package root** only — never under `src/`.
**Links:** Concept cross-links use paths relative to each file.
**Scope:** Document the wrappers-only bindings package. Do **not** invent GFX registration or ServiceProviders here — those belong in `microscrap/ogx`, `microscrap/glfw-gfx`, or tubes.
**Dist note:** `.okf/` and root `AGENTS.md` are `export-ignore` in `.gitattributes` so Composer dist packages do not ship this bundle.

# Orientation

* [Package (0.7)](orientation/package.md) - Composer identity, namespace, wrappers over ext-glfw.
* [Ecosystem docs](orientation/ecosystem-docs.md) - Published 0.7.x overview and docs site entrypoint.
* [Pair with open-gl / not GFX](orientation/pairing-open-gl.md) - Windows/context here; full GL API in open-gl; GFX packages are separate.

# Architecture

* [Helpers → wrappers → ext](architecture/helpers-wrappers-ext.md) - Call stack and name transforms for the bindings layer.

# Conventions

* [1:1 extension wrap](conventions/one-to-one-extension-wrap.md) - Helpers → wrapper → extension; Glfw* DTO passthrough.
* [Enums from glfw3.h](conventions/enums-from-glfw3.md) - GLFW / GL tokens as int-backed enums; no class constants.
* [Coverage drift guard](conventions/coverage-drift.md) - Pest CoverageTest / StyleAudit keep wrap complete.

# Traps

* [macOS Retina: window vs framebuffer](traps/macos-retina-window-vs-framebuffer.md) - `glViewport` needs framebuffer pixels, not window size.
* [`function_exists` load order](traps/function-exists-load-order.md) - Overlap with `microscrap/open-gl` gl* helpers; first definition wins.
* [GlfwWindow DTO vs GLFWWindow casing](traps/glfw-window-dto-casing.md) - Package DTOs avoid APFS collision with extension classes.

# Log

* [Directory update log](log.md)
