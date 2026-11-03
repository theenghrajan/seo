<?php
require_once __DIR__ . '/config/locations.php';
$loc   = getLocation();
$text1 = htmlspecialchars($loc['text1']);  // Column B — e.g. "St. Paul " (trailing space)
$text2 = htmlspecialchars($loc['text2']);  // Column C — e.g. "St. Paul's"
$text3 = htmlspecialchars($loc['text3']);  // Column D — e.g. "St. Paul, MN"
$phone = htmlspecialchars($loc['phone']);  // Column E — e.g. "651-420-5089"
$tel   = 'tel:+1' . preg_replace('/[^0-9]/', '', $loc['phone']);
$location = htmlspecialchars($loc['location']);
$location_url = htmlspecialchars($loc['location_url'])
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paintless Dent Repair in <?= $text3 ?> | Auto Hail &amp; Dent Repair</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&family=Montserrat:wght@700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>

    <!-- ============================ 1. STORM ALERT ============================ -->
    <div class="alert-bar">
        <div class="wrap alert-bar__inner">
            <span class="alert-bar__tag">Storm Alert</span>
            <p class="alert-bar__msg">Now serving <?= $text3 ?> &amp; surrounding areas — free evaluations available this
                week.</p>
        </div>
    </div>

    <!-- ============================== 2. HEADER =============================== -->
    <header class="header">
        <div class="wrap header__inner">
            <a class="logo" href="/" aria-label="Auto Hail &amp; Dent Repair — home">
                <img src="assets/images/site-logo.svg" alt="Auto Hail &amp; Dent Repair">
                <!-- <span class="logo__fallback">Auto <span>Hail</span><br>Dent Repair</span> -->
            </a>

            <button class="nav-toggle" type="button" aria-expanded="false" aria-label="Toggle navigation menu"
                aria-controls="offcanvasMenu">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <nav class="nav" id="primary-nav" aria-label="Primary">
                <a href="#service-area">Service Area</a>
                <a href="#services">Services</a>
                <a href="#how-it-works">How It Works</a>
                <a href="#faqs">FAQs</a>
            </nav>

            <a class="btn btn--red btn--sm" href="#evaluation">Free Damage Evaluation</a>
        </div>
    </header>

    <!-- Offcanvas Navigation Below 991px -->
    <div class="offcanvas-backdrop" id="offcanvasBackdrop"></div>
    <div class="offcanvas-menu" id="offcanvasMenu" aria-hidden="true">
        <div class="offcanvas-header">
            <a class="logo" href="/" aria-label="Auto Hail &amp; Dent Repair — home">
                <img src="assets/images/site-logo.svg" alt="Auto Hail &amp; Dent Repair">
            </a>
            <button class="offcanvas-close" id="offcanvasClose" aria-label="Close navigation menu">&times;</button>
        </div>
        <div class="offcanvas-body">
            <nav class="offcanvas-nav">
                <a href="#service-area" class="offcanvas-link">Service Area</a>
                <a href="#services" class="offcanvas-link">Services</a>
                <a href="#how-it-works" class="offcanvas-link">How It Works</a>
                <a href="#faqs" class="offcanvas-link">FAQs</a>
            </nav>
            <div class="offcanvas-cta">
                <a class="btn btn--red" href="#evaluation">Free Damage Evaluation</a>
            </div>
        </div>
    </div>

    <!-- =============================== 3. HERO ================================ -->
    <section class="hero">
        <div class="wrap">
            <div class="hero__inner">
                <h1><?= $text2 ?> Trusted Paintless Dent Repair for Hail-Damaged Vehicles</h1>
                <p>We bring experienced PDR teams to <?= $text3 ?>, work directly with your insurance, and restore your
                    vehicle to factory-quality condition — usually with little to no out-of-pocket cost.</p>
                <div class="hero__actions">
                    <a class="btn btn--white" href="#evaluation">Free 15-Minute Evaluation</a>
                    <a class="btn btn--ghost" href="<?= $tel ?>">Call <?= $phone ?></a>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================ 4. TRUST STRIP ============================ -->
    <section class="trust">
        <div class="wrap trust__inner">
            <div class="trust__item">
                <span class="trust__icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <path
                            d="M12 1 3 5v6c0 5.5 3.8 10.7 9 12 5.2-1.3 9-6.5 9-12V5l-9-4Zm0 6.5a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5Zm0 12c-2 0-3.9-1-5-2.6.1-1.7 3.3-2.6 5-2.6s4.9.9 5 2.6A6 6 0 0 1 12 19.5Z" />
                    </svg>
                </span>
                <span>20+ Years Experience</span>
            </div>
            <div class="trust__item">
                <span class="trust__icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <path
                            d="M12 2 4 5.3v5.4c0 4.9 3.4 9.5 8 10.6 4.6-1.1 8-5.7 8-10.6V5.3L12 2Zm-1.2 13.6-3.3-3.3 1.4-1.4 1.9 1.9 4.9-4.9 1.4 1.4-6.3 6.3Z" />
                    </svg>
                </span>
                <span>Lifetime Warranty</span>
            </div>
            <div class="trust__item">
                <span class="trust__icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <path
                            d="M19 4c-6 0-11 2.6-12.6 8.3-.6 2.2-.3 4.3.5 6L4 21h2.6l1.6-2c1.4.6 3 .8 4.5.5C19 18.4 21 12.8 21 5.9V4h-2Zm-6.5 12.4c-.9.2-1.8.1-2.6-.2 2-3.6 5-6.2 8.6-7.6-1.2 4-3.1 7-6 7.8Z" />
                    </svg>
                </span>
                <span>Eco-Friendly PDR</span>
            </div>
        </div>
    </section>

    <!-- =========================== 5. SERVICE AREA ============================ -->
    <section class="area" id="service-area">
        <div class="wrap">
            <h2>Proudly Serving Greater <?= $text3 ?></h2>
            <p class="area__note">Our mobile PDR teams cover 20 miles around <?= $text1 ?>— including these communities.
                Don't see your city listed? Call us; there's a good chance we're already close by.</p>

            <ul class="cities">
                <li>Minneapolis</li>
                <li>Roseville</li>
                <li>Maplewood</li>
                <li>Woodbury</li>
                <li>West St. Paul</li>
                <li>South St. Paul</li>
                <li>Mendota Heights</li>
                <li>Eagan</li>
                <li>Inver Grove Heights</li>
                <li>Falcon Heights</li>
                <li>Little Canada</li>
                <li>Shoreview</li>
                <li>White Bear Lake</li>
                <li>Oakdale</li>
                <li>Vadnais Heights</li>
                <li>North St. Paul</li>
                <li>Arden Hills</li>
            </ul>

            <p class="area__note area__note--last">Service area shown is approximate and provided as a starting point —
                please confirm exact coverage before launching this page in a live campaign.</p>
        </div>
    </section>

    <!-- ============================= 6. SERVICES ============================== -->
    <section class="services" id="services">
        <div class="wrap">
            <div class="services__head">
                <h2 class="h-section">Our Specialized Services</h2>
                <p>Paintless Dent Repair, Done Right</p>
            </div>

            <div class="service-grid">
                <article class="service">
                    <div class="service__media" role="img"
                        aria-label="Hail-damaged vehicle under PDR inspection lighting"></div>
                    <div class="service__body">
                        <h3>Comprehensive Hail Damage Repair</h3>
                        <p>Hail damage is exactly what paintless dent repair is built for. We restore hail-damaged
                            panels without repainting, preserving your factory finish and resale value.</p>
                    </div>
                </article>

                <article class="service">
                    <div class="service__media" role="img" aria-label="Technician repairing a door ding"></div>
                    <div class="service__body">
                        <h3>Door Dings &amp; Small Dent Repair</h3>
                        <p>Parking lot dings and minor dents can often be repaired without touching the paint — fast,
                            affordable, and finished the same day in most cases.</p>
                    </div>
                </article>

                <article class="service">
                    <div class="service__media" role="img" aria-label="Dealership lot with fleet vehicles"></div>
                    <div class="service__body">
                        <h3>Dealer, Fleet &amp; Wholesale Solutions</h3>
                        <p>We support dealerships, fleets, and body shops with organized, high-volume PDR teams during
                            hail events and ongoing wholesale reconditioning.</p>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- =========================== 7. QUALIFY BAND ============================ -->
    <section class="band">
        <div class="wrap">
            <h2>Not Sure If Your Damage Qualifies</h2>
            <a class="btn btn--white" href="#evaluation">Get a free evaluation in as little as 15 minutes</a>
        </div>
    </section>

    <!-- ============================== 8. WHY US =============================== -->
    <section class="why">
        <div class="wrap why__inner">
            <div class="why__media" role="img" aria-label="PDR technician restoring a hail-damaged panel">
                <div class="why__stat">
                    <strong>20+</strong>
                    <span>Years of<br>Experience</span>
                </div>
            </div>

            <div class="why__copy">
                <h2 class="h-section">A Seamless Recovery, Start to Finish</h2>
                <p>We believe you deserve a stress-free path back to a fully restored vehicle — here's how we make that
                    happen.</p>

                <ul class="why-list">
                    <li>
                        <!-- Figma 27741:167 — users -->
                        <svg width="32" height="22" viewBox="0 0 32 22" aria-hidden="true">
                            <path
                                d="M 4.8 9.428571428571429 C 3 9.428571428571429 1.5999999999999999 8.053571428571429 1.5999999999999999 6.285714285714286 C 1.5999999999999999 4.566964285714286 3 3.142857142857143 4.8 3.142857142857143 C 6.55 3.142857142857143 8 4.566964285714286 8 6.285714285714286 C 8 8.053571428571429 6.55 9.428571428571429 4.8 9.428571428571429 Z M 27.2 9.428571428571429 C 25.4 9.428571428571429 24 8.053571428571429 24 6.285714285714286 C 24 4.566964285714286 25.4 3.142857142857143 27.2 3.142857142857143 C 28.95 3.142857142857143 30.4 4.566964285714286 30.4 6.285714285714286 C 30.4 8.053571428571429 28.95 9.428571428571429 27.2 9.428571428571429 Z M 28.799999999999997 11 C 30.549999999999997 11 32 12.424107142857142 32 14.142857142857142 L 32 15.714285714285714 C 32 16.598214285714285 31.25 17.285714285714285 30.4 17.285714285714285 L 27.099999999999998 17.285714285714285 C 26.749999999999996 14.977678571428571 25.349999999999998 13.013392857142856 23.299999999999997 11.933035714285714 C 23.9 11.392857142857142 24.7 11 25.599999999999998 11 L 28.799999999999997 11 Z M 16 11 C 12.9 11 10.4 8.544642857142858 10.4 5.5 C 10.4 2.504464285714286 12.9 0 16 0 C 19.05 0 21.599999999999998 2.504464285714286 21.599999999999998 5.5 C 21.599999999999998 8.544642857142858 19.05 11 16 11 Z M 19.8 12.571428571428571 C 23 12.571428571428571 25.599999999999998 15.125 25.599999999999998 18.267857142857142 L 25.599999999999998 19.642857142857142 C 25.599999999999998 20.96875 24.5 22 23.2 22 L 8.799999999999999 22 C 7.449999999999999 22 6.3999999999999995 20.96875 6.3999999999999995 19.642857142857142 L 6.3999999999999995 18.267857142857142 C 6.3999999999999995 15.125 8.95 12.571428571428571 12.149999999999999 12.571428571428571 L 12.549999999999999 12.571428571428571 C 13.6 13.0625 14.75 13.357142857142856 16 13.357142857142856 C 17.2 13.357142857142856 18.349999999999998 13.0625 19.4 12.571428571428571 L 19.8 12.571428571428571 Z M 8.65 11.933035714285714 C 6.6000000000000005 13.013392857142856 5.199999999999999 14.977678571428571 4.85 17.285714285714285 L 1.5999999999999999 17.285714285714285 C 0.7 17.285714285714285 0 16.598214285714285 0 15.714285714285714 L 0 14.142857142857142 C 0 12.424107142857142 1.4 11 3.1999999999999997 11 L 6.3999999999999995 11 C 7.249999999999999 11 8.05 11.392857142857142 8.65 11.933035714285714 Z" />
                        </svg>
                        <div>
                            <h3>20+ Years Experience</h3>
                            <p>An established team with a long track record restoring vehicles after storm events.</p>
                        </div>
                    </li>
                    <li>
                        <!-- Figma 27741:174 — bookmark -->
                        <svg width="16.5" height="22" viewBox="0 0 16.5 22" aria-hidden="true">
                            <path
                                d="M 0 22 L 0 2.0625 C 0 0.9453125 0.90234375 0 2.0625 0 L 14.4375 0 C 15.5546875 0 16.5 0.9453125 16.5 2.0625 L 16.5 22 L 8.25 17.1875 L 0 22 Z" />
                        </svg>
                        <div>
                            <h3>Lifetime Warranty</h3>
                            <p>Every repair is quality-assured and backed by a lifetime warranty for as long as you own
                                the vehicle.</p>
                        </div>
                    </li>
                    <li>
                        <!-- Figma 27741:181 — leaf -->
                        <svg width="24.7735" height="22.0027" viewBox="0 0 24.7735 22.0027" aria-hidden="true">
                            <path
                                d="M 23.484445571899414 0.4088737368583679 C 24.300851821899414 2.256529986858368 24.773508071899414 4.490904808044434 24.773508071899414 6.639342308044434 C 24.773508071899414 14.029967308044434 20.003976821899414 20.08856201171875 13.257883071899414 20.56121826171875 C 9.777414321899414 20.94793701171875 7.156320571899414 19.14324951171875 5.738351821899414 17.25262451171875 C 3.546945571899414 19.10028076171875 2.730539321899414 20.99090576171875 2.644601821899414 21.16278076171875 C 2.343820571899414 21.85028076171875 1.5703830122947693 22.19403076171875 0.8399142622947693 21.89324951171875 C 0.1524142622947693 21.59246826171875 -0.19133571535348892 20.81903076171875 0.10944553464651108 20.08856201171875 C 1.140695534646511 17.63934326171875 5.695383071899414 10.979186058044434 16.523508071899414 10.979186058044434 C 16.867258071899414 10.979186058044434 17.211008071899414 10.678404808044434 17.211008071899414 10.291686058044434 C 17.211008071899414 9.947936058044434 16.867258071899414 9.604186058044434 16.523508071899414 9.604186058044434 C 10.894601821899414 9.604186058044434 6.941476821899414 11.279967308044434 4.191476821899414 13.256529808044434 C 4.148508071899414 12.955748558044434 4.148508071899414 12.654967308044434 4.148508071899414 12.354186058044434 C 4.148508071899414 7.799498558044434 7.843820571899414 4.104186058044434 12.398508071899414 4.104186058044434 L 15.836008071899414 4.104186058044434 C 18.543039321899414 4.104186058044434 20.906320571899414 2.686217486858368 22.238351821899414 0.3659049868583679 C 22.539133071899414 -0.14972001314163208 23.226633071899414 -0.10675126314163208 23.484445571899414 0.4088737368583679 Z" />
                        </svg>
                        <div>
                            <h3>Eco-Friendly Process</h3>
                            <p>Our repair process uses zero toxic chemicals or paints, preserving your car's original
                                finish.</p>
                        </div>
                    </li>
                    <li>
                        <!-- Figma 27741:188 — document -->
                        <svg width="16.5" height="22" viewBox="0 0 16.5 22" aria-hidden="true">
                            <path
                                d="M 9.625 5.84375 C 9.625 6.4453125 10.0546875 6.875 10.65625 6.875 L 16.5 6.875 L 16.5 20.96875 C 16.5 21.5703125 16.02734375 22 15.46875 22 L 1.03125 22 C 0.4296875 22 0 21.5703125 0 20.96875 L 0 1.03125 C 0 0.47265625 0.4296875 0 1.03125 0 L 9.625 0 L 9.625 5.84375 Z M 12.375 15.984375 L 12.375 15.640625 C 12.375 15.3828125 12.1171875 15.125 11.859375 15.125 L 4.640625 15.125 C 4.33984375 15.125 4.125 15.3828125 4.125 15.640625 L 4.125 15.984375 C 4.125 16.28515625 4.33984375 16.5 4.640625 16.5 L 11.859375 16.5 C 12.1171875 16.5 12.375 16.28515625 12.375 15.984375 Z M 12.375 13.234375 L 12.375 12.890625 C 12.375 12.6328125 12.1171875 12.375 11.859375 12.375 L 4.640625 12.375 C 4.33984375 12.375 4.125 12.6328125 4.125 12.890625 L 4.125 13.234375 C 4.125 13.53515625 4.33984375 13.75 4.640625 13.75 L 11.859375 13.75 C 12.1171875 13.75 12.375 13.53515625 12.375 13.234375 Z M 12.375 10.140625 C 12.375 9.8828125 12.1171875 9.625 11.859375 9.625 L 4.640625 9.625 C 4.33984375 9.625 4.125 9.8828125 4.125 10.140625 L 4.125 10.484375 C 4.125 10.78515625 4.33984375 11 4.640625 11 L 11.859375 11 C 12.1171875 11 12.375 10.78515625 12.375 10.484375 L 12.375 10.140625 Z M 16.5 5.2421875 L 16.5 5.5 L 11 5.5 L 11 0 L 11.2578125 0 C 11.515625 0 11.7734375 0.12890625 11.98828125 0.30078125 L 16.19921875 4.51171875 C 16.37109375 4.7265625 16.5 4.984375 16.5 5.2421875 Z" />
                        </svg>
                        <div>
                            <h3>Insurance Guidance</h3>
                            <p>Since hail is an "Act of Nature," we help you navigate a claims process that generally
                                doesn't raise your rates.</p>
                        </div>
                    </li>
                    <li>
                        <!-- Figma 27741:195 — comments -->
                        <svg width="24.7669" height="19.25" viewBox="0 0 24.7669 19.25" aria-hidden="true">
                            <path
                                d="M 17.891857147216797 6.875 C 17.891857147216797 10.69921875 13.852794647216797 13.75 8.954357147216797 13.75 C 7.192638397216797 13.75 5.516856670379639 13.36328125 4.141856670379639 12.67578125 C 3.1965441703796387 13.234375 1.907481849193573 13.75 0.360606849193573 13.75 C 0.188731849193573 13.75 0.102794349193573 13.70703125 0.016856849193572998 13.578125 C -0.026111900806427002 13.44921875 0.016856849193572998 13.27734375 0.102794349193573 13.19140625 C 0.102794349193573 13.19140625 1.0481067895889282 12.16015625 1.6496692895889282 10.828125 C 0.6184192895889282 9.7109375 0.016856849193572998 8.37890625 0.016856849193572998 6.875 C 0.016856849193572998 3.09375 4.012950897216797 0 8.954357147216797 0 C 13.852794647216797 0 17.891857147216797 3.09375 17.891857147216797 6.875 Z M 23.134044647216797 16.328125 C 23.692638397216797 17.66015625 24.637950897216797 18.69140625 24.637950897216797 18.69140625 C 24.766857147216797 18.77734375 24.766857147216797 18.94921875 24.723888397216797 19.078125 C 24.680919647216797 19.20703125 24.552013397216797 19.25 24.423107147216797 19.25 C 22.833263397216797 19.25 21.544200897216797 18.734375 20.598888397216797 18.17578125 C 19.223888397216797 18.86328125 17.591075897216797 19.25 15.829357147216797 19.25 C 12.091075897216797 19.25 8.911387920379639 17.53125 7.579356670379639 15.08203125 C 8.009044170379639 15.125 8.481700897216797 15.125 8.954357147216797 15.125 C 14.626232147216797 15.125 19.266857147216797 11.4296875 19.266857147216797 6.875 C 19.266857147216797 6.6171875 19.223888397216797 6.31640625 19.180919647216797 6.015625 C 22.446544647216797 7.046875 24.766857147216797 9.5390625 24.766857147216797 12.375 C 24.766857147216797 13.87890625 24.122325897216797 15.2109375 23.134044647216797 16.328125 Z" />
                        </svg>
                        <div>
                            <h3>Deductible Assistance</h3>
                            <p>Ask about our program designed to help minimize your out-of-pocket cost.</p>
                        </div>
                    </li>
                    <li>
                        <!-- Figma 27741:202 — truck -->
                        <svg width="27.5" height="22" viewBox="0 0 27.5 22" aria-hidden="true">
                            <path
                                d="M 26.8125 15.125 C 27.15625 15.125 27.5 15.46875 27.5 15.8125 L 27.5 17.1875 C 27.5 17.57421875 27.15625 17.875 26.8125 17.875 L 24.75 17.875 C 24.75 20.15234375 22.90234375 22 20.625 22 C 18.34765625 22 16.5 20.15234375 16.5 17.875 L 11 17.875 C 11 20.15234375 9.15234375 22 6.875 22 C 4.59765625 22 2.75 20.15234375 2.75 17.875 L 2.0625 17.875 C 0.90234375 17.875 0 16.97265625 0 15.8125 L 0 2.0625 C 0 0.9453125 0.90234375 0 2.0625 0 L 15.8125 0 C 16.9296875 0 17.875 0.9453125 17.875 2.0625 L 17.875 4.125 L 19.765625 4.125 C 20.28125 4.125 20.83984375 4.3828125 21.2265625 4.76953125 L 25.48046875 9.0234375 C 25.8671875 9.41015625 26.125 9.96875 26.125 10.484375 L 26.125 15.125 L 26.8125 15.125 Z M 6.875 19.9375 C 7.9921875 19.9375 8.9375 19.03515625 8.9375 17.875 C 8.9375 16.7578125 7.9921875 15.8125 6.875 15.8125 C 5.71484375 15.8125 4.8125 16.7578125 4.8125 17.875 C 4.8125 19.03515625 5.71484375 19.9375 6.875 19.9375 Z M 20.625 19.9375 C 21.7421875 19.9375 22.6875 19.03515625 22.6875 17.875 C 22.6875 16.7578125 21.7421875 15.8125 20.625 15.8125 C 19.46484375 15.8125 18.5625 16.7578125 18.5625 17.875 C 18.5625 19.03515625 19.46484375 19.9375 20.625 19.9375 Z M 24.0625 11 L 24.0625 10.484375 L 19.765625 6.1875 L 17.875 6.1875 L 17.875 11 L 24.0625 11 Z" />
                        </svg>
                        <div>
                            <h3>Pickup &amp; Drop-off</h3>
                            <p>Vehicle pickup and drop-off available in our active service areas, so your life keeps
                                moving.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- ============================== 9. PROCESS ============================== -->
    <section class="process" id="how-it-works">
        <div class="wrap">
            <h2 class="h-section">From Inspection to Delivery</h2>

            <div class="steps">
                <article class="step">
                    <span class="step__num" aria-hidden="true">1</span>
                    <div>
                        <h3>Rapid Evaluation</h3>
                        <p>Every repair is quality-assured and backed by a lifetime warranty for as long as you own the
                            vehicle.</p>
                    </div>
                </article>

                <article class="step">
                    <span class="step__num" aria-hidden="true">2</span>
                    <div>
                        <h3>Insurance Coordination</h3>
                        <p>We work directly with your insurance provider, assisting with estimates and paperwork.</p>
                    </div>
                </article>

                <article class="step">
                    <span class="step__num" aria-hidden="true">3</span>
                    <div>
                        <h3>Precision PDR Restoration</h3>
                        <p>Master technicians gently massage panels back to factory shape, no paint required.</p>
                    </div>
                </article>

                <article class="step">
                    <span class="step__num" aria-hidden="true">4</span>
                    <div>
                        <h3>Final Quality Check</h3>
                        <p>Every vehicle undergoes a rigorous inspection before we hand back the keys.</p>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- =========================== 10. EVALUATION ============================= -->
    <section class="evaluate" id="evaluation">
        <div class="wrap evaluate__inner">
            <div class="evaluate__copy">
                <h2>Get Your Free 15-Minute Hail Damage Evaluation</h2>
                <p>Tell us a little about your vehicle and we'll follow up to schedule your evaluation — no cost, no
                    obligation.</p>
                <ul class="evaluate__points">
                    <li>&#10003; No out-of-pocket cost for most covered repairs</li>
                    <li>&#10003; We coordinate directly with your insurance company</li>
                    <li>&#10003; Lifetime warranty on every completed repair</li>
                </ul>
            </div>

            <div class="form-card">
                <h2>Request Your Free Evaluation</h2>
                <p>Takes less than a minute.</p>

                <form action="mailer/index.php" method="post" class="validate form" novalidate id="form-id-0">
                    <div class="form-group">
                        <label class="sr-only" for="name" hidden>Full name</label>
                        <input id="name" name="full-name" type="text" placeholder="Full Name*" required>
                        <div class="messages"></div>
                    </div>

                    <div class="form-group">
                        <label class="sr-only" for="phone" hidden>Phone number</label>
                        <input id="phone" name="phone" type="tel" placeholder="Phone Number*" required>
                        <div class="messages"></div>
                    </div>

                    <div class="form-group">
                        <label class="sr-only" for="zip" hidden>City or ZIP code</label>
                        <input id="zip" name="zip" type="text" placeholder="City / ZIP Code*" required>
                        <div class="messages"></div>
                    </div>

                    <div class="form-group">
                        <label class="sr-only" for="damage" hidden>Quick description of the damage</label>
                        <textarea id="damage" name="quick-description-of-the-damage-optional"
                            placeholder="Quick description of the damage (Optional)"></textarea>
                        <div class="messages"></div>
                    </div>

                    <!-- Google reCAPTCHA widget -->
                    <div class="form-group">
                        <div class="g-recaptcha-v2-visible" id="g-recaptcha-0"></div>
                        <div class="messages"></div>
                    </div>
                    <div class="form-group">
                        <!-- For local testing, you can set a value here to bypass validation -->
                        <input type="hidden" class="form-control" name="google-recaptcha" value="" id="input-g-recaptcha-0"/>
                        <div class="messages"></div>
                    </div>


                    <button class="btn btn--red submitButton" type="submit">Request Free Evaluation<span class="spinner-border loader" style="display:none"></span></button>
                </form>

                <p class="form-card__fine">By submitting, you agree to be contacted about your evaluation. No spam,
                    ever.</p>
            </div>
        </div>
    </section>

    <!-- ======================== 11. INSURANCE NOTES =========================== -->
    <section class="claim">
        <div class="wrap">
            <h2 class="h-section">What to Know About Filing a Hail Claim</h2>

            <div class="claim__grid">
                <article class="claim__card">
                    <h3>Comprehensive Coverage</h3>
                    <p>Hail damage is filed under Comprehensive Coverage (Acts of Nature), not Collision.</p>
                </article>
                <article class="claim__card">
                    <h3>Rate Protection</h3>
                    <p>Because it's an act of nature, filing a hail claim generally does not raise your insurance rates.
                    </p>
                </article>
                <article class="claim__card">
                    <h3>Deductible Assistance</h3>
                    <p>Ask our team during your evaluation about our Deductible Assistance Program.</p>
                </article>
            </div>
        </div>
    </section>

    <!-- =============================== 12. FAQ ================================ -->
    <section class="faq" id="faqs">
        <div class="wrap">
            <h2 class="h-section">Frequently Asked Questions</h2>

            <div class="faq__list">
                <details class="faq__item" open>
                    <summary>Will my insurance rates go up if I file a hail claim?</summary>
                    <p>No — because hail damage is an "Act of Nature," these claims fall under your comprehensive
                        coverage and generally don't raise your rates the way an at-fault collision claim would.</p>
                </details>

                <details class="faq__item">
                    <summary>How much will this cost me out-of-pocket?</summary>
                    <p>For most covered repairs, your only cost is your comprehensive deductible — and our Deductible
                        Assistance Program is designed to help reduce even that. We'll confirm the exact numbers during
                        your free evaluation.</p>
                </details>

                <details class="faq__item">
                    <summary>How long does the repair process take?</summary>
                    <p>Most hail repairs are completed within a few days once the claim is approved. Smaller dent work
                        is often finished the same day.</p>
                </details>

                <details class="faq__item">
                    <summary>Is Paintless Dent Repair (PDR) as good as a body shop?</summary>
                    <p>For hail and dent damage where the paint is intact, PDR is the preferred method — it restores the
                        panel to factory shape without fillers or repainting, which protects your original finish and
                        resale value.</p>
                </details>

                <details class="faq__item">
                    <summary>Do I have to use the shop my insurance company recommended?</summary>
                    <p>No. You have the right to choose who repairs your vehicle, and we'll work directly with your
                        insurer either way.</p>
                </details>
            </div>
        </div>
    </section>

    <!-- ============================= 13. BANNER =============================== -->
    <section class="banner" role="img" aria-label="Restored vehicle after paintless dent repair">
        <a class="btn btn--red" href="#evaluation">Click Here</a>
    </section>

    <!-- =========================== 14. CLOSING CTA ============================ -->
    <section class="closing">
        <div class="wrap">
            <h2>Ready to Get Your Vehicle Repaired?</h2>
            <p>Start with a free 15-minute damage evaluation — no cost, no pressure, no obligation.</p>
            <div class="closing__actions">
                <a class="btn btn--red" href="#evaluation">Free 15-Minute Evaluation</a>
                <a class="btn btn--ghost" href="<?= $tel ?>">Call <?= $phone ?></a>
            </div>
        </div>
    </section>

    <!-- ============================== 15. FOOTER ============================== -->
    <footer class="footer">
        <div class="wrap">
            <div class="footer__grid">
                <div>
                    <div class="footer__logo">
                        <img src="assets/images/footer-logo.webp" alt="Auto Hail &amp; Dent Repair">
                    </div>
                    <p class="footer__quote">"We exist to help people rebuild after the storm — one car, one family, one
                        community at a time."</p>
                    <a class="social" href="#" rel="noopener">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M14 9h3V6h-3c-2.2 0-4 1.8-4 4v2H8v3h2v7h3v-7h3l1-3h-4v-2c0-.6.4-1 1-1Z" />
                        </svg>
                        Facebook
                    </a>
                </div>

                <div>
                    <h4>Quick Links</h4>
                    <nav class="footer__links" aria-label="Footer">
                        <a href="#services">Services</a>
                        <a href="#service-area">Service Area</a>
                        <a href="#how-it-works">How It Works</a>
                        <a href="#faqs">FAQs</a>
                    </nav>
                </div>

                <div>
                    <h4>Get In Touch</h4>
                    <ul class="footer__contact">
                        <li>
                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <path
                                    d="M6.6 10.8a15 15 0 0 0 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.2.4 2.4.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1A17 17 0 0 1 3 4c0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.3.2 2.5.6 3.6.1.4 0 .8-.2 1l-2.3 2.2Z" />
                            </svg>
                            <a href="<?= $tel ?>"><?= $phone ?></a>
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <path
                                    d="M20 4H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2Zm0 4-8 5-8-5V6l8 5 8-5v2Z" />
                            </svg>
                            <a href="mailto:info@autohaildent.com">info@autohaildent.com</a>
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <path
                                    d="M12 2a8 8 0 0 0-8 8c0 5.5 8 12 8 12s8-6.5 8-12a8 8 0 0 0-8-8Zm0 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                            </svg>
                            <span>Monday – Friday: 8 AM to 6 PM<br>Saturday - 9 AM to 5 PM<br>Sunday - By appointment
                                only</span>
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M12 2 3 9v11a1 1 0 0 0 1 1h5v-6h6v6h5a1 1 0 0 0 1-1V9l-9-7Z" />
                            </svg>
                            <a href="<?= $location_url; ?>" target="_blank" style="display: inline-block"><?= $location; ?></a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="footer__base">
                <p>© 2026 Auto Hail &amp; Dent Repair, Inc. All Rights Reserved.</p>
                <p><a href="#">Privacy Policy</a> · <a href="#">Terms &amp; Conditions</a></p>
            </div>
        </div>
    </footer>

    <script>
        (function () {
            var btn = document.querySelector('.nav-toggle');
            var offcanvasMenu = document.getElementById('offcanvasMenu');
            var offcanvasBackdrop = document.getElementById('offcanvasBackdrop');
            var offcanvasClose = document.getElementById('offcanvasClose');
            var offcanvasLinks = document.querySelectorAll('.offcanvas-link');

            if (!btn || !offcanvasMenu) return;

            function openOffcanvas() {
                offcanvasMenu.classList.add('active');
                if (offcanvasBackdrop) offcanvasBackdrop.classList.add('active');
                document.body.classList.add('offcanvas-open');
                offcanvasMenu.setAttribute('aria-hidden', 'false');
                btn.setAttribute('aria-expanded', 'true');
            }

            function closeOffcanvas() {
                offcanvasMenu.classList.remove('active');
                if (offcanvasBackdrop) offcanvasBackdrop.classList.remove('active');
                document.body.classList.remove('offcanvas-open');
                offcanvasMenu.setAttribute('aria-hidden', 'true');
                btn.setAttribute('aria-expanded', 'false');
            }

            btn.addEventListener('click', openOffcanvas);
            if (offcanvasClose) offcanvasClose.addEventListener('click', closeOffcanvas);
            if (offcanvasBackdrop) offcanvasBackdrop.addEventListener('click', closeOffcanvas);

            offcanvasLinks.forEach(function (link) {
                link.addEventListener('click', closeOffcanvas);
            });

            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape' && offcanvasMenu.classList.contains('active')) {
                    closeOffcanvas();
                }
            });
        })();
    </script>

  <script src="assets/js/validate.min.js"></script>
  <script src="assets/js/builder.js"></script>
  <script src="https://www.google.com/recaptcha/api.js?onload=onReCaptchaLoadCallback&render=explicit" async defer></script>
</body>

</html>