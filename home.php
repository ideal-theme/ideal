<?php
/**
 * The template for displaying Blog site home.
 *
 * @package ideal WordPress Theme
 * @version 1.0
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
get_header();
get_template_part('includes/templates/post' );
get_footer();