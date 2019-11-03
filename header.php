<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nexter
 */

?>

<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
  <meta charset = "<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://kit.fontawesome.com/4dce322159.js"></script>  
  <title><?php echo get_bloginfo('name'); ?> | <?php echo get_bloginfo('description'); ?></title>

<?php wp_head(); ?>
</head>

<body class="container <?php body_class(); ?>">

