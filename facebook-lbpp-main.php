<?php
/**
 * @package FLBPP\Main
 */

if ( ! function_exists( 'add_filter' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

define( 'FLBPP_VERSION', '2.1.1' );

if ( ! defined( 'FLBPP_PATH' ) ) {
	define( 'FLBPP_PATH', plugin_dir_path( FLBPP_FILE ) );
}

if ( ! defined( 'FLBPP_BASENAME' ) ) {
	define( 'FLBPP_BASENAME', plugin_basename( FLBPP_FILE ) );
}

/* ***************************** LOAD FACEBOOK SDK *************************** */
add_action( 'wp_footer', 'facebook_lbpp_sdk' );
function facebook_lbpp_sdk() {
	$facebook_lbpp_locale = get_option( 'facebook_lbpp_locale', 'en_US' );
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/<?php echo $facebook_lbpp_locale;?>/sdk.js#xfbml=1&version=v2.3&appId=121572067948561";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>		
																		
<?php
}
/* ***************************** ADD OPTIONS PAGE *************************** */
add_action('admin_menu', 'facebook_lbpp_menu');
function facebook_lbpp_menu() {
add_menu_page('Facebook LBPP Setings', 'Facebook LBPP Settings', 'administrator', 'facebook-lbpp-settings', 'facebook_lbpp_settings_page', 'dashicons-admin-generic');
}
function facebook_lbpp_settings_page() {
	$LANGUAGE_BY_LOCALE = array( 
"af_ZA" => "Afrikaans (South Africa)",
"sq_AL" => "Albanian (Albania)",
"ar_AR" => "Arabic",
"hy_AM" => "Armenian (Armenia)",
"az_AZ" => "Azerbaijani",
"eu_ES" => "Basque (Spain)",
"be_BY" => "Belarusian (Belarus)",
"bn_IN" => "Bengali (India)",
"bs_BA" => "Bosnian (Bosnia and Herzegovina)",
"bg_BG" => "Bulgarian (Bulgaria)",
"ca_ES" => "Catalan (Spain)",
"cx_PH" => "Cebuano",
"hr_HR" => "Croatian (Croatia)",
"cs_CZ" => "Czech (Czech Republic)",
"da_DK" => "Danish (Denmark)",
"nl_NL" => "Dutch (Netherlands)",
"nl_BE" => "Dutch (Belgium)",
"en_PI" => "English (Pirate)",
"en_GB" => "English (United Kingdom)",
"en_US" => "English (United States)",
"en_UD" => "English (Upside Down)",
"eo_EO" => "Esperanto",
"et_EE" => "Estonian (Estonia)",
"fo_FO" => "Faroese (Faroe Islands)",
"tl_PH" => "Filipino",
"fi_FI" => "Finnish (Finland)",
"fr_CA" => "French (Canada)",
"fr_FR" => "French (France)",
"fy_NL" => "Frisian",
"gl_ES" => "Galician (Spain)",
"ka_GE" => "Georgian (Georgia)",
"de_DE" => "German (Germany)",
"el_GR" => "Greek (Greece)",
"gn_PY" => "Guarani",
"gu_IN" => "Gujarati",
"he_IL" => "Hebrew (Israel)",
"hi_IN" => "Hindi (India)",
"hu_HU" => "Hungarian (Hungary)",
"is_IS" => "Icelanding (Iceland)",
"id_ID" => "Indonesian (Indonesia)",
"ga_IE" => "Irish (Ireland)",
"it_IT" => "Italian",
"ja_JP" => "Japanese",
"ja_KS" => "Japanese (Kansai)",
"jv_ID" => "Javanese",
"kn_IN" => "Kannada",
"kk_KZ" => "Kazakh",
"km_KH" => "Khmer",
"ko_KR" => "Korean",
"ku_TR" => "Kurdish (Kurmanji)",
"la_VA" => "Latin",
"lv_LV" => "Latvian",
"fb_LT" => "Leet Speak",
"lt_LT" => "Lithuanian",
"mk_MK" => "Macedonian",
"ms_MY" => "Malay",
"ml_IN" => "Malayalam",
"mr_IN" => "Marathi",
"mn_MN" => "Mongolian",
"ne_NP" => "Nepali",
"nb_NO" => "Norwegian (bokmal)",
"nn_NO" => "Norwegian (nynorsk)",
"ps_AF" => "Pashto",
"fa_IR" => "Persian",
"pl_PL" => "Polish",
"pt_BR" => "Portuguese (Brazil)",
"pt_PT" => "Portuguese (Portugal)",
"pa_IN" => "Punjabi",
"ro_RO" => "Romanian",
"ru_RU" => "Russian",
"sr_RS" => "Serbian",
"zh_CN" => "Simplified Chinese (China)",
"si_LK" => "Sinhala",
"sk_SK" => "Slovak",
"sl_SI" => "Slovenian",
"es_LA" => "Spanish",
"es_CO" => "Spanish (Colombia)",
"es_ES" => "Spanish (Spain)",
"sw_KE" => "Swahili",
"sv_SE" => "Swedish",
"tg_TJ" => "Tajik",
"ta_IN" => "Tamil",
"te_IN" => "Telugu",
"th_TH" => "Thai",
"zh_HK" => "Traditional Chinese (Hong Kong)",
"zh_TW" => "Traditional Chinese (Taiwan)",
"tr_TR" => "Turkish",
"uk_UA" => "Ukrainian",
"ur_PK" => "Urdu",
"uz_UZ" => "Uzbek",
"vi_VN" => "Vietnamese",
"cy_GB" => "Welsh");
	?>
<div class="wrap">
<h2>Facebook LBPP Settings</h2>
 
<form method="post" action="options.php">
<?php settings_fields( ' facebook-lbpp-settings-group' ); ?>
<?php do_settings_sections( ' facebook-lbpp-settings-group' ); ?>
<table class="form-table">
<tr valign="top">
<th scope="row">Your Facebook Page URL</th>
<td><input type="text" name="facebook_lbpp_url" value="<?php echo esc_attr( get_option('facebook_lbpp_url') ); ?>" /></td>
</tr>
<tr valign="top">
<th scope="row">Your Facebook Page Title</th>
<td><input type="text" name="facebook_lbpp_title" value="<?php echo esc_attr( get_option('facebook_lbpp_title') ); ?>" /></td>
</tr>
<tr valign="top">
<th scope="row">Language (Locale Code)</th>
<td>
	<select name="facebook_lbpp_locale">
		<?php foreach ($LANGUAGE_BY_LOCALE as $locale => $language) :?>
			<option value="<?php echo $locale;?>" <?php selected( get_option('facebook_lbpp_locale'), $locale ); ?>><?php echo $language;?></option>
		<?php endforeach;?>
	</select>
</td>
</tr>
<tr valign="top">
<th scope="row">Hide Cover Image</th>
<td>
	<select name="facebook_lbpp_cover">
			<option value="True" <?php selected( get_option('facebook_lbpp_cover'), 'True' ); ?>>True</option>
			<option value="False" <?php selected( get_option('facebook_lbpp_cover'), 'False' ); ?>>False</option>
	</select>
</td>
</tr>
<tr valign="top">
<th scope="row">Show Faces</th>
<td>
	<select name="facebook_lbpp_faces">
			<option value="True" <?php selected( get_option('facebook_lbpp_faces'), 'True' ); ?>>True</option>
			<option value="False" <?php selected( get_option('facebook_lbpp_faces'), 'False' ); ?>>False</option>
	</select>
</td>
</tr>
<tr valign="top">
<th scope="row">Show Posts</th>
<td>
	<select name="facebook_lbpp_posts">
			<option value="True" <?php selected( get_option('facebook_lbpp_posts'), 'True' ); ?>>True</option>
			<option value="False" <?php selected( get_option('facebook_lbpp_posts'), 'False' ); ?>>False</option>
	</select>
</td>
</tr>
<tr valign="top">
<th scope="row">Plugin Width</th>
<td><input type="number" name="facebook_lbpp_width" min="280" max="500" value="<?php echo esc_attr( get_option('facebook_lbpp_width') );?>" /></td>
</tr>
<tr valign="top">
<th scope="row">Plugin Height</th>
<td><input type="number" name="facebook_lbpp_height" min="130" value="<?php echo esc_attr( get_option('facebook_lbpp_height') ); ?>" /></td>
</tr>
<tr valign="top">
<th scope="row">Shortcode for use in widgets or content areas:</th>
<td>[facebox]</td>
</tr>
</table>
<?php submit_button(); ?>
<?php submit_button( 'Reset', 'delete' );?>
 
</form>
</div>
<?php }
add_action( 'admin_init', 'facebook_lbpp_settings' );
function facebook_lbpp_settings() {
register_setting( ' facebook-lbpp-settings-group', 'facebook_lbpp_url' );
register_setting( ' facebook-lbpp-settings-group', 'facebook_lbpp_title' );
register_setting( ' facebook-lbpp-settings-group', 'facebook_lbpp_locale' );
register_setting( ' facebook-lbpp-settings-group', 'facebook_lbpp_cover' );
register_setting( ' facebook-lbpp-settings-group', 'facebook_lbpp_faces' );
register_setting( ' facebook-lbpp-settings-group', 'facebook_lbpp_posts' );
register_setting( ' facebook-lbpp-settings-group', 'facebook_lbpp_width' );
register_setting( ' facebook-lbpp-settings-group', 'facebook_lbpp_height' );
}
class Facebook_Lbpp_Widget extends WP_Widget {
	public function get_facebook_lbpp_code() {
		$defurl = 'https://www.facebook.com/just.do.seo';
		$fburl = get_option('facebook_lbpp_url',$defurl);
		
		$defcover = 'false';
		$fbcover = get_option('facebook_lbpp_cover',$defcover);
		
		$deffaces = 'true';
		$fbfaces = get_option('facebook_lbpp_faces',$deffaces);
		
		$defposts = 'false';
		$fbposts = get_option('facebook_lbpp_posts',$defposts);
		
		$deftitle = 'Do Seo';
		$fbtitle = get_option('facebook_lbpp_title',$deftitle);
		
		$defwidth = '';
		$fbwidth = get_option('facebook_lbpp_width',$defwidth);
		
		$defheight = '';
		$fbheight = get_option('facebook_lbpp_height',$defheight);
		?>
		<div class="fb-page" data-href="<?php echo esc_url($fburl);?>" data-hide-cover="<?php echo esc_attr($fbcover);?>" <?php if($fbwidth) {echo 'data-width="' . $fbwidth . '"';}?> <?php if($fbheight) {echo 'data-height="' . $fbheight . '"';}?> data-show-facepile="<?php echo esc_attr($fbfaces);?>" data-show-posts="<?php echo esc_attr($fbposts);?>"><div class="fb-xfbml-parse-ignore"><blockquote cite="<?php echo esc_url($fburl);?>"><a href="<?php echo esc_url($fburl);?>"><?php echo esc_html($fbtitle);?></a></blockquote></div></div>
		<?php 
		} 
	
	
public function __construct() {
 add_shortcode('facebox', array($this, 'get_facebook_lbpp_code'));

    parent::__construct(
         
        // base ID of the widget
        'facebook_lbpp_widget',
         
        // name of the widget
        __('Facebook LBPP Widget', 'doseo' ),
         
        // widget options
        array (
            'description' => __( 'Facebook page plugin widget.', 'doseo' )
        )
         
    );
     
}
     
function form($instance) {
	if( $instance) {
		$title = esc_attr($instance['title']);
	} else {
		$title = '';
	}
	?>
		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'realty_widget'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<p>
		</p>		 
	<?php
	}
     
function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
}
     
function widget($args, $instance) { 
		extract( $args );
		$title = apply_filters('widget_title', $instance['title']);
		echo $before_widget;
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}
		$this->get_facebook_lbpp_code();
		echo $after_widget;
	}
	}
function facebook_lbpp_widget() {
 
    register_widget( 'Facebook_Lbpp_Widget' );
 
}
add_action( 'widgets_init', 'facebook_lbpp_widget' );


function my_add_mce_button() {
	// check user permissions
	if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
		return;
	}
	// check if WYSIWYG is enabled
	if ( 'true' == get_user_option( 'rich_editing' ) ) {
		add_filter( 'mce_external_plugins', 'my_add_tinymce_plugin' );
		add_filter( 'mce_buttons', 'my_register_mce_button' );
	}
}
add_action('admin_head', 'my_add_mce_button');
 
// Declare script for new button
function my_add_tinymce_plugin( $plugin_array ) {
	$plugin_array['my_mce_button'] = plugin_dir_url( __FILE__ ) .'/js/shortcodes.js';
	return $plugin_array;
}
 
// Register new button in the editor
function my_register_mce_button( $buttons ) {
	array_push( $buttons, 'my_mce_button' );
	return $buttons;
}
?>
