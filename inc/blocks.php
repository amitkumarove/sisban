<?php 

add_action('acf/init', 'my_acf_blocks_init');
function my_acf_blocks_init()
{
    // Check function exists.
    if(function_exists('acf_register_block_type') ) {

        // Register a Two columns  block.
        acf_register_block_type(
            array(
            'name'              => 'brand_faq',
            'title'             => __('Brand Faq'),
            'description'       => __('Brand Faq as accordion'),
            'render_template'   => get_template_directory() . '/partials/blocks/brand-faq.php',
            'category'          => 'formatting',
            )
        );

        // Register a Two columns  block.
        acf_register_block_type(
            array(
            'name'              => 'select_facility',
            'title'             => __('Select Facility'),
            'description'       => __('Selecting a Facility as an object'),
            'render_template'   => get_template_directory() . '/partials/blocks/select-facility.php',
            'category'          => 'formatting',
            )
        );

        // Register a Two columns  block.
        acf_register_block_type(
            array(
            'name'              => 'block_layout',
            'title'             => __('Block Layout'),
            'description'       => __('Selecting block class'),
            'render_template'   => get_template_directory() . '/partials/blocks/block-class.php',
            'category'          => 'formatting',
            )
        );

        // Register Our purpose block
        acf_register_block_type(
            array(
            'name'              => 'our_purpose',
            'title'             => __('Our Purpose'),
            'description'       => __('Show our purpose image'),
            'render_template'   => get_template_directory() . '/partials/blocks/our-purpose/our-purpose-block.php',
            'category'          => 'formatting',
            )
        );

        // Register behind the smile block
        acf_register_block_type(
            array(
            'name'              => 'wave-break',
            'title'             => __('Wave Break'),
            'description'       => __('Text and Waves Divider Block with allignment options'),
            'render_template'   => get_template_directory() . '/partials/blocks/wave-break.php',
            'category'          => 'formatting',
            )
        );
    }
}

function clean_blocks($post)
{
    // Get our page blocks
    $blocks = parse_blocks($post->post_content);

    $cleanBlocks = array();

    //Clean our blocks
    foreach ($blocks as $block) : 
        if ($block['blockName'] !== 'NULL' 
            && $block['blockName'] != ''
            && $block['blockName'] != 'core/paragraph'
        ) : 
            $layoutClass = $block['innerBlocks'][0]['innerBlocks'][0]['attrs']['data'] ?? null;
            $block['block_layout_class'] = $layoutClass;
            $cleanBlocks[] = $block;
            
        endif;
    endforeach;

    return $cleanBlocks;
}

function is_block_layout_present($post)
{
    // Get our page blocks
    $blocks = parse_blocks($post->post_content);

    foreach ($blocks as $mainBlock) : 
        foreach ($mainBlock['innerBlocks'] as $childBlock) :
            // This will contain our column
            if ($childBlock['blockName'] === 'core/column'):
                // This will decide if its a layout block our column
                if (count($childBlock['innerBlocks']) > 0) :
                    if ($childBlock['innerBlocks']['0']['blockName'] === 'acf/block-layout') :
                        return true;
                    endif;
                endif;
            endif;
        endforeach;
    endforeach;

    return false;
}

function is_layout_block($block)
{
    return isset($block['innerBlocks']['0']['innerBlocks']['0']) && $block['innerBlocks']['0']['innerBlocks']['0']['blockName'] === 'acf/block-layout';
}