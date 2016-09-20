<div class="pull-right">
	<?php

	wp_dropdown_users( array(
		'name'             => 'orbis_task_assignee',
		'selected'         => filter_input( INPUT_GET, 'orbis_task_assignee', FILTER_SANITIZE_STRING ),
		'show_option_none' => __( '— Select Assignee —', 'orbis' ),
		'class'            => 'form-control',
	) );

	?>

	<button class="btn btn-default" type="submit"><?php esc_html_e( 'Filter', 'orbis' ); ?></button>
</div>
