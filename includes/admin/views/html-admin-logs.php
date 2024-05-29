<?php
/**
 * Admin View: Logs page.
 *
 * @package WOOAWA\Admin
 *
 * @version 1.0.0
 * @since 1.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><div class="wrap">
	<h1><?php esc_html_e( 'WooCommerce APIWA AUTO Logs', 'wooawa' ); ?></h1>
	<?php settings_errors(); ?>
	<hr />

	<form method="post" id="wooawa-log-table-form">

		<?php
			$log = new WOOAWA_Admin_Log_Table();
			$log->prepare_items();
			$log->display();
		?>

	</form>

	<?php
	if ( $log->has_items() ) {
		$log->inline_edit();
	}
	?>

</div>
