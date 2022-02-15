<?php
global $post;
$meta = get_post_meta($post->ID);
?>
<input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce(basename(__FILE__)); ?>">
<p>
    <label for="user_name">Name</label>
    <br>
    <input type="text" name="user_name" id="user_name" class="regular_text" value="<?php echo $meta['user_name'][0]; ?>">
</p>
<p>
    <label for="user_email">Email</label>
    <br>
    <input type="text" name="user_email" id="user_email" class="regular_text" value="<?php echo $meta['user_email'][0]; ?>">
</p>
<p>
    <label for="telephone">Phone</label>
    <br>
    <input type="text" name="telephone" id="telephone" class="regular_text" value="<?php echo $meta['telephone'][0]; ?>">
</p>
<p>
    <label for="type_of_agency">Type of Agency</label>
    <br>
    <input type="text" name="type_of_agency" id="type_of_agency" class="regular_text" value="<?php echo $meta['type_of_agency'][0]; ?>">
</p>

<p>
    <label for="commission_revenue_2021">Commission Revenue 2021</label>
    <br>
    <input type="text" name="commission_revenue_2021" id="commission_revenue_2021" class="regular_text" value="<?php echo $meta['commission_revenue_2021'][0]; ?>">
</p>
<p>
    <label for="commission_revenue_2020">Commission Revenue 2020</label>
    <br>
    <input type="text" name="commission_revenue_2020" id="commission_revenue_2020" class="regular_text" value="<?php echo $meta['commission_revenue_2020'][0]; ?>">
</p>
<p>
    <label for="commission_revenue_2019">Commission Revenue 2019</label>
    <br>
    <input type="text" name="commission_revenue_2019" id="commission_revenue_2019" class="regular_text" value="<?php echo $meta['commission_revenue_2019'][0]; ?>">
</p>
<p>
    <label for="average_annual_commission_revenue_growth">Average Annual Commission Revenue Growth</label>
    <br>
    <input type="text" name="average_annual_commission_revenue_growth" id="average_annual_commission_revenue_growth" class="regular_text" value="<?php echo $meta['average_annual_commission_revenue_growth'][0]; ?>">
</p>
<p>
    <label for="take_home_profit_on_the_book">Take home / Profit on the Book</label>
    <br>
    <input type="text" name="take_home_profit_on_the_book" id="take_home_profit_on_the_book" class="regular_text" value="<?php echo $meta['take_home_profit_on_the_book'][0]; ?>">
</p>

<p>
    <label for="ebitda_margin">EBITDA Margin</label>
    <br>
    <input type="text" name="ebitda_margin" id="ebitda_margin" class="regular_text" value="<?php echo $meta['ebitda_margin'][0]; ?>">
</p>
<p>
    <label for="how_much_of_the_book_is_non_standard">How much of the book is Non_Standard?</label>
    <br>
    <input type="text" name="how_much_of_the_book_is_non_standard" id="how_much_of_the_book_is_non_standard" class="regular_text" value="<?php echo $meta['how_much_of_the_book_is_non_standard'][0]; ?>">
</p>
<p>
    <label for="discount_for_non_standard_books">Discount for Non_Standard Books</label>
    <br>
    <input type="text" name="discount_for_non_standard_books" id="discount_for_non_standard_books" class="regular_text" value="<?php echo $meta['discount_for_non_standard_books'][0]; ?>">
</p>
<p>
    <label for="personal_lines_mix">Personal lines mix</label>
    <br>
    <input type="text" name="personal_lines_mix" id="personal_lines_mix" class="regular_text" value="<?php echo $meta['personal_lines_mix'][0]; ?>">
</p>

<p>
    <label for="non_personal_lines_mix">Non Personal lines mix</label>
    <br>
    <input type="text" name="non_personal_lines_mix" id="non_personal_lines_mix" class="regular_text" value="<?php echo $meta['non_personal_lines_mix'][0]; ?>">
</p>

<p>
    <label for="discount_for_non_personal_lines_books">Discount for Non Personal lines Books</label>
    <br>
    <input type="text" name="discount_for_non_personal_lines_books" id="discount_for_non_personal_lines_books" class="regular_text" value="<?php echo $meta['discount_for_non_personal_lines_books'][0]; ?>">
</p>

<p>
    <label for="homeowners_mix">Homeowners mix</label>
    <br>
    <input type="text" name="homeowners_mix" id="homeowners_mix" class="regular_text" value="<?php echo $meta['homeowners_mix'][0]; ?>">
</p>

<p>
    <label for="non_homeowners_mix">Non Homeowners mix</label>
    <br>
    <input type="text" name="non_homeowners_mix" id="non_homeowners_mix" class="regular_text" value="<?php echo $meta['non_homeowners_mix'][0]; ?>">
</p>

<p>
    <label for="discount_for_non_homeowners_books">Discount for Non Homeowners Books</label>
    <br>
    <input type="text" name="discount_for_non_homeowners_books" id="discount_for_non_homeowners_books" class="regular_text" value="<?php echo $meta['discount_for_non_homeowners_books'][0]; ?>">
</p>

<p>
    <label for="retention_ratio">Retention Ratio</label>
    <br>
    <input type="text" name="retention_ratio" id="retention_ratio" class="regular_text" value="<?php echo $meta['retention_ratio'][0]; ?>">
</p>

<p>
    <label for="discount_for_low_retention">Discount for Low Retention</label>
    <br>
    <input type="text" name="discount_for_low_retention" id="discount_for_low_retention" class="regular_text" value="<?php echo $meta['discount_for_low_retention'][0]; ?>">
</p>

<p>
    <label for="multiple_for_large_agencies">Multiple for Large Agencies</label>
    <br>
    <input type="text" name="multiple_for_large_agencies" id="multiple_for_large_agencies" class="regular_text" value="<?php echo $meta['multiple_for_large_agencies'][0]; ?>">
</p>

<p>
    <label for="multiple_for_mid_size_agencies">Multiple for Mid Size Agencies</label>
    <br>
    <input type="text" name="multiple_for_mid_size_agencies" id="multiple_for_mid_size_agencies" class="regular_text" value="<?php echo $meta['multiple_for_mid_size_agencies'][0]; ?>">
</p>

<p>
    <label for="multiple_for_small_agencies">Multiple for Small Agencies</label>
    <br>
    <input type="text" name="multiple_for_small_agencies" id="multiple_for_small_agencies" class="regular_text" value="<?php echo $meta['multiple_for_small_agencies'][0]; ?>">
</p>

<p>
    <label for="commission_revenue_multiple_min_value">Commission Revenue Multiple: Min Value</label>
    <br>
    <input type="text" name="commission_revenue_multiple_min_value" id="commission_revenue_multiple_min_value" class="regular_text" value="<?php echo $meta['commission_revenue_multiple_min_value'][0]; ?>">
</p>

<p>
    <label for="commission_revenue_multiple_max_value">Commission Revenue Multiple: Max Value</label>
    <br>
    <input type="text" name="commission_revenue_multiple_max_value" id="commission_revenue_multiple_max_value" class="regular_text" value="<?php echo $meta['commission_revenue_multiple_max_value'][0]; ?>">
</p>

<p>
    <input type="hidden" name="calculator_date_published" id="calculator_date_published" class="regular_text" value="<?php echo $meta['calculator_date_published'][0]; ?>">
</p>