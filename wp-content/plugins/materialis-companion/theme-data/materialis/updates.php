<?php

function materialis_force_check_updates() {
	materialis_force_check_plugins_update();
	materialis_force_check_themes_update();
}

function materialis_force_check_plugins_update() {
	$transient = get_site_transient( 'update_plugins' );
	if ( $transient ) {
		foreach ( $transient->checked as $path => $version ) {
			if ( strpos( $path, 'materialis-companion' ) !== false ) {
				if ( isset( $transient->no_update[ $path ] ) ) {
					unset( $transient->no_update[ $path ] );
					unset( $transient->checked[ $path ] );
					set_site_transient( 'update_plugins', $transient );
				}
				break;
			}
		}
	}
	//wp_update_plugins();
}

function materialis_force_check_themes_update() {
	$transient = get_site_transient( 'update_themes' );
	if ( $transient ) {
		//unset($transient->response['materialis-pro']);
		//set_site_transient('update_themes', $transient);
		//print_r(get_site_transient('update_themes'));
		if ( ! isset( $transient->response['materialis-pro'] ) ) {
			if ( isset( $transient->checked['materialis-pro'] ) ) {
				unset( $transient->checked['materialis-pro'] );
				set_site_transient( 'update_themes', $transient );
			}
		}
	}
	//wp_update_themes();
}



function materialis_get_available_updates() {

	$needs_update = array();

	$themes = get_theme_updates();

	if ( $themes && isset( $themes['materialis-pro'] ) ) {
		$theme                  = $themes['materialis-pro'];
		$needs_update['themes'] = array(
			array(
				'version' => $theme->update['new_version'],
				'name'    => $theme->get( 'Name' ),
			),
		);
	}

	$plugins = get_plugin_updates();
	if ( $plugins ) {
		foreach ( $plugins as $file => $plugin ) {
			if ( $plugin->TextDomain == 'materialis-companion' ) {
				$needs_update['plugins'] = array(
					array(
						'version' => $plugin->update->new_version,
						'name'    => $plugin->Name,
					),
				);
			}
		}
	}

	return $needs_update;
}

function materialis_get_updates_msg() {
	$updates = materialis_get_available_updates();

	$msg = '';

	if ( isset( $updates['themes'] ) ) {
		for ( $i = 0; $i < count( $updates['themes'] ); $i++ ) {
			$update = $updates['themes'][ $i ];
			$msg   .= '<h1>New version (' . $update['version'] . ') available for ' . $update['name'] . '</h1>';
		}
	}

	if ( isset( $updates['plugins'] ) ) {
		for ( $i = 0; $i < count( $updates['plugins'] ); $i++ ) {
			$update = $updates['plugins'][ $i ];
			$msg   .= '<h1>New version (' . $update['version'] . ') available for ' . $update['name'] . '</h1>';
		}
	}

	if ( $msg ) {
		$msg .= '<h2>Please update to the latest versions before editing in Customizer.</h2>';
		$msg .= '<br/>';
		$msg .= '<a href="' . get_admin_url( null, 'update-core.php' ) . '" class="button button-orange">Go to updates</a> ';
	}

	return $msg;
}

add_action(
	'admin_init',
	function () {
		global $pagenow;

		try {
			if ( 'customize.php' === $pagenow ) {
				$theme = wp_get_theme();

				if ( $theme->template == 'materialis-pro' || ( $theme->parent() && $theme->parent()->template == 'materialis-pro' ) ) {
					materialis_force_check_themes_update();

					if ( function_exists( 'materialis_pro_require' ) && ! class_exists( 'Wp_License_Manager_Client' ) ) {
						materialis_pro_require( '/inc/class-wp-license-manager-client.php' );
					}

					if ( class_exists( 'Wp_License_Manager_Client' ) ) {
						$licence_manager = new Wp_License_Manager_Client(
							'materialis-pro',
							'Materialis PRO',
							'materialis',
							'http://onepageexpress.com/api/license-manager/v1/',
							'theme'
						);
					}

					wp_update_themes();
				}
			}
		} catch ( Exception $e ) {
		}
	}
);

$theme = wp_get_theme();
if ( $theme && ( $theme->template == 'materialis-pro' || ( $theme->parent() && $theme->parent()->template == 'materialis-pro' ) ) ) {
	add_action(
		'customize_controls_print_footer_scripts',
		function () {
			?>
		<script type="text/javascript">
			CP_Customizer.addModule(function () {
				 CP_Customizer.bind(CP_Customizer.events.PREVIEW_LOADED, function () {
					var updates_msg = <?php echo json_encode( materialis_get_updates_msg() ); ?>;
					if (updates_msg) {
						CP_Customizer.popUpInfo('Updates available',
							'<div class="pro-popup-preview-container">' +
							updates_msg +
							'</div>'
						);
					};
				});
			});
		</script>
			<?php
		},
		11
	);
}

/*
	enable theme updates, by sending the version parameter
*/

add_filter(
	'http_request_args',
	function( $r, $url ) {
		if ( strpos( $url, 'materialis-pro' ) !== false ) {
			$r['body'] = array( 'v' => '1.0' );
		}
		return $r;
	},
	PHP_INT_MAX,
	2
);
