<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Student Manager') | SITE</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex min-h-full flex-col bg-mystic font-sans text-lucky-point antialiased">
    <header class="border-b-4 border-cornflower bg-lucky-point">
        <nav class="mx-auto flex max-w-5xl items-center justify-between gap-4 px-4 py-3 sm:px-6">
            <a href="{{ route('students.index') }}" class="flex items-center gap-3">
                <span class="grid size-10 place-items-center rounded-xl bg-cornflower text-lucky-point">
                    <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                    </svg>
                </span>
                <span class="leading-tight">
                    <span class="block text-lg font-bold tracking-wide text-white">SITE</span>
                    <span class="block text-xs font-medium text-cornflower">Student Manager</span>
                </span>
            </a>

            @auth
                <div class="flex items-center gap-3">
                    <span class="grid size-9 place-items-center rounded-full bg-ship-cove text-sm font-bold text-white" aria-hidden="true">
                        {{ Str::upper(Str::substr(Auth::user()->name, 0, 1)) }}
                    </span>
                    <span class="hidden text-sm text-mystic sm:block">Hi, <span class="font-semibold text-white">{{ Auth::user()->name }}</span></span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-sm bg-cornflower text-lucky-point hover:bg-white">Log out</button>
                    </form>
                </div>
            @endauth
        </nav>
    </header>

    <main class="mx-auto w-full max-w-5xl flex-1 px-4 py-8 sm:px-6 sm:py-10">
        @if (session('success'))
            <div class="mb-6 flex items-center gap-3 rounded-xl border-l-4 border-cornflower bg-white px-4 py-3 text-sm font-semibold shadow-sm">
                <span class="grid size-6 shrink-0 place-items-center rounded-full bg-cornflower/40">
                    <svg class="size-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                    </svg>
                </span>
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="px-4 py-6 text-center text-xs text-lucky-point/70">
        School of Information Technology Education
        <span class="hidden sm:inline">&middot;</span>
        <span class="block sm:inline">Universidad de Dagupan</span>
    </footer>
</body>

</html>
