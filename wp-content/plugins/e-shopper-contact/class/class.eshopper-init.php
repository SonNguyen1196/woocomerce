<?php
if ( !defined( 'ABSPATH' ) ) exit;
class Eshopper {
    public function init(){
        add_action('admin_menu', array( 'Eshopper', 'addOptionMenuPage' ));
        add_action( 'admin_init', array( 'Eshopper', 'settings_e_shopper_contact_init'));
    }

    public function plugin_activation(){

    }

    public function plugin_deactivation(){

    }


    //Add Menu Page

    public function addOptionMenuPage(){
        add_menu_page(
            __( 'E-Shopper Contact', 'e-shopper-contact' ),
            'Contact E-Shopper',
            'manage_options',
            'e-shopper-contact',
            array('Eshopper', 'admin_page_contact_setting'),
            'dashicons-format-chat',
            6
        );

        add_submenu_page(
            'e-shopper-contact',
            'Phone Setting',
            'Add Phone',
            'manage_options',
            'phone-setting-e-shopper',
            array('Eshopper', 'admin_sub_page_contact_setting')
        );

    }


    function admin_page_contact_setting() {
        if ( !current_user_can( 'manage_options' ) )  {
            wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
        }
        $settingPhone = get_option('e_shopper_setting_phone');
        $settingEmail = get_option('e_shopper_setting_email');
        $settingAddress = get_option('e_shopper_setting_address');
        ?>
        <ul>
            <li>Phone: <?php echo (!empty($settingPhone)) ? $settingPhone : '' ?></li>
            <li>Email: <?php echo (!empty($settingEmail)) ? $settingEmail : '' ?></li>
            <li>Address: <?php echo (!empty($settingAddress)) ? $settingAddress : '' ?></li>
        </ul>


        <?php
    }

    function admin_sub_page_contact_setting(){
        if ( !current_user_can( 'manage_options' ) )  {
            wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
        }
        ?>
        <form action="options.php" method="post">
            <?php settings_fields( 'e-shopper-contact' ); ?>
            <?php do_settings_sections( 'phone-setting-e-shopper' ); ?>
            <table>
<!--                <tr valign="top">-->
<!--                    <th scope="row"><label for="e_shopper_setting_phone">Phone</label></th>-->
<!--                    <td><input type="text" id="e_shopper_setting_phone" name="e_shopper_setting_phone" value="--><?php //echo get_option('e_shopper_setting_phone'); ?><!--" /></td>-->
<!--                </tr>-->

<!--                <tr valign="top">-->
<!--                    <th scope="row"><label for="e_shopper_setting_email">Email</label></th>-->
<!--                    <td><input type="text" id="e_shopper_setting_email" name="e_shopper_setting_email" value="--><?php //echo get_option('e_shopper_setting_email'); ?><!--" /></td>-->
<!--                </tr>-->
<!---->
<!--                <tr valign="top">-->
<!--                    <th scope="row"><label for="e_shopper_setting_address">Address</label></th>-->
<!--                    <td><input type="text" id="e_shopper_setting_address" name="e_shopper_setting_address" value="--><?php //echo get_option('e_shopper_setting_address'); ?><!--" /></td>-->
<!--                </tr>-->
            </table>
            <?php  submit_button(); ?>
        </form>

        <?php
    }


    public function settings_e_shopper_contact_init() {

        add_settings_section(
            'e_shopper_setting_contact_section',
            __( 'Setting Contact Info E-Shopper', 'my-textdomain' ),
            '',
            'phone-setting-e-shopper'
        );

        add_settings_field(
            'e_shopper_setting_phone',
            null,
            array('Eshopper', 'e_shopper_phone_setting_phone_field'),
            'phone-setting-e-shopper',
            'e_shopper_setting_contact_section'
        );

        add_settings_field(
            'e_shopper_setting_email',
            null,
            array('Eshopper', 'e_shopper_phone_setting_email_field'),
            'phone-setting-e-shopper',
            'e_shopper_setting_contact_section'
        );

        add_settings_field(
            'e_shopper_setting_address',
            null,
            array('Eshopper', 'e_shopper_phone_setting_address_field'),
            'phone-setting-e-shopper',
            'e_shopper_setting_contact_section'
        );

        register_setting( 'e-shopper-contact', 'e_shopper_setting_phone' );
        register_setting( 'e-shopper-contact', 'e_shopper_setting_email' );
        register_setting( 'e-shopper-contact', 'e_shopper_setting_address' );
    }

    function e_shopper_phone_setting_phone_field(){
        ?>
        <tr valign="top">
            <th scope="row"><label for="e_shopper_setting_phone">Phone</label></th>
            <td><input type="text" id="e_shopper_setting_phone" name="e_shopper_setting_phone" value="<?php echo get_option('e_shopper_setting_phone'); ?>" /></td>
        </tr>
        <?php
    }

    function e_shopper_phone_setting_email_field(){
        ?>
        <tr valign="top">
            <th scope="row"><label for="e_shopper_setting_email">Email</label></th>
            <td><input type="text" id="e_shopper_setting_email" name="e_shopper_setting_email" value="<?php echo get_option('e_shopper_setting_email'); ?>" /></td>
        </tr>
        <?php
    }

    function e_shopper_phone_setting_address_field(){
        ?>
        <tr valign="top">
            <th scope="row"><label for="e_shopper_setting_address">Address</label></th>
            <td><input type="text" id="e_shopper_setting_address" name="e_shopper_setting_address" value="<?php echo get_option('e_shopper_setting_address'); ?>" /></td>
        </tr>
        <?php
    }

}