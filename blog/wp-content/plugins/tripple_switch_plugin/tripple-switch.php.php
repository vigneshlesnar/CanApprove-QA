<?php
/**
 * Plugin Name: Triple Switch Block
 * Description: A Gutenberg block for a triple switch (Yes, Inherit, No) with editable labels and content.
 * Version: 1.0
 * Author: Your Name
 */

if (!defined('ABSPATH')) {
    exit;
}

// Register Block Editor Assets
function tsp_register_block() {
    wp_register_script(
        'tsp-block-editor-js',
        plugins_url('block.js', __FILE__),
        array('wp-blocks', 'wp-element', 'wp-editor', 'wp-components'),
        filemtime(plugin_dir_path(__FILE__) . 'block.js')
    );

    wp_register_style(
        'tsp-block-style',
        plugins_url('style.css', __FILE__),
        array(),
        filemtime(plugin_dir_path(__FILE__) . 'style.css')
    );

    register_block_type('tsp/tripple-switch', array(
        'editor_script' => 'tsp-block-editor-js',
        'style'         => 'tsp-block-style',
        'render_callback' => 'tsp_render_switch_block'
    ));
}
add_action('init', 'tsp_register_block');

// Render block on frontend
function tsp_render_switch_block($attributes) {
    $yes_label = esc_html($attributes['yesLabel']);
    $inherit_label = esc_html($attributes['inheritLabel']);
    $no_label = esc_html($attributes['noLabel']);
    $yes_content = esc_html($attributes['yesContent']);
    $inherit_content = esc_html($attributes['inheritContent']);
    $no_content = esc_html($attributes['noContent']);

    ob_start();
    ?>
    <div class="switch-container">
        <div class="switch">
            <input id="switch-y" name="tripple" type="radio" value="Y" class="switch-input" />
            <label for="switch-y" class="switch-label switch-label-y"><?php echo $yes_label; ?></label>

            <input id="switch-i" name="tripple" type="radio" value="I" class="switch-input" checked />
            <label for="switch-i" class="switch-label switch-label-i"><?php echo $inherit_label; ?></label>

            <input id="switch-n" name="tripple" type="radio" value="N" class="switch-input" />
            <label for="switch-n" class="switch-label switch-label-n"><?php echo $no_label; ?></label>

            <span class="switch-selector"></span>
        </div>

        <div id="content" class="content-box">
            <?php echo $inherit_content; ?>
        </div>
    </div>

    <script>
        document.querySelectorAll('.switch-input').forEach(input => {
            input.addEventListener('change', function() {
                let content = document.getElementById("content");
                if (this.value === "Y") {
                    content.textContent = "<?php echo $yes_content; ?>";
                } else if (this.value === "I") {
                    content.textContent = "<?php echo $inherit_content; ?>";
                } else if (this.value === "N") {
                    content.textContent = "<?php echo $no_content; ?>";
                }
            });
        });
    </script>
    <?php
    return ob_get_clean();
}
