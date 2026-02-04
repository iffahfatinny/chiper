
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
    <!-- Content from individual pages will be injected - means content in home.blade.php is being call inside main tag-->
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