<?php 
require_once __DIR__ . '/partials/header.php';
?>

<?php 
if ($postId) {
?>

    <article class="post-card pixel-border">
        <h3 class="post-title modern-font">
                <?php echo htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8'); ?>
        </h3>
         <p class="post-description modern-font">
            <?php echo htmlspecialchars($post['content'], ENT_QUOTES, 'UTF-8'); ?></p>
        </p>
    </article>
<?php 
} else { 
    foreach ($posts as $post) {
?>    
        <article class="post-card pixel-border">
                <h3 class="post-title modern-font">
                        <?php echo htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8'); ?>
                </h3>
                <p class="post-description modern-font">
                    <?php echo htmlspecialchars($post['content'], ENT_QUOTES, 'UTF-8'); ?></p>
                 </p>
        </article>
    <?php } ?>

<?php } ?>

<?php 
require_once __DIR__ . '/partials/footer.php';
?>