<?php
/**
 * Template Name: Brand Activation Application
 * Template Post Type: page
 */
get_header();
$email = fest_setting('fest_email') ?: 'contact@afrobassfest.com';
?>

<style>
.activation-page { padding-top:96px; position:relative; z-index:2; }
.activation-hero {
  padding:112px 56px 80px;
  border-bottom:1px solid rgba(255,255,255,.05);
  background:
    radial-gradient(circle at 82% 20%, rgba(255,45,138,.17), transparent 32%),
    linear-gradient(125deg, rgba(255,69,0,.13), transparent 42%),
    #080808;
}
.activation-wrap { width:min(1180px,100%); margin:0 auto; }
.activation-hero-grid {
  display:grid;
  grid-template-columns:minmax(0,1fr) 330px;
  gap:64px;
  align-items:end;
}
.activation-hero h1 {
  max-width:900px;
  margin:16px 0 0;
  font-family:'Unbounded',sans-serif;
  font-size:clamp(44px,7.2vw,100px);
  font-weight:900;
  letter-spacing:-3px;
  line-height:.9;
  text-transform:uppercase;
  color:#fff;
}
.activation-hero h1 em { color:#FF2D8A; font-style:italic; }
.activation-hero p {
  max-width:720px;
  margin-top:26px;
  color:rgba(255,255,255,.5);
  font-size:16px;
  font-weight:300;
  line-height:1.8;
}
.activation-date-card {
  padding:28px;
  border:1px solid rgba(255,255,255,.1);
  background:rgba(8,8,8,.72);
}
.activation-date-card span {
  display:block;
  margin-bottom:12px;
  color:rgba(255,255,255,.3);
  font-family:'Space Grotesk',sans-serif;
  font-size:10px;
  font-weight:700;
  letter-spacing:3px;
  text-transform:uppercase;
}
.activation-date-card strong {
  color:#fff;
  font-family:'Unbounded',sans-serif;
  font-size:28px;
  font-weight:900;
  line-height:1.05;
  text-transform:uppercase;
}
.activation-content { padding:96px 56px 120px; }
.activation-grid {
  display:grid;
  grid-template-columns:.72fr 1.28fr;
  gap:72px;
  align-items:start;
}
.activation-info { position:sticky; top:128px; }
.activation-info h2 {
  margin:0 0 24px;
  color:#fff;
  font-family:'Unbounded',sans-serif;
  font-size:clamp(30px,4vw,52px);
  font-weight:900;
  line-height:.96;
  text-transform:uppercase;
}
.activation-info h2 em { color:#FF2D8A; font-style:italic; }
.activation-info > p {
  margin-bottom:30px;
  color:rgba(255,255,255,.45);
  font-size:14px;
  font-weight:300;
  line-height:1.8;
}
.activation-note {
  padding:18px 0;
  border-top:1px solid rgba(255,255,255,.06);
  color:rgba(255,255,255,.4);
  font-size:13px;
  line-height:1.65;
}
.activation-note strong { display:block; color:rgba(255,255,255,.78); font-weight:500; }
.activation-form {
  display:flex;
  flex-direction:column;
  gap:28px;
  padding:42px;
  border:1px solid rgba(255,255,255,.07);
  background:#080808;
}
.activation-section-title {
  margin-top:8px;
  padding-bottom:12px;
  border-bottom:1px solid rgba(255,255,255,.08);
  color:#FF2D8A;
  font-family:'Space Grotesk',sans-serif;
  font-size:10px;
  font-weight:700;
  letter-spacing:3px;
  text-transform:uppercase;
}
.activation-section-title:first-child { margin-top:0; }
.activation-row { display:grid; grid-template-columns:1fr 1fr; gap:24px; }
.activation-control {
  width:100%;
  padding:20px 0 14px;
  border:0;
  border-bottom:1px solid rgba(255,255,255,.1);
  border-radius:0;
  outline:0;
  background:transparent;
  color:rgba(255,255,255,.76);
  font-family:'Space Grotesk',sans-serif;
  font-size:15px;
  appearance:none;
}
.activation-control:focus,
.activation-form .fform-field:focus-within { border-bottom-color:#FF2D8A; }
.activation-control option { background:#111; color:#fff; }
textarea.activation-control { min-height:110px; resize:vertical; line-height:1.6; }
.activation-checks { display:grid; grid-template-columns:1fr 1fr; gap:12px 24px; }
.activation-check {
  display:flex;
  align-items:flex-start;
  gap:10px;
  color:rgba(255,255,255,.52);
  font-size:13px;
  line-height:1.5;
}
.activation-check input { margin-top:3px; accent-color:#FF2D8A; }
.activation-consent { grid-column:1 / -1; }
.activation-submit {
  padding:19px 32px;
  border:0;
  border-radius:100px;
  background:#FF2D8A;
  color:#fff;
  cursor:pointer;
  font-family:'Unbounded',sans-serif;
  font-size:11px;
  font-weight:700;
  letter-spacing:2px;
  text-transform:uppercase;
  transition:transform .2s, box-shadow .2s, opacity .2s;
}
.activation-submit:hover { transform:translateY(-1px); box-shadow:0 10px 34px rgba(255,45,138,.32); }
.activation-submit:disabled { cursor:wait; opacity:.65; }
.activation-msg { display:none; font-size:13px; line-height:1.5; }
@media (max-width:900px) {
  .activation-hero { padding:104px 24px 64px; }
  .activation-hero-grid, .activation-grid { grid-template-columns:1fr; gap:48px; }
  .activation-content { padding:72px 24px 96px; }
  .activation-info { position:static; }
}
@media (max-width:640px) {
  .activation-hero h1 { letter-spacing:-1.5px; }
  .activation-row, .activation-checks { grid-template-columns:1fr; }
  .activation-form { padding:28px 22px; }
}
</style>

<main class="activation-page">
  <section class="activation-hero">
    <div class="activation-wrap activation-hero-grid">
      <div class="fest-reveal">
        <div class="fest-kicker">Partnership Opportunities</div>
        <h1>Put Your Brand<br><em>in the Culture</em></h1>
        <p>Create a memorable, audience-first experience at Afrobass Music Fest. Tell us what your brand wants to build and our partnerships team will review the fit.</p>
      </div>
      <div class="activation-date-card fest-reveal fest-d1">
        <span>Afrobass Music Fest 2026</span>
        <strong>August 15–16<br>Toronto</strong>
      </div>
    </div>
  </section>

  <section class="activation-content">
    <div class="activation-wrap activation-grid">
      <aside class="activation-info fest-reveal">
        <h2>Brand Activation<br><em>Application</em></h2>
        <p>We are looking for thoughtful activations that add real value to the festival experience—from sampling and immersive installations to beauty, fashion, technology, and community programming.</p>
        <div class="activation-note"><strong>Be specific</strong>Share the experience guests will have, not only what your brand sells.</div>
        <div class="activation-note"><strong>Plan your footprint</strong>Include your estimated space, power, staffing, and setup requirements.</div>
        <div class="activation-note"><strong>What happens next</strong>Our team will review your application and contact selected brands with availability and partnership details.</div>
      </aside>

      <form class="activation-form fest-reveal fest-d1" id="brand-activation-form" novalidate>
        <div class="activation-section-title">Contact &amp; Brand</div>
        <div class="activation-row">
          <div class="fform-field"><input type="text" name="full_name" id="ba-name" placeholder=" " required><label for="ba-name">Contact Name *</label></div>
          <div class="fform-field"><input type="text" name="job_title" id="ba-title" placeholder=" " required><label for="ba-title">Job Title *</label></div>
        </div>
        <div class="activation-row">
          <div class="fform-field"><input type="email" name="email" id="ba-email" placeholder=" " required><label for="ba-email">Work Email *</label></div>
          <div class="fform-field"><input type="tel" name="phone" id="ba-phone" placeholder=" " required><label for="ba-phone">Phone *</label></div>
        </div>
        <div class="activation-row">
          <div class="fform-field"><input type="text" name="business_name" id="ba-brand" placeholder=" " required><label for="ba-brand">Brand / Company *</label></div>
          <div class="fform-field"><input type="url" name="brand_website" id="ba-web" placeholder=" " required><label for="ba-web">Brand Website *</label></div>
        </div>
        <div class="fform-field"><input type="url" name="social_url" id="ba-social" placeholder=" "><label for="ba-social">Instagram or Social URL</label></div>

        <div class="activation-section-title">Activation Overview</div>
        <div class="activation-row">
          <select name="activation_type" class="activation-control" required aria-label="Activation type">
            <option value="" disabled selected>Activation type *</option>
            <option value="Experiential Installation">Experiential Installation</option>
            <option value="Product Sampling">Product Sampling</option>
            <option value="Beauty or Wellness">Beauty or Wellness</option>
            <option value="Fashion or Retail">Fashion or Retail</option>
            <option value="Food or Beverage">Food or Beverage</option>
            <option value="Technology or Gaming">Technology or Gaming</option>
            <option value="Community Programming">Community Programming</option>
            <option value="Other">Other</option>
          </select>
          <select name="preferred_day" class="activation-control" required aria-label="Preferred festival day">
            <option value="" disabled selected>Preferred festival day *</option>
            <option value="Day 1 - August 15">Day 1 — August 15</option>
            <option value="Day 2 - August 16">Day 2 — August 16</option>
            <option value="Both Days">Both Days</option>
            <option value="Flexible">Flexible</option>
          </select>
        </div>
        <textarea name="activation_concept" class="activation-control" rows="5" placeholder="Describe your activation concept and the guest experience. *" required></textarea>
        <textarea name="activation_objectives" class="activation-control" rows="4" placeholder="What are your goals and how will you measure success? *" required></textarea>
        <textarea name="audience_engagement" class="activation-control" rows="4" placeholder="How will guests interact with the activation? *" required></textarea>

        <div class="activation-section-title">Production Requirements</div>
        <div class="activation-row">
          <div class="fform-field"><input type="text" name="footprint" id="ba-footprint" placeholder=" " required><label for="ba-footprint">Estimated Footprint (e.g. 10' × 20') *</label></div>
          <div class="fform-field"><input type="number" min="1" name="staff_count" id="ba-staff" placeholder=" "><label for="ba-staff">On-site Staff Count</label></div>
        </div>
        <div class="activation-checks">
          <label class="activation-check"><input type="checkbox" name="requirements[]" value="Power"> Electrical power required</label>
          <label class="activation-check"><input type="checkbox" name="requirements[]" value="Water"> Water access required</label>
          <label class="activation-check"><input type="checkbox" name="requirements[]" value="Wi-Fi"> Wi-Fi required</label>
          <label class="activation-check"><input type="checkbox" name="requirements[]" value="Vehicle Access"> Vehicle access required</label>
          <label class="activation-check"><input type="checkbox" name="requirements[]" value="Sampling"> Product sampling planned</label>
          <label class="activation-check"><input type="checkbox" name="requirements[]" value="Giveaways"> Giveaways or prizes planned</label>
        </div>
        <textarea name="production_notes" class="activation-control" rows="4" placeholder="Describe power load, equipment, build, delivery, or other production needs."></textarea>

        <div class="activation-section-title">Budget &amp; Readiness</div>
        <div class="activation-row">
          <select name="budget_range" class="activation-control" required aria-label="Activation budget">
            <option value="" disabled selected>Activation budget (CAD) *</option>
            <option value="Under $5,000">Under $5,000</option>
            <option value="$5,000-$10,000">$5,000–$10,000</option>
            <option value="$10,000-$25,000">$10,000–$25,000</option>
            <option value="$25,000-$50,000">$25,000–$50,000</option>
            <option value="$50,000+">$50,000+</option>
            <option value="To Be Determined">To Be Determined</option>
          </select>
          <select name="insurance_status" class="activation-control" required aria-label="Insurance status">
            <option value="" disabled selected>Commercial liability insurance *</option>
            <option value="Already Insured">Already insured</option>
            <option value="Can Obtain">Can obtain if selected</option>
            <option value="Need More Information">Need more information</option>
          </select>
        </div>
        <div class="fform-field"><input type="url" name="deck_url" id="ba-deck" placeholder=" "><label for="ba-deck">Concept Deck / Mood Board URL</label></div>
        <textarea name="message" class="activation-control" rows="4" placeholder="Anything else our partnerships team should know?"></textarea>
        <label class="activation-check activation-consent">
          <input type="checkbox" name="consent" value="yes" required>
          <span>I confirm the information provided is accurate and agree to be contacted about this application. *</span>
        </label>

        <input type="hidden" name="submission_type" value="brand_activation">
        <input type="text" name="website" style="display:none;position:absolute;left:-9999px;" tabindex="-1" autocomplete="off">
        <button type="submit" class="activation-submit">Submit Brand Activation Application &rarr;</button>
        <div class="activation-msg" role="alert" aria-live="polite"></div>
      </form>
    </div>
  </section>
</main>

<script>
(function(){
  var form = document.getElementById('brand-activation-form');
  if (!form) return;
  var ajaxUrl = <?php echo wp_json_encode(admin_url('admin-ajax.php')); ?>;
  var nonce = <?php echo wp_json_encode(wp_create_nonce('fest_nonce')); ?>;

  form.addEventListener('submit', function(event){
    event.preventDefault();
    var button = form.querySelector('.activation-submit');
    var message = form.querySelector('.activation-msg');

    if (!form.checkValidity()) {
      form.reportValidity();
      message.style.display = 'block';
      message.style.color = '#ff5a66';
      message.textContent = 'Please complete all required fields.';
      return;
    }

    var originalText = button.textContent;
    button.textContent = 'Submitting...';
    button.disabled = true;
    message.style.display = 'none';

    var data = new FormData(form);
    data.set('action', 'fest_submission');
    data.set('nonce', nonce);

    fetch(ajaxUrl, { method:'POST', body:data })
      .then(function(response){ return response.json(); })
      .then(function(json){
        message.style.display = 'block';
        message.style.color = json.success ? '#00e87a' : '#ff5a66';
        message.textContent = json.data;
        if (json.success) form.reset();
      })
      .catch(function(){
        message.style.display = 'block';
        message.style.color = '#ff5a66';
        message.textContent = 'Something went wrong. Please email <?php echo esc_js($email); ?>.';
      })
      .finally(function(){
        button.textContent = originalText;
        button.disabled = false;
      });
  });
})();
</script>

<?php get_footer(); ?>
