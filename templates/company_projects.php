<?php

$query = new WP_Query( array(
	'post_type'               => 'orbis_project',
	'posts_per_page'          => 25,
	'orbis_project_client_id' => get_the_ID(),
) );

if ( $query->have_posts() ) : ?>

	<div class="table-responsive">
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th><?php esc_html_e( 'Project', 'orbis' ); ?></th>
					<th><?php esc_html_e( 'Time', 'orbis' ); ?></th>
				</tr>
			</thead>

			<tbody>
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>

					<tr id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<td>
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

							<?php get_template_part( 'templates/table-cell-comments' ); ?>
						</td>
						<td class="project-time">
							<?php

							if ( function_exists( 'orbis_project_the_time' ) ) {
								orbis_project_the_time();
							}

							if ( function_exists( 'orbis_project_the_logged_time' ) ) : ?>

								<?php

								$classes = array();
								$classes[] = orbis_project_in_time() ? 'text-success' : 'text-error';

								?>

								<span class="<?php echo esc_attr( implode( $classes, ' ' ) ); ?>"><?php orbis_project_the_logged_time(); ?></span>

							<?php endif; ?>
						</td>
					</tr>

				<?php endwhile; ?>
			</tbody>
		</table>
	</div>

	<?php wp_reset_postdata(); ?>

<?php else : ?>

	<div class="content">
		<p class="alt">
			<?php esc_html_e( 'No projects found.', 'orbis' ); ?>
		</p>
	</div>

<?php endif; ?>
