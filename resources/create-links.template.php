<?php 
require_once __DIR__ . '/partials/header.php';
?>


<div class="text-center mb-16">
                <h2 class="text-6xl md:text-7xl lg:text-8xl font-bold text-yellow-400 drop-shadow-lg tracking-wider inline-block px-4 py-2 bg-purple-800 border-4 border-yellow-500 shadow-xl relative overflow-hidden">
                    <span class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-purple-700 via-transparent to-purple-900 opacity-75"></span>
                    Nuevo enlace
                </h2>
            </div>

<div class="w-full max-w-xl mx-auto">
    <form method="POST" action="/links/store">
        <div class="mb-4">
            <label class="text-sm font-semibold text-white">Título</label>
            <div class="mt-2">
                <input type="text" 
                        placeholder="Título del enlace"
                        name="title" 
                        class="w-full outline-1 outline-gray-300 rounded-md px-3 py-2 text-white" 
                        value="<?= htmlspecialchars($_POST['title'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
            </div>
        </div>

        <div class="mb-4">
            <label class="text-sm font-semibold text-white">Url</label>
            <div class="mt-2">
                <input type="text" 
                        placeholder="https://ejemplo.com"   
                        name="url" 
                        class="w-full outline-1 outline-gray-300 rounded-md px-3 py-2 text-white" 
                        value="<?= htmlspecialchars($_POST['url'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
            </div>
        </div>

        <div class="mb-4">
            <label class="text-sm font-semibold text-white">Descripción</label>
            <div class="mt-2">
                <textarea name="description" 
                            rows="2" 
                            class="w-full outline-1 outline-gray-300 rounded-md px-4 py-2 text-white">
                            <?= htmlspecialchars($_POST['description'] ?? '', ENT_QUOTES, 'UTF-8') ?>
                        </textarea>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="visit-button modern-font w-full">
                Crear
            </button>
        </div>
    </form>

   <?php if (!empty($errors)): ?>
    <ul class="mt-4 text-red-500">
        <?php foreach ($errors as $error): ?>
            <li class="text-xs">&rarr; <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>
    <!-- endif -->
</div>


<?php 
require_once __DIR__ . '/partials/footer.php';
?>