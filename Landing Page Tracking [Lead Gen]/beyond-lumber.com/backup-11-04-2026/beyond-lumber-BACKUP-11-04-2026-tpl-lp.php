<?php
/**
 * Template Name: Beyond Lumber New – Landing Page
 * Template Post Type: page
 */

defined('ABSPATH') || exit;

$bl_img = get_stylesheet_directory_uri() . '/assets/beyond-lumber/images/';

get_header('new');
?>

<!-- ─── HERO ─── -->
<section id="hero">
  <div class="hero-carousel">
    <div class="hero-slide slide-1"></div>
    <div class="hero-slide slide-2"></div>
    <div class="hero-slide slide-3"></div>
    <div class="hero-slide slide-4"></div>
    <div class="hero-slide slide-5 active"></div>
  </div>

  <button class="carousel-arrow carousel-arrow--prev" aria-label="Previous" onclick="moveSlide(-1)">
    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
      <polyline points="15 18 9 12 15 6"></polyline>
    </svg>
  </button>
  <button class="carousel-arrow carousel-arrow--next" aria-label="Next" onclick="moveSlide(1)">
    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
      <polyline points="9 18 15 12 9 6"></polyline>
    </svg>
  </button>

  <div class="carousel-dots">
    <button class="carousel-dot" onclick="goSlide(0)" aria-label="Slide 1"></button>
    <button class="carousel-dot" onclick="goSlide(1)" aria-label="Slide 2"></button>
    <button class="carousel-dot" onclick="goSlide(2)" aria-label="Slide 3"></button>
    <button class="carousel-dot" onclick="goSlide(3)" aria-label="Slide 4"></button>
    <button class="carousel-dot active" onclick="goSlide(4)" aria-label="Slide 5"></button>
  </div>

  <div class="hero-inner">
    <div class="hero-content">
      <div class="hero-badge">West Coast's #1 Tropical Hardwood Source</div>
      <h1>Outdoor Materials That<br><em>Outlast</em> Everything<br>You'll Build.</h1>
      <p class="hero-sub">Shop Hardwoods, Thermally Modified Woods, Accoya &amp; Composite at Wholesale Prices</p>
      <p class="hero-sub2">Hardwood Decking, Cladding &amp; Fencing Materials For Any Project</p>
      <div class="hero-stats">
        <div>
          <div class="hero-stat-num">40+</div>
          <div class="hero-stat-label">Year Lifespan</div>
        </div>
        <div>
          <div class="hero-stat-num">$4.00</div>
          <div class="hero-stat-label">Starting per LF</div>
        </div>
        <div>
          <div class="hero-stat-num">1 Day</div>
          <div class="hero-stat-label">Next-Day Shipping</div>
        </div>
        <div>
          <div class="hero-stat-num">0</div>
          <div class="hero-stat-label">Order Minimum</div>
        </div>
      </div>
    </div>

    <div class="hero-form-panel" id="quote-form">
      <h3>Get A Free Quote Or Free Samples</h3>
      <div class="bl-ghl-form">
        <iframe src="https://api.leadconnectorhq.com/widget/form/ofX7nPQKD79b4I76puij"
          style="width:100%;height:100%;border:none;border-radius:3px" id="inline-ofX7nPQKD79b4I76puij"
          data-layout="{'id':'INLINE'}" data-trigger-type="alwaysShow" data-trigger-value=""
          data-activation-type="alwaysActivated" data-activation-value="" data-deactivation-type="neverDeactivate"
          data-deactivation-value="" data-form-name="NewTechWood" data-height="1001"
          data-layout-iframe-id="inline-ofX7nPQKD79b4I76puij" data-form-id="ofX7nPQKD79b4I76puij"
          title="NewTechWood"></iframe>
      </div>
      <div class="form-trust">
        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
        </svg>
        FSC-Certified · Lacey Act Compliant · No minimums
      </div>
    </div>
  </div>
</section>

<section id="mblRequestQuoteForm">
  <div class="container">
    <h3>Get A Free Quote Or Free Samples</h3>
    <div class="bl-ghl-form">
      <iframe src="https://api.leadconnectorhq.com/widget/form/ofX7nPQKD79b4I76puij"
        style="width:100%;height:100%;border:none;border-radius:3px" id="inline-ofX7nPQKD79b4I76puij-2"
        data-layout="{'id':'INLINE'}" data-trigger-type="alwaysShow" data-trigger-value=""
        data-activation-type="alwaysActivated" data-activation-value="" data-deactivation-type="neverDeactivate"
        data-deactivation-value="" data-form-name="NewTechWood" data-height="1001"
        data-layout-iframe-id="inline-ofX7nPQKD79b4I76puij-2" data-form-id="ofX7nPQKD79b4I76puij"
        title="NewTechWood"></iframe>
    </div>
    <div class="form-trust">
      <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
      </svg>
      FSC-Certified · Lacey Act Compliant · No minimums
    </div>
  </div>
</section>

<!-- ─── TRUST STRIP ─── -->
<div id="trust">
  <div class="trust-inner">
    <div class="trust-item">
      <span class="trust-icon"><svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2"
          viewBox="0 0 24 24">
          <rect x="1" y="3" width="15" height="13" rx="1"></rect>
          <path d="M16 8h4l3 3v5h-7V8z"></path>
          <circle cx="5.5" cy="18.5" r="2.5"></circle>
          <circle cx="18.5" cy="18.5" r="2.5"></circle>
        </svg></span>
      Next-Day West Coast Shipping
    </div>
    <div class="trust-item">
      <span class="trust-icon"><svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2"
          viewBox="0 0 24 24">
          <path
            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622C17.176 19.29 21 14.591 21 9a12.02 12.02 0 00-.382-3.016z">
          </path>
        </svg></span>
      FSC · Lacey Act · IBAMA Certified
    </div>
    <div class="trust-item">
      <span class="trust-icon"><svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2"
          viewBox="0 0 24 24">
          <circle cx="12" cy="12" r="10"></circle>
          <line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line>
        </svg></span>
      No Order Minimums — Ever
    </div>
    <div class="trust-item">
      <span class="trust-icon"><svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2"
          viewBox="0 0 24 24">
          <path
            d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1">
          </path>
        </svg></span>
      Chain of Custody — Mill to Door
    </div>
    <div class="trust-item">
      <span class="trust-icon"><svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24">
          <polygon
            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
          </polygon>
        </svg></span>
      5-Star Rated — 1,000+ Projects
    </div>
  </div>
</div>

<!-- ─── ABOUT ─── -->
<section class="section cream-section">
  <div class="container">
    <div class="about-grid">
      <div class="about-img-wrap">
        <img id="about-img" class="about-img-main" src="<?php echo esc_url($bl_img . 'about.jpg'); ?>"
          alt="Premium Ipe decking boards — Beyond Lumber" loading="lazy">
        <div class="about-img-badge">
          <span class="num">40+</span>
          <span class="lbl">Year lifespan<br>— guaranteed</span>
        </div>
      </div>
      <div class="about-text">
        <span class="eyebrow">Who We Are</span>
        <h2>The West Coast's Direct Source for <em>Tropical Hardwood</em></h2>
        <p>Beyond Lumber is a direct importer — we cut out the middlemen, source A-grade tropical hardwoods straight
          from certified South American mills, and ship to your door or job site the next business day. No showroom
          markups. No order minimums.</p>
        <p>We stock the densest, longest-lasting species on the planet: Ipe, Cumaru, Garapa, and more. Every board is
          chain-of-custody verified, Lacey Act compliant, and FSC-certified.</p>
        <ul class="about-checks">
          <li>In-stock inventory — no backorders or long waits</li>
          <li>A-grade boards only, mill-direct pricing</li>
          <li>Full hardware ecosystem: DeckWise fasteners, deck oils, hidden clips</li>
          <li>Serving LA, San Diego, Bay Area, Sacramento, Portland, Seattle</li>
        </ul>
        <div class="about-btn">
          <a href="#quote-form" class="btn btn-primary">Get a Free Quote Today</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ─── PRODUCTS ─── -->
<section class="section" style="background: var(--white);">
  <div class="container">
    <div class="section-header">
      <span class="eyebrow">Our Species</span>
      <h2>Built to Last <em>Decades</em>, Not Years</h2>
      <p>Every species we carry is selected for density, durability, and beauty. These aren't the boards you'll replace
        in ten years.</p>
    </div>

    <div class="products-grid">
      <!-- Ipe -->
      <div class="product-card">
        <div class="product-img-wrap">
          <img id="ipe-img" class="product-img" src="<?php echo esc_url($bl_img . 'hero-slide-2.jpg'); ?>"
            alt="Ipe Ironwood Decking" loading="lazy">
          <span class="product-badge badge-popular">MOST POPULAR</span>
        </div>
        <div class="product-info">
          <h3>Ipe (Ironwood)</h3>
          <p>The world's hardest decking wood. Naturally insect, mildew and rot resistant — with zero treatment
            required. Won't get hot in direct sun, barefoot-safe, 40+ year lifespan.</p>
          <div class="product-price">From <strong>$4.50</strong> <span class="price-unit">/ linear ft</span></div>
          <div class="product-specs">
            <div class="spec-item"><strong>Janka: 3,680</strong>
              <div>Hardness</div>
            </div>
            <div class="spec-item"><strong>40+ Years</strong>
              <div>Lifespan</div>
            </div>
            <div class="spec-item"><strong>Class A</strong>
              <div>Fire Rating</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Cumaru -->
      <div class="product-card">
        <div class="product-img-wrap">
          <img id="cumaru-img" class="product-img" src="<?php echo esc_url($bl_img . 'cumaru.jpg'); ?>"
            alt="Cumaru Brazilian Teak Decking" loading="lazy">
          <span class="product-badge badge-value">BEST VALUE</span>
        </div>
        <div class="product-info">
          <h3>Cumaru (Brazilian Teak)</h3>
          <p>Second densest tropical hardwood available. Warm golden-brown tones that silver gracefully over time. Ideal
            for decking, flooring, and cladding applications.</p>
          <div class="product-price">From <strong>$4.00</strong> <span class="price-unit">/ linear ft</span></div>
          <div class="product-specs">
            <div class="spec-item"><strong>Janka: 3,540</strong>
              <div>Hardness</div>
            </div>
            <div class="spec-item"><strong>30+ Years</strong>
              <div>Lifespan</div>
            </div>
            <div class="spec-item"><strong>FSC-Cert</strong>
              <div>Available</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Garapa -->
      <div class="product-card">
        <div class="product-img-wrap">
          <img id="garapa-img" class="product-img" src="<?php echo esc_url($bl_img . 'garapa.jpg'); ?>"
            alt="Garapa Brazilian Ash Decking" loading="lazy">
        </div>
        <div class="product-info">
          <h3>Ipe/Cumaru Tile Deck</h3>
          <p>Premium hardwood deck tiles crafted from Ipe or Cumaru — the world's most durable tropical hardwoods.
            Modular, easy to install, and built to last 40+ years with virtually zero maintenance.</p>
          <div class="product-price">From <strong>$2.95</strong> <span class="price-unit">/ linear ft</span></div>
          <div class="product-specs">
            <div class="spec-item"><strong>Janka: 1,650</strong>
              <div>Hardness</div>
            </div>
            <div class="spec-item"><strong>25+ Years</strong>
              <div>Lifespan</div>
            </div>
            <div class="spec-item"><strong>Pool-Safe</strong>
              <div>Non-Slip</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Red Balau -->
      <div class="product-card">
        <div class="product-img-wrap">
          <img id="massaranduba-img" class="product-img" src="<?php echo esc_url($bl_img . 'massaranduba.jpg'); ?>"
            alt="Red Balau Decking" loading="lazy">
        </div>
        <div class="product-info">
          <h3>Red Balau</h3>
          <p>A rich, reddish-brown hardwood prized for its beauty and durability. Dense grain structure makes it highly
            resistant to wear, rot, and insects with minimal maintenance.</p>
          <div class="product-price">From <strong>$2.75</strong> <span class="price-unit">/ linear ft</span></div>
          <div class="product-specs">
            <div class="spec-item"><strong>Janka: 1,840</strong>
              <div>Hardness</div>
            </div>
            <div class="spec-item"><strong>25+ Years</strong>
              <div>Lifespan</div>
            </div>
            <div class="spec-item"><strong>Low</strong>
              <div>Maintenance</div>
            </div>
          </div>
        </div>
      </div>

      <!-- TimberTech / Composite -->
      <div class="product-card">
        <div class="product-img-wrap">
          <img id="composite-img" class="product-img" src="<?php echo esc_url($bl_img . 'composite.jpg'); ?>"
            alt="TimberTech Composite Decking" loading="lazy">
          <span class="product-badge badge-low-maintenance">LOW MAINTENANCE</span>
        </div>
        <div class="product-info">
          <h3>TimberTech</h3>
          <p>Premium composite decking with the look of real wood — zero splinters, no sealing, and fade-resistant color
            that lasts decades. Perfect for homeowners who want beauty without the upkeep.</p>
          <div class="product-price">From <strong>$3.50</strong> <span class="price-unit">/ linear ft</span></div>
          <div class="product-specs">
            <div class="spec-item"><strong>30 Year</strong>
              <div>Warranty</div>
            </div>
            <div class="spec-item"><strong>Zero</strong>
              <div>Sealing</div>
            </div>
            <div class="spec-item"><strong>Low</strong>
              <div>Maintenance</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ─── WHY US (DARK) ─── -->
<section class="section dark-section">
  <div class="container">
    <div class="why-grid">
      <div class="why-img-col">
        <div class="why-img-stack">
          <img class="why-img-top" src="<?php echo esc_url($bl_img . 'malibu-rd-ipe-deck-project.jpg'); ?>"
            alt="Malibu Rd Ipe deck project" loading="lazy">
        </div>
      </div>
      <div class="why-text">
        <span class="eyebrow eyebrow--sand">Why Beyond Lumber</span>
        <h2>We're <em>Direct Importers</em> — Not a Retailer.</h2>
        <div class="why-points">
          <div class="why-point">
            <div class="why-icon">
              <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
              </svg>
            </div>
            <div>
              <h4>Mill-Direct, A-Grade Boards Only</h4>
              <p>We source directly from certified South American mills. No middlemen, no downgraded boards. Every
                shipment is inspected and chain-of-custody verified before it reaches you.</p>
            </div>
          </div>
          <div class="why-point">
            <div class="why-icon">
              <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
              </svg>
            </div>
            <div>
              <h4>Next-Business-Day West Coast Shipping</h4>
              <p>Our LA warehouse keeps every species in stock. Order by 2pm and your lumber ships next business day to
                any West Coast address — no waiting for overseas containers.</p>
            </div>
          </div>
          <div class="why-point">
            <div class="why-icon">
              <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10"></circle>
                <polyline points="12 6 12 12 16 14"></polyline>
              </svg>
            </div>
            <div>
              <h4>No Minimum Orders — Ever</h4>
              <p>Whether you need 50 linear feet or 5,000, we ship it. Homeowners, contractors, and architects get the
                same A-grade wood and same next-day service regardless of volume.</p>
            </div>
          </div>
          <div class="why-point">
            <div class="why-icon">
              <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"></path>
                <circle cx="12" cy="10" r="3"></circle>
              </svg>
            </div>
            <div>
              <h4>Ships to Home, Job Site, or Port</h4>
              <p>We accommodate any delivery destination — residential driveways, active job sites, staging yards, and
                container loads to port. Custom dimensions available within 5 business days.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ─── PROCESS ─── -->
<section class="section cream-section">
  <div class="container">
    <div class="section-header">
      <span class="eyebrow">How It Works</span>
      <h2>From Quote to <em>Delivered</em> in Days</h2>
      <p>We've made ordering tropical hardwood as simple as possible. Most customers have lumber on-site within 3
        business days of first contact.</p>
    </div>
    <div class="process-steps">
      <div class="process-step">
        <h4>Request a Free Quote</h4>
        <p>Fill out the form above or call us directly. Tell us your species, linear footage, and project type. We
          respond within 2 business hours with itemized pricing — no obligation.</p>
      </div>
      <div class="process-step">
        <h4>Choose Your Species &amp; Grade</h4>
        <p>Our specialists help you select the right wood for your climate, application, and budget. We'll walk you
          through Ipe vs. Cumaru, hidden fasteners, and finish options.</p>
      </div>
      <div class="process-step">
        <h4>We Pull &amp; Prep Your Order</h4>
        <p>Your boards are hand-selected from our Gardena, CA warehouse, end-grain sealed, and bundled. Every order is
          inspected before it leaves our facility.</p>
      </div>
      <div class="process-step">
        <h4>Next-Day Delivery to You</h4>
        <p>Ship to your home, job site, or anywhere on the West Coast. Track your delivery in real time. Call us if
          anything's off — we make it right, no questions asked.</p>
      </div>
    </div>
  </div>
</section>

<!-- ─── CERTS STRIP ─── -->
<div id="certs">
  <div class="certs-marquee">
    <div class="certs-track">

      <!-- Set A -->
      <div class="cert-tag">
        <span class="cert-tag-icon"><svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24">
            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
            <path d="M9 12l2 2 4-4" stroke-linecap="round" stroke-linejoin="round"></path>
          </svg></span>
        <span class="cert-tag-label">FSC Certified</span>
      </div>
      <div class="cert-tag">
        <span class="cert-tag-icon"><svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24">
            <path
              d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622C17.176 19.29 21 14.591 21 9a12.02 12.02 0 00-.382-3.016z">
            </path>
          </svg></span>
        <span class="cert-tag-label">Lacey Act Compliant</span>
      </div>
      <div class="cert-tag">
        <span class="cert-tag-icon"><svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="10"></circle>
            <path d="M2 12h20M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z">
            </path>
          </svg></span>
        <span class="cert-tag-label">IBAMA Certified</span>
      </div>
      <div class="cert-tag">
        <span class="cert-tag-icon"><svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24">
            <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path>
            <circle cx="9" cy="7" r="4"></circle>
            <path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"></path>
          </svg></span>
        <span class="cert-tag-label">NADRA Member</span>
      </div>
      <div class="cert-tag">
        <span class="cert-tag-icon"><svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24">
            <path
              d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1">
            </path>
          </svg></span>
        <span class="cert-tag-label">Chain of Custody Tracked</span>
      </div>
      <div class="cert-tag">
        <span class="cert-tag-icon"><svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24">
            <rect x="1" y="3" width="15" height="13" rx="1"></rect>
            <path d="M16 8h4l3 3v5h-7V8z"></path>
            <circle cx="5.5" cy="18.5" r="2.5"></circle>
            <circle cx="18.5" cy="18.5" r="2.5"></circle>
          </svg></span>
        <span class="cert-tag-label">Next-Business-Day Shipping</span>
      </div>
      <div class="cert-tag">
        <span class="cert-tag-icon"><svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24">
            <polygon
              points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
            </polygon>
          </svg></span>
        <span class="cert-tag-label">5-Star Rated — 1,000+ Projects</span>
      </div>
      <div class="cert-tag">
        <span class="cert-tag-icon"><svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="10"></circle>
            <line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line>
          </svg></span>
        <span class="cert-tag-label">No Order Minimums</span>
      </div>

      <!-- Set B (duplicate for seamless loop) -->
      <div class="cert-tag">
        <span class="cert-tag-icon"><svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24">
            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
            <path d="M9 12l2 2 4-4" stroke-linecap="round" stroke-linejoin="round"></path>
          </svg></span>
        <span class="cert-tag-label">FSC Certified</span>
      </div>
      <div class="cert-tag">
        <span class="cert-tag-icon"><svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24">
            <path
              d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622C17.176 19.29 21 14.591 21 9a12.02 12.02 0 00-.382-3.016z">
            </path>
          </svg></span>
        <span class="cert-tag-label">Lacey Act Compliant</span>
      </div>
      <div class="cert-tag">
        <span class="cert-tag-icon"><svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="10"></circle>
            <path d="M2 12h20M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z">
            </path>
          </svg></span>
        <span class="cert-tag-label">IBAMA Certified</span>
      </div>
      <div class="cert-tag">
        <span class="cert-tag-icon"><svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24">
            <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path>
            <circle cx="9" cy="7" r="4"></circle>
            <path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"></path>
          </svg></span>
        <span class="cert-tag-label">NADRA Member</span>
      </div>
      <div class="cert-tag">
        <span class="cert-tag-icon"><svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24">
            <path
              d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1">
            </path>
          </svg></span>
        <span class="cert-tag-label">Chain of Custody Tracked</span>
      </div>
      <div class="cert-tag">
        <span class="cert-tag-icon"><svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24">
            <rect x="1" y="3" width="15" height="13" rx="1"></rect>
            <path d="M16 8h4l3 3v5h-7V8z"></path>
            <circle cx="5.5" cy="18.5" r="2.5"></circle>
            <circle cx="18.5" cy="18.5" r="2.5"></circle>
          </svg></span>
        <span class="cert-tag-label">Next-Business-Day Shipping</span>
      </div>
      <div class="cert-tag">
        <span class="cert-tag-icon"><svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24">
            <polygon
              points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
            </polygon>
          </svg></span>
        <span class="cert-tag-label">5-Star Rated — 1,000+ Projects</span>
      </div>
      <div class="cert-tag">
        <span class="cert-tag-icon"><svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="10"></circle>
            <line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line>
          </svg></span>
        <span class="cert-tag-label">No Order Minimums</span>
      </div>

    </div>
  </div>
</div>

<!-- ─── GALLERY ─── -->
<section class="section" style="background: var(--white);">
  <div class="container--wide">
    <div class="section-header">
      <span class="eyebrow">Project Gallery</span>
      <h2>Over 1,000 Projects Delivered <em>Coast to Coast</em></h2>
      <p>From beachfront Malibu decks to rooftop terraces in Seattle — our wood is everywhere the West Coast builds
        beautifully.</p>
    </div>
    <div class="gallery-filters">
      <button class="filter-btn" onclick="filterGallery(this,'decking')">Decking</button>
      <button class="filter-btn" onclick="filterGallery(this,'cladding')">Cladding &amp; Siding</button>
      <button class="filter-btn" onclick="filterGallery(this,'fencing')">Fencing</button>
    </div>
    <div class="gallery-grid" id="gallery-grid">

      <!-- ── DECKING ── -->
      <div class="gallery-item" data-cat="decking">
        <img src="<?php echo esc_url($bl_img . 'gallery-decking.jpg'); ?>" alt="Malibu pool deck" loading="lazy">
        <div class="gallery-overlay"><span>Pool Deck — Malibu</span></div>
      </div>
      <div class="gallery-item" data-cat="decking">
        <img src="<?php echo esc_url($bl_img . 'gallery-decking-2.jpg'); ?>" alt="Ipe decking install" loading="lazy">
        <div class="gallery-overlay"><span>Ipe Deck Install</span></div>
      </div>
      <div class="gallery-item" data-cat="decking">
        <img src="<?php echo esc_url($bl_img . 'gallery-decking-3.jpg'); ?>" alt="Backyard deck" loading="lazy">
        <div class="gallery-overlay"><span>Backyard Deck</span></div>
      </div>
      <div class="gallery-item" data-cat="decking">
        <img src="<?php echo esc_url($bl_img . 'gallery-decking-4.jpg'); ?>" alt="Hardwood deck project"
          loading="lazy">
        <div class="gallery-overlay"><span>Deck Project</span></div>
      </div>
      <div class="gallery-item" data-cat="decking">
        <img src="https://beyond-lumber.com/wp-content/uploads/2025/04/IMG_0960.webp" alt="Hardwood decking"
          loading="lazy">
        <div class="gallery-overlay"><span>Hardwood Decking</span></div>
      </div>
      <div class="gallery-item" data-cat="decking">
        <img src="https://beyond-lumber.com/wp-content/uploads/2025/04/backyard-ren.webp" alt="Backyard ipe renovation"
          loading="lazy">
        <div class="gallery-overlay"><span>Backyard Renovation</span></div>
      </div>
      <div class="gallery-item" data-cat="decking">
        <img src="https://beyond-lumber.com/wp-content/uploads/2025/04/A946158E953A83FB8C3EB650B9D7E617-scaled-1.webp"
          alt="Deck installation project" loading="lazy">
        <div class="gallery-overlay"><span>Deck Installation</span></div>
      </div>
      <div class="gallery-item" data-cat="decking">
        <img src="https://beyond-lumber.com/wp-content/uploads/2025/04/IMG_0189-1-1024x683.webp" alt="Ipe deck project"
          loading="lazy">
        <div class="gallery-overlay"><span>Ipe Deck Project</span></div>
      </div>
      <div class="gallery-item" data-cat="decking">
        <img src="<?php echo esc_url($bl_img . 'gallery-decking-5.jpg'); ?>" alt="Hardwood deck" loading="lazy">
        <div class="gallery-overlay"><span>Hardwood Deck</span></div>
      </div>

      <!-- ── CLADDING ── -->
      <div class="gallery-item" data-cat="cladding">
        <img src="https://beyond-lumber.com/wp-content/uploads/2025/04/image-6-1.webp" alt="Hardwood cladding project"
          loading="lazy">
        <div class="gallery-overlay"><span>Exterior Cladding</span></div>
      </div>
      <div class="gallery-item" data-cat="cladding">
        <img src="<?php echo esc_url($bl_img . 'gallery-cladding.jpg'); ?>" alt="Tropical hardwood cladding"
          loading="lazy">
        <div class="gallery-overlay"><span>Hardwood Cladding</span></div>
      </div>
      <div class="gallery-item" data-cat="cladding">
        <img src="https://beyond-lumber.com/wp-content/uploads/2025/04/434e2ecf-816f-416b-8952-467747a6610e-1.webp"
          alt="Hardwood siding project" loading="lazy">
        <div class="gallery-overlay"><span>Hardwood Siding</span></div>
      </div>
      <div class="gallery-item" data-cat="cladding">
        <img src="https://beyond-lumber.com/wp-content/uploads/2025/04/Garapa3-1-scaled-e1745252361701.webp"
          alt="Garapa cladding" loading="lazy">
        <div class="gallery-overlay"><span>Garapa Cladding</span></div>
      </div>
      <div class="gallery-item" data-cat="cladding">
        <img src="https://beyond-lumber.com/wp-content/uploads/2025/12/o-6.jpg" alt="Cladding project" loading="lazy">
        <div class="gallery-overlay"><span>Cladding Project</span></div>
      </div>
      <div class="gallery-item" data-cat="cladding">
        <img src="https://beyond-lumber.com/wp-content/uploads/2025/07/Ipe-1x4-siding.jpg" alt="Ipe 1x4 siding"
          loading="lazy">
        <div class="gallery-overlay"><span>Ipe 1x4 Siding</span></div>
      </div>
      <div class="gallery-item" data-cat="cladding">
        <img src="https://beyond-lumber.com/wp-content/uploads/2025/04/62de11d2-6991-4ae3-b018-e4c2bfba09e1-1.webp"
          alt="Thermally modified cladding" loading="lazy">
        <div class="gallery-overlay"><span>Thermally Modified</span></div>
      </div>
      <div class="gallery-item" data-cat="cladding">
        <img src="https://beyond-lumber.com/wp-content/uploads/2025/04/DJI_0627-HDR-2-2-scaled.webp"
          alt="Composite siding project" loading="lazy">
        <div class="gallery-overlay"><span>Composite Siding</span></div>
      </div>
      <div class="gallery-item" data-cat="cladding">
        <img src="https://beyond-lumber.com/wp-content/uploads/2025/04/DJI_0588-HDR-1024x820.webp"
          alt="Cladding aerial project" loading="lazy">
        <div class="gallery-overlay"><span>Aerial View — Cladding</span></div>
      </div>

      <!-- ── FENCING ── -->
      <div class="gallery-item" data-cat="fencing">
        <img src="https://beyond-lumber.com/wp-content/uploads/2025/04/Fences-1.webp" alt="Tropical hardwood fencing"
          loading="lazy">
        <div class="gallery-overlay"><span>Hardwood Fencing</span></div>
      </div>
      <div class="gallery-item" data-cat="fencing">
        <img src="https://beyond-lumber.com/wp-content/uploads/2025/04/fences-scaled.webp" alt="Tropical hardwood fence"
          loading="lazy">
        <div class="gallery-overlay"><span>Tropical Hardwood Fence</span></div>
      </div>
      <div class="gallery-item" data-cat="fencing">
        <img src="https://beyond-lumber.com/wp-content/uploads/2025/04/image4.webp" alt="Hardwood fence" loading="lazy">
        <div class="gallery-overlay"><span>Cedar Fence</span></div>
      </div>
      <div class="gallery-item" data-cat="fencing">
        <img src="<?php echo esc_url($bl_img . 'gallery-fencing.jpg'); ?>" alt="Fencing project" loading="lazy">
        <div class="gallery-overlay"><span>Fencing Project</span></div>
      </div>

      <div class="gallery-item" data-cat="fencing">
        <img alt="Fencing project" loading="lazy" src="<?php echo esc_url($bl_img . 'gallery-fencing-2.jpg'); ?>">
      </div>
      <div class="gallery-item" data-cat="fencing">
        <img alt="Fencing project" loading="lazy" src="<?php echo esc_url($bl_img . 'gallery-fencing-3.jpg'); ?>">
      </div>
      <div class="gallery-item" data-cat="fencing">
        <img alt="Fencing project" loading="lazy" src="<?php echo esc_url($bl_img . 'gallery-fencing-4.jpg'); ?>">
      </div>
      <div class="gallery-item" data-cat="fencing">
        <img alt="Fencing project" loading="lazy" src="<?php echo esc_url($bl_img . 'gallery-fencing-5.jpg'); ?>">
      </div>
      <div class="gallery-item" data-cat="fencing">
        <img alt="Fencing project" loading="lazy" src="<?php echo esc_url($bl_img . 'gallery-fencing-6.jpg'); ?>">
      </div>

    </div>
  </div>
</section>

<!-- ─── REVIEWS ─── -->
<section class="section sand-section">
  <div class="container">
    <div class="section-header">
      <span class="eyebrow">Customer Reviews</span>
      <h2>What Contractors &amp; Homeowners <em>Actually Say</em></h2>
      <p>We've earned a 5-star reputation across Google, Yelp, and Houzz — not by being the cheapest, but by being the
        most reliable.</p>
    </div>
    <div class="reviews-grid">
      <div class="review-card">
        <img class="review-img"
          src="https://beyond-lumber.com/wp-content/uploads/2025/04/24380-Malibu-Rd-Wide-2-scaled.webp"
          alt="Ipe deck project Malibu" loading="lazy">
        <div class="review-body">
          <div class="review-stars">★★★★★</div>
          <blockquote>"Beyond Lumber is the best in the business! We've been working with them for years and they always
            deliver. Great pricing, super helpful staff, and amazing product. Can't recommend them enough."</blockquote>
          <div class="reviewer">
            <div class="reviewer-avatar">L</div>
            <div>
              <div class="reviewer-name">Lancelot Yupingkun</div>
              <div class="reviewer-role">Verified Customer · Google Review</div>
            </div>
          </div>
        </div>
      </div>
      <div class="review-card">
        <img class="review-img" src="https://beyond-lumber.com/wp-content/uploads/2025/04/backyard-ren.webp"
          alt="Backyard deck renovation" loading="lazy">
        <div class="review-body">
          <div class="review-stars">★★★★★</div>
          <blockquote>"Beyond Lumber is definitely one of the best lumber suppliers I've used and I've been in this
            industry for over 20 years. Best prices, great service and excellent quality products."</blockquote>
          <div class="reviewer">
            <div class="reviewer-avatar">C</div>
            <div>
              <div class="reviewer-name">Craig Neil</div>
              <div class="reviewer-role">20+ Year Industry Professional · Google Review</div>
            </div>
          </div>
        </div>
      </div>
      <div class="review-card">
        <img class="review-img" src="https://beyond-lumber.com/wp-content/uploads/2025/04/image-6-1.webp"
          alt="Tropical hardwood siding project" loading="lazy">
        <div class="review-body">
          <div class="review-stars">★★★★★</div>
          <blockquote>"Thank you Beyond Lumber for the great service! We received the boards at our location in Ohio,
            safe and sound. Will definitely use them again for our next project. A+!"</blockquote>
          <div class="reviewer">
            <div class="reviewer-avatar">N</div>
            <div>
              <div class="reviewer-name">Niv Kienan</div>
              <div class="reviewer-role">Ohio Customer · Ships Nationwide · Google Review</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ─── FAQ ─── -->
<section class="section cream-section">
  <div class="container">
    <div class="section-header">
      <span class="eyebrow">FAQ</span>
      <h2>Common Questions About <em>Tropical Hardwood</em></h2>
    </div>
    <div class="faq-list">
      <div class="faq-item open">
        <button class="faq-q" onclick="toggleFaq(this)">
          What's the difference between Ipe and Cumaru?
          <span class="faq-arrow">
            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
              <polyline points="6 9 12 15 18 9"></polyline>
            </svg>
          </span>
        </button>
        <div class="faq-a">Ipe (pronounced "ee-pay") is the densest and hardest decking wood available — Janka 3,680 vs.
          Cumaru's 3,540. Both last 40+ years, but Ipe has a slightly more uniform dark brown tone while Cumaru
          (Ku-mah-rue) runs warmer golden-brown and is typically 15-20% less expensive. Both are excellent; Ipe is our
          most popular species for decks while Cumaru is popular for siding and flooring.</div>
      </div>
      <div class="faq-item">
        <button class="faq-q" onclick="toggleFaq(this)">
          Do you have order minimums?
          <span class="faq-arrow">
            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
              <polyline points="6 9 12 15 18 9"></polyline>
            </svg>
          </span>
        </button>
        <div class="faq-a">None. We ship orders of any size — from 50 linear feet for a small deck repair to 10,000+ LF
          container loads for commercial projects. Pricing is competitive at every volume, and our specialists are happy
          to advise on the most cost-effective purchase size for your project.</div>
      </div>
      <div class="faq-item">
        <button class="faq-q" onclick="toggleFaq(this)">
          How fast can I get my lumber?
          <span class="faq-arrow">
            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
              <polyline points="6 9 12 15 18 9"></polyline>
            </svg>
          </span>
        </button>
        <div class="faq-a">We ship next business day for all in-stock species from our Gardena, CA warehouse. Most West
          Coast deliveries arrive within 2-3 business days. Custom dimensions (non-standard widths or lengths) can be
          sourced within 5 business days. We ship to home, job site, or port — anywhere on the West Coast and
          nationally.</div>
      </div>
      <div class="faq-item">
        <button class="faq-q" onclick="toggleFaq(this)">
          What does FSC-certified mean and why does it matter?
          <span class="faq-arrow">
            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
              <polyline points="6 9 12 15 18 9"></polyline>
            </svg>
          </span>
        </button>
        <div class="faq-a">FSC (Forest Stewardship Council) certification verifies that the timber was harvested from
          responsibly managed forests. We are also Lacey Act compliant (required by US federal law for imported wood)
          and IBAMA certified (Brazilian forestry authority). Every board we sell has a documented chain of custody — we
          know exactly where it was harvested and how it was processed.</div>
      </div>
      <div class="faq-item">
        <button class="faq-q" onclick="toggleFaq(this)">
          Does Ipe require maintenance?
          <span class="faq-arrow">
            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
              <polyline points="6 9 12 15 18 9"></polyline>
            </svg>
          </span>
        </button>
        <div class="faq-a">Ipe requires zero treatment to last 40+ years. Without treatment, it will naturally silver to
          a handsome gray patina — which many clients prefer. If you want to maintain the original rich brown color, an
          annual application of a penetrating deck oil like Ipe Oil or Penofin (both available from us) will preserve
          it. Unlike cedar or pine, Ipe never needs painting, staining, or pressure treatment.</div>
      </div>
      <div class="faq-item">
        <button class="faq-q" onclick="toggleFaq(this)">
          Do you carry composite decking?
          <span class="faq-arrow">
            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
              <polyline points="6 9 12 15 18 9"></polyline>
            </svg>
          </span>
        </button>
        <div class="faq-a">Yes. We are authorized distributors for Trex, TimberTech, Azek, Deckorators, EnDeck PVC,
          MoistureShield, NewTechWood, NorX, and Zuri. We also carry the full DeckWise hardware system and Simpson
          Strong-Tie connectors. For clients who want the look of wood with zero maintenance, composite is a strong
          option — our team can help you compare the total cost of ownership vs. tropical hardwood.</div>
      </div>
    </div>
  </div>
</section>

<!-- ─── FINAL CTA (DARK) ─── -->
<section id="final-cta">
  <div class="cta-inner">
    <span class="eyebrow eyebrow--sand">Want To See For Yourself?</span>
    <h2>Visit Our Two <span style="white-space:nowrap">LA Showrooms</span></h2>
    <p
      style="text-align:center;font-size:13px;font-weight:700;color:#c0392b;text-transform:uppercase;letter-spacing:.08em;margin:16px 0 12px;">
      * Appointment Required for Reseda Showroom</p>
    <div style="display:flex;gap:20px;justify-content:center;flex-wrap:nowrap;margin:0 0 12px;">

      <!-- Gardena -->
      <div
        style="background:#fff;border-radius:10px;overflow:hidden;flex:1;min-width:0;display:flex;flex-direction:column;box-shadow:0 4px 24px rgba(0,0,0,.25);">
        <div style="padding:20px 22px 16px;">
          <div
            style="font-size:10px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:#5a9636;margin-bottom:6px;">
            Gardena Showroom</div>
          <div style="display:flex;align-items:flex-start;gap:10px;margin-bottom:10px;">
            <svg style="flex-shrink:0;margin-top:2px;" width="16" height="16" fill="none" stroke="#5a9636"
              stroke-width="2" viewBox="0 0 24 24">
              <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z" />
              <circle cx="12" cy="10" r="3" />
            </svg>
            <div style="font-size:14px;font-weight:700;color:#1a2a12;line-height:1.4;">534 Finney Ct<br><span
                style="font-weight:500;color:#555;">Gardena, CA 90248</span></div>
          </div>
          <div style="display:flex;align-items:center;gap:8px;margin-bottom:12px;">
            <span style="font-size:15px;font-weight:800;color:#1a2a12;">5.0</span>
            <span style="color:#F9AB00;font-size:15px;letter-spacing:1px;">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
            <a href="https://maps.app.goo.gl/nqatE7aceYPsVgNu7" target="_blank"
              style="font-size:12px;color:#5a9636;text-decoration:underline;font-weight:600;">55 Google
              Reviews</a>
          </div>
          <a href="https://maps.app.goo.gl/nqatE7aceYPsVgNu7" target="_blank"
            style="display:inline-block;background:#1a2a12;color:#fff;font-size:12px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;padding:9px 18px;border-radius:4px;text-decoration:none;">Get
            Directions →</a>
        </div>
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3311.683521536406!2d-118.26961642468916!3d33.89780367321558!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2cbb7846ca7b3%3A0x93c2e08d2cd4642a!2sBeyond%20Lumber!5e0!3m2!1sen!2snp!4v1793086885559!5m2!1sen!2snp"
          width="100%" height="200" style="border:0;display:block;width:100%;" allowfullscreen loading="lazy"
          referrerpolicy="strict-origin-when-cross-origin" title="Beyond Lumber Gardena Showroom Location">
        </iframe>

      </div>

      <!-- Reseda -->
      <div
        style="background:#fff;border-radius:10px;overflow:hidden;flex:1;min-width:0;display:flex;flex-direction:column;box-shadow:0 4px 24px rgba(0,0,0,.25);">
        <div style="padding:20px 22px 16px;">
          <div
            style="font-size:10px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:#5a9636;margin-bottom:6px;">
            Reseda Showroom</div>
          <div style="display:flex;align-items:flex-start;gap:10px;margin-bottom:10px;">
            <svg style="flex-shrink:0;margin-top:2px;" width="16" height="16" fill="none" stroke="#5a9636"
              stroke-width="2" viewBox="0 0 24 24">
              <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z" />
              <circle cx="12" cy="10" r="3" />
            </svg>
            <div style="font-size:14px;font-weight:700;color:#1a2a12;line-height:1.4;">7040 Darby Ave<br><span
                style="font-weight:500;color:#555;">Reseda, CA 91335</span></div>
          </div>
          <div style="display:flex;align-items:center;gap:8px;margin-bottom:12px;">
            <span style="font-size:15px;font-weight:800;color:#1a2a12;">5.0</span>
            <span style="color:#F9AB00;font-size:15px;letter-spacing:1px;">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
            <a href="https://maps.app.goo.gl/pz64zzcUMtejKbWH7" target="_blank"
              style="font-size:12px;color:#5a9636;text-decoration:underline;font-weight:600;">2 Google
              Reviews</a>
          </div>
          <a href="https://maps.app.goo.gl/pz64zzcUMtejKbWH7" target="_blank" rel="noopener noreferrer"
            style="display:inline-block;background:#1a2a12;color:#fff;font-size:12px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;padding:9px 18px;border-radius:4px;text-decoration:none;">
            Get Directions &rarr;
          </a>
        </div>
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3299.965980034634!2d-118.53610320694146!3d34.19834562550532!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c29921d07a4ee5%3A0xb04373e334568662!2sBeyond%20Lumber!5e0!3m2!1sen!2snp!4v1793086426296!5m2!1sen!2snp"
          width="100%" height="200" style="border:0;display:block;width:100%;" allowfullscreen loading="lazy"
          referrerpolicy="strict-origin-when-cross-origin" title="Beyond Lumber Reseda Showroom Location">
        </iframe>
      </div>
    </div>
    <div class="cta-btns">
      <a href="#quote-form" class="btn btn-white">Get a Free Quote</a>
      <a href="tel:8773263063" class="btn btn-ghost">(877) 326-3063</a>
    </div>
  </div>
</section>

<?php
get_footer('new');
