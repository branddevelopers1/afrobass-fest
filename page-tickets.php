<?php
/**
 * Template Name: Tickets Page
 * Template Post Type: page
 */
get_header();
$contact_email = fest_setting('fest_email') ?: 'contact@afrobassfestival.com';

/* Showpass event ID */
define('FEST_SHOWPASS_ID', '1521242');
?>

<!-- Showpass widget script -->
<script src="https://www.showpass.com/static/libs/sdk.js" defer></script>

<div style="padding-top:72px;">

  <!-- ── HERO ── -->
  <div class="fest-lineup-hero">
    <div class="fest-kicker fest-reveal">Afrobass Music Festival 2026</div>
    <h1 class="fest-title fest-reveal" style="margin-bottom:20px;">Get Your<br>Tickets</h1>
    <p style="font-size:16px;font-weight:300;color:rgba(255,255,255,0.4);max-width:480px;line-height:1.7;" class="fest-reveal">
      Saturday, August 15, 2026 &middot; Rebel Entertainment Complex &middot; Toronto, Canada
    </p>
  </div>

  <!-- ── TICKET TIERS ── -->
  <section class="fest-tickets-section">

    <div class="fest-tickets-grid">

      <!-- General Admission -->
      <div class="fest-ticket-tier fest-reveal">
        <span class="fest-tier-badge">General</span>
        <div class="fest-tier-name">General Admission</div>
        <div class="fest-tier-price" id="sp-price-ga" style="font-size:48px;">See Prices</div>
        <div class="fest-tier-desc">Full access to the festival grounds, all performances, and food &amp; drink vendors.</div>
        <div class="fest-tier-perks">
          <div class="fest-tier-perk"><div class="fest-tier-perk-dot"></div>Full festival access &mdash; all performances</div>
          <div class="fest-tier-perk"><div class="fest-tier-perk-dot"></div>Access to all vendor areas</div>
          <div class="fest-tier-perk"><div class="fest-tier-perk-dot"></div>General standing floor</div>
          <div class="fest-tier-perk"><div class="fest-tier-perk-dot"></div>19+ event &mdash; valid ID required</div>
        </div>
        <!-- Showpass button — opens checkout modal for this event -->
        <button
          class="fest-tier-btn fest-tier-btn-outline showpass-widget-trigger"
          data-sp-id="<?php echo FEST_SHOWPASS_ID; ?>"
          data-sp-type="event"
          style="width:100%;cursor:pointer;">
          Buy Tickets &rarr;
        </button>
      </div>

      <!-- VIP -->
      <div class="fest-ticket-tier featured fest-reveal fest-d1">
        <span class="fest-tier-badge">Most Popular</span>
        <div class="fest-tier-name">VIP Experience</div>
        <div class="fest-tier-price" id="sp-price-vip" style="font-size:48px;">See Prices</div>
        <div class="fest-tier-desc">Premium access with exclusive areas, dedicated bar, and priority entry.</div>
        <div class="fest-tier-perks">
          <div class="fest-tier-perk"><div class="fest-tier-perk-dot"></div>Everything in General Admission</div>
          <div class="fest-tier-perk"><div class="fest-tier-perk-dot"></div>Dedicated VIP area &amp; bar</div>
          <div class="fest-tier-perk"><div class="fest-tier-perk-dot"></div>Priority entry &mdash; skip the line</div>
          <div class="fest-tier-perk"><div class="fest-tier-perk-dot"></div>Exclusive VIP lounge access</div>
        </div>
        <button
          class="fest-tier-btn fest-tier-btn-fill showpass-widget-trigger"
          data-sp-id="<?php echo FEST_SHOWPASS_ID; ?>"
          data-sp-type="event"
          style="width:100%;cursor:pointer;">
          Buy Tickets &rarr;
        </button>
      </div>

      <!-- Table Package -->
      <div class="fest-ticket-tier fest-reveal fest-d2">
        <span class="fest-tier-badge">Groups</span>
        <div class="fest-tier-name">Table Package</div>
        <div class="fest-tier-price" style="font-size:48px;">Enquire</div>
        <div class="fest-tier-desc">Reserved table for your group with bottle service and a dedicated event host.</div>
        <div class="fest-tier-perks">
          <div class="fest-tier-perk"><div class="fest-tier-perk-dot"></div>Reserved table for 6&ndash;10 guests</div>
          <div class="fest-tier-perk"><div class="fest-tier-perk-dot"></div>Bottle service included</div>
          <div class="fest-tier-perk"><div class="fest-tier-perk-dot"></div>Dedicated event host</div>
          <div class="fest-tier-perk"><div class="fest-tier-perk-dot"></div>Best views of the stage</div>
        </div>
        <a href="mailto:<?php echo esc_attr($contact_email); ?>?subject=Table Package Enquiry — Afrobass Fest 2026"
           class="fest-tier-btn fest-tier-btn-outline"
           style="display:block;text-align:center;">
          Enquire &rarr;
        </a>
      </div>

    </div>

  </section>

  <!-- ── FULL SHOWPASS WIDGET (inline) ── -->
  <section style="padding:0 56px 80px;" class="fest-reveal">
    <div style="margin-bottom:32px;">
      <div class="fest-kicker">Powered by Showpass</div>
      <h2 style="font-family:'Unbounded',sans-serif;font-size:clamp(28px,3vw,44px);font-weight:900;letter-spacing:-1px;color:#fff;text-transform:uppercase;margin-top:12px;">Select Your Tickets</h2>
    </div>

    <!-- Showpass inline widget container -->
    <div
      id="showpass-widget"
      style="background:#0d0d0d;border:1px solid #1a1a1a;border-radius:2px;overflow:hidden;min-height:400px;">

      <!-- Widget loads here via Showpass SDK -->
      <div
        data-sp-id="<?php echo FEST_SHOWPASS_ID; ?>"
        data-sp-type="event"
        data-sp-widget="true"
        style="width:100%;">
      </div>

      <!-- Fallback while widget loads -->
      <div id="sp-widget-fallback" style="padding:56px;text-align:center;">
        <div style="font-family:'Unbounded',sans-serif;font-size:11px;font-weight:700;letter-spacing:3px;text-transform:uppercase;color:rgba(255,255,255,0.15);margin-bottom:16px;">Loading Ticket Selection</div>
        <div style="width:40px;height:1px;background:rgba(255,69,0,0.4);margin:0 auto 20px;animation:spLoad 1.2s ease-in-out infinite alternate;"></div>
        <a href="https://www.showpass.com/afrobass-music-festival-2026/" target="_blank" rel="noopener"
           style="font-family:'Space Grotesk',sans-serif;font-size:11px;font-weight:600;letter-spacing:2px;text-transform:uppercase;color:#FF4500;text-decoration:none;">
          Open on Showpass &rarr;
        </a>
      </div>
    </div>
    <style>@keyframes spLoad{from{width:40px;opacity:0.3;}to{width:120px;opacity:1;}}</style>

    <script>
    /* Hide fallback once Showpass widget iframe loads */
    (function(){
      var fallback = document.getElementById('sp-widget-fallback');
      var container = document.getElementById('showpass-widget');
      if (!fallback || !container) return;
      var check = setInterval(function(){
        var iframe = container.querySelector('iframe');
        if (iframe) {
          fallback.style.display = 'none';
          clearInterval(check);
        }
      }, 400);
      /* Give up after 8 seconds — leave fallback link */
      setTimeout(function(){ clearInterval(check); }, 8000);
    })();
    </script>
  </section>

  <!-- ── EVENT DETAILS STRIP ── -->
  <div style="background:#060606;border-top:1px solid #1a1a1a;padding:48px 56px;display:grid;grid-template-columns:repeat(4,1fr);gap:2px;" class="fest-reveal">
    <?php
    $details = [
      ['Date',     'Saturday, August 15, 2026'],
      ['Venue',    'Rebel Entertainment Complex'],
      ['Address',  '11 Polson St, Toronto, ON'],
      ['Age',      '19+ Event'],
    ];
    foreach ($details as $d): ?>
      <div style="background:#0d0d0d;padding:28px 32px;">
        <div style="font-family:'Space Grotesk',sans-serif;font-size:9px;font-weight:700;letter-spacing:3px;text-transform:uppercase;color:rgba(255,255,255,0.2);margin-bottom:8px;"><?php echo esc_html($d[0]); ?></div>
        <div style="font-size:13px;color:#fff;font-weight:400;"><?php echo esc_html($d[1]); ?></div>
      </div>
    <?php endforeach; ?>
  </div>

  <!-- ── FAQ TEASER ── -->
  <div style="padding:80px 56px;border-top:1px solid #1a1a1a;display:grid;grid-template-columns:1fr 1fr;gap:80px;align-items:center;" class="fest-reveal">
    <div>
      <div class="fest-kicker">Need Help?</div>
      <h2 style="font-family:'Unbounded',sans-serif;font-size:clamp(28px,3vw,44px);font-weight:900;letter-spacing:-1px;color:#fff;text-transform:uppercase;margin-top:12px;margin-bottom:16px;">Ticket FAQs</h2>
      <p style="font-size:14px;font-weight:300;color:rgba(255,255,255,0.4);line-height:1.8;">Questions about refunds, transfers, age requirements, or what to expect? We've got you covered.</p>
    </div>
    <div style="display:flex;gap:16px;flex-wrap:wrap;">
      <a href="<?php echo esc_url(home_url('/faq')); ?>"
         class="fest-btn-primary" style="display:inline-block;">Read the FAQ &rarr;</a>
      <a href="mailto:<?php echo esc_attr($contact_email); ?>"
         style="display:inline-flex;align-items:center;font-family:'Space Grotesk',sans-serif;font-size:11px;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:rgba(255,255,255,0.35);text-decoration:none;padding:17px 32px;border:1px solid #1a1a1a;border-radius:2px;transition:color 0.2s,border-color 0.2s;"
         onmouseover="this.style.color='#fff';this.style.borderColor='#333'"
         onmouseout="this.style.color='rgba(255,255,255,0.35)';this.style.borderColor='#1a1a1a'">
        Contact Us
      </a>
    </div>
  </div>

</div>

<?php get_footer(); ?>
