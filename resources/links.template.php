<?php 
require_once __DIR__ . '/partials/header.php';
use Framework\Helper;
?>


<div class="grid grid-cols-1 lg:grid-cols-3 gap-x-8 gap-y-8">
    
    <?php 
    foreach ($links as $link): ?>

        <article class="post-card pixel-border">
                <h3 class="post-title modern-font">
                    <a href="<?php echo htmlspecialchars($link['url'], ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener noreferrer">
                         <?php echo htmlspecialchars($link['title'], ENT_QUOTES, 'UTF-8'); ?>
                    </a>
                </h3>
                <p class="post-description modern-font">
                    <?php echo htmlspecialchars($link['description'], ENT_QUOTES, 'UTF-8'); ?></p>
                </p>
                <a href="<?php echo htmlspecialchars($link['url'], ENT_QUOTES, 'UTF-8'); ?>" class="visit-button modern-font" target="_blank" rel="noopener noreferrer">
                    Visitar
                </a>
                <?php if (!empty($_SESSION['is_admin'])): ?>
        <div class="flex gap-2 mt-2">
            <form method="POST" action="/links/delete">
                <input type="hidden" name="id" value="<?= (int)$link['id'];?>">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="<?= Helper::csrf_token(); ?>">
                <button type="submit" class="delete-button modern-font visit-button modern-font" onclick="return confirm('¿Estás seguro de eliminar este enlace?');">
                    Eliminar
                </button>
            </form>
            <a href="/links/edit?id=<?= (int)$link['id'];?>" class="edit-button modern-font visit-button modern-font">
                Editar
            </a>
        </div>
                <?php endif; ?>
        </article>

    <?php endforeach; ?>
    <!-- endforeach -->
    <div class="col-span-1 lg:col-span-3">
        <p class="text-center modern-font">
            <a href="/links/create" class="visit-button modern-font">
                Crear enlace
            </a>
        </p>    
    </div>
</div>


<?php 
require_once __DIR__ . '/partials/footer.php';
?>