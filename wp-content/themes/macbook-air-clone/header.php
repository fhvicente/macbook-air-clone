<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    
    <header id="main-header">
        <!-- First navbar -->
        <div class="first-navbar">
            <div class="container">
                <ul>
                    <li><a href="<?php echo home_url(); ?>">Apple</a></li>
                    <li><a href="#">Mac</a></li>
                    <li><a href="#">iPad</a></li>
                    <li><a href="#">iPhone</a></li>
                    <li><a href="#">Watch</a></li>
                    <li><a href="#">Vision</a></li>
                    <li><a href="#">AirPods</a></li>
                    <li><a href="#">TV & Home</a></li>
                    <li><a href="#">Entertainment</a></li>
                    <li><a href="#">Accessories</a></li>
                    <li><a href="#">Support</a></li>
                </ul>
            </div>
        </div>

        <!-- second -->
        <nav class="secondary-navbar">
            <span>Now through April 2, get extra trade-in credit toward a new Mac with Apple Trade In.* Shop Mac</span>
        </nav>

        <!-- After Scroll navbar sticky -->
        <nav id="sticky-navbar" class="sticky-navbar">
            <h1><a href="<?php echo home_url(); ?>">Macbook Air</a></h1>
            <div class="container">
                <?php 
                wp_nav_menu(array(
                    'theme_location' => 'main_menu',
                    'container'      => 'nav',
                    'container_class'=> 'main-navigation',
                    'fallback_cb'    => false
                    )); 
                ?>
            <button>
                <a href="#">Pre-Order</a>
            </button>
            </div>
        </nav>
    </header>