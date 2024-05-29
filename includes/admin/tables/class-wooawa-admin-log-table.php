<?php
/**
 * Admin log table.
 *
 * @package WOOAWA\Admin
 * @version 1.1.0
 * @since 1.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WP_List_Table' ) ) {
	require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

/**
 * WOOAWA_Admin_Log_Table class.
 *
 * @since 1.1.0
 */
class WOOAWA_Admin_Log_Table extends WP_List_Table {

	/**
	 * Class constructor.
	 *
	 * @since 1.1.0
	 */
	public function __construct() {
		parent::__construct(
			array(
				'singular' => esc_html__( 'Log', 'wooawa' ),
				'plural'   => esc_html__( 'Logs', 'wooawa' ),
				'ajax'     => false,
			)
		);
	}

	/**
	 * Prepare the items for display in the log table.
	 *
	 * @since 1.1.0
	 */
	public function prepare_items() {
		$this->process_bulk_actions();

		$logs         = $this->get_logs();
		$per_page     = $this->get_items_per_page( 'wooawa_logs_per_page', 40 );
		$current_page = $this->get_pagenum();
		$total_items  = count( $logs );

		$this->set_pagination_args(
			array(
				'total_items' => $total_items,
				'per_page'    => $per_page,
				'total_pages' => ceil( $total_items / $per_page ),
			)
		);

		$this->_column_headers = $this->get_column_info();
		$this->items           = array_slice( $logs, ( ( $current_page - 1 ) * $per_page ), $per_page );
	}

	/**
	 * Retrieves the logs from the database.
	 *
	 * @since 1.1.0
	 *
	 * @return object The logs.
	 */
	protected function get_logs() {
		global $wpdb;

		$logs = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}wooawa_logs ORDER BY created_at DESC" );

		return $logs;
	}

	/**
	 * Get the table columns.
	 *
	 * @since 1.1.0
	 *
	 * @return array $columns Array of all the list table columns.
	 */
	public function get_columns() {
		$columns = array(
			'cb'         => '<input type="checkbox" />',
			'type'       => esc_html__( 'Type', 'wooawa' ),
			'subject'    => esc_html__( 'Subject', 'wooawa' ),
			'log'        => esc_html__( 'Log', 'wooawa' ),
			'created_at' => esc_html__( 'Created At', 'wooawa' ),
		);

		/**
		 * Filter the log table columns.
		 *
		 * @since 1.1.0
		 *
		 * @param array $columns The array of log table columns.
		 */
		return apply_filters( 'wooawa_log_table_columns', $columns );
	}

	/**
	 * Render the checkbox column.
	 *
	 * @since 1.1.0
	 *
	 * @param object $item The current item.
	 * @return string The HTML for the checkbox column.
	 */
	public function column_cb( $item ) {
		return wp_sprintf( '<input type="checkbox" name="wooawa_log_ids[]" value="%d" />', $item->id );
	}

	/**
	 * Returns the type column value for the log table.
	 *
	 * @since 1.1.0
	 *
	 * @param object $item The log item object.
	 * @return string The escaped HTML value of the type column.
	 */
	public function column_type( $item ) {
		return wp_sprintf(
			'<span class="wooawa-pill wooawa-pill--%s">%s</span>',
			esc_attr( $item->type ),
			esc_html( ucfirst( $item->type ) )
		);
	}

	/**
	 * Returns the subject column value for the log table.
	 *
	 * @since 1.1.0
	 *
	 * @param object $item The log item object.
	 * @return string The escaped HTML value of the subject column.
	 */
	public function column_subject( $item ) {
		return esc_html( $item->subject );
	}

	/**
	 * Returns the log column value for the log table.
	 *
	 * @since 1.1.0
	 *
	 * @param object $item The log item object.
	 * @return string The sanitized and filtered HTML value of the log column.
	 */
	public function column_log( $item ) {
		return wp_kses_post( $item->log );
	}

	/**
	 * Returns the created_at column value for the log table.
	 *
	 * @since 1.1.0
	 *
	 * @param object $item The log item object.
	 * @return string The escaped HTML value of the created_at column.
	 */
	public function column_created_at( $item ) {
		// Get WordPress date formate.
		$date_format = get_option( 'date_format' );

		// Get WordPress time formate.
		$time_format = get_option( 'time_format' );

		return esc_html( gmdate( "{$date_format} {$time_format}", strtotime( $item->created_at ) ) );
	}

	/**
	 * Render the default column.
	 *
	 * @since 1.1.0
	 *
	 * @param object $item        The current item.
	 * @param string $column_name The name of the column being rendered.
	 * @return string The HTML for the default column.
	 */
	public function column_default( $item, $column_name ) {
		if ( has_action( "wooawa_log_table_column_{$column_name}" ) ) {
			/**
			 * Executes the action hook for the specified column name.
			 *
			 * This function triggers the action hook "wooawa_log_table_column_{column_name}" and passes the $item as a parameter.
			 *
			 * @since 1.1.0
			 *
			 * @param string $column_name The name of the column.
			 * @param mixed  $item        The item to be passed as a parameter to the action hook.
			 */
			do_action( "wooawa_log_table_column_{$column_name}", $item );
		} else {
			return esc_html__( 'No value', 'wooawa' );
		}
	}

	/**
	 * Get the hidden columns.
	 *
	 * @since 1.1.0
	 *
	 * @return array Array of hidden columns.
	 */
	public function get_hidden_columns() {
		return array();
	}

	/**
	 * Custom bulk actions.
	 *
	 * @since 1.1.0
	 *
	 * @return array Array of bulk actions.
	 */
	public function get_bulk_actions() {
		/**
		 * Filter the bulk actions for the log table.
		 *
		 * @since 1.1.0
		 *
		 * @param array $actions The array of bulk actions.
		 */
		return apply_filters(
			'wooawa_log_table_bulk_actions',
			array(
				'delete' => esc_html__( 'Delete', 'wooawa' ),
			)
		);
	}

	/**
	 * Process the bulk actions.
	 *
	 * @since 1.1.0
	 *
	 * @return void
	 */
	public function process_bulk_actions() {
		global $wpdb;

		$action  = $this->current_action();
		$log_ids = isset( $_REQUEST['wooawa_log_ids'] ) ? array_map( 'absint', (array) $_REQUEST['wooawa_log_ids'] ) : array(); // phpcs:ignore

		switch ( $action ) {
			case 'delete':
				foreach ( $log_ids as $log_id ) {
					$wpdb->delete(
						$wpdb->prefix . 'wooawa_logs',
						array( 'id' => $log_id ),
						array( '%d' )
					);
				}

				break;

			default:
				/**
				 * Fires when processing bulk actions for the log table.
				 *
				 * @since 1.1.0
				 *
				 * @param string $action       The current action.
				 * @param array  $log_ids The log keys.
				 */
				do_action( 'wooawa_log_table_process_bulk_actions', $action, $log_ids );

				break;
		}
	}
}
