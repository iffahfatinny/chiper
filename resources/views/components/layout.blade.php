
<html>
    <head>
        <title>{{ isset($title) ? $title . ' - Chirper' : 'Chirper' }}</title>
    </head>
<body>
    <nav>
        <div>
            <a href="/">🐦 Chirper</a>
        </div>
        <div>
            <a href="#">Sign In</a>
            <a href="#">Sign Up</a>
        </div>
    </nav>
    <!-- MContent from individual pages will be injected -->
    <main>
        {{ $slot }}
    </main>

    <footer>
        <div>
            <p>© {{ date('Y') }} Chirper - Built with Laravel and ❤️</p>
        </div>
    </footer>
</body>
</html>