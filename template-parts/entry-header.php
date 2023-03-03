<?php
/**
 * Displays the post header
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

$entry_header_classes = '';

if ( is_singular() ) {
	$entry_header_classes .= ' header-footer-group';
}

?>

<header class="entry-header has-text-align-center<?php echo esc_attr( $entry_header_classes ); ?>">

	<div class="entry-header-inner section-inner medium">

		<?php
		if ( is_singular() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} else {
			the_title( '<h2 class="entry-title heading-size-1"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
		}

		$intro_text_width = '';

		if ( is_singular() ) {
			$intro_text_width = ' small';
		} else {
			$intro_text_width = ' thin';
		}

		if ( !is_page() ) {
			?>

			<div class="post-meta-wrapper post-meta-single post-meta-single-top">
				<ul class="post-meta">
					<li class="post-date meta-wrapper">
						<span class="meta-icon">
							<span class="screen-reader-text"><?php _e( 'Post date', 'twentytwenty' ); ?></span>
							<svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M180 976q-24 0-42-18t-18-42V296q0-24 18-42t42-18h65v-60h65v60h340v-60h65v60h65q24 0 42 18t18 42v620q0 24-18 42t-42 18H180Zm0-60h600V486H180v430Zm0-490h600V296H180v130Zm0 0V296v130Z"/></svg>
						</span>
						<span class="meta-text">
							<?php the_time( get_option( 'date_format' ) ); ?>
						</span>
					</li>
					<?php
						$u_time = get_the_time('U');
						$u_modified_time = get_the_modified_time('U');
						$custom_content = '';
						if ($u_modified_time >= $u_time + 86400) {
							$updated_date = get_the_modified_time('F j, Y');
							?>
						<li class="post-date meta-wrapper">
							<span class="meta-icon">
								<span class="screen-reader-text"><?php _e( 'Update date', 'twentytwenty' ); ?></span>
								<svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="M180 976q-24 0-42-18t-18-42V296q0-24 18-42t42-18h65v-60h65v60h340v-60h65v60h65q24 0 42 18t18 42v301h-60V486H180v430h319v60H180Zm709-219-71-71 29-29q8.311-8 21.156-8Q881 649 889 657l29 29q8 8.311 8 21.156Q926 720 918 728l-29 29Zm-330 259v-71l216-216 71 71-216 216h-71ZM180 426h600V296H180v130Zm0 0V296v130Z"/></svg>
							</span>
							<span class="meta-text">
								<?php echo $updated_date; ?>
							</span>
						</li>
					<?php }?>
					<li class="post-date meta-wrapper">
						<span class="meta-icon">
							<span class="screen-reader-text"><?php _e( 'Reading time', 'twentytwenty' ); ?></span>
							<svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48"><path d="m627 769 45-45-159-160V363h-60v225l174 181ZM480 976q-82 0-155-31.5t-127.5-86Q143 804 111.5 731T80 576q0-82 31.5-155t86-127.5Q252 239 325 207.5T480 176q82 0 155 31.5t127.5 86Q817 348 848.5 421T880 576q0 82-31.5 155t-86 127.5Q708 913 635 944.5T480 976Zm0-400Zm0 340q140 0 240-100t100-240q0-140-100-240T480 236q-140 0-240 100T140 576q0 140 100 240t240 100Z"/></svg>
						</span>
						<span class="meta-text"><?php echo wp_post_reading_time(); ?></span>
					</li>
				</ul>
			</div>

			<?php
		}

		// Default to displaying the post meta.
		// twentytwenty_the_post_meta( get_the_ID(), 'single-top' );
		
		
		?>

		
		

	</div><!-- .entry-header-inner -->

</header><!-- .entry-header -->
