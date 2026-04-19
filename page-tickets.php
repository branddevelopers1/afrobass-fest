<?php
/**
 * Template Name: Tickets Page
 * Template Post Type: page
 */
get_header();
$contact_email = fest_setting('fest_email')       ?: 'contact@afrobassfestival.com';
$day1_slug     = fest_setting('fest_day1_slug')   ?: 'afrobass-festival-day1';
$day2_slug     = fest_setting('fest_day2_slug')   ?: '';

$prices = [
    'day1' => [
        'ga'    => fest_setting('fest_day1_ga_price')    ?: 'TBA',
        'vip'   => fest_setting('fest_day1_vip_price')   ?: 'TBA',
        'table' => fest_setting('fest_day1_table_price') ?: 'TBA',
    ],
    'day2' => [
        'ga'    => fest_setting('fest_day2_ga_price')    ?: 'TBA',
        'vip'   => fest_setting('fest_day2_vip_price')   ?: 'TBA',
        'table' => fest_setting('fest_day2_table_price') ?: 'TBA',
    ],
];

$ticket_days = [['day1', $day1_slug, true]];
if ($day2_slug) $ticket_days[] = ['day2', $day2_slug, false];
?>

<div style="padding-top:96px;">

  <!-- ── TICKET TIERS ── -->
  <section class="fest-tickets-section">

    <?php if ($day2_slug): ?>
    <div class="fday-tabs" style="margin-bottom:40px;">
      <button class="fday-tab fday-tab--active" data-day="day1">Day 1 <span>Aug 15</span></button>
      <button class="fday-tab" data-day="day2">Day 2 <span>Aug 16</span></button>
    </div>
    <?php endif; ?>

    <?php foreach ($ticket_days as [$day_key, $slug, $is_active]): ?>
    <div class="fday-panel<?php echo $is_active ? ' fday-panel--active' : ''; ?>" data-day="<?php echo esc_attr($day_key); ?>">
      <div class="fest-tickets-grid">

        <!-- General Admission -->
        <div class="fest-ticket-tier fest-reveal">
          <span class="fest-tier-badge">General</span>
          <div class="fest-tier-name">General Admission</div>
          <div class="fest-tier-price"><?php echo esc_html($prices[$day_key]['ga']); ?></div>
          <div class="fest-tier-desc">Full access to the festival grounds, all performances, and vendor areas.</div>
          <div class="fest-tier-perks">
            <div class="fest-tier-perk"><div class="fest-tier-perk-dot"></div>All performances &mdash; full night</div>
            <div class="fest-tier-perk"><div class="fest-tier-perk-dot"></div>General standing floor</div>
            <div class="fest-tier-perk"><div class="fest-tier-perk-dot"></div>Food &amp; vendor access</div>
            <div class="fest-tier-perk"><div class="fest-tier-perk-dot"></div>19+ valid ID required</div>
          </div>
          <button onclick="showpass.tickets.eventPurchaseWidget('<?php echo esc_js($slug); ?>', {'theme-primary': '#FF2D8A', 'keep-shopping': false})"
             class="fest-tier-btn fest-tier-btn-outline" style="display:block;width:100%;text-align:center;border:1px solid rgba(255,255,255,0.15);background:transparent;cursor:pointer;">
            Buy Tickets &rarr;
          </button>
        </div>

        <!-- VIP -->
        <div class="fest-ticket-tier featured fest-reveal">
          <span class="fest-tier-badge">Most Popular</span>
          <div class="fest-tier-name">VIP Experience</div>
          <div class="fest-tier-price"><?php echo esc_html($prices[$day_key]['vip']); ?></div>
          <div class="fest-tier-desc">Premium access with exclusive areas, dedicated bar, and priority entry.</div>
          <div class="fest-tier-perks">
            <div class="fest-tier-perk"><div class="fest-tier-perk-dot"></div>Everything in General Admission</div>
            <div class="fest-tier-perk"><div class="fest-tier-perk-dot"></div>Dedicated VIP area &amp; bar</div>
            <div class="fest-tier-perk"><div class="fest-tier-perk-dot"></div>Priority entry &mdash; skip the line</div>
            <div class="fest-tier-perk"><div class="fest-tier-perk-dot"></div>Exclusive VIP lounge access</div>
          </div>
          <button onclick="showpass.tickets.eventPurchaseWidget('<?php echo esc_js($slug); ?>', {'theme-primary': '#FF2D8A', 'keep-shopping': false})"
             class="fest-tier-btn fest-tier-btn-fill" style="display:block;width:100%;text-align:center;border:none;cursor:pointer;">
            Buy Tickets &rarr;
          </button>
        </div>

        <!-- Table Package -->
        <div class="fest-ticket-tier fest-reveal">
          <span class="fest-tier-badge">Groups</span>
          <div class="fest-tier-name">Table Package</div>
          <div class="fest-tier-price"><?php echo esc_html($prices[$day_key]['table']); ?></div>
          <div class="fest-tier-desc">Reserved table for your group with bottle service and a dedicated host.</div>
          <div class="fest-tier-perks">
            <div class="fest-tier-perk"><div class="fest-tier-perk-dot"></div>Table for 6&ndash;10 guests</div>
            <div class="fest-tier-perk"><div class="fest-tier-perk-dot"></div>Bottle service included</div>
            <div class="fest-tier-perk"><div class="fest-tier-perk-dot"></div>Dedicated event host</div>
            <div class="fest-tier-perk"><div class="fest-tier-perk-dot"></div>Best views of the stage</div>
          </div>
          <a href="mailto:<?php echo esc_attr($contact_email); ?>?subject=Table Package Enquiry — Afrobass Fest 2026"
             class="fest-tier-btn fest-tier-btn-outline" style="display:block;text-align:center;">
            Enquire &rarr;
          </a>
        </div>

      </div>
    </div>
    <?php endforeach; ?>

  </section>

  <!-- ── EVENT INFO STRIP ── -->
  <div style="border-top:1px solid rgba(255,255,255,0.04);display:grid;grid-template-columns:repeat(4,1fr);gap:2px;background:rgba(255,255,255,0.04);margin-top:80px;" class="fest-reveal">
    <?php foreach([
      ['Date',    $day2_slug ? 'Aug 15–16, 2026' : 'Saturday, August 15, 2026'],
      ['Venue',   'Rebel Entertainment Complex'],
      ['Address', '11 Polson St, Toronto, ON'],
      ['Age',     '19+ Valid ID Required'],
    ] as $d): ?>
      <div style="background:#080808;padding:28px 32px;">
        <div style="font-family:'Space Grotesk',sans-serif;font-size:9px;font-weight:700;letter-spacing:3px;text-transform:uppercase;color:rgba(255,255,255,0.2);margin-bottom:8px;"><?php echo esc_html($d[0]); ?></div>
        <div style="font-size:13px;color:rgba(255,255,255,0.65);"><?php echo esc_html($d[1]); ?></div>
      </div>
    <?php endforeach; ?>
  </div>

  <!-- ── FAQ CTA ── -->
  <div style="padding:80px 56px;border-top:1px solid rgba(255,255,255,0.04);display:grid;grid-template-columns:1fr 1fr;gap:80px;align-items:center;" class="fest-reveal">
    <div>
      <div class="fest-kicker">Need Help?</div>
      <h2 style="font-family:'Unbounded',sans-serif;font-size:clamp(28px,3vw,44px);font-weight:900;letter-spacing:-1px;color:#fff;text-transform:uppercase;margin-top:12px;margin-bottom:16px;">Ticket FAQs</h2>
      <p style="font-size:14px;font-weight:300;color:rgba(255,255,255,0.4);line-height:1.8;">Questions about refunds, transfers, age requirements, or what's included? We have answers.</p>
    </div>
    <div style="display:flex;gap:16px;flex-wrap:wrap;">
      <a href="<?php echo esc_url(home_url('/faq')); ?>" class="fest-btn-primary" style="display:inline-block;">Read the FAQ &rarr;</a>
      <a href="mailto:<?php echo esc_attr($contact_email); ?>"
         style="display:inline-flex;align-items:center;font-family:'Space Grotesk',sans-serif;font-size:11px;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:rgba(255,255,255,0.35);text-decoration:none;padding:17px 32px;border:1px solid rgba(255,255,255,0.08);border-radius:2px;transition:color 0.2s,border-color 0.2s;"
         onmouseover="this.style.color='#fff';this.style.borderColor='rgba(255,255,255,0.2)'"
         onmouseout="this.style.color='rgba(255,255,255,0.35)';this.style.borderColor='rgba(255,255,255,0.08)'">
        Contact Us
      </a>
    </div>
  </div>

</div>

<?php get_footer(); ?>
