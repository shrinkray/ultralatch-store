<?php
// Register Custom Post Type
  function video_post_type() {

    /**
     * Post Type: Videos.
     */

    $labels = array(
      "name" => __( "Videos", "sage" ),
      "singular_name"           => __( "Video", "sage" ),
      "menu_name"               => __( "Our Videos", "sage" ),
      "all_items"                 => __( "All Videos", "sage" ),
      "add_new"                 => __( "Add New", "sage" ),
      "add_new_item"            => __( "Add New Video", "sage" ),
      "edit_item"               => __( "Edit Video", "sage" ),
      "new_item"                => __( "New Video", "sage" ),
      "view_item"               => __( "View Video", "sage" ),
      "view_items"              => __( "View Videos", "sage" ),
      "search_items"            => __( "Search Videos", "sage" ),
      "not_found"               => __( "No Videos Found", "sage" ),
      "not_found_in_trash"      => __( "No Videos Found in the Trash", "sage" ),
      "parent_item_colon"       => __( "Parent Video", "sage" ),
      "featured_image"          => __( "Featured image for this video", "sage" ),
      "set_featured_image"      => __( "Set featured image for this video", "sage" ),
      "remove_featured_image"   => __( "Remove featured image", "sage" ),
      "use_featured_image"      => __( "Use as featured image for this video", "sage" ),
      "archives"                => __( "Video Archives", "sage" ),
      "insert_into_item"        => __( "Insert into post", "sage" ),
      "uploaded_to_this_item"   => __( "Uploaded to this video", "sage" ),
      "filter_items_list"       => __( "Filter videos list", "sage" ),
      "items_list_navigation"   => __( "Videos list navigation", "sage" ),
      "items_list"              => __( "Videos list", "sage" ),
      "attributes"              => __( "Videos Attributes", "sage" ),
      "parent_item_colon"       => __( "Parent Video", "sage" ),
    );

    $args = array(
      "label"               => __( "Videos", "sage" ),
      "labels"              => $labels,
      "description"         => "Videos for customer training and help",
      "public"              => true,
      "publicly_queryable"  => true,
      "show_ui"             => true,
      "show_in_rest"        => false,
      "rest_base"           => "",
      "has_archive"         => false,
      "show_in_menu"        => true,
      "exclude_from_search" => false,
      "capability_type"     => "post",
      "capability"          => "edit_posts",
      "map_meta_cap"        => true,
      "hierarchical"        => false,
      "rewrite"             => array( "slug" => "video", "with_front" => true ),
      "query_var"           => true,
      "menu_position"       => 5,
      "menu_icon"           => "dashicons-video-alt3",
      "supports"            => array( "title", "editor", "thumbnail", "excerpt", "page-attributes" ),
      "taxonomies"          => array( "category", "post_tag" ),
    );

    register_post_type( "video", $args );
  }

  add_action( 'init', 'video_post_type' );
