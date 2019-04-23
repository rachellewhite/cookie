<?php
/*
* Template Name: Order Page
* Template Post Type: page
*/
 ?>

<?php get_header(); ?>
      <div class="order-contain">
        <div class="order-header-holder">
          <h1 class="heading-4">Request a quote</h1>
          <div class="order-top-text">Please begin by reading the <a href="#" class="link-2">FAQ</a> and <a href="#" class="link">Pricing</a> pages and then fill out the form below to request more information and a quote for your custom cookie order.</div>
        </div>
        <div class="order-holder">
          <div class="order-columns w-row">
            <div class="order-column-01 w-col w-col-3">
              <div class="order-button">FAQ</div>
              <div class="order-button">PRICING</div>
              <ul class="order-list">
                <li class="order-list-item">I do not use a “cart” feature on my website where you select a product and then immediately purchase it.</li>
                <li class="order-list-item">Helpful Hint: When looking through the gallery if you see a design you like start a list and jot down the nameof that particular design. If you want to go back to it, you can use the search option if need be.</li>
                <li class="order-list-item">Color changes or other personalizing are available on many designs on site as well as some designs are available in different sizes to help fit your budget.</li>
              </ul>
            </div>
            <div class="order-column-02 w-col w-col-9">
              <div class="form-announce"><?php the_field('order_announce'); ?>
                <!-- I am currently booked for the month of <strong>May</strong> and am taking orders for <strong>June</strong> and beyond. (August is about half full already). Please check back soon for new End of School, Graduation and Father’s Day and Summer designs OR to request a custom order.   -->
              </div>



              <?php echo do_shortcode("[ninja_form id=3]"); ?>
              <!-- <div class="form-block w-form">
                <form id="email-form" name="email-form" data-name="Email Form" class="form">
                  <div class="nf-field-container field-half"><label for="name" class="nf-field-label">First Name <span class="ninja-forms-req-symbol">*</span></label><input type="text" id="name" name="name" data-name="Name" maxlength="256" class="nf-element w-input"></div>
                  <div class="nf-field-container field-half"><label for="name-2" class="nf-field-label">Last Name </label><input type="text" id="name-2" name="name-2" data-name="Name 2" maxlength="256" class="nf-element w-input"></div>
                  <div class="nf-field-container field-full"><label for="name-3" class="nf-field-label">Email Address</label><input type="text" id="name-2" name="name-2" data-name="Name 2" maxlength="256" class="nf-element w-input"></div><input type="submit" value="Submit" data-wait="Please wait..." class="order-submit w-button"></form>
                <div class="w-form-done">
                  <div>Thank you! Your submission has been received!</div>
                </div>
                <div class="w-form-fail">
                  <div>Oops! Something went wrong while submitting the form.</div>
                </div>
              </div> -->
              <div class="form-text"><strong class="bold-text-2">(Filling out this form does not commit you to ordering, it is just a starting place)</strong></div>
            </div>
          </div>
        </div>
      </div>



<?php get_footer(); ?>
