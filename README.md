# 📦 Response Macros for Laravel

A lightweight Laravel package that provides reusable JSON response macros such as `success`, `error`, and more — to make your API responses consistent and developer-friendly.
This package provides a set of reusable HTTP response macros for Laravel, helping you maintain consistent and readable API responses across your entire application.

---

## 🚀 Installation

### ✅ For Production (Packagist Release)

> This requires the package to be published on [Packagist](https://packagist.org/)

```bash
composer require charlesuwaje/response-macros
---
##  For Development (Local Git Repository)
> composer require charlesuwaje/response-macros:@dev
```

---

## 📦 Development Installation (local or GitHub repo)

{
"minimum-stability": "dev",
"prefer-stable": true,
"repositories": [
{
"type": "vcs",
"url": "https://github.com/YOUR_USERNAME/response-macros"
}
]
}

```bash
composer require charlesuwaje/response-macros:@dev
```

---

## 📦 Registering the Macros

In your App\Providers\AppServiceProvider.php (or a custom provider), add this in the boot() method:

```php

use CharlesUwaje\ResponseMacros\Helpers\ResponseMacro;

public function boot(): void
{
    ResponseMacro::register();
}
✅ After this step, Laravel's response() helper will now support the new macros globally.

```

---

## Available Response Macros

| Macro                                            | Status Code | Description                      |
| ------------------------------------------------ | ----------- | -------------------------------- |
| `response()->success($message, $data)`           | 200         | Standard success response        |
| `response()->created($message, $data)`           | 201         | Successful resource creation     |
| `response()->error($message, $statusCode)`       | Custom      | Generic error with optional code |
| `response()->unauthorized($message)`             | 401         | User not authenticated           |
| `response()->forbidden($message)`                | 403         | User lacks permission            |
| `response()->notFound($message)`                 | 404         | Resource not found               |
| `response()->validationError($message, $errors)` | 422         | Validation failed                |
| `response()->noContent()`                        | 204         | Empty success response           |

---

## 🧪 Usage in Your Controller

Once the macro is registered, you can use it like a native Laravel response inside any controller:

```php
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return response()->success('Users retrieved successfully', $users);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $user = User::create($validated);

        return response()->created('User created successfully', $user);
    }

    public function show($id)
    {
        $user = User::find($id);

        if (! $user) {
            return response()->notFound('User not found');
        }

        return response()->success('User found', $user);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if (! $user) {
            return response()->notFound();
        }

        $user->delete();

        return response()->noContent();
    }
}
```

---

## JSON Output Format

The macros will return JSON responses with the following structure:

```json
{
    "status": "success",
    "message": "Your message here",
    "data": {
        // Data to be returned
    }
}
```

For errors:

```json
{
    "status": "error",
    "message": "Your error message here",
    "errors": {
        // Validation errors
    }
}
```

---

## 💡 Best Practices

Use response()->success() for all 200-level responses

Use response()->error() with custom codes if needed

Use response()->validationError() to structure validation failure messages

## Consistent responses help frontends, mobile apps, and API consumers parse data easily

## 📚 Contributing

PRs and suggestions are welcome! If you find a bug or want to add new macros, feel free to open an issue or submit a pull request.
