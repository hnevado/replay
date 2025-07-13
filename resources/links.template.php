<?php 
require_once __DIR__ . '/partials/header.php';
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
        </article>

    <?php endforeach; ?>
    <!-- endforeach -->

</div>


<?php 
require_once __DIR__ . '/partials/footer.php';
?>