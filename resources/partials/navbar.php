<nav class="navbar mb-8">
    <div class="nav-container">
        <a href="/" class="nav-logo retro-font">REPLAY</a>
        <div class="nav-links">
            <a href="/" class="nav-link modern-font <?= $_SERVER["REQUEST_URI"] === "/" ? 'active' : '' ?>">Home</a>
            <a href="/blog" class="nav-link modern-font <?= $_SERVER["REQUEST_URI"] === "/blog" ? 'active' : '' ?>">Juegos</a>
            <a href="/about" class="nav-link modern-font <?= $_SERVER["REQUEST_URI"] === "/about" ? 'active' : '' ?>">Acerca de</a>
            <a href="/links" class="nav-link modern-font <?= $_SERVER["REQUEST_URI"] === "/links" ? 'active' : '' ?>">Enlaces</a>
            </div>
    </div>
</nav>