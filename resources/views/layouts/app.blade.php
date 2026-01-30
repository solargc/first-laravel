<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="color-scheme" content="light dark">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Todo App')</title>

    @vite('resources/css/app.css')
</head>

<body
  class="
    min-h-screen
    bg-gradient-to-b
    from-gray-50 via-gray-50 to-violet-50/100
    text-gray-900

    dark:from-gray-950 dark:via-gray-950 dark:to-violet-950/30
    dark:text-gray-100
  "
>
    <main class="mx-auto max-w-2xl px-4 py-10 sm:py-14">
        <div class="rounded-xl border border-gray-200 bg-white p-6 sm:p-8 dark:border-gray-800 dark:bg-gray-900">
            @yield('content')
        </div>
    </main>
</body>
</html>
