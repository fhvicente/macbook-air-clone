<?php

// Add support to page title and register nav menus
function macbook_air_clone_theme_setup() {
    add_theme_support('title-tag');

    // Register Navgation menus
    register_nav_menus(array(
        'main_menu' => esc_html__('Main Menu', 'macbook_air_clone'),
    ));

}
add_action('after_setup_theme', 'macbook_air_clone_theme_setup');

// Compatibility to old Wordpress versions
if (!function_exists('wp_body_open')) {
    function wp_body_open() {
        do_action('wp_body_open');
    }
}

// Enqueue scripts and css
function macbook_air_clone_scripts() {
    // Enqueue styles
    wp_enqueue_style('macbook-air-style', get_stylesheet_uri());
    wp_enqueue_style('custom-css', get_template_directory_uri() . '/assets/css/custom.css', array(), '1.0', 'all');
    wp_enqueue_style('footer-css', get_template_directory_uri() . '/assets/css/footer.css', array(), '1.0', 'all');
    
    // AOS Animation Library
    wp_enqueue_style('aos-css', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css', array(), '2.3.4', 'all');
    wp_enqueue_script('aos-js', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js', array('jquery'), '2.3.4', true);
    
    // Enqueue custom JavaScript
    wp_enqueue_script('macbook-air-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('macbook-air-animations', get_template_directory_uri() . '/assets/js/animations.js', array('aos-js'), '1.0.0', true);
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'macbook_air_clone_scripts');

// Register ACF fields at homepage
if( function_exists('acf_add_local_field_group') ):

// Hero Section
acf_add_local_field_group(array(
    'key' => 'group_hero_section',
    'title' => 'Hero Section',
    'fields' => array(
        array(
            'key' => 'field_hero_title',
            'label' => 'Título Principal',
            'name' => 'hero_title',
            'type' => 'text',
            'default_value' => 'Macbook Air',
        ),
        array(
            'key' => 'field_hero_subtitle',
            'label' => 'Subtítulo',
            'name' => 'hero_subtitle',
            'type' => 'text',
            'default_value' => 'Speed of lightness.',
        ),
        array(
            'key' => 'field_hero_image',
            'label' => 'Imagem Principal',
            'name' => 'hero_image',
            'type' => 'image',
            'return_format' => 'url',
        ),
        array(
            'key' => 'field_hero_description',
            'label' => 'Descrição',
            'name' => 'hero_description',
            'type' => 'wysiwyg',
            'default_value' => '',
        ),
        array(
            'key' => 'field_hero_price',
            'label' => 'Preço',
            'name' => 'hero_price',
            'type' => 'text',
            'default_value' => 'From $999 or $83.25/mo. for 12 mo.**',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_type',
                'operator' => '==',
                'value' => 'front_page',
            ),
        ),
    ),
));

// Design Section
acf_add_local_field_group(array(
    'key' => 'group_design_section',
    'title' => 'Design Section',
    'fields' => array(
        array(
            'key' => 'field_design_title',
            'label' => 'Título da Seção Design',
            'name' => 'design_title',
            'type' => 'text',
            'default_value' => 'Built to go places.',
        ),
        array(
            'key' => 'field_design_description',
            'label' => 'Descrição do Design',
            'name' => 'design_description',
            'type' => 'wysiwyg',
            'default_value' => '',
        ),
        array(
            'key' => 'field_design_image',
            'label' => 'Imagem Principal do Design',
            'name' => 'design_image',
            'type' => 'image',
            'return_format' => 'url',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_type',
                'operator' => '==',
                'value' => 'front_page',
            ),
        ),
    ),
));

// Performance Section
acf_add_local_field_group(array(
    'key' => 'group_performance_section',
    'title' => 'Performance Section',
    'fields' => array(
        array(
            'key' => 'field_performance_title',
            'label' => 'Título da Seção',
            'name' => 'performance_title',
            'type' => 'text',
            'default_value' => 'M4. The chip that zips.',
        ),
        array(
            'key' => 'field_performance_image',
            'label' => 'Imagem Principal',
            'name' => 'performance_image',
            'type' => 'image',
            'return_format' => 'url',
        ),
        array(
            'key' => 'field_performance_metrics',
            'label' => 'Métricas de Performance',
            'name' => 'performance_metrics',
            'type' => 'repeater',
            'layout' => 'table',
            'sub_fields' => array(
                array(
                    'key' => 'field_metric_header',
                    'label' => 'Cabeçalho',
                    'name' => 'metric_header',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_metric_value',
                    'label' => 'Valor',
                    'name' => 'metric_value',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_metric_description',
                    'label' => 'Descrição',
                    'name' => 'metric_description',
                    'type' => 'text',
                ),
            ),
        ),
        array(
            'key' => 'field_performance_description',
            'label' => 'Descrição Geral',
            'name' => 'performance_description',
            'type' => 'wysiwyg',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_type',
                'operator' => '==',
                'value' => 'front_page',
            ),
        ),
    ),
));

// Apple Intelligence Section
acf_add_local_field_group(array(
    'key' => 'group_intelligence_section',
    'title' => 'Apple Intelligence Section',
    'fields' => array(
        array(
            'key' => 'field_intelligence_title',
            'label' => 'Título Principal',
            'name' => 'intelligence_title',
            'type' => 'text',
            'default_value' => 'Apple Intelligence. Do more. Effort less.',
        ),
        array(
            'key' => 'field_intelligence_description',
            'label' => 'Descrição',
            'name' => 'intelligence_description',
            'type' => 'wysiwyg',
        ),
        array(
            'key' => 'field_intelligence_features',
            'label' => 'Recursos',
            'name' => 'intelligence_features',
            'type' => 'repeater',
            'layout' => 'block',
            'sub_fields' => array(
                array(
                    'key' => 'field_feature_title',
                    'label' => 'Título do Recurso',
                    'name' => 'feature_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_feature_description',
                    'label' => 'Descrição do Recurso',
                    'name' => 'feature_description',
                    'type' => 'textarea',
                ),
            ),
        ),
        array(
            'key' => 'field_intelligence_privacy_title',
            'label' => 'Título da Seção de Privacidade',
            'name' => 'intelligence_privacy_title',
            'type' => 'text',
            'default_value' => 'Great powers come with great privacy.',
        ),
        array(
            'key' => 'field_intelligence_privacy_description',
            'label' => 'Descrição da Privacidade',
            'name' => 'intelligence_privacy_description',
            'type' => 'wysiwyg',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_type',
                'operator' => '==',
                'value' => 'front_page',
            ),
        ),
    ),
));

// Mac + iPhone Section
acf_add_local_field_group(array(
    'key' => 'group_mac_iphone_section',
    'title' => 'Mac + iPhone Section',
    'fields' => array(
        array(
            'key' => 'field_mac_iphone_title',
            'label' => 'Título Principal',
            'name' => 'mac_iphone_title',
            'type' => 'text',
            'default_value' => 'Dream team.',
        ),
        array(
            'key' => 'field_mac_iphone_image',
            'label' => 'Imagem Principal',
            'name' => 'mac_iphone_image',
            'type' => 'image',
            'return_format' => 'url',
        ),
        array(
            'key' => 'field_mac_iphone_intro',
            'label' => 'Introdução',
            'name' => 'mac_iphone_intro',
            'type' => 'text',
            'default_value' => 'If you love iPhone, youll love Mac.',
        ),
        array(
            'key' => 'field_mac_iphone_description',
            'label' => 'Descrição',
            'name' => 'mac_iphone_description',
            'type' => 'wysiwyg',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_type',
                'operator' => '==',
                'value' => 'front_page',
            ),
        ),
    ),
));

// New to Mac Section
acf_add_local_field_group(array(
    'key' => 'group_new_to_mac_section',
    'title' => 'New to Mac Section',
    'fields' => array(
        array(
            'key' => 'field_new_to_mac_title',
            'label' => 'Título Principal',
            'name' => 'new_to_mac_title',
            'type' => 'text',
            'default_value' => 'New to Mac?',
        ),
        array(
            'key' => 'field_new_to_mac_cards',
            'label' => 'Cards',
            'name' => 'new_to_mac_cards',
            'type' => 'repeater',
            'layout' => 'block',
            'sub_fields' => array(
                array(
                    'key' => 'field_card_icon',
                    'label' => 'Ícone do Card',
                    'name' => 'card_icon',
                    'type' => 'image',
                    'return_format' => 'url',
                ),
                array(
                    'key' => 'field_card_title',
                    'label' => 'Título do Card',
                    'name' => 'card_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_card_description',
                    'label' => 'Descrição do Card',
                    'name' => 'card_description',
                    'type' => 'textarea',
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_type',
                'operator' => '==',
                'value' => 'front_page',
            ),
        ),
    ),
));

// macOS Section
acf_add_local_field_group(array(
    'key' => 'group_macos_section',
    'title' => 'macOS Section',
    'fields' => array(
        array(
            'key' => 'field_macos_title',
            'label' => 'Título Principal',
            'name' => 'macos_title',
            'type' => 'text',
            'default_value' => 'macOS',
        ),
        array(
            'key' => 'field_macos_subtitle',
            'label' => 'Subtítulo',
            'name' => 'macos_subtitle',
            'type' => 'text',
            'default_value' => 'The most advanced desktop operating system in the world.',
        ),
        array(
            'key' => 'field_macos_image',
            'label' => 'Imagem Principal',
            'name' => 'macos_image',
            'type' => 'image',
            'return_format' => 'url',
        ),
        array(
            'key' => 'field_macos_features',
            'label' => 'Recursos',
            'name' => 'macos_features',
            'type' => 'repeater',
            'layout' => 'block',
            'sub_fields' => array(
                array(
                    'key' => 'field_feature_title',
                    'label' => 'Título do Recurso',
                    'name' => 'feature_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_feature_description',
                    'label' => 'Descrição do Recurso',
                    'name' => 'feature_description',
                    'type' => 'textarea',
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_type',
                'operator' => '==',
                'value' => 'front_page',
            ),
        ),
    ),
));

// Apps Section
acf_add_local_field_group(array(
    'key' => 'group_apps_section',
    'title' => 'Apps Section',
    'fields' => array(
        array(
            'key' => 'field_apps_title',
            'label' => 'Título Principal',
            'name' => 'apps_title',
            'type' => 'text',
            'default_value' => 'Apps',
        ),
        array(
            'key' => 'field_apps_subtitle',
            'label' => 'Subtítulo',
            'name' => 'apps_subtitle',
            'type' => 'text',
            'default_value' => 'Powerful creativity and productivity tools.',
        ),
        array(
            'key' => 'field_apps_grid',
            'label' => 'Grid de Apps',
            'name' => 'apps_grid',
            'type' => 'repeater',
            'layout' => 'block',
            'sub_fields' => array(
                array(
                    'key' => 'field_app_icon',
                    'label' => 'Ícone do App',
                    'name' => 'app_icon',
                    'type' => 'image',
                    'return_format' => 'url',
                ),
                array(
                    'key' => 'field_app_name',
                    'label' => 'Nome do App',
                    'name' => 'app_name',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_app_description',
                    'label' => 'Descrição do App',
                    'name' => 'app_description',
                    'type' => 'textarea',
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_type',
                'operator' => '==',
                'value' => 'front_page',
            ),
        ),
    ),
));

// Accessories Section
acf_add_local_field_group(array(
    'key' => 'group_accessories_section',
    'title' => 'Accessories Section',
    'fields' => array(
        array(
            'key' => 'field_accessories_title',
            'label' => 'Título Principal',
            'name' => 'accessories_title',
            'type' => 'text',
            'default_value' => 'Accessories',
        ),
        array(
            'key' => 'field_accessories_subtitle',
            'label' => 'Subtítulo',
            'name' => 'accessories_subtitle',
            'type' => 'text',
            'default_value' => 'Essential accessories for your MacBook Air.',
        ),
        array(
            'key' => 'field_accessories_grid',
            'label' => 'Grid de Acessórios',
            'name' => 'accessories_grid',
            'type' => 'repeater',
            'layout' => 'block',
            'sub_fields' => array(
                array(
                    'key' => 'field_accessory_image',
                    'label' => 'Imagem do Acessório',
                    'name' => 'accessory_image',
                    'type' => 'image',
                    'return_format' => 'url',
                ),
                array(
                    'key' => 'field_accessory_name',
                    'label' => 'Nome do Acessório',
                    'name' => 'accessory_name',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_accessory_price',
                    'label' => 'Preço',
                    'name' => 'accessory_price',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_accessory_description',
                    'label' => 'Descrição',
                    'name' => 'accessory_description',
                    'type' => 'textarea',
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_type',
                'operator' => '==',
                'value' => 'front_page',
            ),
        ),
    ),
));

// Compare Section
acf_add_local_field_group(array(
    'key' => 'group_compare_section',
    'title' => 'Compare Section',
    'fields' => array(
        array(
            'key' => 'field_compare_title',
            'label' => 'Título Principal',
            'name' => 'compare_title',
            'type' => 'text',
            'default_value' => 'Compare MacBook Air models.',
        ),
        array(
            'key' => 'field_compare_models',
            'label' => 'Modelos para Comparar',
            'name' => 'compare_models',
            'type' => 'repeater',
            'layout' => 'block',
            'sub_fields' => array(
                array(
                    'key' => 'field_model_name',
                    'label' => 'Nome do Modelo',
                    'name' => 'model_name',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_model_image',
                    'label' => 'Imagem do Modelo',
                    'name' => 'model_image',
                    'type' => 'image',
                    'return_format' => 'url',
                ),
                array(
                    'key' => 'field_model_price',
                    'label' => 'Preço',
                    'name' => 'model_price',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_model_specs',
                    'label' => 'Especificações',
                    'name' => 'model_specs',
                    'type' => 'repeater',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_spec_name',
                            'label' => 'Nome da Especificação',
                            'name' => 'spec_name',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_spec_value',
                            'label' => 'Valor',
                            'name' => 'spec_value',
                            'type' => 'text',
                        ),
                    ),
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_type',
                'operator' => '==',
                'value' => 'front_page',
            ),
        ),
    ),
));

// Trade-in Section
acf_add_local_field_group(array(
    'key' => 'group_trade_in_section',
    'title' => 'Trade-in Section',
    'fields' => array(
        array(
            'key' => 'field_trade_in_title',
            'label' => 'Título Principal',
            'name' => 'trade_in_title',
            'type' => 'text',
            'default_value' => 'Trade in your eligible computer for credit toward your next purchase.',
        ),
        array(
            'key' => 'field_trade_in_description',
            'label' => 'Descrição',
            'name' => 'trade_in_description',
            'type' => 'wysiwyg',
        ),
        array(
            'key' => 'field_trade_in_link',
            'label' => 'Link do Trade-in',
            'name' => 'trade_in_link',
            'type' => 'url',
        ),
        array(
            'key' => 'field_trade_in_link_text',
            'label' => 'Texto do Link',
            'name' => 'trade_in_link_text',
            'type' => 'text',
            'default_value' => 'See what your device is worth',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_type',
                'operator' => '==',
                'value' => 'front_page',
            ),
        ),
    ),
));

// Environment Section
acf_add_local_field_group(array(
    'key' => 'group_environment_section',
    'title' => 'Environment Section',
    'fields' => array(
        array(
            'key' => 'field_environment_title',
            'label' => 'Título Principal',
            'name' => 'environment_title',
            'type' => 'text',
            'default_value' => 'MacBook Air is designed with the environment in mind.',
        ),
        array(
            'key' => 'field_environment_description',
            'label' => 'Descrição',
            'name' => 'environment_description',
            'type' => 'wysiwyg',
        ),
        array(
            'key' => 'field_environment_features',
            'label' => 'Recursos Ambientais',
            'name' => 'environment_features',
            'type' => 'repeater',
            'layout' => 'block',
            'sub_fields' => array(
                array(
                    'key' => 'field_env_feature_title',
                    'label' => 'Título do Recurso',
                    'name' => 'env_feature_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_env_feature_description',
                    'label' => 'Descrição do Recurso',
                    'name' => 'env_feature_description',
                    'type' => 'textarea',
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_type',
                'operator' => '==',
                'value' => 'front_page',
            ),
        ),
    ),
));

// Footer Section
acf_add_local_field_group(array(
    'key' => 'group_footer_section',
    'title' => 'Footer Section',
    'fields' => array(
        array(
            'key' => 'field_footer_links',
            'label' => 'Links do Footer',
            'name' => 'footer_links',
            'type' => 'repeater',
            'layout' => 'block',
            'sub_fields' => array(
                array(
                    'key' => 'field_footer_section_title',
                    'label' => 'Título da Seção',
                    'name' => 'footer_section_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_footer_links_list',
                    'label' => 'Links',
                    'name' => 'footer_links_list',
                    'type' => 'repeater',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_footer_link_text',
                            'label' => 'Texto do Link',
                            'name' => 'footer_link_text',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_footer_link_url',
                            'label' => 'URL do Link',
                            'name' => 'footer_link_url',
                            'type' => 'url',
                        ),
                    ),
                ),
            ),
        ),
        array(
            'key' => 'field_footer_bottom_text',
            'label' => 'Texto do Rodapé',
            'name' => 'footer_bottom_text',
            'type' => 'wysiwyg',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_type',
                'operator' => '==',
                'value' => 'front_page',
            ),
        ),
    ),
));

endif;

// Desabilitar temporariamente a barra de administração do WordPress
add_filter('show_admin_bar', '__return_false');

?>