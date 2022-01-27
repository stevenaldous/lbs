<?php // self building sidenav

    // get top most parent ID for any given page
    if ($post->post_parent) {
        $ancestors=get_post_ancestors($post->ID);
        $root=count($ancestors)-1;
        $parent = $ancestors[$root];
    } else {
        $parent = $post->ID;
    }
    
    // use top parent id to start menu call
    $args = array(
        'child_of'      => $parent,
        'hierarchical'  => 1,
        'parent'        => $parent,
    );

    $pages = get_pages( $args ); 

    if( $pages ):
?>

<div class="d-none d-lg-block col-2 pt-2">

    <nav>
        <ul class="clean">
            <li class="mb-4"><a class="h4" href="<?php echo get_permalink($parent); ?>"><?php echo get_the_title($parent); ?></a></li>
            
            <?php foreach ($pages as $page ) :  
                // get the current menu page id
                $pid = $page->ID;


                // check for child pages
                $cargs = array(
                    'child_of'      => $pid,
                    'hierarchical'  => 1,
                    'parent'        => $pid,
                );
                $cpages = get_pages($cargs);


                if( $cpages ):


                // if child pages, make a collapse element with pages
            ?>
                <li>
                    <a class="" href="<?php echo $page->url; ?>"><?php echo $page->post_title; ?></a>

                    <ul class="clean mb-4">
                        <?php foreach ($cpages as $cpage ) :  
                            $cpid = $cpage->ID;
                        ?>

                            <li>
                                <a href="<?php echo get_permalink($cpid); ?>"><?php echo $cpage->post_title; ?></a>
                            </li>

                        <?php endforeach; ?>
                    </ul>
                </li>

            <?php else: 
                // make a link to the correct page
            ?>

                <li>
                    <a class="" href="<?php echo get_permalink($pid); ?>"><?php echo $page->post_title; ?></a>

                    <ul class="clean">
                        
                    </ul>


                </li>
            <?php endif; ?>

            <?php endforeach; ?>

        </ul>
    </nav>
</div>
<?php endif; ?>

