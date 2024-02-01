<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee App</title>
    @vite('public/style.css')
</head>

<body>
    <div class="navbar bg-base-100 max-w-7xl mx-auto">
        <div class="flex-1">
            <a class="btn btn-ghost text-xl" href="/">Employee App</a>
        </div>
        <div class="flex-none">
            <ul class="menu menu-horizontal px-1">
                <li><a href="{{ route('position.index') }}">Position</a></li>
                <li><a href="{{ route('employee.index') }}">Employee</a></li>
            </ul>
        </div>
    </div>
    <section class="max-w-7xl mx-auto p-10">
        @yield('content')
    </section>
</body>

</html>
