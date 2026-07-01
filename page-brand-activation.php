<?php
/**
 * Template Name: Brand Activation Application
 * Template Post Type: page
 */
get_header();
$email = fest_setting('fest_email') ?: 'contact@afrobassfest.com';
$calendar_url = apply_filters('fest_discovery_call_url', 'https://calendly.com/sponsor-afrobassfest/30min');
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
.activation-choice-label {
  margin-bottom:-14px;
  color:rgba(255,255,255,.72);
  font-family:'Space Grotesk',sans-serif;
  font-size:14px;
}
.activation-calendar {
  padding:22px;
  border:1px solid rgba(255,45,138,.22);
  background:rgba(255,45,138,.055);
}
.activation-calendar strong {
  display:block;
  margin-bottom:8px;
  color:#fff;
  font-family:'Space Grotesk',sans-serif;
  font-size:14px;
}
.activation-calendar p {
  margin:0;
  color:rgba(255,255,255,.46);
  font-size:13px;
  line-height:1.6;
}
.activation-calendar a {
  display:inline-block;
  margin-top:16px;
  color:#FF2D8A;
  font-family:'Space Grotesk',sans-serif;
  font-size:11px;
  font-weight:700;
  letter-spacing:2px;
  text-decoration:none;
  text-transform:uppercase;
}
.activation-calendar iframe {
  display:block;
  width:100%;
  min-height:700px;
  margin-top:20px;
  border:0;
  background:#fff;
}
.activation-thanks {
  display:none;
  padding:28px;
  border-left:2px solid #FF2D8A;
  background:rgba(255,255,255,.025);
}
.activation-thanks h3 {
  margin:0 0 12px;
  color:#fff;
  font-family:'Unbounded',sans-serif;
  font-size:18px;
  text-transform:uppercase;
}
.activation-thanks p {
  margin:0;
  color:rgba(255,255,255,.46);
  font-size:13px;
  line-height:1.75;
}
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
        <div class="fest-kicker">Afrobass Fest 2026</div>
        <h1>Brand Activation<br><em>&amp; Vendor Application</em></h1>
        <p>Thank you for your interest in becoming part of AfroBass Fest 2026. Our Brand Activation District and Vendor Marketplace are carefully curated to create memorable guest experiences while providing meaningful exposure for our partners.</p>
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
        <h2>Welcome to<br><em>Afrobass</em></h2>
        <p>AfroBass Fest is more than a music festival. Please complete the application so our team can learn about your business and the opportunity that interests you.</p>
        <div class="activation-note"><strong>Carefully curated</strong>We select brands and vendors that complement the festival and add value for our guests.</div>
        <div class="activation-note"><strong>Review timeline</strong>Shortlisted applicants will hear from our team within 5–7 business days.</div>
        <div class="activation-note"><strong>Discovery call</strong>Selected applicants will be invited to discuss their activation, questions, and next steps.</div>
      </aside>

      <form class="activation-form fest-reveal fest-d1" id="brand-activation-form" novalidate>
        <div class="activation-section-title">Business &amp; Contact Information</div>
        <div class="activation-row">
          <div class="fform-field"><input type="text" name="business_name" id="ba-brand" placeholder=" " required><label for="ba-brand">Business / Brand Name *</label></div>
          <div class="fform-field"><input type="text" name="full_name" id="ba-name" placeholder=" " required><label for="ba-name">Primary Contact Name *</label></div>
        </div>
        <div class="activation-row">
          <div class="fform-field"><input type="text" name="job_title" id="ba-title" placeholder=" " required><label for="ba-title">Job Title *</label></div>
          <div class="fform-field"><input type="email" name="email" id="ba-email" placeholder=" " required><label for="ba-email">Email Address *</label></div>
        </div>
        <div class="activation-row">
          <div class="fform-field"><input type="tel" name="phone" id="ba-phone" placeholder=" " required><label for="ba-phone">Phone Number *</label></div>
          <div class="fform-field"><input type="url" name="brand_website" id="ba-web" placeholder=" "><label for="ba-web">Business Website</label></div>
        </div>
        <div class="fform-field"><input type="text" name="instagram" id="ba-social" placeholder=" "><label for="ba-social">Instagram Handle</label></div>

        <div class="activation-section-title">Business &amp; Opportunity</div>
        <select name="business_type" class="activation-control" required aria-label="Business type">
            <option value="" disabled selected>Which best describes your business? *</option>
            <option value="Food Vendor">Food Vendor</option>
            <option value="Fashion & Apparel">Fashion &amp; Apparel</option>
            <option value="Beauty & Skincare">Beauty &amp; Skincare</option>
            <option value="Health & Wellness">Health &amp; Wellness</option>
            <option value="Technology">Technology</option>
            <option value="Financial Services">Financial Services</option>
            <option value="Education">Education</option>
            <option value="Travel">Travel</option>
            <option value="Community Organization">Community Organization</option>
            <option value="Artist / Creative">Artist / Creative</option>
            <option value="Home & Lifestyle">Home &amp; Lifestyle</option>
            <option value="Other">Other</option>
        </select>

        <div class="activation-choice-label">Which opportunity are you interested in? *</div>
        <div class="activation-checks">
          <label class="activation-check"><input type="checkbox" name="opportunities[]" value="Pulse Package"> Pulse Package</label>
          <label class="activation-check"><input type="checkbox" name="opportunities[]" value="Bassline Package"> Bassline Package</label>
          <label class="activation-check"><input type="checkbox" name="opportunities[]" value="Headliner Package"> Headliner Package</label>
          <label class="activation-check"><input type="checkbox" name="opportunities[]" value="Food Vendor"> Food Vendor</label>
          <label class="activation-check"><input type="checkbox" name="opportunities[]" value="In-Kind Sponsorship"> In-Kind Sponsorship</label>
          <label class="activation-check"><input type="checkbox" name="opportunities[]" value="Not Sure Yet"> Not Sure Yet – I'd Like to Discuss Options</label>
        </div>

        <select name="sales_plan" class="activation-control" required aria-label="Sales plan">
          <option value="" disabled selected>Will you be selling products or services during the event? *</option>
          <option value="Yes">Yes</option>
          <option value="Sampling / Giveaway">Sampling / giveaway</option>
          <option value="No">No</option>
          <option value="Both Selling and Promoting">Both selling and promoting</option>
        </select>
        <textarea name="products_services" class="activation-control" rows="4" placeholder="If yes, what products or services will you offer?"></textarea>

        <div class="activation-section-title">Business Requirements</div>
        <div class="activation-choice-label">Do you currently have the following?</div>
        <div class="activation-checks">
          <label class="activation-check"><input type="checkbox" name="credentials[]" value="Valid Business Licence"> Valid Business Licence</label>
          <label class="activation-check"><input type="checkbox" name="credentials[]" value="Food Handler Certificate"> Food Handler Certificate</label>
          <label class="activation-check"><input type="checkbox" name="credentials[]" value="Liability Insurance"> Liability Insurance</label>
          <label class="activation-check"><input type="checkbox" name="credentials[]" value="Working Toward Requirements"> Working Toward These Requirements</label>
          <label class="activation-check"><input type="checkbox" name="credentials[]" value="N/A"> N/A</label>
        </div>

        <div class="activation-section-title">Discovery Call</div>
        <div class="activation-calendar">
          <strong>Please book a discovery call with the AfroBass Partnerships Team.</strong>
          <?php if ($calendar_url): ?>
            <p>Choose a date and time that works for you using our booking calendar.</p>
            <iframe
              src="<?php echo esc_url($calendar_url); ?>?embed_domain=<?php echo esc_attr(wp_parse_url(home_url('/'), PHP_URL_HOST)); ?>&amp;embed_type=Inline"
              title="Schedule a discovery call with the AfroBass Partnerships Team"
              loading="lazy"
              allow="payment"
            ></iframe>
            <a href="<?php echo esc_url($calendar_url); ?>" target="_blank" rel="noopener">Open Booking Calendar in a New Window &rarr;</a>
          <?php else: ?>
            <p>The booking calendar link will be provided by the AfroBass Partnerships Team.</p>
          <?php endif; ?>
        </div>
        <div class="activation-choice-label">Preferred Meeting Format *</div>
        <div class="activation-checks">
          <label class="activation-check"><input type="radio" name="meeting_format" value="Google Meet" required> Google Meet</label>
          <label class="activation-check"><input type="radio" name="meeting_format" value="Phone Call" required> Phone Call</label>
        </div>

        <textarea name="message" class="activation-control" rows="5" placeholder="Is there anything else you'd like us to know?"></textarea>

        <input type="hidden" name="submission_type" value="brand_activation">
        <input type="text" name="website" style="display:none;position:absolute;left:-9999px;" tabindex="-1" autocomplete="off">
        <button type="submit" class="activation-submit">Submit Brand Activation Application &rarr;</button>
        <div class="activation-msg" role="alert" aria-live="polite"></div>
        <div class="activation-thanks">
          <h3>Thank You!</h3>
          <p>Thank you for applying to be part of AfroBass Fest 2026. Our team will review your application and contact shortlisted brands and vendors within 5–7 business days. If selected, you'll receive an invitation to a discovery call to discuss your activation, answer questions, and explore how we can create an unforgettable experience together. We look forward to potentially welcoming you to the AfroBass community!</p>
        </div>
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
    var thankYou = form.querySelector('.activation-thanks');
    var opportunity = form.querySelector('[name="opportunities[]"]:checked');

    if (!form.checkValidity() || !opportunity) {
      form.reportValidity();
      message.style.display = 'block';
      message.style.color = '#ff5a66';
      message.textContent = opportunity
        ? 'Please complete all required fields.'
        : 'Please select at least one opportunity.';
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
        if (json.success) {
          form.reset();
          thankYou.style.display = 'block';
          thankYou.scrollIntoView({ behavior:'smooth', block:'center' });
        }
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
