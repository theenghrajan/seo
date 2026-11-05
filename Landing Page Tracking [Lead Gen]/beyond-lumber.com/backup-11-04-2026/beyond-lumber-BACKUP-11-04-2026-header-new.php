<?php
/**
 * Landing page header (doctype, <head>, nav).
 * Loaded with get_header( 'new' ).
 */

defined( 'ABSPATH' ) || exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php wp_head(); ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "Beyond Lumber",
  "description": "Premium tropical hardwood supplier — Ipe, Cumaru, Garapa & composite decking for the West Coast.",
  "url": "https://beyond-lumber.com",
  "telephone": "+18773263063",
  "email": "sales@belumber.com",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "534 Finney Ct",
    "addressLocality": "Gardena",
    "addressRegion": "CA",
    "postalCode": "90248",
    "addressCountry": "US"
  },
  "openingHours": "Mo-Fr 06:30-17:00",
  "areaServed": ["Los Angeles","San Diego","San Francisco","Sacramento","Portland","Seattle"],
  "hasOfferCatalog": {"@type":"OfferCatalog","name":"Tropical Hardwoods & Composite Decking"}
}
</script>
</head>

<body <?php body_class( 'bl-landing' ); ?>>
<?php wp_body_open(); ?>

<!-- ─── NAV ─── -->
<nav id="nav" class="scrolled">
  <a href="https://beyond-lumber.com"><img src="https://beyond-lumber.com/wp-content/uploads/2025/03/BL-LOGO-1.png" alt="Beyond Lumber" style="height:38px;width:auto;display:block;"></a>
  <a href="tel:8773263063" class="nav-phone">
    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"></path></svg>
    (877) 326-3063
  </a>

</nav>
