<?php
/**
 * Header Navigation template.
 *
 * @package Custom theme
 */

use CUSTOM_THEME\Inc\Menus;

$menu_class = Menus::get_instance();
$header_menu_id = $menu_class->get_menu_id('theme-header-menu');
$header_menus = wp_get_nav_menu_items($header_menu_id);

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <?php 
    if(function_exists('the_custom_logo')) {
      the_custom_logo();
    } else {
      ?> <a class="navbar-brand" href="#">Navbar</a> <?php
    }
    ?>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <?php
        if(!empty($header_menus) && is_array($header_menus)) {
          ?>
            <ul class="navbar-nav">
              <?php
                foreach($header_menus as $menu_item) {
                  if(!$menu_item->menu_item_parent) {
                    $child_menu_items = $menu_class->get_child_menu_item($header_menus, $menu_item->ID);
                    $has_children = !empty($child_menu_items) && is_array($child_menu_items);

                    if(!$has_children) {
                      ?>
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="<?php echo esc_url($menu_item->url); ?>">
                          <?php echo esc_html($menu_item->title); ?>
                          </a>
                        </li>
                      <?php
                    } else {
                      ?> 
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="<?php echo esc_url($menu_item->url); ?>" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <?php echo esc_html($menu_item->title); ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <?php 
                            foreach($child_menu_items as $child_menu_item) {
                              ?>
                                <li>
                                  <a class="dropdown-item" href="<?php echo esc_url($child_menu_item->url); ?>">
                                    <?php echo esc_html($child_menu_item->title); ?>
                                  </a>
                                </li>
                              <?php
                            }
                          ?>
                        </ul>
                      </li>
                      <?php
                    }
                  }
                }
              ?>
            </ul>
          <?php
        }
      ?>
    </div>
  </div>
</nav>

<li class="nav-item">
  <a class="nav-link active" aria-current="page" href="#">Home</a>
</li>

<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    Dropdown
  </a>
  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
    <li><a class="dropdown-item" href="#">Action</a></li>
    <li><a class="dropdown-item" href="#">Another action</a></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li>
  </ul>
</li>