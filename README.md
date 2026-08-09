# microscrap/glfw — LibGLFW bindings for PHP

> **Docs (production):** [ScrapyardIO · microscrap/glfw 0.7.x](https://scrapyard-io.projectsaturnstudios.com/ecosystem/microscrap/glfw/0.7.x/overview)

[![Docs](https://img.shields.io/badge/docs-ScrapyardIO-0ea5e9?logo=readthedocs&logoColor=white)](https://scrapyard-io.projectsaturnstudios.com/ecosystem/microscrap/glfw/0.7.x/overview)
[![License: MIT](https://img.shields.io/badge/license-MIT-green.svg)](LICENSE)
[![Requires ext-glfw](https://img.shields.io/badge/ext--glfw-%5E0.5-777bb4?logo=php&logoColor=white)](https://github.com/php-io-extensions/glfw)

PHP library that wraps the [**glfw**](https://github.com/php-io-extensions/glfw) extension with global helpers, enums, and data objects. Every helper delegates to a static wrapper class under `Microscrap\Bindings\GLFW`.

The package covers the entire extension surface (124 GLFWAPI methods + a small OpenGL convenience set across 8 extension classes): init, error, windows, monitors, input/joysticks/gamepads, context, Vulkan, and minimal GL clear/viewport helpers for visual proofs.

Ecosystem docs: [`0.7.x`](https://scrapyard-io.projectsaturnstudios.com/ecosystem/microscrap/glfw/0.7.x/overview). For OpenGL draw APIs prefer [`microscrap/open-gl`](https://scrapyard-io.projectsaturnstudios.com/ecosystem/microscrap/open-gl/0.7.x/overview); tubes OpenGL deferred buffers live in `microscrap/ogx`.

## Highlights

* Two calling styles — exact C names (`glfwCreateWindow(...)`) or static wrapper classes (`Window::createWindow(...)`)
* Opaque GLFW handles wrapped in typed `final readonly` data objects (`GlfwWindow`, `GlfwMonitor`, `GlfwCursor`)
* Enum layer transcribed from glfw3.h — keys, hints, actions, joysticks/gamepads, context/client API tokens, plus a few GL enums used by the convenience layer
* C-style error handling: no exceptions in `src/`; details via `glfwGetError()`
* Coverage drift guard: a Pest test reflects the extension and fails if any extension method lacks a wrapper method or helper function

## Requirements

* PHP 8.3+
* **ext-glfw** ^0.5.0 — install from [php-io-extensions/glfw](https://github.com/php-io-extensions/glfw)

## Installation

Confirm **ext-glfw** is loaded:

```bash
php -m | grep glfw
```

```bash
composer require microscrap/glfw
```

Composer autoloads all helper files in `src/Helpers/`, registering the global `glfw*` / `gl*` functions when the package is installed. Helpers are only defined if the name is not already taken (`function_exists` guard).

## The two calling styles

**C-ish** — global functions with exact GLFW C names:

```php
use Microscrap\Bindings\GLFW\Enums\TrueFalse;
use Microscrap\Bindings\GLFW\Enums\WindowHint;

glfwInit();
glfwWindowHint(WindowHint::GLFW_VISIBLE, TrueFalse::GLFW_FALSE->value);
$window = glfwCreateWindow(640, 480, 'hello');
glfwDestroyWindow($window);
glfwTerminate();
```

**OO-ish** — static wrapper classes, same behavior:

```php
use Microscrap\Bindings\GLFW\Init;
use Microscrap\Bindings\GLFW\Window;
use Microscrap\Bindings\GLFW\Enums\TrueFalse;
use Microscrap\Bindings\GLFW\Enums\WindowHint;

Init::init();
Window::windowHint(WindowHint::GLFW_VISIBLE, TrueFalse::GLFW_FALSE->value);
$window = Window::createWindow(640, 480, 'hello');
Window::destroyWindow($window);
Init::terminate();
```

Helpers never touch the extension directly; they delegate one-to-one to the wrapper classes, which are the only layer calling `Glfw\GLFW\*`. Both styles accept and return the same data objects, and every flag/enum parameter takes `EnumType|int`.

### Name transforms

* Wrapper methods drop the `glfw` prefix: `glfwCreateWindow` → `Window::createWindow()`.
* The `GL` class drops the `gl` prefix: `glClearColor` → `GL::clearColor()`.
* Helpers use the exact C / extension method name (`glfwCreateWindow()`, `glClear()`).

> **macOS note:** data objects are named `GlfwWindow` / `GlfwMonitor` / `GlfwCursor` (not `GLFWwindow`) so they do not collide with the extension classes `GLFWWindow` / `GLFWMonitor` on case-insensitive filesystems.

## Wrapper classes

| Class | Wraps | Methods | Subsystem |
|-------|-------|---------|-----------|
| `Init` | `Glfw\GLFW\GLFW` | 10 | init/terminate, version, platform, error callback |
| `Error` | `GLFWError` | 1 | `glfwGetError` |
| `Window` | `Window\GLFWWindow` | 47 | windows, hints, attributes, event loop |
| `Monitor` | `Monitor\GLFWMonitor` | 15 | monitors, video modes, gamma |
| `Input` | `Input\GLFWInput` | 40 | keys, mouse, cursors, joystick/gamepad, clipboard, time |
| `Context` | `Context\GLFWContext` | 6 | make current, swap, proc address |
| `Vulkan` | `Vulkan\GLFWVulkan` | 5 | Vulkan support + surface |
| `GL` | `GL\GLFWGL` | 8 | minimal OpenGL for visual demos |

Data objects live under `Microscrap\Bindings\GLFW\DataObjects`. Enums live under `Microscrap\Bindings\GLFW\Enums` (case names match the C macros exactly; `TrueFalse` holds `GLFW_TRUE` / `GLFW_FALSE` because `Bool` is reserved in PHP).

## Examples

### Hidden window (init smoke)

```php
use Microscrap\Bindings\GLFW\Enums\TrueFalse;
use Microscrap\Bindings\GLFW\Enums\WindowHint;

glfwInit();
glfwWindowHint(WindowHint::GLFW_VISIBLE, TrueFalse::GLFW_FALSE->value);

$window = glfwCreateWindow(320, 240, 'demo');
if (is_null($window)) {
    [$code, $description] = glfwGetError();
    throw new RuntimeException($description ?: "glfw error {$code}");
}

while (! glfwWindowShouldClose($window)) {
    glfwPollEvents();
    glfwSetWindowShouldClose($window, TrueFalse::GLFW_TRUE->value);
}

glfwDestroyWindow($window);
glfwTerminate();
```

### OpenGL clear (needs a display)

```php
use Microscrap\Bindings\GLFW\Context;
use Microscrap\Bindings\GLFW\GL;
use Microscrap\Bindings\GLFW\Init;
use Microscrap\Bindings\GLFW\Window;
use Microscrap\Bindings\GLFW\Enums\ClearBufferMask;

Init::init();
$window = Window::createWindow(640, 480, 'clear');
Context::makeContextCurrent($window);

GL::clearColor(0.1, 0.2, 0.3, 1.0);
GL::clear(ClearBufferMask::GL_COLOR_BUFFER_BIT);
Context::swapBuffers($window);

Window::destroyWindow($window);
Init::terminate();
```

## Error handling

Nothing in `src/` throws. The package keeps GLFW's C conventions:

* creation functions return `null` on failure (`?GlfwWindow`, `?GlfwCursor`, …)
* call `glfwGetError()` for `[code, description]`

Note: the underlying extension itself may throw `RuntimeException` from a handful of calls (e.g. failed `glfwCreateWindow`). Those propagate as-is.

## Testing

```bash
./vendor/bin/pest
```

* `tests/Unit` runs without the extension: coverage drift guard (against a committed 0.5.0 method snapshot), style audit (no class constants, no throws, guarded helpers, backed enums, uppercase cases).
* `tests/Feature` is gated on `extension_loaded('glfw')` and smokes init/version/platform.

## License

MIT. See [LICENSE](LICENSE).
