<div class="category-sidebar">
  <div class="category-sidebar-container">
    <h3>Topics</h3>
    <?php
    $categories = get_categories([
      "orderby" => "name",
      "order" => "ASC",
    ]);
    echo "<ul class='category-list'>";
    foreach ($categories as $category) {
      echo "<li class='" . $category->slug . "'><a href='" . get_category_link($category->term_id) . "' title='View all posts in " . esc_html($category->name) . "'>";
      if (is_category()) {
        echo '<svg aria-hidden="true"><use xlink:href="/wp-content/themes/lumis-child/svg-defs.svg#chevron-right"></use></svg>';
      }
      echo esc_html($category->name) . "</a></li>";
    }
    ?>
    </ul>
  </div>
</div><!-- .category-sidebar -->
