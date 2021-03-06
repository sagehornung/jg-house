<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

/*
 * View of General Statistics for Single Page
 */

function wpa_include_single_general( $current, $stats ) {

	$results = $stats->totalsForAllResults;
	?>
	<div class="analytify_general_status analytify_status_box_wraper">
			<div class="analytify_status_header">
					<h3><?php esc_html_e( 'General Statistics', 'wp-analytify' ); ?></h3>
			</div>
			<div class="analytify_status_body">
				<div class="analytify_general_status_boxes_wraper">
					<div class="analytify_general_status_boxes">
							<h4><?php esc_html_e( 'Sessions', 'wp-analytify' ); ?></h4>
							<div class="analytify_general_stats_value"><?php echo WPANALYTIFY_Utils::pretty_numbers( $results['ga:sessions'] ); ?></div>
							<p><?php esc_html_e( 'Total number of Sessions within the date range. A session is the period time a user is actively engaged with your website. app. etc.', 'wp-analytify' ); ?></p>
					</div>

					<div class="analytify_general_status_boxes">
							<h4><?php esc_html_e( 'visitors', 'wp-analytify' ); ?></h4>
							<div class="analytify_general_stats_value"><?php echo WPANALYTIFY_Utils::pretty_numbers( $results['ga:users'] ); ?></div>
							<p><?php esc_html_e( 'Users that have had at least one session within the selected date range. Includes both new and returning users.', 'wp-analytify' ); ?></p>
					</div>

					<div class="analytify_general_status_boxes">
							<h4><?php esc_html_e( 'Page views', 'wp-analytify' ); ?></h4>
							<div class="analytify_general_stats_value"><?php echo WPANALYTIFY_Utils::pretty_numbers( $results['ga:pageviews'] ); ?></div>
							<p><?php esc_html_e( 'Pageviews is the total number of pages viewed. Repeated views of a single page are counted.', 'wp-analytify' ); ?></p>
					</div>

					<div class="analytify_general_status_boxes">
							<h4><?php esc_html_e( 'Avg. time on Page', 'wp-analytify' ); ?></h4>
							<div class="analytify_general_stats_value"><?php echo WPANALYTIFY_Utils::pretty_time( $results['ga:avgSessionDuration'] ); ?></div>
							<p><?php esc_html_e( 'The amount of time (session) a user spends on this page.', 'wp-analytify' ); ?></p>
					</div>

					<div class="analytify_general_status_boxes">
							<h4><?php esc_html_e( 'Bounce rate', 'wp-analytify' ); ?></h4>
							<div class="analytify_general_stats_value"><?php echo WPANALYTIFY_Utils::pretty_numbers( $results['ga:bounceRate'] ); ?><span class="analytify_xl_f">%</span></div>
							<p><?php esc_html_e( "Bounce Rate is the percentage of single-page visits (i.e. visits in which the person left your site from the entrance page without interacting with the page ).", 'wp-analytify' ); ?></p>
					</div>

					<div class="analytify_general_status_boxes">
							<h4><?php esc_html_e( '% New sessions', 'wp-analytify' ); ?></h4>
							<div class="analytify_general_stats_value"><?php echo WPANALYTIFY_Utils::pretty_numbers( $results['ga:percentNewSessions'] ); ?>%</div>
							<p><?php esc_html_e( 'Pages/Session is the average number of pages viewed during a session. Repeated views of a single page are counted.', 'wp-analytify' ); ?></p>
					</div>
				</div>
			</div>
		</div>
	<?php
} ?>
