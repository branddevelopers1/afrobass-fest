<?php
/**
 * Template Name: Submissions Page
 * Template Post Type: page
 */
get_header();
$email = fest_setting('fest_email') ?: 'contact@afrobassfest.com';
?>

<style>
/* ── JOIN PAGE ── */
.join-hero {
  padding: 160px 56px 80px;
  position: relative;
  overflow: hidden;
  border-bottom: 1px solid rgba(255,255,255,0.04);
}
.join-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse 60% 80% at 80% 50%, rgba(255,45,138,0.06) 0%, transparent 60%);
  pointer-events: none;
}

/* Cards */
.join-cards {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 2px;
  background: rgba(255,255,255,0.04);
  padding: 0 0 0;
}
.join-card {
  background: #080808;
  position: relative;
  overflow: hidden;
  display: flex;
  flex-direction: column;
  transition: background 0.3s;
  cursor: pointer;
  text-decoration: none;
  color: inherit;
}
.join-card:hover { background: #0a0a0a; }

/* Accent line — different color per card */
.join-card-accent {
  position: absolute;
  top: 0; left: 0; right: 0;
  height: 2px;
}

/* Card body */
.join-card-body {
  padding: 36px 40px 48px;
  display: flex;
  flex-direction: column;
  flex: 1;
}
.join-card-number {
  font-family: 'Unbounded', sans-serif;
  font-size: 10px;
  font-weight: 700;
  letter-spacing: 4px;
  text-transform: uppercase;
  color: rgba(255,255,255,0.15);
  margin-bottom: 16px;
}
.join-card-title {
  font-family: 'Unbounded', sans-serif;
  font-size: clamp(28px, 3vw, 44px);
  font-weight: 900;
  text-transform: uppercase;
  letter-spacing: -0.5px;
  line-height: 1;
  color: #fff;
  margin-bottom: 16px;
}
.join-card-desc {
  font-size: 14px;
  font-weight: 300;
  color: rgba(255,255,255,0.4);
  line-height: 1.75;
  flex: 1;
  margin-bottom: 32px;
}
.join-card-cta {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  font-family: 'Space Grotesk', sans-serif;
  font-size: 11px;
  font-weight: 700;
  letter-spacing: 2px;
  text-transform: uppercase;
  text-decoration: none;
  color: #fff;
  transition: gap 0.2s;
  border-top: 1px solid rgba(255,255,255,0.06);
  padding-top: 24px;
  margin-top: auto;
}
.join-card:hover .join-card-cta { gap: 16px; }
.join-card-cta-arrow {
  width: 32px;
  height: 32px;
  border-radius: 50%;
  border: 1px solid rgba(255,255,255,0.12);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  transition: border-color 0.2s, background 0.2s;
  font-size: 14px;
}
.join-card:hover .join-card-cta-arrow {
  border-color: rgba(255,255,255,0.3);
  background: rgba(255,255,255,0.05);
}

/* Full-width brand activation row */
.join-brand-row {
  display: grid;
  grid-template-columns: 210px 1fr auto;
  align-items: center;
  gap: 40px;
  min-height: 220px;
  padding: 44px 56px;
  border-top: 2px solid #00c2ff;
  border-bottom: 1px solid rgba(255,255,255,0.05);
  background:
    radial-gradient(circle at 82% 20%, rgba(0,194,255,0.12), transparent 32%),
    linear-gradient(110deg, rgba(255,45,138,0.08), transparent 45%),
    #080808;
  color: #fff;
  text-decoration: none;
  transition: background .25s;
}
.join-brand-row:hover {
  background:
    radial-gradient(circle at 82% 20%, rgba(0,194,255,0.18), transparent 36%),
    linear-gradient(110deg, rgba(255,45,138,0.11), transparent 48%),
    #0b0b0b;
}
.join-brand-meta {
  display: flex;
  align-items: center;
  gap: 14px;
}
.join-brand-dot {
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: #00c2ff;
  box-shadow: 0 0 18px rgba(0,194,255,.65);
}
.join-brand-meta span {
  font-family: 'Space Grotesk', sans-serif;
  font-size: 9px;
  font-weight: 700;
  letter-spacing: 3px;
  text-transform: uppercase;
  color: #00c2ff;
}
.join-brand-copy h2 {
  margin: 0 0 12px;
  font-family: 'Unbounded', sans-serif;
  font-size: clamp(28px,4vw,56px);
  font-weight: 900;
  letter-spacing: -1.5px;
  line-height: .95;
  text-transform: uppercase;
}
.join-brand-copy h2 em { color: #00c2ff; font-style: italic; }
.join-brand-copy p {
  max-width: 690px;
  margin: 0;
  color: rgba(255,255,255,.43);
  font-size: 14px;
  font-weight: 300;
  line-height: 1.75;
}
.join-brand-action {
  display: flex;
  align-items: center;
  gap: 14px;
  white-space: nowrap;
  color: #fff;
  font-family: 'Space Grotesk', sans-serif;
  font-size: 10px;
  font-weight: 700;
  letter-spacing: 2px;
  text-transform: uppercase;
}
.join-brand-arrow {
  width: 48px;
  height: 48px;
  border: 1px solid rgba(0,194,255,.35);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #00c2ff;
  font-size: 18px;
  transition: transform .2s, background .2s;
}
.join-brand-row:hover .join-brand-arrow {
  transform: translateX(4px);
  background: rgba(0,194,255,.08);
}

/* Form section */
.join-form-section {
  padding: 100px 56px;
  border-top: 1px solid rgba(255,255,255,0.04);
  display: none; /* shown via JS */
}
.join-form-section.active { display: block; }

/* Tab indicator */
.join-active-tab {
  display: inline-flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 48px;
  padding: 10px 20px;
  background: rgba(255,255,255,0.03);
  border: 1px solid rgba(255,255,255,0.06);
  border-radius: 100px;
  cursor: pointer;
  transition: border-color 0.2s;
}
.join-active-tab:hover { border-color: rgba(255,255,255,0.15); }
.join-active-tab-dot {
  width: 6px; height: 6px;
  border-radius: 50%;
}
.join-active-tab-label {
  font-family: 'Space Grotesk', sans-serif;
  font-size: 11px;
  font-weight: 600;
  letter-spacing: 2px;
  text-transform: uppercase;
  color: rgba(255,255,255,0.5);
}
.join-active-tab-close {
  font-size: 16px;
  color: rgba(255,255,255,0.3);
  margin-left: 4px;
  line-height: 1;
}

.join-form-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 80px;
  align-items: start;
  max-width: 1100px;
}
.join-form-info h2 {
  font-family: 'Unbounded', sans-serif;
  font-size: clamp(28px, 3.5vw, 52px);
  font-weight: 900;
  text-transform: uppercase;
  letter-spacing: -1px;
  line-height: 0.95;
  color: #fff;
  margin-bottom: 24px;
}
.join-form-info p {
  font-size: 14px;
  font-weight: 300;
  color: rgba(255,255,255,0.4);
  line-height: 1.8;
  margin-bottom: 32px;
}
.join-form-steps {
  display: flex;
  flex-direction: column;
  gap: 0;
}
.join-form-step {
  display: flex;
  gap: 16px;
  padding: 16px 0;
  border-bottom: 1px solid rgba(255,255,255,0.04);
  align-items: flex-start;
}
.join-form-step-num {
  width: 24px;
  height: 24px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: 'Unbounded', sans-serif;
  font-size: 10px;
  font-weight: 700;
  color: #fff;
  flex-shrink: 0;
  margin-top: 1px;
}
.join-form-step-text {
  font-size: 13px;
  color: rgba(255,255,255,0.4);
  line-height: 1.6;
}
.join-form-step-text strong { color: rgba(255,255,255,0.7); font-weight: 500; }

/* Responsive */
@media (max-width: 900px) {
  .join-cards { grid-template-columns: 1fr; }
  .join-brand-row { grid-template-columns: 1fr; gap: 24px; padding: 40px 24px; }
  .join-brand-action { justify-content: space-between; }
  .join-hero { padding: 120px 24px 60px; }
  .join-form-section { padding: 72px 24px; }
  .join-form-grid { grid-template-columns: 1fr; gap: 48px; }
}
@media (max-width: 600px) {
  .join-card-body { padding: 28px 24px 36px; }
}
</style>

<div style="padding-top:96px;">

  <!-- ── HERO ── -->
  

  <!-- ── THREE CARDS ── -->
  <div class="join-cards">

    <!-- VOLUNTEERS -->
    <div class="join-card fest-reveal" onclick="showForm('volunteer')" role="button" tabindex="0">
      <div class="join-card-accent" style="background:#a855f7;"></div>
      <div class="join-card-body">
        <div class="join-card-number">01</div>
        <div class="join-card-title">Volunteers</div>
        <div class="join-card-desc">
          Be part of the team that makes it all happen. Join the Afrobass crew, earn free fest access, and be part of history from the inside.
        </div>
        <div class="join-card-cta" style="color:#a855f7;">
          Volunteer Application
          <span class="join-card-cta-arrow" style="border-color:rgba(168,85,247,0.25);">&rarr;</span>
        </div>
      </div>
    </div>

    <!-- BRAND ACTIVATION & VENDORS -->
    <a href="<?php echo esc_url(home_url('/brand-activation')); ?>" class="join-card fest-reveal fest-d1" aria-label="Open the Brand Activation and Vendor Application">
      <div class="join-card-accent" style="background:#00c2ff;"></div>
      <div class="join-card-body">
        <div class="join-card-number">02</div>
        <div class="join-card-title">Brand Activation &amp; Vendors</div>
        <div class="join-card-desc">
          Apply for the Brand Activation District, Vendor Marketplace, sponsorship packages, food vending, or an in-kind partnership. Bring your brand to 3,000+ fest-goers.
        </div>
        <div class="join-card-cta" style="color:#00c2ff;">
          Brand Activation &amp; Vendor Application
          <span class="join-card-cta-arrow" style="border-color:rgba(0,194,255,0.25);">&rarr;</span>
        </div>
      </div>
    </a>

  </div>

  <!-- ── FORM SECTIONS (shown on card click) ── -->

  <!-- VOLUNTEER FORM -->
  <div class="join-form-section" id="form-volunteer">
    <div class="join-active-tab" onclick="hideForm('volunteer')">
      <div class="join-active-tab-dot" style="background:#a855f7;"></div>
      <span class="join-active-tab-label">Volunteer</span>
      <span class="join-active-tab-close">&times;</span>
    </div>
    <div class="join-form-grid">
      <div class="join-form-info">
        <h2>Volunteer<br><em style="color:#a855f7;font-style:italic;">Application</em></h2>
        <p>Volunteers are the backbone of every great event. Join the Afrobass crew and be part of history from the inside. Perks include free fest entry and more.</p>
        <div class="join-form-steps">
          <?php foreach([
            ['Submit your application', 'Tell us when you\'re available and what you can bring.'],
            ['We review',               'Our team reviews all volunteer applications.'],
            ['You hear from us',        'Confirmed volunteers get a full briefing before the event.'],
            ['Show up & shine',         'Arrive, contribute, and be part of an unforgettable night.'],
          ] as $i => $step): ?>
            <div class="join-form-step">
              <div class="join-form-step-num" style="background:#a855f7;"><?php echo $i+1; ?></div>
              <div class="join-form-step-text"><strong><?php echo esc_html($step[0]); ?></strong><br><?php echo esc_html($step[1]); ?></div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      <form class="sub-form-el" data-type="volunteer" novalidate style="display:flex;flex-direction:column;gap:24px;">
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:24px;">
          <div class="fform-field"><input type="text" name="full_name" placeholder=" " required><label>Full Name *</label></div>
          <div class="fform-field"><input type="tel" name="phone" placeholder=" "><label>Phone</label></div>
        </div>
        <div class="fform-field"><input type="email" name="email" placeholder=" " required><label>Email *</label></div>
        <div class="fform-field">
          <select name="availability" style="width:100%;background:transparent;border:none;border-bottom:1px solid rgba(255,255,255,0.08);color:rgba(255,255,255,0.5);font-size:15px;padding:20px 0 14px;outline:none;appearance:none;font-family:'Space Grotesk',sans-serif;">
            <option value="" disabled selected>Your availability *</option>
            <option value="Day of event only">Day of event only (August 15)</option>
            <option value="Setup + event day">Setup day(s) + event day</option>
            <option value="Full weekend">Full weekend including teardown</option>
            <option value="Flexible">Flexible — wherever needed</option>
          </select>
        </div>
        <div class="fform-field">
          <select name="volunteer_area" style="width:100%;background:transparent;border:none;border-bottom:1px solid rgba(255,255,255,0.08);color:rgba(255,255,255,0.5);font-size:15px;padding:20px 0 14px;outline:none;appearance:none;font-family:'Space Grotesk',sans-serif;">
            <option value="" disabled selected>Preferred area</option>
            <option value="Entry & Ticketing">Entry &amp; Ticketing</option>
            <option value="Stage Crew">Stage Crew</option>
            <option value="Guest Services">Guest Services</option>
            <option value="Social Media">Social Media &amp; Content</option>
            <option value="Vendor Coordination">Vendor Coordination</option>
            <option value="General">General / Wherever needed</option>
          </select>
        </div>
        <div class="fform-field">
          <textarea name="skills" placeholder=" " rows="3" style="width:100%;background:transparent;border:none;border-bottom:1px solid rgba(255,255,255,0.08);color:#fff;font-size:15px;padding:20px 0 14px;outline:none;resize:none;font-family:'Space Grotesk',sans-serif;"></textarea>
          <label>Relevant skills or experience</label>
        </div>
        <div class="fform-field">
          <textarea name="message" placeholder=" " rows="2" style="width:100%;background:transparent;border:none;border-bottom:1px solid rgba(255,255,255,0.08);color:#fff;font-size:15px;padding:20px 0 14px;outline:none;resize:none;font-family:'Space Grotesk',sans-serif;"></textarea>
          <label>Why do you want to volunteer?</label>
        </div>
        <input type="hidden" name="submission_type" value="volunteer">
        <input type="text" name="website" style="display:none;position:absolute;left:-9999px;" tabindex="-1" autocomplete="off">
        <button type="submit" class="sub-submit" style="font-family:'Unbounded',sans-serif;font-size:11px;font-weight:700;letter-spacing:2px;text-transform:uppercase;background:#a855f7;color:#fff;border:none;padding:18px 48px;border-radius:100px;cursor:pointer;transition:box-shadow 0.2s;" onmouseover="this.style.boxShadow='0 8px 32px rgba(168,85,247,0.4)'" onmouseout="this.style.boxShadow='none'">
          Submit Application &rarr;
        </button>
        <div class="sub-msg" style="font-size:13px;display:none;margin-top:8px;"></div>
      </form>
    </div>
  </div>

</div>

<script>
var ajaxUrl = '<?php echo esc_js(admin_url("admin-ajax.php")); ?>';
var nonce   = '<?php echo wp_create_nonce("fest_nonce"); ?>';

function showForm(type) {
  /* Hide all forms */
  document.querySelectorAll('.join-form-section').forEach(function(s){ s.classList.remove('active'); });
  /* Show selected */
  var el = document.getElementById('form-' + type);
  if (el) {
    el.classList.add('active');
    setTimeout(function(){
      el.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }, 50);
  }
}

function hideForm(type) {
  var el = document.getElementById('form-' + type);
  if (el) el.classList.remove('active');
  /* Scroll back up to cards */
  document.querySelector('.join-cards').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

/* Keyboard accessibility for cards */
document.querySelectorAll('.join-card').forEach(function(card){
  card.addEventListener('keydown', function(e){
    if (e.key === 'Enter' || e.key === ' ') { card.click(); e.preventDefault(); }
  });
});

/* Form submissions */
document.querySelectorAll('.sub-form-el').forEach(function(form){
  form.addEventListener('submit', function(e){
    e.preventDefault();
    var btn  = form.querySelector('.sub-submit');
    var msg  = form.querySelector('.sub-msg');
    var type = form.dataset.type;
    var emailEl = form.querySelector('[name="email"]');

    if (!emailEl || !emailEl.value || !/\S+@\S+\.\S+/.test(emailEl.value)){
      msg.style.display = 'block'; msg.style.color = '#ff4444';
      msg.textContent = 'Please enter a valid email address.';
      return;
    }

    var originalText = btn.textContent;
    btn.textContent = 'Submitting...'; btn.disabled = true;

    var data = new FormData(form);
    data.set('action', 'fest_submission');
    data.set('nonce', nonce);
    data.set('submission_type', type);

    fetch(ajaxUrl, { method: 'POST', body: data })
      .then(function(res){ return res.json(); })
      .then(function(json){
        msg.style.display = 'block';
        msg.style.color = json.success ? '#00e87a' : '#ff4444';
        msg.textContent = json.data;
        if (json.success) form.reset();
      })
      .catch(function(){
        msg.style.display = 'block'; msg.style.color = '#ff4444';
        msg.textContent = 'Something went wrong. Please email <?php echo esc_js($email); ?>';
      })
      .finally(function(){
        btn.textContent = originalText; btn.disabled = false;
      });
  });
});
</script>

<?php get_footer(); ?>
