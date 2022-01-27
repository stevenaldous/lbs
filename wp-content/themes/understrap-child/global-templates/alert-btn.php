<?php /* this template contains the logic for the Alert open btn and alert theme specific icons/classes
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

	
	// Check to see if alert is enabled before doing anything
	$tf = get_field('alert_tf', 'options');
	if($tf == 1 ):

	//theme var
	$theme = get_field('alert_theme', 'options');
	$text = get_field('alert_text', 'options');

	if($theme == 'danger') {
		$i = 'fad fa-exclamation-triangle';
	} 
	elseif( $theme == 'warning' ) {
		$i = 'fad fa-exclamation-triangle';
	}
	elseif( $theme == 'info' ) {
		$i = 'fad fa-info-circle';
	}
	else {
		$i = 'fad fa-info-circle';
	}
	

?>

<button type="button" class="btn alert-open theme-<?php echo $theme; ?> btn-open show" 
	aria-label="Open Alert Banner"
	data-toggle="tooltip" data-placement="bottom" title="<?php echo $text; ?>"
	><i class="<?php echo $i;?>"></i></button>
<?php endif; ?>
