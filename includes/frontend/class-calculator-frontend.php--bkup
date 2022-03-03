<?php

/**
 * Frontend class
 */
class calculatorFrontend
{

    function __construct()
    {
        add_shortcode('agencyheight-calculator-form', array($this, 'calculator_form_html'));
        add_action('wp_enqueue_scripts', array($this, 'calculator_enqueue_scripts'));
        // add_action('init', array($this, 'calculator_process_forms'));
        add_action('wp_ajax_calculator_process_forms',  array($this, 'calculator_process_forms'));
        add_action('wp_ajax_nopriv_calculator_process_forms',  array($this, 'calculator_process_forms'));
    }

    /* Form Content*/
    public function calculator_form_html()
    {
        ob_start();
?>
        <form action="<?php echo esc_url(home_url('/')); ?>" autocomplete="off" accept-charset="utf-8" method="post" id="calculator-form" name="calculator-form" role="form">
            <div class="calculator-wrap">
                <div class="calc-results">
                    <div class="min-value"></div>
                    <div class="max-value"></div>
                </div>
                <div class="calculator-items">
                    <p>
                        <label for="user_name">Name</label>
                        <input type="text" name="user_name" id="user_name" value="" required="required">
                    </p>
                    <p>
                        <label for="user_email">Email</label>
                        <input type="text" name="user_email" id="user_email" value="" required="required">
                    </p>
                    <p>
                        <label for="telephone">Phone</label>
                        <input type="text" name="telephone" id="telephone" value="" required="required">
                    </p>
                    <p>
                        <label for="commission_revenue_2021">Commission Revenue 2021*</label>
                        <input type="number" step="any" id="commission_revenue_2021" name="commission_revenue_2021" value="" required="required" />
                    </p>
                    <p>
                        <label for="commission_revenue_2020">Commission Revenue 2020*</label>
                        <input type="number" step="any" id="commission_revenue_2020" name="commission_revenue_2020" value="" required="required" />
                    </p>
                    <p>
                        <label for="commission_revenue_2019">Commission Revenue 2019*</label>
                        <input type="number" step="any" id="commission_revenue_2019" name="commission_revenue_2019" value="" required="required" />
                    </p>
                    <p>
                        <label for="take_home_profit_on_the_book">Take home / Profit on the Book*</label>
                        <input type="number" step="any" id="take_home_profit_on_the_book" name="take_home_profit_on_the_book" value="" required="required" />
                    </p>
                    <p>
                        <label for="how_much_of_the_book_is_non_standard">How much of the book is Non_Standard?*</label>
                        <input type="number" step="any" id="how_much_of_the_book_is_non_standard" name="how_much_of_the_book_is_non_standard" value="" required="required" />
                    </p>
                    <p>
                        <label for="personal_lines_mix">Personal lines mix*</label>
                        <input type="number" step="any" id="personal_lines_mix" name="personal_lines_mix" value="" required="required" />
                    </p>
                    <p>
                        <label for="homeowners_mix">Homeowners mix*</label>
                        <input type="number" step="any" id="homeowners_mix" name="homeowners_mix" value="" required="required" />
                    </p>
                    <p>
                        <label for="retention_ratio">Retention Ratio*</label>
                        <input type="number" step="any" id="retention_ratio" name="retention_ratio" value="" required="required" />
                    </p>
                    <input type="hidden" id="calculator_date_published" name="calculator_date_published" value="<?php echo date('Y-m-d H:i:s'); ?>" />
                </div>
            </div>

            <?php wp_nonce_field('agencyheight_calculator_request', 'agencyheight_calculator_request_nonce');
            ?>
            <input type="submit" class="common-btn submit_process" id="cal-submit" name="submit_process" value="Submit">
            <span class="spinner"></span>
        </form>
<?php
        $content = ob_get_clean();
        return $content;
    }

    /* Enqueue Scripts*/
    public function calculator_enqueue_scripts()
    {
        wp_enqueue_script('calculator-form-js', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'), '', true);
        wp_enqueue_script('calculator-form-validate-form', 'http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js');
        wp_localize_script(
            'calculator-form-js',
            'agency_cal',
            array(
                'ajax_url' => admin_url('admin-ajax.php'),
                'ajax_nonce' => wp_create_nonce("secure_nonce_name"),
            )
        );
    }


    /* Form Process*/
    public function calculator_process_forms()
    {
        // This is a secure process to validate if this request comes from a valid source.
        check_ajax_referer('secure_nonce_name', 'security');

        if (isset($_POST['agencyheight_calculator_request_nonce']) && wp_verify_nonce($_POST['agencyheight_calculator_request_nonce'], 'agencyheight_calculator_request')) {
            /* Input By seller */

            $user_name         = sanitize_text_field($_POST['user_name']);
            $user_email           = sanitize_email($_POST['user_email']);
            $telephone         = sanitize_text_field($_POST['telephone']);
            $commission_revenue_2021     = $_POST['commission_revenue_2021'];
            $commission_revenue_2020          = $_POST['commission_revenue_2020'];
            $commission_revenue_2019     = $_POST['commission_revenue_2019'];
            $take_home_profit_on_the_book             = $_POST['take_home_profit_on_the_book'];
            $how_much_of_the_book_is_non_standard         = $_POST['how_much_of_the_book_is_non_standard'];
            $personal_lines_mix             = $_POST['personal_lines_mix'];
            $homeowners_mix     = $_POST['homeowners_mix'];
            $retention_ratio     = $_POST['retention_ratio'];
            $calculator_date_published     = $_POST['calculator_date_published'];
            /* Driver calculations */
            //Type Of agency
            if ($commission_revenue_2021 <= 300000) {
                $type_of_agency = 'Small Agency';
            } elseif ($commission_revenue_2021 >= 300001 && $commission_revenue_2021 <= 800000) {
                $type_of_agency = 'Mid Size Agency';
            } else {
                $type_of_agency = 'Large Agency';
            }

            // Average Annual Commission Revenue Growth formuia ((2021 revenue/2019 revenue)^1/2-1)
            $average_annual_diff =  ($commission_revenue_2021 / $commission_revenue_2019);
            $average_annual_commission_revenue_growth = (pow($average_annual_diff, 1 / 2) - 1);
            $average_annual_commission_revenue_growth = round($average_annual_commission_revenue_growth * 100, 1);
            // EBITDA Margin
            $ebitda_margin = round(($take_home_profit_on_the_book / $commission_revenue_2021) * 100, 1);
            // Discount for Non_Standard Books
            if ($how_much_of_the_book_is_non_standard <= 10) {
                $discount_for_non_standard_books = 0;
            } elseif ($how_much_of_the_book_is_non_standard >= 11 && $how_much_of_the_book_is_non_standard <= 60) {
                $discount_for_non_standard_books = 5;
            } else {
                $discount_for_non_standard_books = 15;
            }
            //Non Personal lines mix
            $non_personal_lines_mix = 100 - $personal_lines_mix;
            // Discount for Non Personal lines Books
            if ($non_personal_lines_mix <= 20) {
                $discount_for_non_personal_lines_books = 0;
            } elseif ($non_personal_lines_mix >= 21 && $non_personal_lines_mix <= 60) {
                $discount_for_non_personal_lines_books = 2.5;
            } else {
                $discount_for_non_personal_lines_books = 5;
            }
            // Discount for Non-Homeowners mix
            $non_homeowners_mix = 100 - $homeowners_mix;
            // Discount for Non-Homeowners mix
            if ($non_homeowners_mix <= 20) {
                $discount_for_non_homeowners_books = 0;
            } elseif ($non_homeowners_mix >= 21 && $non_homeowners_mix <= 70) {
                $discount_for_non_homeowners_books = 5;
            } else {
                $discount_for_non_homeowners_books = 10;
            }
            // Discount for Low Retention
            if ($type_of_agency == 79) {
                $discount_for_low_retention = 10;
            } elseif ($retention_ratio >= 80 && $retention_ratio <= 89) {
                $discount_for_low_retention = 5;
            } else {
                $discount_for_low_retention = 0;
            }
            //Multiple For Large Companies
            $multiple_for_large_agencies = 3 * (1 - $discount_for_non_standard_books / 100) * (1 - $discount_for_low_retention / 100) * (1 - $discount_for_non_personal_lines_books / 100) * (1 - $discount_for_non_homeowners_books / 100);
            $multiple_for_large_agencies = round($multiple_for_large_agencies, 1);
            //Multiple For Mid Size Companies
            $multiple_for_mid_size_agencies = 2.75 * (1 - $discount_for_non_standard_books / 100) * (1 - $discount_for_low_retention / 100) * (1 - $discount_for_non_personal_lines_books / 100) * (1 - $discount_for_non_homeowners_books / 100);
            $multiple_for_mid_size_agencies = round($multiple_for_mid_size_agencies, 1);
            //Multiple For Small Companies
            $multiple_for_small_agencies = 2.5 * (1 - $discount_for_non_standard_books / 100) * (1 - $discount_for_low_retention / 100) * (1 - $discount_for_non_personal_lines_books / 100) * (1 - $discount_for_non_homeowners_books / 100);;
            $multiple_for_small_agencies = round($multiple_for_small_agencies, 1);
            //Commission Revenue Multiple: Min Value
            if ($type_of_agency == "Small Agency") {
                $commission_revenue_multiple_min_value = round($multiple_for_large_agencies * 0.95, 1);
            } elseif ($type_of_agency == "Mid Size Agency") {
                $commission_revenue_multiple_min_value = round($multiple_for_mid_size_agencies * 0.95, 1);
            } else {
                $commission_revenue_multiple_min_value = round($multiple_for_small_agencies * 0.95, 1);
            }

            //Commission Revenue Multiple: Max Value
            $commission_revenue_multiple_max_value = $commission_revenue_multiple_min_value * 1.2;
            $commission_revenue_multiple_max_value = round($commission_revenue_multiple_max_value, 1);

            //Date OF calculator submission
            $calculator_date_published = $_POST['calculator_date_published'];


            $new_post = array(
                'post_title' => $user_name . ":" . $user_email,
                'post_status'   => 'publish',
                'post_type'     => 'calculator_data'
            );
            $result = wp_insert_post($new_post);
            // $result = '1';
            /* For adding the form submission values on the backend */
            if ($result && !empty($result)) {
                $post_id = $result;
                /* Input By seller Data Add to Posts */
                add_post_meta($post_id, 'user_name', $user_name, true);
                add_post_meta($post_id, 'user_email', $user_email, true);
                add_post_meta($post_id, 'telephone', $telephone, true);
                add_post_meta($post_id, 'commission_revenue_2021', '$' . $commission_revenue_2021, true);
                add_post_meta($post_id, 'commission_revenue_2020', '$' . $commission_revenue_2020, true);
                add_post_meta($post_id, 'commission_revenue_2019', '$' . $commission_revenue_2019, true);
                add_post_meta($post_id, 'take_home_profit_on_the_book', '$' . $take_home_profit_on_the_book, true);
                add_post_meta($post_id, 'how_much_of_the_book_is_non_standard', $how_much_of_the_book_is_non_standard . '%', true);
                add_post_meta($post_id, 'personal_lines_mix', $personal_lines_mix . '%', true);
                add_post_meta($post_id, 'homeowners_mix', $homeowners_mix . '%', true);
                add_post_meta($post_id, 'retention_ratio', $retention_ratio . '%', true);
                add_post_meta($post_id, 'calculator_date_published', $calculator_date_published, true);

                /* Driver calculations Add to Posts*/
                add_post_meta($post_id, 'type_of_agency', $type_of_agency, true);
                add_post_meta($post_id, 'average_annual_commission_revenue_growth', $average_annual_commission_revenue_growth . '%', true);
                add_post_meta($post_id, 'ebitda_margin', $ebitda_margin . '%', true);
                add_post_meta($post_id, 'discount_for_non_standard_books', $discount_for_non_standard_books . '%', true);
                add_post_meta($post_id, 'non_personal_lines_mix', $non_personal_lines_mix . '%', true);
                add_post_meta($post_id, 'discount_for_non_personal_lines_books', $discount_for_non_personal_lines_books . '%', true);
                add_post_meta($post_id, 'non_homeowners_mix', $non_homeowners_mix . '%', true);
                add_post_meta($post_id, 'discount_for_non_homeowners_books', $discount_for_non_homeowners_books . '%', true);
                add_post_meta($post_id, 'discount_for_low_retention', $discount_for_low_retention . '%', true);
                add_post_meta($post_id, 'multiple_for_large_agencies', $multiple_for_large_agencies, true);
                add_post_meta($post_id, 'multiple_for_mid_size_agencies', $multiple_for_mid_size_agencies, true);
                add_post_meta($post_id, 'multiple_for_small_agencies', $multiple_for_small_agencies, true);
                add_post_meta($post_id, 'commission_revenue_multiple_min_value', $commission_revenue_multiple_min_value, true);
                add_post_meta($post_id, 'commission_revenue_multiple_max_value', $commission_revenue_multiple_max_value, true);
                add_post_meta($post_id, 'calculator_date_published', $calculator_date_published, true);

                // $filename = "file" . date('m-d-Y') . ".csv";
                // $upload = wp_upload_dir();
                // $upload_dir = $upload['basedir'];
                // $upload_dir = $upload_dir . '/demosage';
                // $filepath = $upload_dir . "/" . $filename;
                // if (!file_exists($filepath)) {
                //     $file = fopen($filepath, 'a');
                //     $title = array('Society', 'Last first name', 'Votre commission_revenue_2020', 'Email', 'Téléphone', 'Logiciel', 'Motif de la demande', 'Votre échéance', 'Votre personal_lines_mix', 'User message');
                //     fputcsv($file, $title);
                //     fclose($file);
                // }

                // $file = fopen($filepath, 'a');
                // $maindata = array($societe, $commission_revenue_2021, $commission_revenue_2020, $user_email, $telephone, $commission_revenue_2019, $take_home_profit_on_the_book, $how_much_of_the_book_is_non_standard, $personal_lines_mix, $homeowners_mix);
                // fputcsv($file, $maindata);
                // fclose($file);

                $subject = 'Renegade Calculator';
                $headers = array('Content-Type: text/html; charset=UTF-8');
                $to   = $user_email;
                $message = '<p>Hello,<p>';
                $message .= '<p>Thank you for reaching us!</p>';
                wp_mail($to, $subject, $message, $headers);
                // $return_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                // wp_redirect($return_url . '?success=true');

                $return = array(
                    'commission_revenue_multiple_min_value' => $commission_revenue_multiple_min_value,
                    'commission_revenue_multiple_max_value' => $commission_revenue_multiple_max_value
                );
                wp_send_json_success($return);
                wp_die();
            }
        }
    }
}
new calculatorFrontend();
