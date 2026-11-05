<?php
/**
 * Landing page footer (footer, sticky bar, wp_footer).
 * Loaded with get_footer( 'new' ).
 */

defined( 'ABSPATH' ) || exit;
?>

<!-- ─── FOOTER ─── -->
<footer>
  <div class="footer-inner">
    <div class="footer-top">
      <div class="footer-brand">
        <img src="https://beyond-lumber.com/wp-content/uploads/2025/03/BL-LOGO-1.png" alt="Beyond Lumber" style="height:34px;width:auto;display:block;margin-bottom:14px;filter:brightness(0) invert(1);">
        <p>Direct importers of A-grade tropical hardwoods — Ipe, Cumaru, Garapa &amp; more. Serving the West Coast from our Gardena, CA warehouse. FSC-certified, Lacey Act compliant, IBAMA certified.</p>
      </div>

      <div class="footer-col">
        <h5>Contact</h5>
        <ul>
          <li>(877) 326-3063</li>
          <li>sales@belumber.com</li>
          <li>534 Finney Ct<br>Gardena, CA 90248</li>
          <li>Mon–Fri 6:30am–5pm PST</li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <span>&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> Beyond Lumber. All rights reserved.</span>
      <a href="<?php echo esc_url( get_privacy_policy_url() ? get_privacy_policy_url() : 'https://beyond-lumber.com/privacy-policy' ); ?>">Privacy Policy</a>
    </div>
  </div>
</footer>

<!-- ─── STICKY BAR ─── -->
<div id="sticky-bar" class="visible">
  <div class="sticky-left">
    <span>Next-day West Coast shipping · No minimums</span>
  </div>
  <div class="sticky-right">
    <a href="tel:8773263063" class="sticky-phone">
      <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path
          d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z">
        </path>
      </svg>
      <span class="sticky-phone__text" style="display:none;">Call</span>
      <span class="sticky-phone__num">(877) 326-3063</span>
    </a>
    <a href="#quote-form" class="btn btn-primary" style="display:flex;justify-content:center;align-items:center;gap:16px;padding:12px 22px;font-size:13px;">Free Quote <span>→</span></a>
  </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
