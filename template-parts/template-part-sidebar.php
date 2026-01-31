<?php
/**
 * Sidebar template part
 *
 * @package D_Theme
 */
$pods = function_exists('pods') ? pods('sidebar') : null;
?>


<?php if (is_page(array(27)) or is_archive()) { ?>

    <div class="category-sidebar-menu">
        <!-- Recent Posts -->
        <section class="widget widget_recent_entries">
            <h2 class="widget-title">
                <?= $pods->display(name: 'recent_posts_title') ?>
            </h2>
            <ul>
                <?php
                $recent_posts = wp_get_recent_posts(array(
                    'numberposts' => 5,
                    'post_status' => 'publish'
                ));
                foreach ($recent_posts as $post_item): ?>
                    <li>
                        <a href="<?php echo get_permalink($post_item['ID']) ?>">
                            <?php echo $post_item['post_title'] ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>

        <!-- Archives -->
        <section class="widget widget_archive">
            <h2 class="widget-title">
                <?= $pods->display(name: 'archives_title') ?>
            </h2>
            <ul>
                <?php wp_get_archives(array(
                    'type' => 'monthly',
                    'limit' => 12,
                    'format' => 'html',
                    'show_post_count' => false
                )); ?>
            </ul>
        </section>

        <!-- Categories -->
        <section class="widget widget_categories">
            <h2 class="widget-title"><?= $pods->display(name: 'categories_title') ?></h2>
            <ul>
                <?php
                $categories = get_categories();
                foreach ($categories as $category): ?>
                    <li>
                        <a href="<?php echo get_category_link($category->term_id); ?>">
                            <?php echo $category->name; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>
    </div>
<?php } ?>