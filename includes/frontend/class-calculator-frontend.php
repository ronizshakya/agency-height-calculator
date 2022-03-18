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

                    <div class="result min-value"></div>

                    <div class="result max-value"></div>

                </div>

                <div class="calculator-items">

                    <div class="cal-items">

                        <label for="first_name">First Name<span class="required">*</span></label>
                        <div class="custom-input-icon">
                        <input type="text" name="first_name" id="first_name" value="" required="required">
                        </div>
                    </div>

                    <div class="cal-items">

                        <label for="last_name">Last Name<span class="required">*</span></label>
                        <div class="custom-input-icon">
                        <input type="text" name="last_name" id="last_name" value="" required="required">
                        </div>
                    </div>

                    <div class="cal-items">

                        <label for="user_email">Email<span class="required">*</span></label>
                        <div class="custom-input-icon">
                        <input type="text" name="user_email" id="user_email" value="" required="required">
                        </div>
                    </div>

                    <div class="cal-items">

                        <label for="agency_name">Agency Name<span class="required">*</span></label>
                        <div class="custom-input-icon">
                        <input type="text" name="agency_name" id="agency_name" value="" required="required">
                        </div>
                    </div>

                    <div class="cal-items">

                        <label for="telephone">Phone<span class="required">*</span></label>
                        <div class="custom-input-icon">
                        <input type="text" name="telephone" id="telephone" value="" required="required">
                        </div>
                    </div>

                    <div class="cal-items">

                        <label for="state">State<span class="required">*</span></label>
                        <div class="custom-input-icon">
                        <select name="state">

                            <option value="Alabama">Alabama</option>

                            <option value="Alaska">Alaska</option>

                            <option value="Arizona">Arizona</option>

                            <option value="Arkansas">Arkansas</option>

                            <option value="California">California</option>

                            <option value="Colorado">Colorado</option>

                            <option value="Connecticut">Connecticut</option>

                            <option value="Delaware">Delaware</option>

                            <option value="District of Columbia">District of Columbia</option>

                            <option value="Florida">Florida</option>

                            <option value="Georgia">Georgia</option>

                            <option value="Hawaii">Hawaii</option>

                            <option value="Idaho">Idaho</option>

                            <option value="Illinois">Illinois</option>

                            <option value="Indiana">Indiana</option>

                            <option value="Iowa">Iowa</option>

                            <option value="Kansas">Kansas</option>

                            <option value="Kentucky">Kentucky</option>

                            <option value="Louisiana">Louisiana</option>

                            <option value="Maine">Maine</option>

                            <option value="Maryland">Maryland</option>

                            <option value="Massachusetts">Massachusetts</option>

                            <option value="Michigan">Michigan</option>

                            <option value="Minnesota">Minnesota</option>

                            <option value="Mississippi">Mississippi</option>

                            <option value="Missouri">Missouri</option>

                            <option value="Montana">Montana</option>

                            <option value="Nebraska">Nebraska</option>

                            <option value="Nevada">Nevada</option>

                            <option value="New Hampshire">New Hampshire</option>

                            <option value="New Jersey">New Jersey</option>

                            <option value="New Mexico">New Mexico</option>

                            <option value="New York">New York</option>

                            <option value="North Carolina">North Carolina</option>

                            <option value="North Dakota">North Dakota</option>

                            <option value="Ohio">Ohio</option>

                            <option value="Oklahoma">Oklahoma</option>

                            <option value="Oregon">Oregon</option>

                            <option value="Pennsylvania">Pennsylvania</option>

                            <option value="Rhode Island">Rhode Island</option>

                            <option value="South Carolina">South Carolina</option>

                            <option value="South Dakota">South Dakota</option>

                            <option value="Tennessee">Tennessee</option>

                            <option value="Texas">Texas</option>

                            <option value="Utah">Utah</option>

                            <option value="Vermont">Vermont</option>

                            <option value="Virginia">Virginia</option>

                            <option value="Washington">Washington</option>

                            <option value="West Virginia">West Virginia</option>

                            <option value="Wisconsin">Wisconsin</option>

                            <option value="Wyoming">Wyoming</option>

                        </select>
                        </div>

                    </div>

                    <div class="cal-items">

                        <label for="commission_revenue_2021">Commission Revenue 2021<span class="required">*</span></label>
                        <div class="custom-input-icon dollor-sign">
                        <input type="number" step="any" id="commission_revenue_2021" name="commission_revenue_2021" value="" required="required" />
                        </div>
                    </div>

                    <div class="cal-items">

                        <label for="commission_revenue_2020">Commission Revenue 2020<span class="required">*</span></label>
                        <div class="custom-input-icon dollor-sign">
                        <input type="number" step="any" id="commission_revenue_2020" name="commission_revenue_2020" value="" required="required" />
                        </div>
                    </div>

                    <div class="cal-items">

                        <label for="commission_revenue_2019">Commission Revenue 2019<span class="required">*</span></label>
                        <div class="custom-input-icon dollor-sign">
                        <input type="number" step="any" id="commission_revenue_2019" name="commission_revenue_2019" value="" required="required" />
                        </div>
                    </div>

                    <div class="cal-items">

                        <label for="take_home_profit_on_the_book">Take home / Profit on the Book<span class="required">*</span></label>
                        <div class="custom-input-icon dollor-sign">
                        <input type="number" step="any" id="take_home_profit_on_the_book" name="take_home_profit_on_the_book" value="" required="required" />
                        </div>
                    </div>

                    <div class="cal-items">

                        <label for="how_much_of_the_book_is_non_standard">How much of the book is Non Standard?<span class="required">*</span></label>
                        <div class="custom-input-icon percent-sign">
                        <input type="number" step="any" id="how_much_of_the_book_is_non_standard" name="how_much_of_the_book_is_non_standard" value="" required="required" />
                        </div>
                    </div>

                    <div class="cal-items">

                        <label for="personal_lines_mix">Personal lines mix<span class="required">*</span></label>
                        <div class="custom-input-icon percent-sign">
                        <input type="number" step="any" id="personal_lines_mix" name="personal_lines_mix" value="" required="required" />
                        </div>
                    </div>

                    <div class="cal-items">

                        <label for="homeowners_mix">Homeowners mix<span class="required">*</span></label>
                        <div class="custom-input-icon percent-sign">
                        <input type="number" step="any" id="homeowners_mix" name="homeowners_mix" value="" required="required" />
                        </div>
                    </div>

                    <div class="cal-items">

                        <label for="retention_ratio">Retention Ratio<span class="required">*</span></label>
                        <div class="custom-input-icon percent-sign">
                        <input type="number" step="any" id="retention_ratio" name="retention_ratio" value="" required="required" />
                        </div>
                    </div>

                    <input type="hidden" id="calculator_date_published" name="calculator_date_published" value="<?php echo date('Y-m-d H:i:s'); ?>" />

                </div>

            </div>



            <?php wp_nonce_field('agencyheight_calculator_request', 'agencyheight_calculator_request_nonce');
            ?>

            <div class="btn-container">

                <input type="submit" class="common-btn submit_process" id="cal-submit" name="submit_process" value="Submit">

                <div class="icon-container">

                    <span class="spinner"></span>

                </div>

            </div>

        </form>

<?php

        $content = ob_get_clean();

        return $content;

    }



    /* Enqueue Scripts*/

    public function calculator_enqueue_scripts()

    {

        wp_enqueue_script('calculator-form-js', CALCULATOR_PLUGIN_URL . '/assets/js/main.js', array('jquery'), '', true);

        wp_enqueue_script('calculator-form-validate-form', 'http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js');

        wp_localize_script(

            'calculator-form-js',

            'agency_cal',

            array(

                'ajax_url' => admin_url('admin-ajax.php'),

                'ajax_nonce' => wp_create_nonce("secure_nonce_name"),

            )

        );

        wp_enqueue_style('calculator-form-css', CALCULATOR_PLUGIN_URL . 'includes/frontend/main.css');

    }





    /* Form Process*/

    public function calculator_process_forms()

    {

        // This is a secure process to validate if this request comes from a valid source.

        check_ajax_referer('secure_nonce_name', 'security');



        if (isset($_POST['agencyheight_calculator_request_nonce']) && wp_verify_nonce($_POST['agencyheight_calculator_request_nonce'], 'agencyheight_calculator_request')) {

            /* Input By seller */



            $first_name         = sanitize_text_field($_POST['first_name']);

            $last_name         = sanitize_text_field($_POST['last_name']);

            $user_email           = sanitize_email($_POST['user_email']);

            $agency_name           = sanitize_text_field($_POST['agency_name']);

            $telephone         = sanitize_text_field($_POST['telephone']);

            $state         = sanitize_text_field($_POST['state']);

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

                $commission_revenue_multiple_min_value = round($multiple_for_small_agencies * 0.95, 1);

            } elseif ($type_of_agency == "Mid Size Agency") {

                $commission_revenue_multiple_min_value = round($multiple_for_mid_size_agencies * 0.95, 1);

            } else {

                $commission_revenue_multiple_min_value = round($multiple_for_large_agencies * 0.95, 1);

            }



            //Commission Revenue Multiple: Max Value

            $commission_revenue_multiple_max_value = $commission_revenue_multiple_min_value * 1.2;

            $commission_revenue_multiple_max_value = round($commission_revenue_multiple_max_value, 1);



            //Date OF calculator submission

            $calculator_date_published = $_POST['calculator_date_published'];





            $new_post = array(

                'post_title' => $first_name . " " . $last_name . " :- " . $user_email,

                'post_status'   => 'publish',

                'post_type'     => 'calculator_data'

            );

            $result = wp_insert_post($new_post);

            // $result = '1';

            /* For adding the form submission values on the backend */

            if ($result && !empty($result)) {

                $post_id = $result;

                /* Input By seller Data Add to Posts */

                add_post_meta($post_id, 'first_name', $first_name, true);

                add_post_meta($post_id, 'last_name', $last_name, true);

                add_post_meta($post_id, 'user_email', $user_email, true);

                add_post_meta($post_id, 'agency_name', $agency_name, true);

                add_post_meta($post_id, 'telephone', $telephone, true);

                add_post_meta($post_id, 'state', $state, true);

                add_post_meta($post_id, 'commission_revenue_2021', '$' . $commission_revenue_2021, true);

                add_post_meta($post_id, 'commission_revenue_2020', '$' . $commission_revenue_2020, true);

                add_post_meta($post_id, 'commission_revenue_2019', '$' . $commission_revenue_2019, true);

                add_post_meta($post_id, 'take_home_profit_on_the_book', '$' . $take_home_profit_on_the_book, true);

                add_post_meta($post_id, 'how_much_of_the_book_is_non_standard', $how_much_of_the_book_is_non_standard . '%', true);

                add_post_meta($post_id, 'personal_lines_mix', $personal_lines_mix . '%', true);

                add_post_meta($post_id, 'homeowners_mix', $homeowners_mix . '%', true);

                add_post_meta($post_id, 'retention_ratio', $retention_ratio . '%', true);




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


                $subject = get_option('calculator_settings_input_field');
                $admin_email = get_option('calculator_settings_input_email_field');
                $form_email = get_option('calculator_settings_from_email');
                $site_name = get_bloginfo( 'name' );
                $headers = array('Content-Type: text/html; charset=ISO-8859-1','MIME-Version: 1.0','From: '.$site_name.' <'.$form_email.'>','X-Mailer: PHP/' . phpversion());


                $to = get_option('calculator_settings_input_email_field');

                $message = '<div class="cal-items"><h2>Value Calculator Calculator : New Submission </h2></div>';   
                $message .= '<div class="cal-items">First Name: <span>'.$first_name.'</span></div>';
                $message .= '<div class="cal-items">Last Name: <span>'.$last_name.'</span></div>';
                $message .= '<div class="cal-items">Email: <span>'.$user_email.'</span></div>';
                $message .= '<div class="cal-items">Agency Name: <span>'.$agency_name.'</span></div>';
                $message .= '<div class="cal-items">Phone: <span>'.$telephone.'</span></div>';
                $message .= '<div class="cal-items">State: <span>'.$state.'</span></div>';
                $message .= '<div class="cal-items">Commission Revenue 2021: <span>'.'$'.$commission_revenue_2021.'</span></div>';
                $message .= '<div class="cal-items">Commission Revenue 2020: <span>'.'$'.$commission_revenue_2020.'</span></div>';
                $message .= '<div class="cal-items">Commission Revenue 2019: <span>'.'$'.$commission_revenue_2019.'</span></div>';
                $message .= '<div class="cal-items">Take home / Profit on the Book: <span>'.'$'.$take_home_profit_on_the_book.'</span></div>';
                $message .= '<div class="cal-items">How much of the book is Non Standard: <span>'.$how_much_of_the_book_is_non_standard.'%'.'</span></div>';
                $message .= '<div class="cal-items">Personal lines mix: <span>'.$personal_lines_mix.'%'.'</span></div>';
                $message .= '<div class="cal-items">Homeowners mix: <span>'.$homeowners_mix.'%'.'</span></div>';
                $message .= '<div class="cal-items">Retention Ratio: <span>'.$retention_ratio.'%'.'</span></div>';
                $message .= '<div class="cal-items">Type of Agency: <span>'.$type_of_agency.'%'.'</span></div>';
                $message .= '<div class="cal-items">Average Annual Commission Revenue Growth: <span>'.$average_annual_commission_revenue_growth.'%'.'</span></div>';
                $message .= '<div class="cal-items">EBITDA Margin: <span>'.$ebitda_margin.'%'.'</span></div>';
                $message .= '<div class="cal-items">Discount for Non Standard Books: <span>'.$discount_for_non_standard_books.'%'.'</span></div>';
                $message .= '<div class="cal-items">Non Personal lines mix: <span>'.$non_personal_lines_mix.'%'.'</span></div>';
                $message .= '<div class="cal-items">Discount for Non Personal lines Books: <span>'.$discount_for_non_personal_lines_books.'%'.'</span></div>';
                $message .= '<div class="cal-items">Non Homeowners mix: <span>'.$non_homeowners_mix.'%'.'</span></div>';
                $message .= '<div class="cal-items">Discount for Non Homeowners Books: <span>'.$discount_for_non_homeowners_books.'%'.'</span></div>';
                $message .= '<div class="cal-items">Discount for Low Retention: <span>'.$discount_for_low_retention.'%'.'</span></div>';
                $message .= '<div class="cal-items">Multiple for Large Agencies: <span>'.$multiple_for_large_agencies.'x'.'</span></div>';
                $message .= '<div class="cal-items">Multiple for Mid Size Agencies: <span>'.$multiple_for_mid_size_agencies.'x'.'</span></div>';
                $message .= '<div class="cal-items">Multiple for Small Agencies: <span>'.$multiple_for_small_agencies.'x'.'</span></div>';
                $message .= '<div class="cal-items">Commission Revenue Multiple( Min Value ): <span>'.$commission_revenue_multiple_min_value.'x'.'</span></div>';
                $message .= '<div class="cal-items">Commission Revenue Multiple( Max Value ):'.$commission_revenue_multiple_max_value.'x'.'</span></div>';
                $message .= '<div class="cal-items">Submitted Date: <span>'.$calculator_date_published.'</span></div>';

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

