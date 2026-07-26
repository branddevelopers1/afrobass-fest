<?php
/**
 * Template Name: Tickets Page
 * Template Post Type: page
 */
get_header();
$contact_email    = fest_setting('fest_email')            ?: 'contact@afrobassfest.com';
$day1_ticket_url  = fest_setting('fest_ticket_url')       ?: 'https://show.ps/l/581f9fa7/';
$day2_ticket_url  = fest_setting('fest_day2_ticket_url')  ?: 'https://show.ps/l/0c3f4a74/';
$table_ticket_url = fest_setting('fest_table_ticket_url') ?: 'https://buy.tablelist.com/e/dc29c65de8a48aa2?at=61c5de745e73f315';

$prices = [
    'day1' => [
        'ga'    => fest_setting('fest_day1_ga_price')  ?: '$70 + applicable fees',
        'vip'   => fest_setting('fest_day1_vip_price') ?: 'Sold Out',
        'table' => fest_setting('fest_day1_table_price') ?: 'TBA',
        'crew'  => fest_setting('fest_day1_crew_price') ?: '$200',
    ],
    'day2' => [
        'ga'    => fest_setting('fest_day2_ga_price')    ?: '$40 + applicable fees',
        'vip'   => fest_setting('fest_day2_vip_price')   ?: 'TBA',
        'table' => fest_setting('fest_day2_table_price') ?: '$750',
        'crew'  => fest_setting('fest_day2_crew_price') ?: '$140',
    ],
];

$days_meta = [
  'day1' => ['label' => 'Day 1', 'name' => "Obi's House + Victony + The Cavemen. + & More!", 'date' => 'Aug 15', 'full_date' => 'Saturday, August 15', 'hours' => '8pm - 3am', 'venue' => 'Rebel Entertainment Complex', 'color' => '#FF4500'],
  'day2' => ['label' => 'Day 2', 'name' => 'Day Party w/ DBN Gogo',              'date' => 'Aug 16', 'full_date' => 'Sunday, August 16',   'hours' => '5pm - 11pm', 'venue' => 'Acqua Supper Club',           'color' => '#FF2D8A'],
];
$ticket_days = [
  'day1',
  'day2',
];
?>

<main class="fest-tickets-page">

  <section class="fest-ticket-hero">
    <div>
      <div class="fest-kicker">Tickets</div>
      <h1>Choose Your Night</h1>
      <p>Two Afrobass experiences across one weekend in Toronto. Lock in the day, vibe, and access level that fits your crew.</p>
    </div>
    <div class="fest-ticket-hero-card fest-reveal">
      <span>Weekend Dates</span>
      <strong>Aug 15-16, 2026</strong>
      <em>Toronto, Canada</em>
    </div>
  </section>

  <section class="fest-tickets-section" aria-label="Ticket tiers">

    <?php foreach ($ticket_days as $day_key):
      $dm      = $days_meta[$day_key];
      $is_day_party = ($day_key === 'day2');
      $day_url = $day_key === 'day1' ? $day1_ticket_url : $day2_ticket_url;
    ?>
    <div class="fest-ticket-day-section" data-day="<?php echo esc_attr($day_key); ?>">

      <div class="fest-ticket-day-card fest-reveal" style="--day-color: <?php echo esc_attr($dm['color']); ?>;">
        <div>
          <span class="fest-ticket-day-label"><?php echo esc_html($dm['label']); ?></span>
          <h2><?php echo esc_html($dm['name']); ?></h2>
        </div>
        <div class="fest-ticket-day-meta">
          <span><?php echo esc_html($dm['full_date']); ?></span>
          <span><?php echo esc_html($dm['hours']); ?></span>
          <span><?php echo esc_html($dm['venue']); ?>, Toronto</span>
        </div>
      </div>

      <div class="fest-tickets-grid">

        <!-- General Admission -->
        <div class="fest-ticket-tier fest-reveal">
          <span class="fest-tier-badge">General</span>
          <div class="fest-tier-name">General Admission</div>
          <div class="fest-tier-price">
            <strong><?php echo esc_html($prices[$day_key]['ga']); ?></strong>
          </div>
          <div class="fest-tier-desc"><?php echo $is_day_party ? 'Full access to the day party, all performances, and vendor areas.' : 'Full access to the fest grounds, all performances, and vendor areas.'; ?></div>
          <div class="fest-tier-perks">
            <div class="fest-tier-perk"><div class="fest-tier-perk-dot"></div>All performances &mdash; <?php echo $is_day_party ? '5pm to 11pm' : 'full night'; ?></div>
            <div class="fest-tier-perk"><div class="fest-tier-perk-dot"></div>General standing floor</div>
            <div class="fest-tier-perk"><div class="fest-tier-perk-dot"></div>Food &amp; vendor access</div>
            <div class="fest-tier-perk"><div class="fest-tier-perk-dot"></div>19+ valid ID required</div>
          </div>
          <?php if ($day_url): ?>
          <a href="<?php echo esc_url($day_url); ?>"
             class="fest-tier-btn fest-tier-btn-outline">
            Buy Tickets &rarr;
          </a>
          <?php else: ?>
          <div class="fest-tier-btn fest-tier-btn-outline fest-tier-btn-disabled">Tickets Coming Soon</div>
          <?php endif; ?>
        </div>

        <!-- The Crew Package -->
        <div class="fest-ticket-tier fest-reveal">
          <span class="fest-tier-badge">Groups</span>
          <div class="fest-tier-name">The Crew Package</div>
          <div class="fest-tier-price">
            <strong><?php echo esc_html($prices[$day_key]['crew']); ?></strong>
          </div>
          <div class="fest-tier-desc">4 General Admission tickets for <?php echo esc_html($days_meta[$day_key]['label']); ?> at a discounted group rate. Roll deep with the crew.</div>
          <div class="fest-tier-perks">
            <div class="fest-tier-perk"><div class="fest-tier-perk-dot"></div>4 General Admission tickets</div>
            <div class="fest-tier-perk"><div class="fest-tier-perk-dot"></div>Discounted vs. buying individually</div>
            <div class="fest-tier-perk"><div class="fest-tier-perk-dot"></div>All performances &amp; vendor access</div>
            <div class="fest-tier-perk"><div class="fest-tier-perk-dot"></div>19+ valid ID required</div>
          </div>
          <?php if ($day_url): ?>
          <a href="<?php echo esc_url($day_url); ?>"
             class="fest-tier-btn fest-tier-btn-outline">
            Buy Tickets &rarr;
          </a>
          <?php else: ?>
          <div class="fest-tier-btn fest-tier-btn-outline fest-tier-btn-disabled">Tickets Coming Soon</div>
          <?php endif; ?>
        </div>
        <?php if ($day_key === 'day1'): ?>
        <div class="fest-ticket-tier featured fest-reveal">
          <span class="fest-tier-badge">Most Popular</span>
          <div class="fest-tier-name">VIP Experience</div>
          <div class="fest-tier-price">
            <strong><?php echo esc_html($prices[$day_key]['vip']); ?></strong>
          </div>
          <div class="fest-tier-desc">Premium access with exclusive areas, dedicated bar, and priority entry.</div>
          <div class="fest-tier-perks">
            <div class="fest-tier-perk"><div class="fest-tier-perk-dot"></div>Everything in General Admission</div>
            <div class="fest-tier-perk"><div class="fest-tier-perk-dot"></div>Dedicated VIP area &amp; bar</div>
            <div class="fest-tier-perk"><div class="fest-tier-perk-dot"></div>Priority entry &mdash; skip the line</div>
            <div class="fest-tier-perk"><div class="fest-tier-perk-dot"></div>Exclusive VIP lounge access</div>
          </div>
          <?php if (stripos($prices[$day_key]['vip'], 'sold') !== false): ?>
          <div class="fest-tier-btn fest-tier-btn-fill fest-tier-btn-disabled">Sold Out</div>
          <?php elseif ($day_url): ?>
          <a href="<?php echo esc_url($day_url); ?>"
             class="fest-tier-btn fest-tier-btn-fill">
            Buy Tickets &rarr;
          </a>
          <?php else: ?>
          <div class="fest-tier-btn fest-tier-btn-fill fest-tier-btn-disabled">Tickets Coming Soon</div>
          <?php endif; ?>
        </div>
        <?php endif; ?>

        <!-- Table Package -->
        <div class="fest-ticket-tier fest-reveal">
          <span class="fest-tier-badge">Groups</span>
          <div class="fest-tier-name">Table Package</div>
          <div class="fest-tier-price"><?php echo esc_html($prices[$day_key]['table']); ?></div>
          <div class="fest-tier-desc"><?php echo $day_key === 'day2' ? 'Reserved table for 5 guests. $150 deposit, $600 minimum bottle spend. Bottle service and a dedicated host included.' : 'Reserved table for your group with bottle service and a dedicated host.'; ?></div>
          <div class="fest-tier-perks">
            <div class="fest-tier-perk"><div class="fest-tier-perk-dot"></div><?php echo $day_key === 'day2' ? 'Table for 5 guests' : 'Table for 6&ndash;10 guests'; ?></div>
            <div class="fest-tier-perk"><div class="fest-tier-perk-dot"></div>Bottle service included</div>
            <div class="fest-tier-perk"><div class="fest-tier-perk-dot"></div>Dedicated event host</div>
            <div class="fest-tier-perk"><div class="fest-tier-perk-dot"></div>Best views of the stage</div>
          </div>
          <?php if ($day_key !== 'day2'): // remove this condition when Day 2 table link is ready ?>
          <a href="<?php echo esc_url($table_ticket_url); ?>"
             class="fest-tier-btn fest-tier-btn-outline">
            Reserve &rarr;
          </a>
          <?php else: ?>
          <div class="fest-tier-btn fest-tier-btn-outline fest-tier-btn-disabled">Tables Coming Soon</div>
          <?php endif; ?>
        </div>

      </div>
    </div>
    <?php endforeach; ?>

  </section>

  <section class="fest-ticket-info-strip fest-reveal" aria-label="Event information">
    <?php foreach([
      ['Dates',      'Aug 15-16, 2026'],
      ['Day 1 Venue', 'Rebel Entertainment Complex'],
      ['Day 2 Venue', 'Acqua Supper Club - 50 Prince Edward Island Crescent, Toronto, ON M6K 3C3'],
      ['Age',         '19+ Valid ID Required'],
    ] as $d): ?>
      <div>
        <span><?php echo esc_html($d[0]); ?></span>
        <strong><?php echo esc_html($d[1]); ?></strong>
      </div>
    <?php endforeach; ?>
  </section>

  <section class="fest-ticket-help fest-reveal">
    <div>
      <div class="fest-kicker">Need Help?</div>
      <h2>Ticket FAQs</h2>
      <p>Questions about refunds, transfers, age requirements, or what's included? We have answers.</p>
    </div>
    <div class="fest-ticket-help-actions">
      <a href="<?php echo esc_url(home_url('/faq')); ?>" class="fest-btn-primary">Read the FAQ &rarr;</a>
      <a href="mailto:<?php echo esc_attr($contact_email); ?>"
         class="fest-ticket-contact">
        Contact Us
      </a>
    </div>
  </section>

</main>

<?php get_footer(); ?>
