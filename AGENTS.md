# AGENTS.md — microscrap/glfw

**Always read `.okf/index.md` first** before changing this package. Open only the concepts needed for the task; prefer `status: stable` when present. When you learn a durable package fact, update `.okf/` and append `.okf/log.md`.

## Role

Bindings-only Composer package over **ext-glfw** (`php-io-extensions/glfw`). Helpers + static wrappers + enums + `Glfw*` DTOs. No GFX, no ServiceProvider — those live in `microscrap/ogx` / `microscrap/glfw-gfx` / tubes.

## Rules

* Helpers call `Microscrap\Bindings\GLFW\{Init,Error,Window,Monitor,Input,Context,Vulkan,GL}` only; wrappers alone call `Glfw\GLFW\*`.
* Keep 1:1 coverage with the extension; update `tests/Support/extension-methods-0.5.0.php` when the extension grows.
* Token constants live in `src/Enums/*` as backed enums with **FULLY UPPERCASE** cases.
* Prefer `is_null($var)` over `$var === null`.
* No class-level constants; no exceptions thrown from `src/`.
* Opaque handles use package DTOs (`GlfwWindow`, `GlfwMonitor`, `GlfwCursor`) — not extension class names — because of macOS APFS case collision.
* Minimal `gl*` helpers here are for visual proofs only; prefer `microscrap/open-gl` as the canonical OpenGL binding.

## Quick OKF map

| Need | Concept |
|------|---------|
| Identity / scope | `.okf/orientation/package.md` |
| Call stack | `.okf/architecture/helpers-wrappers-ext.md` |
| Enums | `.okf/conventions/enums-from-glfw3.md` |
| Tests | `.okf/conventions/coverage-drift.md` |
| Composition boundary | `.okf/orientation/pairing-open-gl.md` |
| Retina viewport | `.okf/traps/macos-retina-window-vs-framebuffer.md` |
| open-gl helper clash | `.okf/traps/function-exists-load-order.md` |
| DTO naming | `.okf/traps/glfw-window-dto-casing.md` |
