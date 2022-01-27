<?php /*  MBSA Sidebar - Nav  
*
*  Using custom version of understrap navwalker at:
*   - inc/class-wp-sidebar-bootstrap-navwalker.php
*
*/

$id = get_field('sb_id');

// default menu width
$w = 'col-lg-3 col-xl-2';

// get width status
$tf = get_field('sb_w');

// if wide selected, change $w to be wider
if( $tf == 1 ) {
    $w = 'col-lg-4 col-xl-3';
}

?>
<div class="col-12">
    <button class="btn no-btn d-lg-none sbnav-btn" type="button" data-toggle="collapse" data-target="#mbsaNav" aria-expanded="false" aria-controls="mbsaNav"><i class="fas fa-lg fa-bars"></i></button>

    <div class="collapse d-lg-none" id="mbsaNav">
        <div class="sb-nav pt-2">
            <?php
            if($id){

                wp_nav_menu(
                    array(


                        'menu'            => $id,
                        'menu_class'      => 'nav flex-column',
                        'walker'          => new understrap_MBSA_Sidebar_Navwalker(),
                    )
                ); 

            }; 
       
            // check menu ID and if Less & Rentals SB (ID=6) display instruction contact block
            // if($id == 6) {
            //     get_template_part('sidebar-templates/parts/instruction-contact');
            // }; 

            ?>
        </div>
    </div>
</div>


<div class="d-none d-lg-block sb-nav <?php echo $w; ?> pt-2 ">
    <?php
        if($id){

            wp_nav_menu(
                array(


                    'menu'            => $id,
                    'menu_class'      => 'nav flex-column',
                    'walker'          => new understrap_MBSA_Sidebar_Navwalker(),
                )
            ); 

        }; 
   
        // check menu ID and if Less & Rentals SB (ID=6) display instruction contact block
        // if($id == 6) {
        //     get_template_part('sidebar-templates/parts/instruction-contact');
        // }; 
    ?>

</div>