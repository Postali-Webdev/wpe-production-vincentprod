<?php
/**
 * Function to get pages by template and build a hierarchical list.
 *
 * @param string $template The template file name to search for.
 * @return array Hierarchical list of pages.
 */
function get_pages_by_template($template) {
    // Query pages with the specified template
    $pages = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => $template,
        'hierarchical' => 0
    ));

    // Build a hierarchical list of pages
    $hierarchical_pages = array();
    foreach ($pages as $page) {
        $hierarchical_pages[$page->ID] = array(
            'title' => $page->post_title,
            'children' => get_page_children($page->ID)
        );
    }

    return $hierarchical_pages;
}

/**
 * Helper function to get child pages of a given page ID.
 *
 * @param int $parent_id The parent page ID.
 * @return array List of child pages.
 */
function get_page_children($parent_id) {
    $children = get_pages(array(
        'child_of' => $parent_id,
        'hierarchical' => 0
    ));

    $child_pages = array();
    foreach ($children as $child) {
        $child_pages[$child->ID] = array(
            'title' => $child->post_title,
            'children' => get_page_children($child->ID)
        );
    }

    return $child_pages;
}

// Example usage
$template = 'template-custom.php'; // Replace with your template file name
$pages_hierarchy = get_pages_by_template($template);

// Print the hierarchical list of pages
echo '<pre>';
print_r($pages_hierarchy);
echo '</pre>';
?>