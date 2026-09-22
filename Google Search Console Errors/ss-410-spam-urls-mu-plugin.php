<?php
/**
 * Plugin Name: 410 Gone - Spam URLs (PMAC #136)
 * Description: Returns HTTP 410 for spam/injected URLs flagged in the GSC
 * coverage report. Runs at the WordPress level (template_redirect) so it
 * fires reliably even when server-level .htaccess rules are inconsistent
 * across load-balanced servers / edge caching.
 *
 * Install: upload this file to wp-content/mu-plugins/ (create the
 * mu-plugins folder if it doesn't exist yet). mu-plugins load
 * automatically - no activation needed, and it can't be disabled from
 * wp-admin, so it survives plugin conflicts and admin mistakes.
 */

if ( ! function_exists( 'pmac_410_gone' ) ) {
	function pmac_410_gone() {
		status_header( 410 );
		nocache_headers();
		wp_die( 'This page has been permanently removed.', 'Gone', array( 'response' => 410 ) );
	}
}

add_action( 'template_redirect', function () {
	$path = rtrim( parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ), '/' );
	if ( $path === '' ) {
		$path = '/';
	}

	// Pattern-matched spam (bulk of the list): /dp/<hex-id> and
	// /cate-<n> or /cate-<n>-<n> (also the /cate--<n> double-dash form).
	// Covers any current or future URL the same injection generates.
	$patterns = array(
		'#^/dp/[0-9a-f]+$#',
		'#^/cate-{1,2}[0-9]+(-[0-9]+)?$#',
	);

	foreach ( $patterns as $pattern ) {
		if ( preg_match( $pattern, $path ) ) {
			pmac_410_gone();
		}
	}

	// Individually flagged spam pages that don't follow a shared pattern.
	$gone_paths = array(
		'/1xbat-app-security-guide-for-us-players',
		'/boomsbet-nederland-bonusgids-welkomstbonus-gratis-spins-en-promoties-uitgelegd',
		'/boomsbet-promocode-bonusgids-claim-je-welkomstbonus-en-ontdek-extra-promoties',
		'/boomsbet-promotiecode-volledige-review-en-overzicht',
		'/hoe-inloggen-boomsbet-wat-je-moet-weten',
		'/lorem-ipsum-dolor-sit-amet',
		'/welkomstbonus-boomsbet-app-en-mobiel-gids',
		'/darwin-casino-gaming-steps-and-methods-registration-bonuses-payments-more',
		'/die-besten-slots-im-bookofbet-casino-spiele-empfehlungen',
		'/freshbet-casino-ein-ehrlicher-test-zur-spielergemeinschaft',
		'/guia-de-seguridad-para-jugar-en-casino-monticello-online',
		'/liraspin-casino-vincite-rapide-e-slot-ad-alta-intensita-per-gioco-veloce',
		'/mafia-casino-recenzja-quick-hit-gaming-dla-nowoczesnego-gracza',
		'/praktische-tipps-fur-die-nutzung-von-turbo-winz-casino',
		'/tipps-zur-erfolgreichen-einzahlung-im-nv-casino',
		'/warum-arena-casino-auf-social-media-beliebt-ist',
		'/wie-konnen-gewinne-im-realz-casino-maximiert-werden',
		'/winrolla-casino-die-vor-und-nachteile-aus-spielersicht',
		'/contents/event/kansyasai',
		'/shop/customer/menu',
		'/shop/e/e009001036001',
		'/shop/pg/1005024086',
		'/shop/pg/1005024240',
		'/shop/pg/1AgreementInfo',
	);

	if ( in_array( $path, $gone_paths, true ) ) {
		pmac_410_gone();
	}
}, 1 );
