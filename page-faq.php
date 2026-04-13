<?php
/**
 * Template Name: FAQ Page
 * Template Post Type: page
 */
get_header();
$email      = fest_setting('fest_email') ?: 'contact@afrobassfestival.com';
$ticket_url = fest_setting('fest_ticket_url') ?: home_url('/tickets');

$faqs = [
  'Tickets & Entry' => [
    [
      'q' => 'When do tickets go on sale?',
      'a' => 'Ticket on-sale dates will be announced via our email list and social media channels first. Sign up on our homepage to get early access before the public sale.'
    ],
    [
      'q' => 'What ticket types are available?',
      'a' => 'We offer General Admission, VIP Experience, and Table Packages. General Admission gives you full access to the festival floor and all performances. VIP includes priority entry, a dedicated VIP area and bar, and exclusive lounge access. Table Packages include a reserved table for 6–10 guests with bottle service.'
    ],
    [
      'q' => 'Is there an age requirement?',
      'a' => 'Yes — Afrobass Music Festival is a 19+ event. Valid government-issued photo ID is required for entry. No exceptions.'
    ],
    [
      'q' => 'Can I get a refund on my ticket?',
      'a' => 'All ticket sales are final. Tickets are non-refundable but may be transferable. Please check the specific terms and conditions at the time of purchase from our ticketing provider.'
    ],
    [
      'q' => 'Will tickets be available at the door?',
      'a' => 'We strongly recommend purchasing tickets in advance as the event may sell out. Limited tickets may be available at the door, but this is not guaranteed.'
    ],
  ],
  'The Event' => [
    [
      'q' => 'When and where is Afrobass Music Festival?',
      'a' => 'Afrobass Music Festival takes place on Saturday, August 15, 2026 at Rebel Entertainment Complex, 11 Polson St, Toronto, Ontario.'
    ],
    [
      'q' => 'What time do doors open?',
      'a' => 'Door opening times will be confirmed closer to the event date. Follow us on Instagram @afrobass.ca or sign up to our mailing list for the latest updates.'
    ],
    [
      'q' => 'Who is performing?',
      'a' => 'The full lineup will be announced in stages on our Lineup page and via our social channels. Our confirmed headliners are Tion Wayne, Zaylevelten, and Jeleel, with additional artists to be announced.'
    ],
    [
      'q' => 'What genres of music will be played?',
      'a' => 'Afrobass Music Festival celebrates Afrobeats, Amapiano, and Afro-Caribbean music — the sounds shaping global culture right now. Expect an electrifying mix of live performances and DJ sets across all three genres.'
    ],
    [
      'q' => 'How many stages are there?',
      'a' => 'This is a single-stage, single-night experience. One stage, all night — no split decisions, no FOMO. Every artist performs for the full crowd.'
    ],
  ],
  'Venue & Getting There' => [
    [
      'q' => 'Where is Rebel Entertainment Complex?',
      'a' => 'Rebel Entertainment Complex is located at 11 Polson St, Toronto, ON M5A 1A4 — on the waterfront in the Port Lands area. It\'s one of Toronto\'s most iconic live event venues.'
    ],
    [
      'q' => 'Is there parking at the venue?',
      'a' => 'Parking details will be confirmed closer to the event. We recommend taking public transit or rideshare. The venue is accessible via TTC and within rideshare range of downtown Toronto.'
    ],
    [
      'q' => 'Is the venue accessible?',
      'a' => 'Rebel Entertainment Complex is an accessible venue. If you have specific accessibility requirements, please contact us at ' . $email . ' ahead of the event and we\'ll do our best to accommodate you.'
    ],
  ],
  'Vendors & Sponsors' => [
    [
      'q' => 'How do I become a vendor at the festival?',
      'a' => 'We welcome food, beverage, merchandise, and lifestyle vendors. Submit your application through our Submissions page and our team will review it and be in touch.'
    ],
    [
      'q' => 'How do I become a sponsor?',
      'a' => 'We offer Platinum, Gold, Silver, Bronze, and In-Kind sponsorship packages. Visit our Sponsorship page for full details, or email us directly at ' . $email . ' to discuss a custom partnership.'
    ],
  ],
  'Artists & Performers' => [
    [
      'q' => 'How can I apply to perform at Afrobass Music Festival?',
      'a' => 'Artists can submit a performance application through our Submissions page. Include links to your music, social media, and a brief bio. We review all submissions and will reach out if there\'s a fit.'
    ],
    [
      'q' => 'I\'m a DJ — can I apply to play?',
      'a' => 'Absolutely. We welcome DJ set applications. Use the Artist submission form on our Submissions page and select "DJ Set" as your role. Include links to mixes or sets you\'ve performed.'
    ],
  ],
  'Press & Media' => [
    [
      'q' => 'How do I apply for press credentials?',
      'a' => 'Media enquiries and press accreditation requests can be sent to ' . $email . ' with the subject line "Press Enquiry — Afrobass Fest 2026". Please include your publication, outlet, or platform details.'
    ],
  ],
];
?>

<div style="padding-top:72px;">

  <!-- Hero -->
  <div class="fest-lineup-hero">
    <div class="fest-kicker fest-reveal">Afrobass Music Festival 2026</div>
    <h1 class="fest-title fest-reveal" style="margin-bottom:20px;">Frequently<br>Asked<br>Questions</h1>
    <p style="font-size:16px;font-weight:300;color:rgba(255,255,255,0.4);max-width:480px;line-height:1.7;" class="fest-reveal">
      Everything you need to know about Afrobass Music Festival. Can't find your answer? <a href="mailto:<?php echo esc_attr($email); ?>" style="color:#FF4500;text-decoration:none;">Email us directly</a>.
    </p>
  </div>

  <!-- FAQ Content -->
  <section style="padding:0 56px 120px;display:grid;grid-template-columns:280px 1fr;gap:80px;align-items:start;">

    <!-- Sticky sidebar nav -->
    <div style="position:sticky;top:100px;" class="fest-reveal">
      <div style="font-family:'Barlow Condensed',sans-serif;font-size:10px;font-weight:700;letter-spacing:3px;text-transform:uppercase;color:rgba(255,255,255,0.25);margin-bottom:20px;">Categories</div>
      <nav style="display:flex;flex-direction:column;gap:2px;" id="faq-nav">
        <?php foreach (array_keys($faqs) as $i => $cat): ?>
          <a href="#faq-<?php echo esc_attr(sanitize_title($cat)); ?>"
             style="font-family:'Barlow Condensed',sans-serif;font-size:13px;font-weight:600;letter-spacing:1px;color:rgba(255,255,255,0.3);text-decoration:none;padding:12px 0;border-bottom:1px solid #111;transition:color 0.2s;display:flex;align-items:center;gap:10px;"
             onmouseover="this.style.color='#fff'" onmouseout="this.style.color='rgba(255,255,255,0.3)'">
            <span style="color:#FF4500;font-size:10px;">→</span>
            <?php echo esc_html($cat); ?>
          </a>
        <?php endforeach; ?>
      </nav>

      <!-- CTA -->
      <div style="margin-top:40px;padding:28px;background:#0d0d0d;border:1px solid #1a1a1a;">
        <div style="font-size:12px;font-weight:300;color:rgba(255,255,255,0.35);line-height:1.7;margin-bottom:16px;">Still have a question? Our team is happy to help.</div>
        <a href="<?php echo esc_url(home_url('/contact')); ?>"
           style="font-family:'Barlow Condensed',sans-serif;font-size:11px;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:#FF4500;text-decoration:none;display:flex;align-items:center;gap:8px;transition:gap 0.2s;"
           onmouseover="this.style.gap='14px'" onmouseout="this.style.gap='8px'">
          Contact Us <span>→</span>
        </a>
      </div>
    </div>

    <!-- FAQ sections -->
    <div style="padding-top:0;">
      <?php foreach ($faqs as $category => $questions): ?>
        <div id="faq-<?php echo esc_attr(sanitize_title($category)); ?>" style="margin-bottom:72px;" class="fest-reveal">

          <div style="display:flex;align-items:center;gap:20px;margin-bottom:32px;padding-bottom:20px;border-bottom:1px solid #1a1a1a;">
            <div style="width:3px;height:28px;background:#FF4500;border-radius:1px;flex-shrink:0;"></div>
            <h2 style="font-family:'Bebas Neue',sans-serif;font-size:28px;letter-spacing:2px;color:#fff;text-transform:uppercase;"><?php echo esc_html($category); ?></h2>
          </div>

          <div style="display:flex;flex-direction:column;gap:2px;" class="faq-group">
            <?php foreach ($questions as $faq): ?>
              <div class="faq-item" style="background:#0d0d0d;border:1px solid #111;overflow:hidden;">
                <button class="faq-trigger"
                        style="width:100%;text-align:left;background:transparent;border:none;padding:24px 28px;display:flex;justify-content:space-between;align-items:center;gap:20px;cursor:none;"
                        aria-expanded="false">
                  <span style="font-family:'Barlow Condensed',sans-serif;font-size:16px;font-weight:700;letter-spacing:0.5px;color:#fff;line-height:1.3;">
                    <?php echo esc_html($faq['q']); ?>
                  </span>
                  <span class="faq-icon" style="width:24px;height:24px;border:1px solid #1a1a1a;border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:14px;color:rgba(255,255,255,0.4);transition:transform 0.3s,border-color 0.2s;">+</span>
                </button>
                <div class="faq-answer" style="max-height:0;overflow:hidden;transition:max-height 0.4s cubic-bezier(0.16,1,0.3,1);">
                  <div style="padding:0 28px 24px;font-size:14px;font-weight:300;color:rgba(255,255,255,0.5);line-height:1.8;border-top:1px solid #111;">
                    <div style="padding-top:20px;"><?php echo nl2br(esc_html($faq['a'])); ?></div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>

        </div>
      <?php endforeach; ?>

      <!-- Still have questions -->
      <div style="background:#0d0d0d;border:1px solid #1a1a1a;padding:48px;display:grid;grid-template-columns:1fr auto;gap:40px;align-items:center;" class="fest-reveal">
        <div>
          <h3 style="font-family:'Bebas Neue',sans-serif;font-size:32px;letter-spacing:2px;color:#fff;text-transform:uppercase;margin-bottom:8px;">Still Have Questions?</h3>
          <p style="font-size:14px;font-weight:300;color:rgba(255,255,255,0.4);">Our team is available to help. Drop us a message and we'll get back to you.</p>
        </div>
        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="fest-btn-primary" style="display:inline-block;white-space:nowrap;">
          Contact Us →
        </a>
      </div>

    </div>

  </section>

</div>

<script>
(function(){
  // FAQ accordion
  document.querySelectorAll('.faq-trigger').forEach(function(btn){
    btn.addEventListener('click', function(){
      var item    = btn.closest('.faq-item');
      var answer  = item.querySelector('.faq-answer');
      var icon    = btn.querySelector('.faq-icon');
      var open    = btn.getAttribute('aria-expanded') === 'true';

      // Close all in group
      var group = item.closest('.faq-group');
      group.querySelectorAll('.faq-item').forEach(function(i){
        i.querySelector('.faq-trigger').setAttribute('aria-expanded','false');
        i.querySelector('.faq-answer').style.maxHeight = '0';
        i.querySelector('.faq-icon').textContent = '+';
        i.querySelector('.faq-icon').style.transform = 'none';
        i.querySelector('.faq-icon').style.borderColor = '#1a1a1a';
        i.querySelector('.faq-icon').style.color = 'rgba(255,255,255,0.4)';
        i.style.borderColor = '#111';
      });

      if (!open) {
        btn.setAttribute('aria-expanded','true');
        answer.style.maxHeight = answer.scrollHeight + 'px';
        icon.textContent = '–';
        icon.style.transform = 'rotate(0deg)';
        icon.style.borderColor = '#FF4500';
        icon.style.color = '#FF4500';
        item.style.borderColor = '#1a1a1a';
      }
    });
  });
})();
</script>

<?php get_footer(); ?>
