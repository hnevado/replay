<?php 
require_once __DIR__ . '/partials/header.php';
?>

 <!-- Hero Section -->
    <section class="relative py-4 overflow-hidden">
        <div class="mx-auto px-6 relative z-10">

            <div class="text-center mb-16">
                <h2 class="text-6xl md:text-7xl lg:text-8xl font-bold text-yellow-400 drop-shadow-lg tracking-wider inline-block px-4 py-2 bg-purple-800 border-4 border-yellow-500 shadow-xl relative overflow-hidden">
                    <span class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-purple-700 via-transparent to-purple-900 opacity-75"></span>
                    ¡HOLA!
                </h2>
            </div>

            <div class="text-center mb-16">
                <h2 class="post-title modern-font">
                    _Revive los momentos más épicos del gaming
                </h2>
            </div>
            
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-20">
                <div class="post-card pixel-border">
                    <div class="gradient-border-content p-8 text-center">
                        <div class="text-4xl mb-4 animate-bounce-slow">🎮</div>
                        <h3 class="font-retro text-neon-cyan text-xl mb-2">200+</h3>
                        <p class="text-gray-300">Juegos Analizados</p>
                    </div>
                </div>
                <div class="post-card pixel-border">
                    <div class="gradient-border-content p-8 text-center">
                        <div class="text-4xl mb-4 animate-bounce-slow" style="animation-delay: 0.5s;">🕹️</div>
                        <h3 class="font-retro text-neon-pink text-xl mb-2">15</h3>
                        <p class="text-gray-300">Consolas Cubiertas</p>
                    </div>
                </div>
                <div class="post-card pixel-border">
                    <div class="gradient-border-content p-8 text-center">
                        <div class="text-4xl mb-4 animate-bounce-slow" style="animation-delay: 1s;">👾</div>
                        <h3 class="font-retro text-neon-purple text-xl mb-2">3</h3>
                        <p class="text-gray-300">Décadas de Historia</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="relative py-4 overflow-hidden">
        <div class="text-center mb-16">
            <h2 class="text-6xl md:text-7xl lg:text-8xl font-bold text-yellow-400 drop-shadow-lg tracking-wider inline-block px-4 py-2 bg-purple-800 border-4 border-yellow-500 shadow-xl relative overflow-hidden">
                <span class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-purple-700 via-transparent to-purple-900 opacity-75"></span>
                REPLAY
            </h2>
        </div>

        <div class="text-center mb-16">
                <h2 class="post-title modern-font">
                    _Últimas noticias y análisis
                </h2>
            </div>

        <div class="grid grid-cols-1 gap-x-8 gap-y-8">
            
            <?php 
            foreach ($posts as $post): ?>

                <article class="post-card pixel-border">
                        <h3 class="post-title modern-font">
                            <a href="/post?id=<?=(int)$post['id']?>">
                                <?php echo htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8'); ?>
                            </a>
                        </h3>
                        <p class="post-description modern-font">
                            <?php echo htmlspecialchars($post['content'], ENT_QUOTES, 'UTF-8'); ?></p>
                        </p>
                </article>

            <?php endforeach; ?>
            <!-- endforeach -->

        </div>
    </section>

<?php 
require_once __DIR__ . '/partials/footer.php';
?>