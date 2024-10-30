<?php
   /*
   Plugin Name: Kriptomat Cryptocurrency Price Widgets
   description: A collection of interactive content. Price Tickers and Price Calculators in varying sizes. Customise with your cryptocurrency choices.
   Version: 1.0.0
   Author: Kriptomat.io
   Author URI: https://kriptomat.io/about-us
   License: GPL2
   */
   
$optionList = array('ada','atom','bch','btc', 'cvc','dai','dash','enj', 'eos','etc','eth', 'fun','iota','ltc','lrc','mtl','neo','omg','propy','rep','req','snc','snt','trx','usdt','vet','xem','xlm','xmr','xrp','xtv','zec','zrx');
$fullNames = array();
$shortNames = array();
$currentPrices = array();
$priceChanges = array();

$fiatList = array('EUR','GBP','USD');
$fiatPrices = array();
$fiatOption = "EUR";


   
function kriptomatpricewidgets_register_settings() {
	
	

add_settings_field("kriptomatpricewidgets_options_group", "kriptomatpricewidgets_links_enabled Checkbox", "kriptomatpricewidgets_links_enabled", "demo", "kriptomatpricewidgets_callback");
register_setting( 'kriptomatpricewidgets_options_group', 'kriptomatpricewidgets_links_enabled', 'kriptomatpricewidgets_callback' );	

	
add_option( 'kriptomatpricewidgets_option_name', 'https://kriptomat.io/ref/join?referral=refXXXXX');
register_setting( 'kriptomatpricewidgets_options_group', 'kriptomatpricewidgets_option_name', 'kriptomatpricewidgets_callback' );



add_option( 'kriptomatpricewidgets_option_fiat', 'EUR');
register_setting( 'kriptomatpricewidgets_options_group', 'kriptomatpricewidgets_option_fiat', 'kriptomatpricewidgets_callback' );

add_option( 'kriptomatpricewidgets_option_coin', 'btc');
register_setting( 'kriptomatpricewidgets_options_group', 'kriptomatpricewidgets_option_coin', 'kriptomatpricewidgets_callback' );

add_option( 'kriptomatpricewidgets_option_tickerchoice1', 'btc');
register_setting( 'kriptomatpricewidgets_options_group', 'kriptomatpricewidgets_option_tickerchoice1', 'kriptomatpricewidgets_callback' );
add_option( 'kriptomatpricewidgets_option_tickerchoice2', 'eth');
register_setting( 'kriptomatpricewidgets_options_group', 'kriptomatpricewidgets_option_tickerchoice2', 'kriptomatpricewidgets_callback' );
add_option( 'kriptomatpricewidgets_option_tickerchoice3', 'enj');
register_setting( 'kriptomatpricewidgets_options_group', 'kriptomatpricewidgets_option_tickerchoice3', 'kriptomatpricewidgets_callback' );
add_option( 'kriptomatpricewidgets_option_tickerchoice4', 'ltc');
register_setting( 'kriptomatpricewidgets_options_group', 'kriptomatpricewidgets_option_tickerchoice4', 'kriptomatpricewidgets_callback' );
add_option( 'kriptomatpricewidgets_option_tickerchoice5', 'trx');
register_setting( 'kriptomatpricewidgets_options_group', 'kriptomatpricewidgets_option_tickerchoice5', 'kriptomatpricewidgets_callback' );
add_option( 'kriptomatpricewidgets_option_tickerchoice6', 'xmr');
register_setting( 'kriptomatpricewidgets_options_group', 'kriptomatpricewidgets_option_tickerchoice6', 'kriptomatpricewidgets_callback' );
add_option( 'kriptomatpricewidgets_option_tickerchoice7', 'xmr');
register_setting( 'kriptomatpricewidgets_options_group', 'kriptomatpricewidgets_option_tickerchoice7', 'kriptomatpricewidgets_callback' );
add_option( 'kriptomatpricewidgets_option_tickerchoice8', 'xmr');
register_setting( 'kriptomatpricewidgets_options_group', 'kriptomatpricewidgets_option_tickerchoice8', 'kriptomatpricewidgets_callback' );
add_option( 'kriptomatpricewidgets_option_tickerchoice9', 'xmr');
register_setting( 'kriptomatpricewidgets_options_group', 'kriptomatpricewidgets_option_tickerchoice9', 'kriptomatpricewidgets_callback' );
add_option( 'kriptomatpricewidgets_option_tickerchoice10', 'xmr');
register_setting( 'kriptomatpricewidgets_options_group', 'kriptomatpricewidgets_option_tickerchoice10', 'kriptomatpricewidgets_callback' );
add_option( 'kriptomatpricewidgets_option_tickerchoice11', 'xmr');
register_setting( 'kriptomatpricewidgets_options_group', 'kriptomatpricewidgets_option_tickerchoice11', 'kriptomatpricewidgets_callback' );
add_option( 'kriptomatpricewidgets_option_tickerchoice12', 'xmr');
register_setting( 'kriptomatpricewidgets_options_group', 'kriptomatpricewidgets_option_tickerchoice12', 'kriptomatpricewidgets_callback' );
add_option( 'kriptomatpricewidgets_option_tickerchoice13', 'xmr');
register_setting( 'kriptomatpricewidgets_options_group', 'kriptomatpricewidgets_option_tickerchoice13', 'kriptomatpricewidgets_callback' );
add_option( 'kriptomatpricewidgets_option_tickerchoice14', 'xmr');
register_setting( 'kriptomatpricewidgets_options_group', 'kriptomatpricewidgets_option_tickerchoice14', 'kriptomatpricewidgets_callback' );


add_option( 'kriptomatpricewidgets_option_colourBannerBackground', '154566');
register_setting( 'kriptomatpricewidgets_options_group', 'kriptomatpricewidgets_option_colourBannerBackground', 'kriptomatpricewidgets_callback' );
add_option( 'kriptomatpricewidgets_option_colourBannerText', 'FFFFFF');
register_setting( 'kriptomatpricewidgets_options_group', 'kriptomatpricewidgets_option_colourBannerText', 'kriptomatpricewidgets_callback' );
add_option( 'kriptomatpricewidgets_option_colourRowOdd', 'FFFFFF');
register_setting( 'kriptomatpricewidgets_options_group', 'kriptomatpricewidgets_option_colourRowOdd', 'kriptomatpricewidgets_callback' );
add_option( 'kriptomatpricewidgets_option_colourRowEven', 'F2F2F2');
register_setting( 'kriptomatpricewidgets_options_group', 'kriptomatpricewidgets_option_colourRowEven', 'kriptomatpricewidgets_callback' );
add_option( 'kriptomatpricewidgets_option_colourRowText', '154566');
register_setting( 'kriptomatpricewidgets_options_group', 'kriptomatpricewidgets_option_colourRowText', 'kriptomatpricewidgets_callback' );
add_option( 'kriptomatpricewidgets_option_colourBuyBackground', 'FC9100');
register_setting( 'kriptomatpricewidgets_options_group', 'kriptomatpricewidgets_option_colourBuyBackground', 'kriptomatpricewidgets_callback' );
add_option( 'kriptomatpricewidgets_option_colourBuyText', 'FFFFFF');
register_setting( 'kriptomatpricewidgets_options_group', 'kriptomatpricewidgets_option_colourBuyText', 'kriptomatpricewidgets_callback' );
add_option( 'kriptomatpricewidgets_option_colourMarqueeBackground', 'FFFFFF');
register_setting( 'kriptomatpricewidgets_options_group', 'kriptomatpricewidgets_option_colourMarqueeBackground', 'kriptomatpricewidgets_callback' );
add_option( 'kriptomatpricewidgets_option_colourMarqueeText', '154566');
register_setting( 'kriptomatpricewidgets_options_group', 'kriptomatpricewidgets_option_colourMarqueeText', 'kriptomatpricewidgets_callback' );






add_option( 'kriptomatpricewidgets_option_colourBackground_Calc', 'FFFFFF');
register_setting( 'kriptomatpricewidgets_options_group', 'kriptomatpricewidgets_option_colourBackground_Calc', 'kriptomatpricewidgets_callback' );
add_option( 'kriptomatpricewidgets_option_colourText_Calc', '154566');
register_setting( 'kriptomatpricewidgets_options_group', 'kriptomatpricewidgets_option_colourText_Calc', 'kriptomatpricewidgets_callback' );
add_option( 'kriptomatpricewidgets_option_colourBannerBackground_Calc', '154566');
register_setting( 'kriptomatpricewidgets_options_group', 'kriptomatpricewidgets_option_colourBannerBackground_Calc', 'kriptomatpricewidgets_callback' );
add_option( 'kriptomatpricewidgets_option_colourBannerText_Calc', 'FFFFFF');
register_setting( 'kriptomatpricewidgets_options_group', 'kriptomatpricewidgets_option_colourBannerText_Calc', 'kriptomatpricewidgets_callback' );
add_option( 'kriptomatpricewidgets_option_colourOptionBackground_Calc', '154566');
register_setting( 'kriptomatpricewidgets_options_group', 'kriptomatpricewidgets_option_colourOptionBackground_Calc', 'kriptomatpricewidgets_callback' );
add_option( 'kriptomatpricewidgets_option_colourOptionText_Calc', 'FFFFFF');
register_setting( 'kriptomatpricewidgets_options_group', 'kriptomatpricewidgets_option_colourOptionText_Calc', 'kriptomatpricewidgets_callback' );
add_option( 'kriptomatpricewidgets_option_colourBuyBackground_Calc', '009EFC');
register_setting( 'kriptomatpricewidgets_options_group', 'kriptomatpricewidgets_option_colourBuyBackground_Calc', 'kriptomatpricewidgets_callback' );
add_option( 'kriptomatpricewidgets_option_colourBuyText_Calc', 'FFFFFF');
register_setting( 'kriptomatpricewidgets_options_group', 'kriptomatpricewidgets_option_colourBuyText_Calc', 'kriptomatpricewidgets_callback' );
add_option( 'kriptomatpricewidgets_option_PoweredBy_Calc_Calc', 'FFFFFF');
register_setting( 'kriptomatpricewidgets_options_group', 'kriptomatpricewidgets_option_PoweredBy_Calc_Calc', 'kriptomatpricewidgets_callback' );

add_settings_field("kriptomatpricewidgets_options_group", "poweredby Checkbox", "kriptomatpricewidgets_option_PoweredBy_Calc", "poweredby", "kriptomatpricewidgets_callback"); 
register_setting( 'kriptomatpricewidgets_options_group', 'kriptomatpricewidgets_option_PoweredBy_Calc', 'kriptomatpricewidgets_callback' );
 
// Register the css for later use
}
add_action( 'admin_init', 'kriptomatpricewidgets_register_settings' );
   
   
   
   
  
 
function kriptomatpricewidgets_plugin_styles() {	
	wp_register_style( 'kriptomatpricewidgets_rubik', 'https://fonts.googleapis.com/css?family=Rubik' );     
    wp_enqueue_style( 'kriptomatpricewidgets_rubik' );
} 
add_action( 'wp_enqueue_scripts', 'kriptomatpricewidgets_plugin_styles' );
   
      
//function my_init() {
function kriptomatpricewidgets_init() {
	if (!is_admin()) {
		wp_enqueue_script('jquery');
	}
}
add_action('init', 'kriptomatpricewidgets_init');



// function kriptomatpricewidgets_rubik() {
// wp_enqueue_style('rubik', 'https://fonts.googleapis.com/css?family=Rubik', array(), false, false);
// }
// add_action('wp_enqueue_style','kriptomatpricewidgets_rubik');
	
function kriptomatpricewidgets_admin_style() {
	wp_enqueue_style('admin-rubik', 'https://fonts.googleapis.com/css?family=Rubik', array(), false, false);
}
add_action('admin_head', 'kriptomatpricewidgets_admin_style');
   
function kriptomatpricewidgets_register_options_page() {
  add_options_page('Page Title', 'Plugin Menu', 'manage_options', 'myplugin', 'kriptomatpricewidgets_options_page');
}
add_action('admin_menu', 'kriptomatpricewidgets_register_options_page');
   
function kriptomatpricewidgets_options_page()
{
	global $optionList;
	global $fiatList;

	global $fullNames;
	global $shortNames;
	global $currentPrices;
	global $priceChanges;
	
	global $fiatPrices;
	global $fiatOption;
?>
  <div>
  <?php screen_icon(); ?>
  
  <style>
  #kriptomat_container h3 {
	  margin: 1em 0px 0px 0px;
  }
  #kriptomat_container p {
	 /* margin: 5px 0px 0px 0px;*/
  }
  #kriptomat_container table {
	  text-align:left;
  }
  #kriptomatpricewidgets_option_name {
	  width: 320px;
  }
  .input_referral {	  
	  width: 300px;
	  margin-top: 5px;
  }  
  .input_calc_coin {
	  width: 75px;
	  margin-top: 5px;
  }
  .input_coin {
	  width: 75px;
	  margin-top: 5px;
  }
  .styleName {
	vertical-align: middle;
	font-size: 14px;
  }
  
  </style>
  
<div id = "kriptomat_container">
  
  <h1>Kriptomat Fiat Gateway</h1><br>
  <form method="post" action="options.php">
  <?php settings_fields( 'kriptomatpricewidgets_options_group' ); ?>
  <?php 
	kriptomatpricewidgets_fetchAvailableCurrencies(); 
	sort($optionList);
	kriptomatpricewidgets_fetchAvailableFiat();
	sort($fiatList);
  ?>
  
  <h3>Banner clicks take user to Kriptomat</h3>    
  <p>
  Enable this to allow clicks on the banners to take users to Kriptomat.io.<BR>
  If you do not enable this your referral url will not work.  
  </p>
 Enable Links <input type="checkbox" id="kriptomatpricewidgets_links_enabled" name="kriptomatpricewidgets_links_enabled" value="1" <?php checked(1, get_option('kriptomatpricewidgets_links_enabled'), true); ?> />
  
  <br><br>
	
  <h3>Affiliate/Referral Url</h3>    
  <p>
  Add your referral url here to earn commission. You can find your referral url at <a href="https://app.kriptomat.io/invite">https://app.kriptomat.io/invite</a><br>
  Your referral url works for both Tickers and Calculators.  
  </p>
  <input type="text"  class="input_referral" id="kriptomatpricewidgets_option_name" name="kriptomatpricewidgets_option_name" value="<?php esc_html_e( get_option('kriptomatpricewidgets_option_name') ); ?>" />
  
  <br><br>
  
  <h1>Tickers</h1>
  
  <h3>ShortCodes</h3>
  <p>
  [kriptomatPriceTicker300x250] <br>
  [kriptomatPriceTicker300x600] <br>
  [kriptomatMarquee] <br>
  </p>  
  <h3>Currency</h3>  
  <select class="select input_coin" id="kriptomatpricewidgets_option_fiat" name="kriptomatpricewidgets_option_fiat" onchange="" style="text-align:center;">
		<!--<option disabled selected hidden><?php esc_html_e( get_option('kriptomatpricewidgets_option_fiat', '0') ) ; ?></option>-->
		<optgroup>
		<?php 
		esc_html_e ( 'current option', get_option('kriptomatpricewidgets_option_fiat', '0') );
		
		foreach ($fiatList as $option)
		{			
			if (get_option('kriptomatpricewidgets_option_fiat', '0') == $option)
			{
				?><option selected value="<?php esc_html_e( $option );  ?>"><?php esc_html_e( $option ) ;?></option><?php
			}
		}		
		?>
		<?php 
		if (get_option('kriptomatpricewidgets_option_fiat', '0') == "EUR")
		{
			?>
			<option value="GBR">GBR</option>	
			<option value="USD">USD</option>	
			<?php
		}
		if (get_option('kriptomatpricewidgets_option_fiat', '0') == "GBR")
		{
			?>
			<option value="EUR">EUR</option>	
			<option value="USD">USD</option>	
			<?php
		}
		if (get_option('kriptomatpricewidgets_option_fiat', '0') == "USD")
		{
			?>
			<option value="EUR">EUR</option>	
			<option value="GBR">GBR</option>	
			<?php
		}
		
		?> 	
		</optgroup>
		<optgroup label="----------">
		<?php 
		foreach ($fiatList as $option)
		{	
			if (get_option('kriptomatpricewidgets_option_fiat', '0') == $option)
			{
			}
			else
			{
				?><option value="<?php esc_html_e( $option );  ?>"><?php esc_html_e( $option ) ;?></option><?php	
			}
		}
		?> 
		</optgroup>	
  </select>
  <?php $fiatOption =  get_option('kriptomatpricewidgets_option_fiat', '0'); ?>

  
  
	
  <h3>Coins</h3>
  <table>
  <tr valign="top">
      <td><input type="text" class="input_coin" id="kriptomatpricewidgets_option_tickerchoice1" name="kriptomatpricewidgets_option_tickerchoice1" value="<?php esc_html_e( get_option('kriptomatpricewidgets_option_tickerchoice1', '0') ); ?>" /></td>
      <td><input type="text" class="input_coin"  id="kriptomatpricewidgets_option_tickerchoice2" name="kriptomatpricewidgets_option_tickerchoice2" value="<?php esc_html_e( get_option('kriptomatpricewidgets_option_tickerchoice2', '0') ); ?>" /></td>
      <td><input type="text" class="input_coin"  id="kriptomatpricewidgets_option_tickerchoice3" name="kriptomatpricewidgets_option_tickerchoice3" value="<?php esc_html_e( get_option('kriptomatpricewidgets_option_tickerchoice3', '0') ); ?>" /></td>
      <td><input type="text" class="input_coin"  id="kriptomatpricewidgets_option_tickerchoice4" name="kriptomatpricewidgets_option_tickerchoice4" value="<?php esc_html_e( get_option('kriptomatpricewidgets_option_tickerchoice4', '0') ); ?>" /></td>
      <td><input type="text" class="input_coin"  id="kriptomatpricewidgets_option_tickerchoice5" name="kriptomatpricewidgets_option_tickerchoice5" value="<?php esc_html_e( get_option('kriptomatpricewidgets_option_tickerchoice5', '0') ); ?>" /></td>
      <td><input type="text" class="input_coin"  id="kriptomatpricewidgets_option_tickerchoice6" name="kriptomatpricewidgets_option_tickerchoice6" value="<?php esc_html_e( get_option('kriptomatpricewidgets_option_tickerchoice6', '0') ); ?>" /></td>
      <td><input type="text" class="input_coin"  id="kriptomatpricewidgets_option_tickerchoice7" name="kriptomatpricewidgets_option_tickerchoice7" value="<?php esc_html_e( get_option('kriptomatpricewidgets_option_tickerchoice7', '0') ); ?>" /></td>
      <td><input type="text" class="input_coin"  id="kriptomatpricewidgets_option_tickerchoice8" name="kriptomatpricewidgets_option_tickerchoice8" value="<?php esc_html_e( get_option('kriptomatpricewidgets_option_tickerchoice8', '0') ); ?>" /></td>
      <td><input type="text" class="input_coin"  id="kriptomatpricewidgets_option_tickerchoice9" name="kriptomatpricewidgets_option_tickerchoice9" value="<?php esc_html_e( get_option('kriptomatpricewidgets_option_tickerchoice9', '0') ); ?>" /></td>
      <td><input type="text" class="input_coin"  id="kriptomatpricewidgets_option_tickerchoice10" name="kriptomatpricewidgets_option_tickerchoice10" value="<?php esc_html_e( get_option('kriptomatpricewidgets_option_tickerchoice10', '0') ); ?>" /></td>
      <td><input type="text" class="input_coin"  id="kriptomatpricewidgets_option_tickerchoice11" name="kriptomatpricewidgets_option_tickerchoice11" value="<?php esc_html_e( get_option('kriptomatpricewidgets_option_tickerchoice11', '0') ); ?>" /></td>
      <td><input type="text" class="input_coin"  id="kriptomatpricewidgets_option_tickerchoice12" name="kriptomatpricewidgets_option_tickerchoice12" value="<?php esc_html_e( get_option('kriptomatpricewidgets_option_tickerchoice12', '0') ); ?>" /></td>
      <td><input type="text" class="input_coin"  id="kriptomatpricewidgets_option_tickerchoice13" name="kriptomatpricewidgets_option_tickerchoice13" value="<?php esc_html_e( get_option('kriptomatpricewidgets_option_tickerchoice13', '0') ); ?>" /></td>
      <td><input type="text" class="input_coin"  id="kriptomatpricewidgets_option_tickerchoice14" name="kriptomatpricewidgets_option_tickerchoice14" value="<?php esc_html_e( get_option('kriptomatpricewidgets_option_tickerchoice14', '0') ); ?>" /></td>
  </tr>
  </table>  
  <h3>Supported Coins:</h3> 
  <p>
	<?php 
	foreach ($optionList as $option)
	{
		esc_html_e(''.$option.', ');
	}
	?> 
   </p>
  <h3>Styles</h3>
  <table style="float: left; margin-right: 40px;">
  <tr valign="top">
      <td class="styleName">Banner Background</td><td><input type="text" class="input_coin"  onchange="kriptomatpricewidgets_updateBannerBackground()" id="kriptomatpricewidgets_option_colourBannerBackground" name="kriptomatpricewidgets_option_colourBannerBackground" value="<?php esc_html_e( get_option('kriptomatpricewidgets_option_colourBannerBackground', '0') ); ?>" /></td>
	  <?php $colourBannerBackground = get_option('kriptomatpricewidgets_option_colourBannerBackground', '0'); ?>
  </tr>
  <tr valign="top">
      <td class="styleName">Banner Text</td><td><input type="text" class="input_coin"  onchange="kriptomatpricewidgets_updateBannerText()"  id="kriptomatpricewidgets_option_colourBannerText" name="kriptomatpricewidgets_option_colourBannerText" value="<?php esc_html_e( get_option('kriptomatpricewidgets_option_colourBannerText', '0') ); ?>" /></td>
	  <?php $colourBannerText = get_option('kriptomatpricewidgets_option_colourBannerText', '0'); ?>
  </tr>
  <tr valign="top">
     <td class="styleName">Row Background (odds)</td> <td><input type="text" class="input_coin"   onchange="kriptomatpricewidgets_updateRowOdd()" id="kriptomatpricewidgets_option_colourRowOdd" name="kriptomatpricewidgets_option_colourRowOdd" value="<?php esc_html_e( get_option('kriptomatpricewidgets_option_colourRowOdd', '0') ); ?>" /></td>
	  <?php $colourRowOdd = get_option('kriptomatpricewidgets_option_colourRowOdd', '0'); ?>
  </tr>
  <tr valign="top">
      <td class="styleName">Row Background (evens)</td><td><input type="text" class="input_coin"  onchange="kriptomatpricewidgets_updateRowEven()"  id="kriptomatpricewidgets_option_colourRowEven" name="kriptomatpricewidgets_option_colourRowEven" value="<?php esc_html_e( get_option('kriptomatpricewidgets_option_colourRowEven', '0') ); ?>" /></td>
	  <?php $colourRowEven = get_option('kriptomatpricewidgets_option_colourRowEven', '0'); ?>
  </tr>
  <tr valign="top">
      <td class="styleName">Row Text</td><td><input type="text" class="input_coin"   onchange="kriptomatpricewidgets_updateRowText()" id="kriptomatpricewidgets_option_colourRowText" name="kriptomatpricewidgets_option_colourRowText" value="<?php esc_html_e( get_option('kriptomatpricewidgets_option_colourRowText', '0') ); ?>" /></td>
	  <?php $colourRowText = get_option('kriptomatpricewidgets_option_colourRowText', '0'); ?>
  </tr>
  <tr valign="top">
      <td class="styleName">Buy Button Background</td><td><input type="text" class="input_coin"  onchange="kriptomatpricewidgets_updateBuyBackground()"  id="kriptomatpricewidgets_option_colourBuyBackground" name="kriptomatpricewidgets_option_colourBuyBackground" value="<?php esc_html_e( get_option('kriptomatpricewidgets_option_colourBuyBackground', '0') ); ?>" /></td>
	  <?php $colourBuyBackground = get_option('kriptomatpricewidgets_option_colourBuyBackground', '0'); ?>
  </tr>
  <tr valign="top">
      <td class="styleName">Buy Button Text</td><td><input type="text" class="input_coin"  onchange="kriptomatpricewidgets_updateBuyText()" id="kriptomatpricewidgets_option_colourBuyText" name="kriptomatpricewidgets_option_colourBuyText" value="<?php esc_html_e( get_option('kriptomatpricewidgets_option_colourBuyText', '0') ); ?>" /></td>
	  <?php $colourBuyText = get_option('kriptomatpricewidgets_option_colourBuyText', '0'); ?>
  </tr>
  <tr valign="top">
      <td class="styleName">Marquee Background</td><td><input type="text" class="input_coin"  onchange="kriptomatpricewidgets_updateMarqueeBackground()" id="kriptomatpricewidgets_option_colourMarqueeBackground" name="kriptomatpricewidgets_option_colourMarqueeBackground" value="<?php esc_html_e( get_option('kriptomatpricewidgets_option_colourMarqueeBackground', '0') ); ?>" /></td>
	  <?php $colourMarqueeBackground = get_option('kriptomatpricewidgets_option_colourMarqueeBackground', '0'); ?>
  </tr>
  <tr valign="top">
      <td class="styleName">Marquee Text</td><td><input type="text" class="input_coin"  onchange="kriptomatpricewidgets_updateMarqueeText()"  id="kriptomatpricewidgets_option_colourMarqueeText" name="kriptomatpricewidgets_option_colourMarqueeText" value="<?php esc_html_e( get_option('kriptomatpricewidgets_option_colourMarqueeText', '0') ); ?>" /></td>
	  <?php $colourMarqueeText = get_option('kriptomatpricewidgets_option_colourMarqueeText', '0'); ?>
  </tr>
  </table>
  
  <script>
  function kriptomatpricewidgets_updateBannerBackground(){
	  document.getElementById('kriptomattoprow').style.backgroundColor = "#" + document.getElementById('kriptomatpricewidgets_option_colourBannerBackground').value;
  }
  function kriptomatpricewidgets_updateBannerText(){
	  document.getElementById('kriptomatpricewidgets_toptext_name').style.color = "#" + document.getElementById('kriptomatpricewidgets_option_colourBannerText').value;
	  document.getElementById('kriptomatpricewidgets_toptext_price').style.color = "#" + document.getElementById('kriptomatpricewidgets_option_colourBannerText').value;
	  document.getElementById('kriptomatpricewidgets_toptext_change').style.color = "#" + document.getElementById('kriptomatpricewidgets_option_colourBannerText').value;
	  
  }
  function kriptomatpricewidgets_updateRowOdd(){
	  var odds = document.getElementsByClassName('kriptomatpricewidgets_coinContainer1');
	  for (var i = 0; i < odds.length; i++) {
		odds[i].style.backgroundColor = "#" + document.getElementById('kriptomatpricewidgets_option_colourRowOdd').value;
		}
  }
  function kriptomatpricewidgets_updateRowEven(){
	  var evens = document.getElementsByClassName('kriptomatpricewidgets_coinContainer2');
	  for (var i = 0; i < evens.length; i++) {
		evens[i].style.backgroundColor = "#" + document.getElementById('kriptomatpricewidgets_option_colourRowEven').value;
		}
  }
  function kriptomatpricewidgets_updateRowText(){
	  var elements = document.getElementsByClassName('kriptomatpricewidgets_optionName');
	  for (var i = 0; i < elements.length; i++) {
		elements[i].style.color = "#" + document.getElementById('kriptomatpricewidgets_option_colourRowText').value;
		}
	  var elements = document.getElementsByClassName('kriptomatpricewidgets_optionPrice');
	  for (var i = 0; i < elements.length; i++) {
		elements[i].style.color = "#" + document.getElementById('kriptomatpricewidgets_option_colourRowText').value;
		}
	  var elements = document.getElementsByClassName('kriptomatpricewidgets_optionEuro');
	  for (var i = 0; i < elements.length; i++) {
		elements[i].style.color = "#" + document.getElementById('kriptomatpricewidgets_option_colourRowText').value;
		}
  }
  function kriptomatpricewidgets_updateBuyBackground(){
	  document.getElementById('kriptomatBuyNow').style.backgroundColor = "#" + document.getElementById('kriptomatpricewidgets_option_colourBuyBackground').value;
  }
  function kriptomatpricewidgets_updateBuyText(){
	  document.getElementById('kriptomatBuyNow').style.color = "#" + document.getElementById('kriptomatpricewidgets_option_colourBuyText').value;
  }
  function kriptomatpricewidgets_updateMarqueeBackground(){
	  var elements = document.getElementsByClassName('kriptomatpricewidgets_coinContainerMarquee');
	  for (var i = 0; i < elements.length; i++) {
		elements[i].style.backgroundColor = "#" + document.getElementById('kriptomatpricewidgets_option_colourMarqueeBackground').value;
		}
	  document.getElementById('kriptomatpricewidgets_scroll_left').style.backgroundColor = "#" + document.getElementById('kriptomatpricewidgets_option_colourMarqueeBackground').value;
  }
  function kriptomatpricewidgets_updateMarqueeText(){
	  document.getElementById('kriptomatpricewidgets_scroll_left').style.color = "#" + document.getElementById('kriptomatpricewidgets_option_colourMarqueeText').value;
	  
	  var elements = document.getElementsByClassName('kriptomatpricewidgets_optionName_marquee');
	  for (var i = 0; i < elements.length; i++) {
		elements[i].style.color = "#" + document.getElementById('kriptomatpricewidgets_option_colourMarqueeText').value;
		}
	  var elements = document.getElementsByClassName('kriptomatpricewidgets_optionPrice_marquee');
	  for (var i = 0; i < elements.length; i++) {
		elements[i].style.color = "#" + document.getElementById('kriptomatpricewidgets_option_colourMarqueeText').value;
		}
	  var elements = document.getElementsByClassName('kriptomatpricewidgets_optionEuro_marquee');
	  for (var i = 0; i < elements.length; i++) {
		elements[i].style.color = "#" + document.getElementById('kriptomatpricewidgets_option_colourMarqueeText').value;
		}
  }
  
  </script>
     
	 <br>
<?php 
$fiatOption = get_option( 'kriptomatpricewidgets_option_fiat', '0');
$cryptoChoices = array();
$cryptoChoices[0] = get_option( 'kriptomatpricewidgets_option_tickerchoice1', '0');
$cryptoChoices[1] = get_option( 'kriptomatpricewidgets_option_tickerchoice2', '0');
$cryptoChoices[2] = get_option( 'kriptomatpricewidgets_option_tickerchoice3', '0');
$cryptoChoices[3] = get_option( 'kriptomatpricewidgets_option_tickerchoice4', '0');
$cryptoChoices[4] = get_option( 'kriptomatpricewidgets_option_tickerchoice5', '0');
$cryptoChoices[5] = get_option( 'kriptomatpricewidgets_option_tickerchoice6', '0');
$cryptoChoices[6] = get_option( 'kriptomatpricewidgets_option_tickerchoice7', '0');
$cryptoChoices[7] = get_option( 'kriptomatpricewidgets_option_tickerchoice8', '0');
$cryptoChoices[8] = get_option( 'kriptomatpricewidgets_option_tickerchoice9', '0');
$cryptoChoices[9] = get_option( 'kriptomatpricewidgets_option_tickerchoice10', '0');
$cryptoChoices[10] = get_option( 'kriptomatpricewidgets_option_tickerchoice11', '0');
$cryptoChoices[11] = get_option( 'kriptomatpricewidgets_option_tickerchoice12', '0');
$cryptoChoices[12] = get_option( 'kriptomatpricewidgets_option_tickerchoice13', '0');
$cryptoChoices[13] = get_option( 'kriptomatpricewidgets_option_tickerchoice14', '0');
?>	 
<style>

/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}

#kriptomatwidgettable table, th, td, tr, tbody{
    border: none;
	padding: 0px;
	line-height: 1;
}
#kriptomatBuyNow {
    background-color: #<?php esc_html_e( $colourBuyBackground );  ?>;
	cursor:pointer;
	width:100%;
	height:41px;
	text-align:center;
	font-family: Rubik;
	font-size: 16px;
	line-height:41px;
	border-radius: 0px 0px 4px 4px;
	letter-spacing: 0.5px;
	color: #<?php esc_html_e( $colourBuyText ); ?>;
    position: absolute;
	bottom: 0px;
}
#kriptomatBuyNow:hover {
    opacity: 0.75;
}

#kriptomatbannercontainer {
	width:300px;   
	height:600px; 
	border: 0.5px solid #e7e7e8;   
	position:relative; 
	overflow: hidden; 
	background-color: #ffffff;    
    line-height: 1;
	font-family: Rubik;
	color: #999999;
	border-radius: 5px;
    border-top: 0px;
    border-right: 0px;
    border-left: 0px;
}
#kriptomattoprow {
	position: absolute;
	width: 300px;
	height: 26px;
	left: 0px;
	top: 0px;
	background:#<?php esc_html_e( $colourBannerBackground ); ?>;
	border-radius: 5px 5px 0px 0px;
}
#kriptomattoprow p {
	margin: 0px 0px 0px 0px;
}

#kriptomatpricewidgets_toptext_name {
	font-family: Rubik;
	font-style: normal;
	font-weight: bold;
	color: #<?php esc_html_e( $colourBannerText ); ?>;
	position: absolute;
	width: 41px;
	left: 13px;
	top: 0px;
	font-size: 12px;
    line-height: 26px;
    margin: 0px;
}
#kriptomatpricewidgets_toptext_price {
	font-family: Rubik;
	font-style: normal;
	font-weight: bold;
	color: #<?php esc_html_e( $colourBannerText ); ?>;
	position: absolute;
	width: 41px;
	left: 140px;
	top: 0px;
	font-size: 12px;
    line-height: 26px;
    margin: 0px;
}
#kriptomatpricewidgets_toptext_change {
	font-family: Rubik;
	font-style: normal;
	font-weight: bold;
	color: #<?php esc_html_e( $colourBannerText ); ?>;
	position: absolute;
	width: 41px;
	left: 214px;
	top: 0px;
	font-size: 12px;
    line-height: 26px;
    margin: 0px;
}
#kriptomatpricewidgets_CurrencySelection {
	position:absolute;
	top:26px; 
	left:0px; 
	width:300px; 
	height:212px;
	padding: 0px; 
	z-index:3;
}
.kriptomatpricewidgets_coinContainer1 {
     position: relative;
    cursor: pointer;
    width: 278.4px;
	width: 300px;
    height: 36px;
    font-size: 18px;
    line-height: 18px;
    font-weight: 500;
	padding: 0px 5px;
    clear: both;
    border: 0.25px solid #<?php esc_html_e( $colourRowEven ); ?>;
	background-color:  #<?php esc_html_e( $colourRowOdd ); ?>;
}
.kriptomatpricewidgets_coinContainer2 {
     position: relative;
    cursor: pointer;
    width: 278.4px;
	width: 300px;
    height: 36px;
    font-size: 18px;
    line-height: 18px;
    font-weight: 500;
	padding: 0px 5px;
    clear: both;
    border: 0.25px solid #<?php esc_html_e( $colourRowEven ); ?>;
	background-color:  #<?php esc_html_e( $colourRowEven ); ?>;
}
.kriptomatpricewidgets_imageplacement {
	width: 18px;
	height: 36px; 
	margin-right: 5px; 
	float: left;
}
.kriptomatpricewidgets_coinImage {
	width: 18px;
	margin-top: 9px;
	margin-right: 10px;
}
.kriptomatpricewidgets_optionName_ticker {
	margin-left:0px; 
	color:black;
	float:left;
	width: 95px;
	font-size: 12px;
	line-height: 36px;
	color: #<?php esc_html_e( $colourRowText ); ?>;
    font-family: Rubik;
    font-style: normal;
	font-weight: bold;
}
.kriptomatpricewidgets_optionPrice {
	margin-left:10px; 
	color:black;
	float:left;
	width: 100px;
	font-size: 12px;
	line-height: 36px;
	color: #<?php esc_html_e( $colourRowText ); ?>;
    font-family: Rubik;
    font-style: normal;
	font-weight: bold;
}
.kriptomatpricewidgets_optionEuro {	
	color: #<?php esc_html_e( $colourRowText ); ?>;
	width: 24px;
    font-size: 12px;
    line-height: 36px;
    font-family: Rubik;
    font-style: normal;
    font-weight: normal;
    opacity: 0.75;
}
.kriptomatpricewidgets_optionChange {
	margin-left:10px; 
	color:black;
	float:left;
	font-size: 12px;
	line-height: 36px;
	font-weight: bold;
}
.kriptomatpricewidgets_arrow_down {	
    position: absolute;
    top: 8px;
    left: 237px;
}
.kriptomatpricewidgets_arrow_up {	
    position: absolute;
    top: 14px;
    left: 237px;
}
</style>
  
 
<div id="kriptomatpricewidgets_ticker_example" style="float: left; margin-right: 20px;">
	<div id='kriptomatbannercontainer' >	
		<div id='kriptomattoprow'>
			<p id='kriptomatpricewidgets_toptext_name'>Name</p>
			<p id='kriptomatpricewidgets_toptext_price'>Price</p>
			<p id='kriptomatpricewidgets_toptext_change'>Change(24h)</p>
		</div>	
		<div id='kriptomatpricewidgets_CurrencySelection'>
		<?php
		for ($i=0; $i<count($cryptoChoices); $i++)
		{
			if ($i % 2 == 0) {
				?><div id='<?php esc_html_e( $cryptoChoices[$i] ); ?>container' class='kriptomatpricewidgets_coinContainer1'><?php
			}
			else
			{
				?><div id='<?php esc_html_e( $cryptoChoices[$i] ); ?>container' class='kriptomatpricewidgets_coinContainer2'><?php
			}
			?>
			<div class='kriptomatpricewidgets_imageplacement'>
				<img  id='<?php esc_html_e( $cryptoChoices[$i] ); ?>optionimage' 
				src='<?php esc_html_e( plugin_dir_url( __FILE__ ) . 'images/'. $cryptoChoices[$i] ); ?>.svg' class='kriptomatpricewidgets_coinImage'>
				</div>
				<div class='kriptomatpricewidgets_optionName_ticker'>
					<?php esc_html_e( $fullNames[$cryptoChoices[$i]] ); ?>
				</div>
				<div class='kriptomatpricewidgets_optionPrice' id='<?php esc_html_e( $cryptoChoices[$i] ); ?>kriptomatpricewidgets_optionPrice'>
					<?php 
					if (isset($currentPrices[$cryptoChoices[$i]])) { esc_html_e( kriptomatpricewidgets_minimum_digits_required($currentPrices[$cryptoChoices[$i]]) ); }		
					?>
					</span><span class='kriptomatpricewidgets_optionEuro'><?php esc_html_e( $fiatOption ); ?></span>
				</div>
				<?php
				if ($priceChanges[$cryptoChoices[$i]] > 0){
					?><div class='kriptomatpricewidgets_optionChange'  id='<?php esc_html_e( $cryptoChoices[$i] ); ?>kriptomatpricewidgets_optionChange' style='color:#00D315;'><?php esc_html_e( "".$svgup." ".$priceChanges[$cryptoChoices[$i]]."" ); ?>%
					</div>
				<?php
				} else { 
					$pricechange = 1 - $priceChanges[$cryptoChoices[$i]];
					?><div class='kriptomatpricewidgets_optionChange' id='<?php esc_html_e( $cryptoChoices[$i] ); ?>kriptomatpricewidgets_optionChange' style='color:#FF2626;'><?php esc_html_e( "".$svgdown." ".$pricechange."" ); ?>%</div>
				<?php
				}
				?>
			</div>
		<?php
		}		
		?>
		</div>
		<div id='kriptomatBuyNow'>Buy Now</div>
	</div>  
</div>
  
  
 
<style>

/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}



.kriptomatpricewidgets_coinContainerMarquee {
     position: relative;
    cursor: pointer;
	width: auto;
    height: 28px;
    font-size: 18px;
    line-height: 28px;
    padding: 0px 10px;
    border: 1px solid #<?php esc_html_e( $colourMarqueeBackground ); ?>;
	background-color:  #<?php esc_html_e( $colourMarqueeBackground ); ?>;
	float: left;
	margin-top: 9px;
}
.kriptomatpricewidgets_imageplacement {
	width: 18px;
	height: 30px; 
	margin-right: 8px; 
	float: left;
    padding-left: 5px;
}
.kriptomatpricewidgets_coinImageMarquee {
	width: 18px;
	margin-top: 5px;
	margin-right: 5px;
	max-width: 18px;
}
.kriptomatpricewidgets_optionName_marquee {
	float:left;
	width: auto;
	font-size: 16px;
	line-height: 30px;
	color: #<?php esc_html_e( $colourMarqueeText ); ?>;
    font-family: Rubik;
    font-style: normal;
	font-weight: normal;
	text-align: left;
}
.kriptomatpricewidgets_optionPrice_marquee {
	margin-left:5px; 
	float:left;
	width: auto;
	font-size: 16px;
	line-height: 30px;
	color: #<?php esc_html_e( $colourMarqueeText ); ?>;
    font-family: Rubik;
	font-weight: normal;
}
.kriptomatpricewidgets_optionEuro_marquee {	
	color: #<?php esc_html_e( $colourMarqueeText ); ?>;
	width: auto;
    font-size: 12px;
    line-height: 30px;
    font-family: Rubik;
    font-style: normal;
    font-weight: normal;
    opacity: 0.75;
}
.kriptomatpricewidgets_optionChange_marquee {
	margin-left:10px; 
	color:black;
	float:left;
	font-size: 16px;
	line-height: 30px;
	font-weight: normal;
	position: relative;
    padding-left: 11px;
    padding-right: 3px;
}
.kriptomatpricewidgets_arrow_down {	
    position: absolute;
    top: 7px;
    left: 0px;
}
.kriptomatpricewidgets_arrow_up {	
    position: absolute;
    top: 11px;
    left: 0px;
}


* {
	margin: 0px;
	padding: 0px;
}


.kriptomatpricewidgets_scroll_left {
	height: 50px;
    overflow: hidden;
    background: #<?php esc_html_e( $colourMarqueeBackground ); ?>;
    color: #<?php esc_html_e( $colourMarqueeText ); ?>;
    position: relative;
	z-index: 99999;
	width: 100vw;
}



.kriptomatpricewidgets_scroll_left_content {
 position: absolute;
 width: 3700px;
 height: 100%;
 margin: 0;
 line-height: 50px;
 text-align: center;
 /* Starting position */
 /* transform:translateX(100%); */
 /* Apply animation to this element */
 animation: kriptomatpricewidgets_scroll_left 40s linear infinite;
}

.kriptomatpricewidgets_scroll_left_content:hover {
  
  animation-play-state: paused;
}

/* Move it (define the animation) */
@keyframes kriptomatpricewidgets_scroll_left {
 0%   {
 transform: translateX(20vw);		
 }
 100% {
 transform: translateX(-90%); 
 }
}
</style>


<div class='kriptomatpricewidgets_scroll_left' id='kriptomatpricewidgets_scroll_left' style="float: left; margin-right: 20px; width: 300px; border: 1px solid #154566;">
	<div class='kriptomatpricewidgets_scroll_left_content'>
	<?php
	for ($i=0; $i<count($cryptoChoices); $i++)
	{
		?>"<div id='<?php esc_html_e( $cryptoChoices[$i] ); ?>container' class='kriptomatpricewidgets_coinContainerMarquee'>	
			<div class='kriptomatpricewidgets_imageplacement'>
			<img  id='<?php esc_html_e( $cryptoChoices[$i] ); ?>kriptomatpricewidgets_optionImage' src='<?php esc_html_e( plugin_dir_url( __FILE__ ) . 'images/'. $cryptoChoices[$i] ); ?>.svg' class='kriptomatpricewidgets_coinImageMarquee'>					
			</div>
			<div class='kriptomatpricewidgets_optionName_marquee' id='<?php esc_html_e( $cryptoChoices[$i] ); ?>kriptomatpricewidgets_optionName'>
				<?php esc_html_e( $fullNames[$cryptoChoices[$i]] ); ?>
			</div>
			<div class='kriptomatpricewidgets_optionPrice_marquee' id='<?php esc_html_e( $cryptoChoices[$i] ); ?>kriptomatpricewidgets_optionPrice'><span id='<?php esc_html_e( $cryptoChoices[$i] ); ?>kriptomatpricewidgets_optionNumber'>
				<?php
				if (isset($currentPrices[$cryptoChoices[$i]])) { esc_html_e( kriptomatpricewidgets_minimum_digits_required($currentPrices[$cryptoChoices[$i]]) ); }	
				?>				
				</span><span class='kriptomatpricewidgets_optionEuro_marquee'><?php esc_html_e( $fiatOption ); ?></span>
			</div>
			<?php
			$pricechange = 1 - $priceChanges[$cryptoChoices[$i]];
			if ($priceChanges[$cryptoChoices[$i]] > 0){
				?>
				<div class='kriptomatpricewidgets_optionChange_marquee'  id='<?php esc_html_e( $cryptoChoices[$i] ); ?>kriptomatpricewidgets_optionChange1' style='color:#00D315; width:inline-block;'> <?php esc_html_e( $svgup ); ?> <span id='<?php esc_html_e( $cryptoChoices[$i] ); ?>kriptomatpricewidgets_priceChangeNumber1'><?php esc_html_e( $priceChanges[$cryptoChoices[$i]] ); ?></span>%</div>
				<?php
			} else { 
				?>
				<div class='kriptomatpricewidgets_optionChange_marquee' id='<?php esc_html_e( $cryptoChoices[$i] ); ?>kriptomatpricewidgets_optionChange2' style='color:#FF2626; display:inline-block;'> <?php esc_html_e( $svgdown ); ?> <span id='<?php esc_html_e( $cryptoChoices[$i] ); ?>kriptomatpricewidgets_priceChangeNumber2'><?php esc_html_e( $pricechange ); ?></span>%</div>
				<?php
			}		
		?></div><?php
	}	
?></div></div>
  
  
  
  <div id="spacer" style="height: 0px; clear: both;"></div>
  
  <br><br>
  
  
  <h1>Calculators</h1>
  
  <h3>ShortCodes</h3>
  <p>
  [kriptomatCalculator300x250] <br>
  </p>
  <h3>Starting Coin</h3>
  <input type="text"  class="input_calc_coin" id="kriptomatpricewidgets_option_coin" name="kriptomatpricewidgets_option_coin" value="<?php esc_html_e( get_option('kriptomatpricewidgets_option_coin') ); ?>" />
  
  <h3>Supported Coins:</h3> 
  <p>
	<?php 
	foreach ($optionList as $option)
	{
		esc_html_e(''.$option.', ');
	}
	?> 
   </p>  
  <h3>Styles</h3>
  <table style="float: left;    margin-right: 40px;">		
  <tr valign="top">
      <td class="styleName">Body Background</td><td><input type="text" class="input_coin"   onchange="kriptomatpricewidgets_updateCalcBackground()"  id="kriptomatpricewidgets_option_colourBackground_Calc" name="kriptomatpricewidgets_option_colourBackground_Calc" value="<?php esc_html_e( get_option('kriptomatpricewidgets_option_colourBackground_Calc', '0') ); ?>" /></td>
	  <?php $colourBackground = get_option('kriptomatpricewidgets_option_colourBackground_Calc', '0'); ?>
  </tr>
  <tr valign="top">
      <td class="styleName">Text</td><td><input type="text" class="input_coin"  onchange="kriptomatpricewidgets_updateCalcText()"   id="kriptomatpricewidgets_option_colourText_Calc" name="kriptomatpricewidgets_option_colourText_Calc" value="<?php esc_html_e( get_option('kriptomatpricewidgets_option_colourText_Calc', '0') ); ?>" /></td>
	  <?php $colourText = get_option('kriptomatpricewidgets_option_colourText_Calc', '0'); ?>
  </tr>
  <tr valign="top">
      <td class="styleName">Banner Background</td><td><input type="text" class="input_coin"  onchange="kriptomatpricewidgets_updateCalcBannerBackground()"  id="kriptomatpricewidgets_option_colourBannerBackground_Calc" name="kriptomatpricewidgets_option_colourBannerBackground_Calc" value="<?php esc_html_e( get_option('kriptomatpricewidgets_option_colourBannerBackground_Calc', '0') ); ?>" /></td>
	  <?php $colourBannerBackground = get_option('kriptomatpricewidgets_option_colourBannerBackground_Calc', '0'); ?>
  </tr>
  <tr valign="top">
      <td class="styleName">Banner Text</td><td><input type="text" class="input_coin"  onchange="kriptomatpricewidgets_updateCalcBannerText()"   id="kriptomatpricewidgets_option_colourBannerText_Calc" name="kriptomatpricewidgets_option_colourBannerText_Calc" value="<?php esc_html_e( get_option('kriptomatpricewidgets_option_colourBannerText_Calc', '0') ); ?>" /></td>
	  <?php $colourBannerText = get_option('kriptomatpricewidgets_option_colourBannerText_Calc', '0'); ?>
  </tr>
  <tr valign="top">
      <td class="styleName">Option Background</td><td><input type="text" class="input_coin"   onchange="kriptomatpricewidgets_updateCalcOptionBackground()" id="kriptomatpricewidgets_option_colourOptionBackground_Calc" name="kriptomatpricewidgets_option_colourOptionBackground_Calc" value="<?php esc_html_e( get_option('kriptomatpricewidgets_option_colourOptionBackground_Calc', '0') ); ?>" /></td>
	  <?php $colourDropDownBackground = get_option('kriptomatpricewidgets_option_colourOptionBackground_Calc', '0'); ?>
  </tr>
  <tr valign="top">
      <td class="styleName">Option Text</td><td><input type="text" class="input_coin"   onchange="kriptomatpricewidgets_updateCalcOptionText()" id="kriptomatpricewidgets_option_colourOptionText_Calc" name="kriptomatpricewidgets_option_colourOptionText_Calc" value="<?php esc_html_e( get_option('kriptomatpricewidgets_option_colourOptionText_Calc', '0') ); ?>" /></td>
	  <?php $colourDropDownText = get_option('kriptomatpricewidgets_option_colourOptionText_Calc', '0'); ?>
  </tr>  
  <tr valign="top">
      <td class="styleName">Buy Button Background</td><td><input type="text" class="input_coin"  onchange="kriptomatpricewidgets_updateCalcButtonBackground()"   id="kriptomatpricewidgets_option_colourBuyBackground_Calc" name="kriptomatpricewidgets_option_colourBuyBackground_Calc" value="<?php esc_html_e( get_option('kriptomatpricewidgets_option_colourBuyBackground_Calc', '0') ); ?>" /></td>
	  <?php $colourBuyBackground = get_option('kriptomatpricewidgets_option_colourBuyBackground_Calc', '0'); ?>
  </tr>
  <tr valign="top">
      <td class="styleName">Buy Button Text</td><td><input type="text" class="input_coin"   onchange="kriptomatpricewidgets_updateCalcButtonText()"  id="kriptomatpricewidgets_option_colourBuyText_Calc" name="kriptomatpricewidgets_option_colourBuyText_Calc" value="<?php esc_html_e( get_option('kriptomatpricewidgets_option_colourBuyText_Calc', '0') ); ?>" /></td>
	  <?php $colourBuyText = get_option('kriptomatpricewidgets_option_colourBuyText_Calc', '0'); ?>
  </tr>
  <tr valign="top">
      <td class="styleName" style="padding-top: 5px;">Powered By</td><td style="padding-top: 5px;"><input type="checkbox" id="PoweredBy_Calc" onchange="kriptomatpricewidgets_updateCalcPoweredBy()" name="kriptomatpricewidgets_option_PoweredBy_Calc" value="1" <?php checked(1, get_option('kriptomatpricewidgets_option_PoweredBy_Calc'), true); ?> /></td>
	  <?php 
	  $poweredBy = get_option('kriptomatpricewidgets_option_PoweredBy_Calc', '0');
		if($poweredBy == 1)
		{ 
			$buynowtop = "block"; 
			$buynowtop = "165px"; 
		}
		else
		{ 
			$showPoweredBy = "none"; 
			$buynowtop = "177px"; 
		}
	  ?>
  </tr>
  </table>
  
  
  
  <script>
  function kriptomatpricewidgets_updateCalcBackground(){
	  document.getElementById('kriptomatpricewidgets_calculatorcontainer').style.backgroundColor = "#" + document.getElementById('kriptomatpricewidgets_option_colourBackground_Calc').value;
  }
  function kriptomatpricewidgets_updateCalcText(){
	  document.getElementById('kriptomatpricewidgets_priceinput').style.color = "#" + document.getElementById('kriptomatpricewidgets_option_colourText_Calc').value;
	  document.getElementById('kriptomatpricewidgets_resultingAmount').style.color = "#" + document.getElementById('kriptomatpricewidgets_option_colourText_Calc').value;	
  }
  function kriptomatpricewidgets_updateCalcBannerBackground(){
	  document.getElementById('kriptomatpricewidgets_toprow').style.backgroundColor = "#" + document.getElementById('kriptomatpricewidgets_option_colourBannerBackground_Calc').value;
  }
  function kriptomatpricewidgets_updateCalcBannerText(){
	  document.getElementById('kriptomatpricewidgets_toptext_name').style.color = "#" + document.getElementById('kriptomatpricewidgets_option_colourBannerText_Calc').value;
  }
  function kriptomatpricewidgets_updateCalcOptionBackground(){
	  document.getElementById('kriptomatpricewidgets_fiat_dropdown').style.backgroundColor = "#" + document.getElementById('kriptomatpricewidgets_option_colourBackground_Calc').value;
	  document.getElementById('kriptomatpricewidgets_coin_dropdown').style.backgroundColor = "#" + document.getElementById('kriptomatpricewidgets_option_colourBackground_Calc').value;
  }
  function kriptomatpricewidgets_updateCalcOptionText(){
	  document.getElementById('kriptomatpricewidgets_fiat_dropdown').style.color = "#" + document.getElementById('kriptomatpricewidgets_option_colourOptionText_Calc').value;
	  document.getElementById('kriptomatpricewidgets_coin_dropdown').style.color = "#" + document.getElementById('kriptomatpricewidgets_option_colourOptionText_Calc').value;
  }
  
  
  
  
  function kriptomatpricewidgets_updateCalcButtonBackground(){
	  document.getElementById('kriptomatpricewidgets_BuyNow').style.backgroundColor = "#" + document.getElementById('kriptomatpricewidgets_option_colourBuyBackground_Calc').value;
  }
  function kriptomatpricewidgets_updateCalcButtonText(){
	  document.getElementById('kriptomatpricewidgets_BuyNow').style.color = "#" + document.getElementById('kriptomatpricewidgets_option_colourBuyText_Calc').value;
  }
  function kriptomatpricewidgets_updateCalcPoweredBy() {
	  
	  if (document.getElementById('PoweredBy_Calc').checked)
	  {
		document.getElementById('kriptomatpricewidgets_poweredby').style.display = "block";
		document.getElementById('kriptomatpricewidgets_BuyNow').style.top = "165px";		
	  }
	  else
	  {
		document.getElementById('kriptomatpricewidgets_poweredby').style.display = "none";
		document.getElementById('kriptomatpricewidgets_BuyNow').style.top = "177px";
	  }
	  
  }

  
  </script>
  
  <br>  
  
  

<style>

/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}

#kriptomatwidgettable table, th, td, tr, tbody{
    border: none;
	padding: 0px;
	line-height: 1;
}

::-webkit-scrollbar {
  width: 10px;
  height: 10px;
}
::-webkit-scrollbar-thumb {
  background: #dfdcdc;
  border-radius: 5px;
}
::-webkit-scrollbar-track {
  background: rgba(0, 0, 0, 0.005);
}


#kriptomatpricewidgets_calculatorcontainer {
	z-index:3; 
	width:300px; 
	height:250px; 
	padding: 0px; 
	position: relative;
	background-color: #<?php esc_html_e( $colourBackground ); ?>;
	border: 0.5px solid #e7e7e8; 
    border-radius: 6px 6px 0px 0px;
	margin: 0px 0px 0px 0px;
	float: left;
}

#kriptomatpricewidgets_toprow {
	position: absolute;
	width: 300px;
	height: 33px;
	left: 0px;
	top: -1px;
	background:#<?php esc_html_e( $colourBannerBackground ); ?>;
	border-radius: 5px 5px 0px 0px;
}
#kriptomatpricewidgets_toptext_name_calc {
	font-family: Rubik;
	font-style: normal;
	font-weight: 500;
	color: #<?php esc_html_e( $colourBannerText ); ?>;
	position: absolute;
	
    width: 100%;
    text-align: center; 
    font-size: 18px;
    line-height: 33px;
    margin: 0px;
}


	

#kriptomatpricewidgets_fiat_box {
	position: absolute;
	width: 267px;
	height: 50px;
	top: 46px;
	left: 16px;
	background: #<?php esc_html_e( $colourBackground ); ?>;
	border: 1px solid #EAEAEA;
	box-sizing: border-box;
	border-radius: 4px;
}
#kriptomatpricewidgets_priceinput {
	position: absolute;
    width: 190px;
    height: 48px;
    top: 0px;
    left: 0px;
    border: none;
    text-align: right;
    padding: 0px 15px 0px 0px;
    outline: none;
    background-color: rgba(255, 255, 255, 0);
    font-family: Rubik;
    font-style: normal;
    font-weight: bold;
    font-size: 18px;
    line-height: 50px;
	color: #<?php esc_html_e( $colourText ); ?>;
    letter-spacing: 1px;
}


#kriptomatpricewidgets_fiat_dropdown {	
	background: #<?php esc_html_e( $colourDropDownBackground ); ?>;
	color: #<?php esc_html_e( $colourDropDownText ); ?>;
    width: 75px;
    height: 50px;
    line-height: 48px;
    float: right;
    border-top-right-radius: 3px;
    border-bottom-right-radius: 3px;
    font-size: 14px;
    font-family: Rubik;
    font-weight: bold;
    font-style: normal;
    text-align: center;
    cursor: pointer;
    margin-top: -1px;    
	position: relative;
}
#kriptomatpricewidgets_coin_box {
	position: absolute;
	width: 267px;
	height: 50px;
	top: 106px;
	left: 16px;
	background: #<?php esc_html_e( $colourBackground ); ?>;
	border: 1px solid #EAEAEA;
	box-sizing: border-box;
	border-radius: 4px;
}
#kriptomatpricewidgets_resultingAmount  {	
	position: absolute;
    width: 190px;
    height: 48px;
    top: 0px;
    left: 0px;
    border: none;
    text-align: right;
    padding: 0px 15px 0px 0px;
    outline: none;
    background-color: rgba(255, 255, 255, 0);
    font-family: Rubik;
    font-style: normal;
    font-weight: bold;
    font-size: 18px;
    line-height: 50px;
	color: #".$colourText.";
    letter-spacing: 1px;
}


#kriptomatpricewidgets_coin_dropdown {		
	background: #<?php esc_html_e( $colourDropDownBackground ); ?>;
	color: #<?php esc_html_e( $colourDropDownText ); ?>;
    width: 75px;
    height: 50px;
    line-height: 48px;
    float: right;
    border-top-right-radius: 3px;
    border-bottom-right-radius: 3px;
    font-size: 14px;
    font-family: Rubik;
    font-weight: bold;
    font-style: normal;
    text-align: center;
    cursor: pointer;
    margin-top: -1px;
	position: relative;
}
#kriptomatpricewidgets_BuyNow {
	cursor: pointer;
    width: 267px;
    height: 50px;
    text-align: center;
    color: #<?php esc_html_e( $colourBuyText ); ?>;
    font-family: Rubik;
    font-size: 20px;
    line-height: 50px;
    border-radius: 4px;
    letter-spacing: 0.5px;
    z-index: 4;
    position: absolute;
    top: <?php esc_html_e( $buynowtop ); ?>;
    left: 16px;
}



#kriptomatpricewidgets_BuyNow {
	background: #<?php esc_html_e( $colourBuyBackground ); ?>;
}
#kriptomatpricewidgets_BuyNow:hover {
    opacity: 0.75;
}
#kriptomatpricewidgets_poweredby {	
    position: absolute;
    top: 213px;
    left: 94px;
    font-size: 12px;
	color: #<?php esc_html_e( $colourBannerBackground ); ?>;
    font-weight: bold;
}
#KriptomatCurrencySelection {
	display:none; 
	position:absolute; 
	top:33px; 
	left:0px; 
	background-color: #<?php esc_html_e( $colourBackground ); ?>;
	width:295px; 
	height:216px; 
	padding: 10px 0px; 
	overflow-x:hidden; 
	overflow-y:scroll; 
	z-index:10;
}
#KriptomatFiatSelection {
	display:none; 
	position:absolute; 
	top:33px; 
	left:0px; 
	background-color: #<?php esc_html_e( $colourBackground ); ?>;
	width:295px; 
	height:216px; 
	padding: 10px 0px; 
	overflow-x:hidden; 
	overflow-y:scroll; 
	z-index:10;
}

.kriptomatpricewidgets_optionContainer {
	cursor: pointer;
    width: 271px;
    height: 30px;
    font-size: 18px;
    line-height: 30px;
    font-weight: 500;
    margin: 0px 10px;
    position: relative;
}
.kriptomatpricewidgets_optionContainer:hover {		
    background-color: rgba(<?php esc_html_e( $r ); ?>, <?php esc_html_e( $g ); ?>, <?php esc_html_e( $b ); ?>, 0.25);
	border-radius: 5px;
}
.kriptomatpricewidgets_optionButton {	
    width: 271px;
    height: 30px;
    position: absolute;
	top: 0px;
	left: 0px;
}

.kriptomatpricewidgets_optionImage {
	width: 20px;
	margin-right: 0px;   
	margin-top: 5px;
	margin-left: 10px;   
}
.kriptomatpricewidgets_optionText {
	width: 240px;
	height: 30px; 
	line-height: 30px; 
	float:right; 
	font-size:14px; 
	font-family: Rubik;	
	font-weight: bold;
}
.kriptomatpricewidgets_optionName {
	margin-left:10px;
	color: #<?php esc_html_e( $colourText ); ?>;
}
.kriptomatpricewidgets_fiat_option_choices {
	width: 240px;
	height: 30px; 
	line-height: 30px; 
	float:right; 
	font-size:14px; 
	font-family: Rubik;	
	font-weight: bold;
	margin-left:10px;
	color: #<?php esc_html_e( $colourText ); ?>;
	cursor: pointer;
	
    position: relative;
}
.kriptomatpricewidgets_optionShort {
	margin-left:10px;
	color: #<?php esc_html_e( $colourText ); ?>;
	opacity: 0.75;
	font-weight: normal;
}
.kriptomatpricewidgets_fiatButton {	
    width: 271px;
    height: 30px;
    position: absolute;
	top: 0px;
	left: 0px;
}
.kriptomatpricewidgets_chevron {
	float: right;
	color: #<?php esc_html_e( $colourText ); ?>;
	width: 8px;
	display: inline-block;
	position: absolute;
	top: 8px;
    right: 27px;
}
#kriptomatpricewidgets_poweredby {
	display: <?php esc_html_e( $showPoweredBy ); ?>;
}
</style>


<?php

$currencyselected = get_option( 'kriptomatpricewidgets_option_coin', '0');

?>
<div id='kriptomatpricewidgets_calculatorcontainer'>	
    <div id='kriptomatpricewidgets_toprow'>
		<p id='kriptomatpricewidgets_toptext_name_calc'>Crypto Calculator</p>
	</div>	
	
    <div id='kriptomatpricewidgets_fiat_box'>
		<input type='number' id='kriptomatpricewidgets_priceinput' min='30' max='99999' placeholder='0' oninput='javascript: if (this.value.length > 5) this.value = this.value.slice(0, 7);'	onkeyup='KriptomatUpdatePrice();'>	
		<div id='kriptomatpricewidgets_fiat_dropdown'>
			EUR   <svg class='kriptomatpricewidgets_arrow_down'  style='width: 8px;display: inline-block;top: 19px;
    left: 56px;'  aria-hidden='true' focusable='false' data-prefix='fas' data-icon='chevron-down' class='svg-inline--fa fa-chevron-down fa-w-14' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512'><path fill='currentColor' d='M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z'></path></svg>
		</div>
	</div>

    <div id='kriptomatpricewidgets_coin_box'>
		<div id='kriptomatpricewidgets_resultingAmount'>
		
		</div>
		<div id='kriptomatpricewidgets_coin_dropdown'>
			<span id='kriptomatpricewidgets_coinName'><?php esc_html_e( $shortNames[$currencyselected] ); ?></span>  <svg class='kriptomatpricewidgets_arrow_down'  style='width: 8px;display: inline-block;top: 19px;
    left: 56px;'  aria-hidden='true' focusable='false' data-prefix='fas' data-icon='chevron-down' class='svg-inline--fa fa-chevron-down fa-w-14' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512'><path fill='currentColor' d='M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z'></path></svg>
		
			
		</div>
	</div>
	
	
	<div id='kriptomatpricewidgets_BuyNow'>Buy Now</div>
	
	<p id='kriptomatpricewidgets_poweredby'>Powered by Kriptomat</p>
	
	
	
	<div id='KriptomatFiatSelection'>
	    <div id='fiatoptions'>		
			<div id='EURfiatoptionname' class='kriptomatpricewidgets_fiat_option_choices'>EUR<div id='EURbutton' class='kriptomatpricewidgets_fiatButton'></div></div>	
			<div id='GBPfiatoptionname'  class='kriptomatpricewidgets_fiat_option_choices'>GBP<div id='GBPbutton' class='kriptomatpricewidgets_fiatButton'></div></div>	
			<div id='USDfiatoptionname'  class='kriptomatpricewidgets_fiat_option_choices'>USD<div id='USDbutton' class='kriptomatpricewidgets_fiatButton'></div></div>
			<?php 
			foreach ($fiatList as $option)
			{
				if ($option == 'EUR' || $option == 'GBP' || $option == 'USD' ){} else {
					esc_html_e( "<div id='".$option."fiatoptionname' class='kriptomatpricewidgets_fiat_option_choices'>".$option."<div id='".$option."button' class='kriptomatpricewidgets_fiatButton'></div></div>" );
				}
			}
			?>		
		</div>
	</div>
	
	<div id='KriptomatCurrencySelection'>
	    <div id='currencyoptions'>
	        <div id='btcoption'>
		<?php
		
	sort($optionList);
for ($i=0; $i<count($optionList); $i++)
{
	esc_html_e( "
	
				<div id='".$optionList[$i]."container' class='kriptomatpricewidgets_optionContainer'>
					<img src='". esc_html_e( plugin_dir_url( __FILE__ ) . 'images/'. $optionList[$i] ) .".svg' class='kriptomatpricewidgets_optionImage' align='left' >
			
					<div class='kriptomatpricewidgets_optionText'>
						<span id='".$optionList[$i]."optionname' class='kriptomatpricewidgets_optionName'>".$fullNames[$optionList[$i]]."</span>
						<span id='".$optionList[$i]."optionshort' class='kriptomatpricewidgets_optionShort'>".$shortNames[$optionList[$i]]."</span>
						<svg class='kriptomatpricewidgets_chevron'  aria-hidden='true' focusable='false' data-prefix='fas' data-icon='chevron-right' class='svg-inline--fa fa-chevron-right fa-w-10' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 320 512'><path fill='currentColor' d='M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z'></path></svg>
					</div>
					<div id='".$optionList[$i]."button' class='kriptomatpricewidgets_optionButton'></div>
				</div>
				
	" );
}			
?>					
	        </div>
	    </div>
	</div>
</div>

  
  <div id="spacer" style="height: 0px; clear: both;"></div>
  
  
  <?php  submit_button(); ?>
  </form>
  </div>
</div> 
<?php
}


function kriptomatCalculator300x250() {
	
	
	
	 function kriptomatpricewidgets_minimum_digits_required_internal($number, $fiatPrices, $fiatOption)
    {		
		$number = $fiatPrices[$fiatOption] * $number;
        if ($number > 0.1)
		{
			return number_format($number, 2);
		}
		else
		{
			if ($number > 0.01)
			{
				return number_format($number, 3);
			}
			else
			{					
				if ($number > 0.001)
				{
					return number_format($number, 4);
				}
				else
				{						
					if ($number > 0.0001)
					{
						return number_format($number, 5);
					}
					else
					{											
						if ($number > 0.00001)
						{
							return number_format($number, 6);
						}
						else
						{																	
							if ($number > 0.000001)
							{
								return number_format($number, 7);
							}
							else
							{																								
								if ($number > 0.0000001)
								{
									return number_format($number, 8);
								}
								else
								{
									return number_format($number, 9);
								}
							}
						}
					}
				}
			}
		}
    }
		
		
		

	
	$optionList = array();
	$fullNames = array();
	$shortNames = array();
	$currentPrices = array();
	$priceChanges = array();
	
	
	$response = wp_remote_retrieve_body( wp_remote_get( 'https://appapi.kriptomat.io/public/prices' ) );	
	$responseData = json_decode( $response, true );
	
	if (isset($responseData['data']))
	{	
	    $data = $responseData['data'];
	    $count = count($data);
	   
		foreach($responseData['data'] as $currencyArray)
		{
			$optionList[] = $currencyArray['code'];
			$fullNames[$currencyArray['code']] = $currencyArray['name'];
			$shortNames[$currencyArray['code']] = strtoupper($currencyArray['ticker']);
			$currentPrices[$currencyArray['code']] = $currencyArray['price'];
			$priceChanges[$currencyArray['code']] = $currencyArray['change'];
		}	
	}
	
	
	$fiatList = array('EUR','GBP','USD');
	$fiatPrices = array();
	
	$response = wp_remote_retrieve_body( wp_remote_get( 'https://appapi.kriptomat.io/public/fiat-exchange-rates' ) );	
	$responseData = json_decode( $response, true );
		
    if (isset($responseData['rates']))
	{		  
		$rates = $responseData['rates'];
	    $count = count($rates);		
		foreach ($responseData['rates'] as $key => $value)
		{
			if (in_array($key, $fiatList))
			{
				$fiatPrices[$key] = $value;
			}
			else
			{
				$fiatList[] = $key;
				$fiatPrices[$key] = $value;
			}
		}	
	}
	
	$currencyselected = "".get_option( 'kriptomatpricewidgets_option_coin', '0').""; 	
	$fiatOption = "".get_option( 'kriptomatpricewidgets_option_fiat', '0')."";
		
	$colourBackground = get_option('kriptomatpricewidgets_option_colourBackground_Calc', '0');
	$colourText = get_option('kriptomatpricewidgets_option_colourText_Calc', '0');
	$colourBannerBackground = get_option('kriptomatpricewidgets_option_colourBannerBackground_Calc', '0');
	$colourBannerText = get_option('kriptomatpricewidgets_option_colourBannerText_Calc', '0');
	$colourDropDownBackground = get_option('kriptomatpricewidgets_option_colourOptionBackground_Calc', '0');
	$colourDropDownText = get_option('kriptomatpricewidgets_option_colourOptionText_Calc', '0');
	$colourBuyBackground = get_option('kriptomatpricewidgets_option_colourBuyBackground_Calc', '0');
	$colourBuyText = get_option('kriptomatpricewidgets_option_colourBuyText_Calc', '0');
	$poweredBy = get_option('kriptomatpricewidgets_option_PoweredBy_Calc', '0');
	if($poweredBy == 1)
	{ 
		$buynowtop = "block"; 
		$buynowtop = "165px"; 
	}
	else
	{ 
		$showPoweredBy = "none"; 
		$buynowtop = "177px"; 
	}
	
	
		
	$svgdown = '<svg class="kriptomatpricewidgets_arrow_down"  style="width: 8px;display: inline-block;"  aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" class="svg-inline--fa fa-chevron-down fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>';
	
		$content = "


	 <div id='KriptomatWidgetCalcContent'>


<style>

/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}

#kriptomatwidgettable table, th, td, tr, tbody{
    border: none;
	padding: 0px;
	line-height: 1;
}

::-webkit-scrollbar {
  width: 10px;
  height: 10px;
}
::-webkit-scrollbar-thumb {
  background: #dfdcdc;
  border-radius: 5px;
}
::-webkit-scrollbar-track {
  background: rgba(0, 0, 0, 0.005);
}


#kriptomatpricewidgets_calculatorcontainer {
	z-index:3; 
	width:300px; 
	height:250px; 
	padding: 0px; 
	position: relative;
	background-color: #".$colourBackground.";
	border: 0.5px solid #e7e7e8; 
    border-radius: 6px 6px 0px 0px;
}

#kriptomatpricewidgets_toprow {
	position: absolute;
	width: 299px;
	height: 33px;
	left: 0px;
	top: -1px;
	background:#".$colourBannerBackground.";
	border-radius: 5px 5px 0px 0px;
}
#kriptomatpricewidgets_toptext_name {
	font-family: Rubik;
	font-style: normal;
	font-weight: 500;
	color: #".$colourBannerText.";
	position: absolute;
	
    width: 100%;
    text-align: center; 
    font-size: 18px;
    line-height: 33px;
    margin: 0px;
}


	

#kriptomatpricewidgets_fiat_box {
	position: absolute;
	width: 267px;
	height: 50px;
	top: 46px;
	left: 16px;
	background: #".$colourBackground.";
	border: 1px solid #EAEAEA;
	box-sizing: border-box;
	border-radius: 4px;
}
#kriptomatpricewidgets_priceinput {
	position: absolute;
    width: 190px;
    height: 48px;
    top: 0px;
    left: 0px;
    border: none;
    text-align: right;
    padding: 0px 15px 0px 0px;
    outline: none;
    background-color: rgba(255, 255, 255, 0);
    font-family: Rubik;
    font-style: normal;
    font-weight: bold;
    font-size: 18px;
    line-height: 50px;
	color: #".$colourText.";
    letter-spacing: 1px;
}


#kriptomatpricewidgets_fiat_dropdown {	
	background: #".$colourDropDownBackground.";
	color: #".$colourDropDownText.";
    width: 75px;
    height: 50px;
    line-height: 48px;
    float: right;
    border-top-right-radius: 3px;
    border-bottom-right-radius: 3px;
    font-size: 14px;
    font-family: Rubik;
    font-weight: bold;
    font-style: normal;
    text-align: center;
    cursor: pointer;
    margin-top: -1px;
}
#kriptomatpricewidgets_coin_box {
	position: absolute;
	width: 267px;
	height: 50px;
	top: 106px;
	left: 16px;
	background: #".$colourBackground.";
	border: 1px solid #EAEAEA;
	box-sizing: border-box;
	border-radius: 4px;
}
#kriptomatpricewidgets_resultingAmount  {	
	position: absolute;
    width: 190px;
    height: 48px;
    top: 0px;
    left: 0px;
    border: none;
    text-align: right;
    padding: 0px 15px 0px 0px;
    outline: none;
    background-color: rgba(255, 255, 255, 0);
    font-family: Rubik;
    font-style: normal;
    font-weight: bold;
    font-size: 18px;
    line-height: 50px;
	color: #".$colourText.";
    letter-spacing: 1px;
}


#kriptomatpricewidgets_coin_dropdown {		
	background: #".$colourDropDownBackground.";
	color: #".$colourDropDownText.";
    width: 75px;
    height: 50px;
    line-height: 48px;
    float: right;
    border-top-right-radius: 3px;
    border-bottom-right-radius: 3px;
    font-size: 14px;
    font-family: Rubik;
    font-weight: bold;
    font-style: normal;
    text-align: center;
    cursor: pointer;
    margin-top: -1px;
}
#kriptomatpricewidgets_BuyNow {
	cursor: pointer;
    width: 267px;
    height: 50px;
    text-align: center;
    color: #".$colourBuyText.";
    font-family: Rubik;
    font-size: 20px;
    line-height: 50px;
    border-radius: 4px;
    letter-spacing: 0.5px;
    z-index: 4;
    position: absolute;
    top: ".$buynowtop.";
    left: 16px;
}



#kriptomatpricewidgets_BuyNow {
	background: #".$colourBuyBackground.";
}
#kriptomatpricewidgets_BuyNow:hover {
    opacity: 0.75;
}
#kriptomatpricewidgets_poweredby {	
    position: absolute;
    top: 224px;
    left: 94px;
    font-size: 12px;
	color: #".$colourBannerBackground.";
    font-weight: bold;
}
#KriptomatCurrencySelection {
	display:none; 
	position:absolute; 
	top:33px; 
	left:0px; 
	background-color: #".$colourBackground.";
	width:295px; 
	height:216px; 
	padding: 10px 0px; 
	overflow-x:hidden; 
	overflow-y:scroll; 
	z-index:10;
}
#KriptomatFiatSelection {
	display:none; 
	position:absolute; 
	top:33px; 
	left:0px; 
	background-color: #".$colourBackground.";
	width:295px; 
	height:216px; 
	padding: 10px 0px; 
	overflow-x:hidden; 
	overflow-y:scroll; 
	z-index:10;
}

.kriptomatpricewidgets_optionContainer {
	cursor: pointer;
    width: 271px;
    height: 30px;
    font-size: 18px;
    line-height: 30px;
    font-weight: 500;
    margin: 0px 10px;
    position: relative;
}
.kriptomatpricewidgets_optionContainer:hover {		
    background-color: rgba(".$r.", ".$g.", ".$b.", 0.25);
	border-radius: 5px;
}
.kriptomatpricewidgets_optionButton {	
    width: 271px;
    height: 30px;
    position: absolute;
	top: 0px;
	left: 0px;
}

.kriptomatpricewidgets_optionImage {
	width: 20px;
	margin-right: 0px;   
	margin-top: 5px;
	margin-left: 10px;   
}
.kriptomatpricewidgets_optionText {
	width: 240px;
	height: 30px; 
	line-height: 30px; 
	float:right; 
	font-size:14px; 
	font-family: Rubik;	
	font-weight: bold;
}
.kriptomatpricewidgets_optionName {
	margin-left:10px;
	color: #".$colourText.";
}
.kriptomatpricewidgets_fiat_option_choices {
	width: 240px;
	height: 30px; 
	line-height: 30px; 
	float:right; 
	font-size:14px; 
	font-family: Rubik;	
	font-weight: bold;
	margin-left:10px;
	color: #".$colourText.";
	cursor: pointer;
	
    position: relative;
}
.kriptomatpricewidgets_optionShort {
	margin-left:10px;
	color: #".$colourText.";
	opacity: 0.75;
	font-weight: normal;
}
.kriptomatpricewidgets_fiatButton {	
    width: 271px;
    height: 30px;
    position: absolute;
	top: 0px;
	left: 0px;
}
.kriptomatpricewidgets_chevron {
	float: right;
	color: #".$colourText."; 
	width: 8px;
	display: inline-block;
	position: absolute;
	top: 8px;
    right: 27px;
}
#kriptomatpricewidgets_poweredby {
	display: ".$showPoweredBy.";
}
</style>


<div id='kriptomatpricewidgets_calculatorcontainer'>	
    <div id='kriptomatpricewidgets_toprow'>
		<p id='kriptomatpricewidgets_toptext_name'>Crypto Calculator</p>
	</div>	
	
    <div id='kriptomatpricewidgets_fiat_box'>
		<input type='number' id='kriptomatpricewidgets_priceinput' min='30' max='99999' placeholder='0' oninput='javascript: if (this.value.length > 5) this.value = this.value.slice(0, 7);'	onkeyup='KriptomatUpdatePrice();'>	
		<div id='kriptomatpricewidgets_fiat_dropdown'>
			EUR   <svg class='kriptomatpricewidgets_arrow_down'  style='width: 8px;display: inline-block;'  aria-hidden='true' focusable='false' data-prefix='fas' data-icon='chevron-down' class='svg-inline--fa fa-chevron-down fa-w-14' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512'><path fill='currentColor' d='M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z'></path></svg>
		</div>
	</div>

    <div id='kriptomatpricewidgets_coin_box'>
		<div id='kriptomatpricewidgets_resultingAmount'>
		
		</div>
		<div id='kriptomatpricewidgets_coin_dropdown'>
			<span id='kriptomatpricewidgets_coinName'>".$shortNames[$currencyselected]."</span>  <svg class='kriptomatpricewidgets_arrow_down'  style='width: 8px;display: inline-block;'  aria-hidden='true' focusable='false' data-prefix='fas' data-icon='chevron-down' class='svg-inline--fa fa-chevron-down fa-w-14' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512'><path fill='currentColor' d='M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z'></path></svg>
		
			
		</div>
	</div>
	
	
	<div id='kriptomatpricewidgets_BuyNow'>Buy Now</div>
	
	<p id='kriptomatpricewidgets_poweredby'>Powered by Kriptomat</p>
	
	
	
	<div id='KriptomatFiatSelection'>
	    <div id='fiatoptions'>		
			<div id='EURfiatoptionname' class='kriptomatpricewidgets_fiat_option_choices'>EUR<div id='EURbutton' class='kriptomatpricewidgets_fiatButton'></div></div>	
			<div id='GBPfiatoptionname'  class='kriptomatpricewidgets_fiat_option_choices'>GBP<div id='GBPbutton' class='kriptomatpricewidgets_fiatButton'></div></div>	
			<div id='USDfiatoptionname'  class='kriptomatpricewidgets_fiat_option_choices'>USD<div id='USDbutton' class='kriptomatpricewidgets_fiatButton'></div></div>";
			foreach ($fiatList as $option)
			{
				if ($option == 'EUR' || $option == 'GBP' || $option == 'USD' ){} else {
					$content .= "<div id='".$option."fiatoptionname' class='kriptomatpricewidgets_fiat_option_choices'>".$option."<div id='".$option."button' class='kriptomatpricewidgets_fiatButton'></div></div>";
				}
			}
			$content .= "		
		</div>
	</div>
	
	<div id='KriptomatCurrencySelection'>
	    <div id='currencyoptions'>
	        <div id='btcoption'>
		";
	sort($optionList);	
for ($i=0; $i<count($optionList); $i++)
{
	$content .= "
	
				<div id='".$optionList[$i]."container' class='kriptomatpricewidgets_optionContainer'>
					<img src='". esc_url( plugin_dir_url( __FILE__ ) . 'images/'. $optionList[$i] ) .".svg' class='kriptomatpricewidgets_optionImage' align='left' >
			
					<div class='kriptomatpricewidgets_optionText'>
						<span id='".$optionList[$i]."optionname' class='kriptomatpricewidgets_optionName'>".$fullNames[$optionList[$i]]."</span>
						<span id='".$optionList[$i]."optionshort' class='kriptomatpricewidgets_optionShort'>".$shortNames[$optionList[$i]]."</span>
						<svg class='kriptomatpricewidgets_chevron'  aria-hidden='true' focusable='false' data-prefix='fas' data-icon='chevron-right' class='svg-inline--fa fa-chevron-right fa-w-10' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 320 512'><path fill='currentColor' d='M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z'></path></svg>
					</div>
					<div id='".$optionList[$i]."button' class='kriptomatpricewidgets_optionButton'></div>
				</div>
				
	";
}			
				
$content .= "				
	        </div>
	    </div>
	</div>
</div>	
</div>		
		";
		
		
		
		
    return ("".$content."
        <script>
        var referralLink = '".get_option( 'kriptomatpricewidgets_option_name', '0')."'; 
		var fiatOption = '".get_option( 'kriptomatpricewidgets_option_fiat', '0')."';
        var currencyselected = '".get_option( 'kriptomatpricewidgets_option_coin', '0')."'; 
        var kriptomatpricewidgets_links_enabled = '".get_option( 'kriptomatpricewidgets_links_enabled', '0')."'; 
		
        </script>
       
	   
		<script type='text/javascript' >
		
			window.onload = function() {
				 kriptomatpricewidgets_wrappedCode();
			}


			var fiatList = [];
			var fiatPrices = [];

			var eurospend = 0;
			var optionList = [];
			var kriptomatprices = [];
			var shortNames = [];
			var fullNames = [];
			var pricesloaded = false; 


			function KriptomatUpdatePrice() {
								
				eurospend = document.getElementById('kriptomatpricewidgets_priceinput').value;
				
				if (eurospend > 0)
				{
					if (pricesloaded == false)
					{
						
					}
					else
					{
						// console.log(currencyselected);
						// console.log(eurospend);
						// console.log(kriptomatprices[currencyselected]);
						pricing = eurospend / fiatPrices[fiatOption] / kriptomatprices[currencyselected];
						pricing = Math.round((pricing + Number.EPSILON) * 100000000) / 100000000;
						document.getElementById('kriptomatpricewidgets_resultingAmount').innerHTML = '≈ ' + pricing;
												
						var inputtext = document.getElementById('kriptomatpricewidgets_priceinput').value;
					}
				}
				else
				{
					document.getElementById('kriptomatpricewidgets_resultingAmount').innerHTML = '';
				}
			}


			function kriptomatpricewidgets_wrappedCode()
			{

				jQuery(document).on('click', '#kriptomatpricewidgets_fiat_dropdown', function(){
					document.getElementById('KriptomatFiatSelection').style.display = 'block';
				});
				jQuery(document).on('click', '#kriptomatpricewidgets_coin_dropdown', function(){
					document.getElementById('KriptomatCurrencySelection').style.display = 'block';
				});
				


				jQuery(document).on('click', '#kriptomatpricewidgets_BuyNow', function(){		
					
					if(typeof referralLink === 'undefined')
					{
						referralLink = 'https://kriptomat.io';
					}
					
					if (kriptomatpricewidgets_links_enabled == 1)
					{
						if (referralLink.includes('kriptomat.io') || referralLink.includes('go2kriptomat.com'))
						{
							var win = window.open(referralLink, '_blank');
							win.focus();
						}	
						else
						{			
							var win = window.open('https://kriptomat.io', '_blank');
							win.focus();
						}
					}
				});


				document.body.addEventListener( 'click', function ( event ) {
					//console.log(event.srcElement.id);
					for (var i = 0; i < optionList.length; i++)
					{
						if ( 
							event.srcElement.id == optionList[i] + 'button' || 
							event.srcElement.id == optionList[i] + 'container' || 			
							event.srcElement.id == optionList[i] + 'optionname' || 
							 event.srcElement.id == optionList[i] + 'optionshort' || 
							 event.srcElement.id == optionList[i] + 'optionprice' ) {
							
							eurospend = document.getElementById('kriptomatpricewidgets_priceinput').value;
							if (eurospend > 0)
							{
								pricing = eurospend / fiatPrices[fiatOption] / kriptomatprices[optionList[i]];
								pricing = Math.round((pricing + Number.EPSILON) * 100000000) / 100000000;
								document.getElementById('kriptomatpricewidgets_resultingAmount').innerHTML = '≈ ' + pricing;
							}
							else
							{
								document.getElementById('kriptomatpricewidgets_resultingAmount').innerHTML = '';
							}
							document.getElementById('KriptomatCurrencySelection').style.display = 'none';
							document.getElementById('kriptomatpricewidgets_coinName').innerHTML = shortNames[optionList[i]];
							currencyselected = ''+optionList[i]+'';
							break;			
						}			
					} 
					
					
					for (var i = 0; i < fiatList.length; i++)
					{
						//console.log(event.srcElement.id);
						if ( event.srcElement.id == fiatList[i] + 'button' || event.srcElement.id == fiatList[i] + 'fiatoptionname' ) {
							
							//console.log('match');
							fiatOption = fiatList[i];
							eurospend = document.getElementById('kriptomatpricewidgets_priceinput').value;
							if (eurospend > 0)
							{
								pricing = eurospend / fiatPrices[fiatOption] / kriptomatprices[currencyselected];
								pricing = Math.round((pricing + Number.EPSILON) * 100000000) / 100000000;
								document.getElementById('kriptomatpricewidgets_resultingAmount').innerHTML = '≈ ' + pricing;
							}
							else
							{
								document.getElementById('kriptomatpricewidgets_resultingAmount').innerHTML = '';
							}
							
							document.getElementById('KriptomatFiatSelection').style.display = 'none';
							document.getElementById('kriptomatpricewidgets_fiat_dropdown').innerHTML = fiatOption + '  ".$svgdown."';
							
							break;			
						}			
					} 
					
				} );

				var interval2 = window.setInterval(function() {
					try {
						
						if (document.getElementById('btccontainer').innerHTML == ''){} else 
						{
							
							console.log('load prices');
							
							
							var ajaxurl = 'https://appapi.kriptomat.io/public/prices';
							
							jQuery.get(ajaxurl, function(response) {
								
								//console.log(response);
								
								const obj = response.data;
								Object.keys(obj).forEach(key => {						
									optionList.push(key);			
									kriptomatprices[key] = obj[key].price;
									shortNames[key] = obj[key].ticker.toUpperCase();
									fullNames[key] = obj[key].name;
								});	
														
								optionList.sort();		
								
								
								var ajaxurl = 'https://appapi.kriptomat.io/public/fiat-exchange-rates';
								
								jQuery.get(ajaxurl, function(response) {
									
									const obj = response.rates;
									Object.entries(obj).forEach(entry => {
									  const [key, value] = entry;					
										fiatList.push(key);			
										fiatPrices[key] = value;
									});
																		
									if (currencyselected == '')
									{
										currencyselected = 'btc';
									}		
											
									eurospend = document.getElementById('kriptomatpricewidgets_priceinput').value;
									if (eurospend > 0)
									{
										pricing = eurospend * fiatPrices[fiatOption] / kriptomatprices[currencyselected];
										pricing = Math.round((pricing + Number.EPSILON) * 100000000) / 100000000;
										document.getElementById('kriptomatpricewidgets_resultingAmount').innerHTML = '≈ ' + pricing;
										document.getElementById('KriptomatCurrencySelection').style.display = 'none';
									}
									else
									{
										document.getElementById('kriptomatpricewidgets_resultingAmount').innerHTML = '';
										document.getElementById('KriptomatCurrencySelection').style.display = 'none';
									}					
									pricesloaded = true; 
									clearInterval(interval2);
								
								});
							
							});

						}	
					}
					catch (e) {

					}
				}, 1000);

			}	
		
		</script>
    ");
}
add_shortcode ('kriptomatCalculator300x250', 'kriptomatCalculator300x250');


function kriptomatPriceTicker300x250() {
	
	
	 function kriptomatpricewidgets_minimum_digits_required_internal($number, $fiatPrices, $fiatOption)
    {		
		$number = $fiatPrices[$fiatOption] * $number;
        if ($number > 0.1)
		{
			return number_format($number, 2);
		}
		else
		{
			if ($number > 0.01)
			{
				return number_format($number, 3);
			}
			else
			{					
				if ($number > 0.001)
				{
					return number_format($number, 4);
				}
				else
				{						
					if ($number > 0.0001)
					{
						return number_format($number, 5);
					}
					else
					{											
						if ($number > 0.00001)
						{
							return number_format($number, 6);
						}
						else
						{																	
							if ($number > 0.000001)
							{
								return number_format($number, 7);
							}
							else
							{																								
								if ($number > 0.0000001)
								{
									return number_format($number, 8);
								}
								else
								{
									return number_format($number, 9);
								}
							}
						}
					}
				}
			}
		}
    }
		
		
		

	
	$optionList = array();
	$fullNames = array();
	$shortNames = array();
	$currentPrices = array();
	$priceChanges = array();
	
	
	$response = wp_remote_retrieve_body( wp_remote_get( 'https://appapi.kriptomat.io/public/prices' ) );	
	$responseData = json_decode( $response, true );
	
	
	 if (isset($responseData['data']))
	{	
	    $data = $responseData['data'];
	    $count = count($data);
	   
		foreach($responseData['data'] as $currencyArray)
		{
			$optionList[] = $currencyArray['code'];
			$fullNames[$currencyArray['code']] = $currencyArray['name'];
			$shortNames[$currencyArray['code']] = strtoupper($currencyArray['ticker']);
			$currentPrices[$currencyArray['code']] = $currencyArray['price'];
			$priceChanges[$currencyArray['code']] = $currencyArray['change'];
		}	
	}
	
	$fiatList = array('EUR','GBP','USD');
	$fiatPrices = array();
	
	
	$response = wp_remote_retrieve_body( wp_remote_get( 'https://appapi.kriptomat.io/public/fiat-exchange-rates' ) );	
	$responseData = json_decode( $response, true );	
	
    if (isset($responseData['rates']))
	{		  
		$rates = $responseData['rates'];
	    $count = count($rates);		
		foreach ($responseData['rates'] as $key => $value)
		{
			if (in_array($key, $fiatList))
			{
				$fiatPrices[$key] = $value;
			}
			else
			{
				$fiatList[] = $key;
				$fiatPrices[$key] = $value;
			}
		}	
	}
	
	$cryptoChoices = array();
	$cryptoChoices[0] = get_option( 'kriptomatpricewidgets_option_tickerchoice1', '0');
	$cryptoChoices[1] = get_option( 'kriptomatpricewidgets_option_tickerchoice2', '0');
	$cryptoChoices[2] = get_option( 'kriptomatpricewidgets_option_tickerchoice3', '0');
	$cryptoChoices[3] = get_option( 'kriptomatpricewidgets_option_tickerchoice4', '0');
	$cryptoChoices[4] = get_option( 'kriptomatpricewidgets_option_tickerchoice5', '0');
	$cryptoChoices[5] = get_option( 'kriptomatpricewidgets_option_tickerchoice6', '0');
	$cryptoChoices[6] = get_option( 'kriptomatpricewidgets_option_tickerchoice7', '0');
	$cryptoChoices[7] = get_option( 'kriptomatpricewidgets_option_tickerchoice8', '0');
	$cryptoChoices[8] = get_option( 'kriptomatpricewidgets_option_tickerchoice9', '0');
	$cryptoChoices[9] = get_option( 'kriptomatpricewidgets_option_tickerchoice10', '0');
	$cryptoChoices[10] = get_option( 'kriptomatpricewidgets_option_tickerchoice11', '0');
	$cryptoChoices[11] = get_option( 'kriptomatpricewidgets_option_tickerchoice12', '0');
	$cryptoChoices[12] = get_option( 'kriptomatpricewidgets_option_tickerchoice13', '0');
	$cryptoChoices[13] = get_option( 'kriptomatpricewidgets_option_tickerchoice14', '0');
	
	$fiatOption = "".get_option( 'kriptomatpricewidgets_option_fiat', '0')."";
		
	$colourBannerBackground = "".get_option( 'kriptomatpricewidgets_option_colourBannerBackground', '0')."";
	$colourBannerText = "".get_option( 'kriptomatpricewidgets_option_colourBannerText', '0')."";
	$colourRowOdd = "".get_option( 'kriptomatpricewidgets_option_colourRowOdd', '0')."";
	$colourRowEven = "".get_option( 'kriptomatpricewidgets_option_colourRowEven', '0')."";
	$colourRowText = "".get_option( 'kriptomatpricewidgets_option_colourRowText', '0')."";
	$colourBuyBackground = "".get_option( 'kriptomatpricewidgets_option_colourBuyBackground', '0')."";
	$colourBuyText = "".get_option( 'kriptomatpricewidgets_option_colourBuyText', '0')."";
		
	
$svgdown = '<svg class="kriptomatpricewidgets_arrow_down"  style="width: 8px;  color: #FF2626;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort-down" class="svg-inline--fa fa-sort-down fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41z"></path></svg>';
$svgup = '<svg class="kriptomatpricewidgets_arrow_up" style="width: 8px;  color: #00D315;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort-up" class="svg-inline--fa fa-sort-up fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M279 224H41c-21.4 0-32.1-25.9-17-41L143 64c9.4-9.4 24.6-9.4 33.9 0l119 119c15.2 15.1 4.5 41-16.9 41z"></path></svg>';	
		
		
		
		$content = "
 <div id='KriptomatWidgetTickerSmall'>
 
 <style>

/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}

#kriptomatwidgettable table, th, td, tr, tbody{
    border: none;
	padding: 0px;
	line-height: 1;
}
#kriptomatBuyNow {
    background-color: #".$colourBuyBackground.";
	cursor:pointer;
	width:100%;
	height:41px;
	text-align:center;
	font-family: Rubik;
	font-size: 16px;
	line-height:41px;
	border-radius: 0px 0px 4px 4px;
	letter-spacing: 0.5px;
	color: #".$colourBuyText.";
    position: absolute;
	bottom: 0px;
}
#kriptomatBuyNow:hover {
    background-color: #009efc;
}

#kriptomatbannercontainer {
	width:300px;   
	height:250px; 
	border: 0.5px solid #e7e7e8;   
	position:relative; 
	overflow: hidden; 
	background-color: #ffffff;    
    line-height: 1;
	font-family: Rubik;
	color: #999999;
	border-radius: 5px;
    border-top: 0px;
    border-right: 0px;
    border-left: 0px;
}
#kriptomattoprow {
	position: absolute;
	width: 300px;
	height: 26px;
	left: 0px;
	top: 0px;
	background:#".$colourBannerBackground.";
	border-radius: 5px 5px 0px 0px;
}
#kriptomatpricewidgets_toptext_name {
	font-family: Rubik;
	font-style: normal;
	font-weight: bold;
	color: #".$colourBannerText.";
	position: absolute;
	width: 41px;
	left: 13px;
	top: 0px;
	font-size: 12px;
    line-height: 26px;
    margin: 0px;
}
#kriptomatpricewidgets_toptext_price {
	font-family: Rubik;
	font-style: normal;
	font-weight: bold;
	color: #".$colourBannerText.";
	position: absolute;
	width: 41px;
	left: 140px;
	top: 0px;
	font-size: 12px;
    line-height: 26px;
    margin: 0px;
}
#kriptomatpricewidgets_toptext_change {
	font-family: Rubik;
	font-style: normal;
	font-weight: bold;
	color: #".$colourBannerText.";
	position: absolute;
	width: 41px;
	left: 214px;
	top: 0px;
	font-size: 12px;
    line-height: 26px;
    margin: 0px;
}
#kriptomatpricewidgets_CurrencySelection {
	position:absolute;
	top:26px; 
	left:0px; 
	width:300px; 
	height:212px;
	padding: 0px; 
	z-index:3;
}
.kriptomatpricewidgets_coinContainer1 {
     position: relative;
    cursor: pointer;
    width: 278.4px;
	width: 300px;
    height: 36px;
    height: 38px;
    font-size: 18px;
    line-height: 18px;
    font-weight: 500;
    padding: 0px 10px;
    clear: both;
    border: 0.25px solid #".$colourRowEven.";
	background-color:  #".$colourRowOdd.";
}
.kriptomatpricewidgets_coinContainer2 {
     position: relative;
    cursor: pointer;
    width: 278.4px;
	width: 300px;
    height: 36px;
    height: 38px;
    font-size: 18px;
    line-height: 18px;
    font-weight: 500;
    padding: 0px 10px;
    clear: both;
    border: 0.25px solid #".$colourRowEven.";
	background-color:  #".$colourRowEven.";
}
.kriptomatpricewidgets_imageplacement {
	width: 18px;
	height: 36px; 
	margin-right: 5px; 
	float: left;
}
.kriptomatpricewidgets_coinImage {
	width: 18px;
	margin-top: 9px;
	margin-right: 10px;
}
.kriptomatpricewidgets_optionName {
	margin-left:0px; 
	color:black;
	float:left;
	width: 95px;
	font-size: 12px;
	line-height: 36px;
	color: #".$colourRowText."; 
    font-family: Rubik;
    font-style: normal;
	font-weight: bold;
}
.kriptomatpricewidgets_optionPrice {
	margin-left:10px; 
	color:black;
	float:left;
	width: 100px;
	font-size: 12px;
	line-height: 36px;
	color: #".$colourRowText."; 
    font-family: Rubik;
    font-style: normal;
	font-weight: bold;
}
.kriptomatpricewidgets_optionEuro {	
	color: #".$colourRowText."; 
	width: 24px;
    font-size: 12px;
    line-height: 36px;
    font-family: Rubik;
    font-style: normal;
    font-weight: normal;
    opacity: 0.75;
}
.kriptomatpricewidgets_optionChange {
	margin-left:10px; 
	color:black;
	float:left;
	font-size: 12px;
	line-height: 36px;
	font-weight: bold;
}
.kriptomatpricewidgets_arrow_down {	
    position: absolute;
    top: 8px;
    left: 237px;
}
.kriptomatpricewidgets_arrow_up {	
    position: absolute;
    top: 14px;
    left: 237px;
}
</style>
<div id='kriptomatbannercontainer' >	
    <div id='kriptomattoprow'>
		<p id='kriptomatpricewidgets_toptext_name'>Name</p>
		<p id='kriptomatpricewidgets_toptext_price'>Price</p>
		<p id='kriptomatpricewidgets_toptext_change'>Change(24h)</p>
	</div>	
	<div id='kriptomatpricewidgets_CurrencySelection'>";

for ($i=0; $i<count($cryptoChoices); $i++)
{
	if ($i % 2 == 0) {
		$content .= "<div id='".$cryptoChoices[$i]."container' class='kriptomatpricewidgets_coinContainer1'>";
	}
	else
	{
		$content .= "<div id='".$cryptoChoices[$i]."container' class='kriptomatpricewidgets_coinContainer2'>";
	}
	$content .= "
		<div class='kriptomatpricewidgets_imageplacement'>
		<img  id='".$cryptoChoices[$i]."kriptomatpricewidgets_optionImage' src='". esc_url( plugin_dir_url( __FILE__ ) . 'images/'. $cryptoChoices[$i] ) .".svg' class='kriptomatpricewidgets_coinImage'>
		</div>
		<div class='kriptomatpricewidgets_optionName'  id='".$cryptoChoices[$i]."kriptomatpricewidgets_optionName'>
			".$fullNames[$cryptoChoices[$i]]."
		</div>
		<div class='kriptomatpricewidgets_optionPrice' id='".$cryptoChoices[$i]."kriptomatpricewidgets_optionPrice'>";
			if (isset($currentPrices[$cryptoChoices[$i]])) { $content .= kriptomatpricewidgets_minimum_digits_required_internal($currentPrices[$cryptoChoices[$i]], $fiatPrices, $fiatOption); }			
				$content .= " </span><span class='kriptomatpricewidgets_optionEuro'>".$fiatOption."</span>
		</div>";	
		if ($priceChanges[$cryptoChoices[$i]] > 0){
			$content .= "<div class='kriptomatpricewidgets_optionChange'  id='".$cryptoChoices[$i]."kriptomatpricewidgets_optionChange' style='color:#00D315;'> ".$svgup." ".$priceChanges[$cryptoChoices[$i]]."%
			</div>";
		} else { 
			$pricechange = 1 - $priceChanges[$cryptoChoices[$i]];
			$content .= "<div class='kriptomatpricewidgets_optionChange' id='".$cryptoChoices[$i]."kriptomatpricewidgets_optionChange' style='color:#FF2626;'> ".$svgdown." ".$pricechange."%</div>";
		}
		
		 
		
	$content .= "</div>";
}	
$content .= "		
	</div>
</div>
"; 
 
 $content .= "</div>";
	
	
	
	
	
    return ("".$content."
        <script>
		
		var kriptomatpricewidgets_links_enabled = '".get_option( 'kriptomatpricewidgets_links_enabled', '0')."'; 
        var referralLink = '".get_option( 'kriptomatpricewidgets_option_name', '0')."'; 
		var fiatOption = '".get_option( 'kriptomatpricewidgets_option_fiat', '0')."';
        var cryptoChoices = [
		'".get_option( 'kriptomatpricewidgets_option_tickerchoice1', '0')."',
		'".get_option( 'kriptomatpricewidgets_option_tickerchoice2', '0')."',
		'".get_option( 'kriptomatpricewidgets_option_tickerchoice3', '0')."',
		'".get_option( 'kriptomatpricewidgets_option_tickerchoice4', '0')."',
		'".get_option( 'kriptomatpricewidgets_option_tickerchoice5', '0')."',
		'".get_option( 'kriptomatpricewidgets_option_tickerchoice6', '0')."',
		'".get_option( 'kriptomatpricewidgets_option_tickerchoice7', '0')."',
		'".get_option( 'kriptomatpricewidgets_option_tickerchoice8', '0')."',
		'".get_option( 'kriptomatpricewidgets_option_tickerchoice9', '0')."',
		'".get_option( 'kriptomatpricewidgets_option_tickerchoice10', '0')."',
		'".get_option( 'kriptomatpricewidgets_option_tickerchoice11', '0')."',
		'".get_option( 'kriptomatpricewidgets_option_tickerchoice12', '0')."',
		'".get_option( 'kriptomatpricewidgets_option_tickerchoice13', '0')."',
		'".get_option( 'kriptomatpricewidgets_option_tickerchoice14', '0')."'
		];		
		
        </script>
		<script type='text/javascript'>
		
		window.addEventListener('load', myInit, true); function myInit(){
			kriptomatpricewidgets_wrappedCode_ticker250();		
		}

		var kriptomatprices = [];
		var kriptomatchanges = [];
		var pricesloaded = false; 

		var fiatList = [];
		var fiatPrices = [];

		var optionList = [];
		var shortNames = [];
		var fullNames = [];

		function kriptomatpricewidgets_wrappedCode_ticker250()
		{	
			
			var ajaxurl = 'https://appapi.kriptomat.io/public/fiat-exchange-rates';
			jQuery.get(ajaxurl, function(response) {
				
				const obj = response.rates;
				Object.entries(obj).forEach(entry => {
				  const [key, value] = entry;					
					fiatList.push(key);			
					fiatPrices[key] = value;
				});
				
			});
			
			document.body.addEventListener( 'click', function ( event ) {
				
				if(typeof referralLink === 'undefined')
				{
					referralLink = 'https://kriptomat.io';
				}
				
				for (var i = 0; i < cryptoChoices.length; i++)
				{
					if ( event.srcElement.id == cryptoChoices[i] + 'kriptomatpricewidgets_optionName' || 
						 event.srcElement.id == cryptoChoices[i] + 'kriptomatpricewidgets_optionImage' || 
						 event.srcElement.id == cryptoChoices[i] + 'kriptomatpricewidgets_optionShort' || 
						 event.srcElement.id == cryptoChoices[i] + 'kriptomatpricewidgets_optionChange' || 
						 event.srcElement.id == cryptoChoices[i] + 'kriptomatpricewidgets_optionPrice'	) {
									
						
						if (kriptomatpricewidgets_links_enabled == 1)
						{
							if (referralLink.includes('kriptomat.io') || referralLink.includes('go2kriptomat.com'))
							{
								var win = window.open(referralLink, '_blank');
								win.focus();
							}	
							else
							{			
								var win = window.open('https://kriptomat.io', '_blank');
								win.focus();
							}
						}	
					}
				} 
			} );

		

	 var fetchingUpdate = false;
	 var intervalTicker = window.setInterval(function() {	
		if (fetchingUpdate == false)
		{			
			fetchingUpdate = true;	
			//console.log('fetchingUpdate');


			var ajaxurl = 'https://appapi.kriptomat.io/public/prices';
			jQuery.get(ajaxurl, function(response) {
						
					const obj = response.data;
					Object.keys(obj).forEach(key => {						
						optionList.push(key);			
						kriptomatprices[key] = obj[key].price;
						kriptomatchanges[key] = obj[key].change;
						shortNames[key] = obj[key].ticker.toUpperCase();
						fullNames[key] = obj[key].name;
					});	
					//console.log(optionList);	
					for (var i = 0; i < cryptoChoices.length; i++)
					{										
						//console.log(cryptoChoices[i] + ' - ' + kriptomatprices[cryptoChoices[i]]);	
						if (typeof kriptomatprices[cryptoChoices[i]] !== 'undefined')
						{
							var changenumber = kriptomatchanges[cryptoChoices[i]];
							if (changenumber < 0)
							{
								changenumber = 1 - changenumber;								
							}
							
							
							document.getElementById(cryptoChoices[i] + 'kriptomatpricewidgets_optionPrice').innerHTML = kriptomatpricewidgets_minimum_digits_required(kriptomatprices[cryptoChoices[i]]) + ' <span class=\'kriptomatpricewidgets_optionEuro\'>".$fiatOption."</span>';					
							if (kriptomatchanges[cryptoChoices[i]] > 0)
							{
								document.getElementById(cryptoChoices[i] + 'kriptomatpricewidgets_optionChange').innerHTML = '".$svgup." ' + changenumber.toLocaleString(undefined, {maximumFractionDigits:2}) + '%';		
								document.getElementById(cryptoChoices[i] + 'kriptomatpricewidgets_optionChange').style.color = '#00D315';
							}
							else
							{
								document.getElementById(cryptoChoices[i] + 'kriptomatpricewidgets_optionChange').innerHTML = '".$svgdown." ' + changenumber.toLocaleString(undefined, {maximumFractionDigits:2}) + '%';
								document.getElementById(cryptoChoices[i] + 'kriptomatpricewidgets_optionChange').style.color = '#FF2626';
							}
							
					
						}						
					}	

					fetchingUpdate = false;	
				
			});
			
		}
	},5000);



		}

		
function kriptomatpricewidgets_minimum_digits_required(number)
{ 
	//console.log(fiatPrices[fiatOption]);

	number = number * fiatPrices[fiatOption];
	if (number > 500)
	{
		//return Number(number).toFixed(0); 
		return number.toLocaleString(undefined, {maximumFractionDigits:2});
	}
	else
	{
		if (number > 0.1)
		{
			//return Number(number).toFixed(2); 
			return number.toLocaleString(undefined, {maximumFractionDigits:2});
		}
		else
		{
			if (number > 0.01)
			{
				//return Number(number).toFixed(3); 
				return number.toLocaleString(undefined, {maximumFractionDigits:3});
			}
			else
			{			
				if (number > 0.001)
				{
					//return Number(number).toFixed(4); 	
					return number.toLocaleString(undefined, {maximumFractionDigits:4});
				}
				else
				{						
					if (number > 0.0001)
					{
						//return Number(number).toFixed(5);
						return number.toLocaleString(undefined, {maximumFractionDigits:5});
					}
					else
					{											
						if (number > 0.00001)
						{
							//return Number(number).toFixed(6);
							return number.toLocaleString(undefined, {maximumFractionDigits:6});
						}
						else
						{																	
							if (number > 0.000001)
							{								
								//return Number(number).toFixed(7);
								return number.toLocaleString(undefined, {maximumFractionDigits:7});
							}
							else
							{																								
								if (number > 0.0000001)
								{
									//return Number(number).toFixed(8);
									return number.toLocaleString(undefined, {maximumFractionDigits:8});
								}
								else
								{
									//return Number(number).toFixed(9);
									return number.toLocaleString(undefined, {maximumFractionDigits:9});
								}
							}
						}
					}
				}
			
			
			
			
			}
		}
   

	}

}


		
		
		
		</script>
    ");
}
add_shortcode ('kriptomatPriceTicker300x250', 'kriptomatPriceTicker300x250');

function kriptomatPriceTicker300x600() {
	
	
	
	 function kriptomatpricewidgets_minimum_digits_required_internal($number, $fiatPrices, $fiatOption)
    {		
		$number = $fiatPrices[$fiatOption] * $number;
        if ($number > 0.1)
		{
			return number_format($number, 2);
		}
		else
		{
			if ($number > 0.01)
			{
				return number_format($number, 3);
			}
			else
			{					
				if ($number > 0.001)
				{
					return number_format($number, 4);
				}
				else
				{						
					if ($number > 0.0001)
					{
						return number_format($number, 5);
					}
					else
					{											
						if ($number > 0.00001)
						{
							return number_format($number, 6);
						}
						else
						{																	
							if ($number > 0.000001)
							{
								return number_format($number, 7);
							}
							else
							{																								
								if ($number > 0.0000001)
								{
									return number_format($number, 8);
								}
								else
								{
									return number_format($number, 9);
								}
							}
						}
					}
				}
			}
		}
    }
		
		
		

	
	$optionList = array();
	$fullNames = array();
	$shortNames = array();
	$currentPrices = array();
	$priceChanges = array();
	
	
	$response = wp_remote_retrieve_body( wp_remote_get( 'https://appapi.kriptomat.io/public/prices' ) );	
	$responseData = json_decode( $response, true );	
	
	 if (isset($responseData['data']))
	{	
	    $data = $responseData['data'];
	    $count = count($data);
	   
		foreach($responseData['data'] as $currencyArray)
		{
			$optionList[] = $currencyArray['code'];
			$fullNames[$currencyArray['code']] = $currencyArray['name'];
			$shortNames[$currencyArray['code']] = strtoupper($currencyArray['ticker']);
			$currentPrices[$currencyArray['code']] = $currencyArray['price'];
			$priceChanges[$currencyArray['code']] = $currencyArray['change'];
		}	
	}
	
	$fiatList = array('EUR','GBP','USD');
	$fiatPrices = array();
	
	

	$response = wp_remote_retrieve_body( wp_remote_get( 'https://appapi.kriptomat.io/public/fiat-exchange-rates' ) );	
	$responseData = json_decode( $response, true );	
	
	
    if (isset($responseData['rates']))
	{		  
		$rates = $responseData['rates'];
	    $count = count($rates);		
		foreach ($responseData['rates'] as $key => $value)
		{
			if (in_array($key, $fiatList))
			{
				$fiatPrices[$key] = $value;
			}
			else
			{
				$fiatList[] = $key;
				$fiatPrices[$key] = $value;
			}
		}	
	}
	
	$cryptoChoices = array();
	$cryptoChoices[0] = get_option( 'kriptomatpricewidgets_option_tickerchoice1', '0');
	$cryptoChoices[1] = get_option( 'kriptomatpricewidgets_option_tickerchoice2', '0');
	$cryptoChoices[2] = get_option( 'kriptomatpricewidgets_option_tickerchoice3', '0');
	$cryptoChoices[3] = get_option( 'kriptomatpricewidgets_option_tickerchoice4', '0');
	$cryptoChoices[4] = get_option( 'kriptomatpricewidgets_option_tickerchoice5', '0');
	$cryptoChoices[5] = get_option( 'kriptomatpricewidgets_option_tickerchoice6', '0');
	$cryptoChoices[6] = get_option( 'kriptomatpricewidgets_option_tickerchoice7', '0');
	$cryptoChoices[7] = get_option( 'kriptomatpricewidgets_option_tickerchoice8', '0');
	$cryptoChoices[8] = get_option( 'kriptomatpricewidgets_option_tickerchoice9', '0');
	$cryptoChoices[9] = get_option( 'kriptomatpricewidgets_option_tickerchoice10', '0');
	$cryptoChoices[10] = get_option( 'kriptomatpricewidgets_option_tickerchoice11', '0');
	$cryptoChoices[11] = get_option( 'kriptomatpricewidgets_option_tickerchoice12', '0');
	$cryptoChoices[12] = get_option( 'kriptomatpricewidgets_option_tickerchoice13', '0');
	$cryptoChoices[13] = get_option( 'kriptomatpricewidgets_option_tickerchoice14', '0');
	
	$fiatOption = "".get_option( 'kriptomatpricewidgets_option_fiat', '0')."";
		
	$colourBannerBackground = "".get_option( 'kriptomatpricewidgets_option_colourBannerBackground', '0')."";
	$colourBannerText = "".get_option( 'kriptomatpricewidgets_option_colourBannerText', '0')."";
	$colourRowOdd = "".get_option( 'kriptomatpricewidgets_option_colourRowOdd', '0')."";
	$colourRowEven = "".get_option( 'kriptomatpricewidgets_option_colourRowEven', '0')."";
	$colourRowText = "".get_option( 'kriptomatpricewidgets_option_colourRowText', '0')."";
	$colourBuyBackground = "".get_option( 'kriptomatpricewidgets_option_colourBuyBackground', '0')."";
	$colourBuyText = "".get_option( 'kriptomatpricewidgets_option_colourBuyText', '0')."";
		
		
	$svgdown = '<svg class="kriptomatpricewidgets_arrow_down"  style="width: 8px;  color: #FF2626;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort-down" class="svg-inline--fa fa-sort-down fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41z"></path></svg>';
	$svgup = '<svg class="kriptomatpricewidgets_arrow_up" style="width: 8px;  color: #00D315;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort-up" class="svg-inline--fa fa-sort-up fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M279 224H41c-21.4 0-32.1-25.9-17-41L143 64c9.4-9.4 24.6-9.4 33.9 0l119 119c15.2 15.1 4.5 41-16.9 41z"></path></svg>';	

		$content = "
 <div id='KriptomatWidgetTickerSmall'>
 
 <style>

/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}

#kriptomatwidgettable table, th, td, tr, tbody{
    border: none;
	padding: 0px;
	line-height: 1;
}
#kriptomatBuyNow {
    background-color: #".$colourBuyBackground.";
	cursor:pointer;
	width:100%;
	height:41px;
	text-align:center;
	font-family: Rubik;
	font-size: 16px;
	line-height:41px;
	border-radius: 0px 0px 4px 4px;
	letter-spacing: 0.5px;
	color: #".$colourBuyText.";
    position: absolute;
	bottom: 0px;
}
#kriptomatBuyNow:hover {
    opacity: 0.75;
}

#kriptomatbannercontainer {
	width:300px;   
	height:600px; 
	border: 0.5px solid #e7e7e8;   
	position:relative; 
	overflow: hidden; 
	background-color: #ffffff;    
    line-height: 1;
	font-family: Rubik;
	color: #999999;
	border-radius: 5px;
    border-top: 0px;
    border-right: 0px;
    border-left: 0px;
}
#kriptomattoprow {
	position: absolute;
	width: 300px;
	height: 26px;
	left: 0px;
	top: 0px;
	background:#".$colourBannerBackground.";
	border-radius: 5px 5px 0px 0px;
}
#kriptomatpricewidgets_toptext_name {
	font-family: Rubik;
	font-style: normal;
	font-weight: bold;
	color: #".$colourBannerText.";
	position: absolute;
	width: 41px;
	left: 13px;
	top: 0px;
	font-size: 12px;
    line-height: 26px;
    margin: 0px;
}
#kriptomatpricewidgets_toptext_price {
	font-family: Rubik;
	font-style: normal;
	font-weight: bold;
	color: #".$colourBannerText.";
	position: absolute;
	width: 41px;
	left: 140px;
	top: 0px;
	font-size: 12px;
    line-height: 26px;
    margin: 0px;
}
#kriptomatpricewidgets_toptext_change {
	font-family: Rubik;
	font-style: normal;
	font-weight: bold;
	color: #".$colourBannerText.";
	position: absolute;
	width: 75px;
	left: 214px;
	top: 0px;
	font-size: 12px;
    line-height: 26px;
    margin: 0px;
}
#kriptomatpricewidgets_CurrencySelection {
	position:absolute;
	top:26px; 
	left:0px; 
	width:300px; 
	height:212px;
	padding: 0px; 
	z-index:3;
}
.kriptomatpricewidgets_coinContainer1 {
     position: relative;
    cursor: pointer;
    width: 278.4px;
	width: 300px;
    height: 36px;
    height: 38px;
    font-size: 18px;
    line-height: 18px;
    font-weight: 500;
    padding: 0px 10px;
    clear: both;
    border: 0.25px solid #".$colourRowEven.";
	background-color:  #".$colourRowOdd.";
}
.kriptomatpricewidgets_coinContainer2 {
     position: relative;
    cursor: pointer;
    width: 278.4px;
	width: 300px;
    height: 36px;
    height: 38px;
    font-size: 18px;
    line-height: 18px;
    font-weight: 500;
    padding: 0px 10px;
    clear: both;
    border: 0.25px solid #".$colourRowEven.";
	background-color:  #".$colourRowEven.";
}
.kriptomatpricewidgets_imageplacement {
	width: 18px;
	height: 36px; 
	margin-right: 5px; 
	float: left;
}
.kriptomatpricewidgets_coinImage {
	width: 18px;
	margin-top: 9px;
	margin-right: 10px;
}
.kriptomatpricewidgets_optionName {
	margin-left:0px; 
	float:left;
	width: 95px;
	font-size: 12px;
	line-height: 36px;
	color: #".$colourRowText."; 
    font-family: Rubik;
    font-style: normal;
	font-weight: bold;
}
.kriptomatpricewidgets_optionPrice {
	margin-left:10px; 
	float:left;
	width: 100px;
	font-size: 12px;
	line-height: 36px;
	color: #".$colourRowText."; 
    font-family: Rubik;
    font-style: normal;
	font-weight: bold;
}
.kriptomatpricewidgets_optionEuro {	
	color: #".$colourRowText."; 
	width: 24px;
    font-size: 12px;
    line-height: 36px;
    font-family: Rubik;
    font-style: normal;
    font-weight: normal;
    opacity: 0.75;
}
.kriptomatpricewidgets_optionChange {
	margin-left:10px; 
	color:black;
	float:left;
	font-size: 12px;
	line-height: 36px;
	font-weight: bold;
}
.kriptomatpricewidgets_arrow_down {	
    position: absolute;
    top: 8px;
    left: 237px;
}
.kriptomatpricewidgets_arrow_up {	
    position: absolute;
    top: 14px;
    left: 237px;
}
</style>
<div id='kriptomatbannercontainer' >	
    <div id='kriptomattoprow'>
		<p id='kriptomatpricewidgets_toptext_name'>Name</p>
		<p id='kriptomatpricewidgets_toptext_price'>Price</p>
		<p id='kriptomatpricewidgets_toptext_change'>Change(24h)</p>
	</div>	
	<div id='kriptomatpricewidgets_CurrencySelection'>";

for ($i=0; $i<count($cryptoChoices); $i++)
{
	if ($i % 2 == 0) {
		$content .= "<div id='".$cryptoChoices[$i]."container' class='kriptomatpricewidgets_coinContainer1'>";
	}
	else
	{
		$content .= "<div id='".$cryptoChoices[$i]."container' class='kriptomatpricewidgets_coinContainer2'>";
	}
	$content .= "
		<div class='kriptomatpricewidgets_imageplacement'>
		<img id='".$cryptoChoices[$i]."kriptomatpricewidgets_optionImage' src='". esc_url( plugin_dir_url( __FILE__ ) . 'images/'. $cryptoChoices[$i] ) .".svg' class='kriptomatpricewidgets_coinImage'>
		</div>
		<div class='kriptomatpricewidgets_optionName'  id='".$cryptoChoices[$i]."kriptomatpricewidgets_optionName'>
			".$fullNames[$cryptoChoices[$i]]."
		</div>
		<div class='kriptomatpricewidgets_optionPrice' id='".$cryptoChoices[$i]."kriptomatpricewidgets_optionPrice'>";
			if (isset($currentPrices[$cryptoChoices[$i]])) { $content .= kriptomatpricewidgets_minimum_digits_required_internal($currentPrices[$cryptoChoices[$i]], $fiatPrices, $fiatOption); }			
				$content .= " </span><span class='kriptomatpricewidgets_optionEuro'>".$fiatOption."</span>
		</div>";	
		if ($priceChanges[$cryptoChoices[$i]] > 0){
			$content .= "<div class='kriptomatpricewidgets_optionChange'  id='".$cryptoChoices[$i]."kriptomatpricewidgets_optionChange' style='color:#00D315;'> ".$svgup." ".$priceChanges[$cryptoChoices[$i]]."%
			</div>";
		} else { 
			$pricechange = 1 - $priceChanges[$cryptoChoices[$i]];
			$content .= "<div class='kriptomatpricewidgets_optionChange' id='".$cryptoChoices[$i]."kriptomatpricewidgets_optionChange' style='color:#FF2626;'> ".$svgdown." ".$pricechange."%</div>";
		}
		
		 
		
	$content .= "</div>";
}	
$content .= "		
	</div>
	<div id='kriptomatBuyNow'>Buy Now</div>
</div>
"; 
 
 $content .= "</div>";
	
    return ("".$content."
	
	
        <script>
		var kriptomatpricewidgets_links_enabled = '".get_option( 'kriptomatpricewidgets_links_enabled', '0')."'; 
        var referralLink = '".get_option( 'kriptomatpricewidgets_option_name', '0')."'; 
		var fiatOption = '".get_option( 'kriptomatpricewidgets_option_fiat', '0')."';
        var cryptoChoices = [
		'".get_option( 'kriptomatpricewidgets_option_tickerchoice1', '0')."',
		'".get_option( 'kriptomatpricewidgets_option_tickerchoice2', '0')."',
		'".get_option( 'kriptomatpricewidgets_option_tickerchoice3', '0')."',
		'".get_option( 'kriptomatpricewidgets_option_tickerchoice4', '0')."',
		'".get_option( 'kriptomatpricewidgets_option_tickerchoice5', '0')."',
		'".get_option( 'kriptomatpricewidgets_option_tickerchoice6', '0')."',
		'".get_option( 'kriptomatpricewidgets_option_tickerchoice7', '0')."',
		'".get_option( 'kriptomatpricewidgets_option_tickerchoice8', '0')."',
		'".get_option( 'kriptomatpricewidgets_option_tickerchoice9', '0')."',
		'".get_option( 'kriptomatpricewidgets_option_tickerchoice10', '0')."',
		'".get_option( 'kriptomatpricewidgets_option_tickerchoice11', '0')."',
		'".get_option( 'kriptomatpricewidgets_option_tickerchoice12', '0')."',
		'".get_option( 'kriptomatpricewidgets_option_tickerchoice13', '0')."',
		'".get_option( 'kriptomatpricewidgets_option_tickerchoice14', '0')."'
		];		
		
        </script>
		<script type='text/javascript'>
		
		
		window.addEventListener('load', myInit, true); function myInit(){
			 kriptomatpricewidgets_wrappedCode_ticker250();
		}

		var kriptomatprices = [];
		var kriptomatchanges = [];
		var pricesloaded = false; 

		var fiatList = [];
		var fiatPrices = [];

		var optionList = [];
		var shortNames = [];
		var fullNames = [];

		function kriptomatpricewidgets_wrappedCode_ticker250()
		{	
			
			
			var ajaxurl = 'https://appapi.kriptomat.io/public/fiat-exchange-rates';
			jQuery.get(ajaxurl, function(response) {
				
					const obj = response.rates;
					Object.entries(obj).forEach(entry => {
					  const [key, value] = entry;					
						fiatList.push(key);			
						fiatPrices[key] = value;
					});
				
			});
			
			
			
			
			document.body.addEventListener( 'click', function ( event ) {
				
				if(typeof referralLink === 'undefined')
				{
					referralLink = 'https://kriptomat.io';
				}
				
				//console.log(event.srcElement.id);
				
				
				if ( event.srcElement.id == 'kriptomatBuyNow' ) {
			
					if (kriptomatpricewidgets_links_enabled == 1)
					{
						if (referralLink.includes('kriptomat.io') || referralLink.includes('go2kriptomat.com'))
						{
							var win = window.open(referralLink, '_blank');
							win.focus();
						}	
						else
						{			
							var win = window.open('https://kriptomat.io', '_blank');
							win.focus();
						}
					}	
				}
				else
				{
					for (var i = 0; i < cryptoChoices.length; i++)
					{
						if ( event.srcElement.id == cryptoChoices[i] + 'kriptomatpricewidgets_optionName' || 
							 event.srcElement.id == cryptoChoices[i] + 'kriptomatpricewidgets_optionImage' || 
							 event.srcElement.id == cryptoChoices[i] + 'kriptomatpricewidgets_optionShort' || 
							 event.srcElement.id == cryptoChoices[i] + 'kriptomatpricewidgets_optionChange' || 
							 event.srcElement.id == cryptoChoices[i] + 'kriptomatpricewidgets_optionPrice'	) {
					

					
							if (kriptomatpricewidgets_links_enabled == 1)
							{
								if (referralLink.includes('kriptomat.io') || referralLink.includes('go2kriptomat.com'))
								{
									var win = window.open(referralLink, '_blank');
									win.focus();
								}	
								else
								{			
									var win = window.open('https://kriptomat.io', '_blank');
									win.focus();
								}
							}	
						}
					} 

				}
				
			} );

		

	 var fetchingUpdate = false;
	 var intervalTicker = window.setInterval(function() {	
		if (fetchingUpdate == false)
		{			
			fetchingUpdate = true;	
			//console.log('fetchingUpdate');


			var ajaxurl = 'https://appapi.kriptomat.io/public/prices';
			jQuery.get(ajaxurl, function(response) {
					
					const obj = response.data;
					Object.keys(obj).forEach(key => {						
						optionList.push(key);			
						kriptomatprices[key] = obj[key].price;
						kriptomatchanges[key] = obj[key].change;
						shortNames[key] = obj[key].ticker.toUpperCase();
						fullNames[key] = obj[key].name;
					});	
					//console.log(optionList);	
					for (var i = 0; i < cryptoChoices.length; i++)
					{										
						//console.log(cryptoChoices[i] + ' - ' + kriptomatprices[cryptoChoices[i]]);	
						if (typeof kriptomatprices[cryptoChoices[i]] !== 'undefined')
						{
							var changenumber = kriptomatchanges[cryptoChoices[i]];
							if (changenumber < 0)
							{
								changenumber = 1 - changenumber;								
							}
							
							
							document.getElementById(cryptoChoices[i] + 'kriptomatpricewidgets_optionPrice').innerHTML = kriptomatpricewidgets_minimum_digits_required(kriptomatprices[cryptoChoices[i]]) + ' <span class=\'kriptomatpricewidgets_optionEuro\'>".$fiatOption."</span>';					
							if (kriptomatchanges[cryptoChoices[i]] > 0)
							{
								document.getElementById(cryptoChoices[i] + 'kriptomatpricewidgets_optionChange').innerHTML = '".$svgup." ' + changenumber.toLocaleString(undefined, {maximumFractionDigits:2}) + '%';		
								document.getElementById(cryptoChoices[i] + 'kriptomatpricewidgets_optionChange').style.color = '#00D315';
							}
							else
							{
								document.getElementById(cryptoChoices[i] + 'kriptomatpricewidgets_optionChange').innerHTML = '".$svgdown." ' + changenumber.toLocaleString(undefined, {maximumFractionDigits:2}) + '%';
								document.getElementById(cryptoChoices[i] + 'kriptomatpricewidgets_optionChange').style.color = '#FF2626';
							}
							
					
						}						
					}	

					fetchingUpdate = false;	
				
			});
			


		}
	},5000);



		}

		
function kriptomatpricewidgets_minimum_digits_required(number)
{ 
	//console.log(fiatPrices[fiatOption]);

	number = number * fiatPrices[fiatOption];
	if (number > 500)
	{
		//return Number(number).toFixed(0); 
		return number.toLocaleString(undefined, {maximumFractionDigits:2});
	}
	else
	{
		if (number > 0.1)
		{
			//return Number(number).toFixed(2); 
			return number.toLocaleString(undefined, {maximumFractionDigits:2});
		}
		else
		{
			if (number > 0.01)
			{
				//return Number(number).toFixed(3); 
				return number.toLocaleString(undefined, {maximumFractionDigits:3});
			}
			else
			{			
				if (number > 0.001)
				{
					//return Number(number).toFixed(4); 	
					return number.toLocaleString(undefined, {maximumFractionDigits:4});
				}
				else
				{						
					if (number > 0.0001)
					{
						//return Number(number).toFixed(5);
						return number.toLocaleString(undefined, {maximumFractionDigits:5});
					}
					else
					{											
						if (number > 0.00001)
						{
							//return Number(number).toFixed(6);
							return number.toLocaleString(undefined, {maximumFractionDigits:6});
						}
						else
						{																	
							if (number > 0.000001)
							{								
								//return Number(number).toFixed(7);
								return number.toLocaleString(undefined, {maximumFractionDigits:7});
							}
							else
							{																								
								if (number > 0.0000001)
								{
									//return Number(number).toFixed(8);
									return number.toLocaleString(undefined, {maximumFractionDigits:8});
								}
								else
								{
									//return Number(number).toFixed(9);
									return number.toLocaleString(undefined, {maximumFractionDigits:9});
								}
							}
						}
					}
				}
			
			
			
			
			}
		}
   

	}

}


		
		
		
		
		</script>
    ");
}
add_shortcode ('kriptomatPriceTicker300x600', 'kriptomatPriceTicker300x600');

function kriptomatMarquee() {
		
	 function kriptomatpricewidgets_minimum_digits_required_internal($number, $fiatPrices, $fiatOption)
    {		
		$number = $fiatPrices[$fiatOption] * $number;
        if ($number > 0.1)
		{
			return number_format($number, 2);
		}
		else
		{
			if ($number > 0.01)
			{
				return number_format($number, 3);
			}
			else
			{					
				if ($number > 0.001)
				{
					return number_format($number, 4);
				}
				else
				{						
					if ($number > 0.0001)
					{
						return number_format($number, 5);
					}
					else
					{											
						if ($number > 0.00001)
						{
							return number_format($number, 6);
						}
						else
						{																	
							if ($number > 0.000001)
							{
								return number_format($number, 7);
							}
							else
							{																								
								if ($number > 0.0000001)
								{
									return number_format($number, 8);
								}
								else
								{
									return number_format($number, 9);
								}
							}
						}
					}
				}
			}
		}
    }
		
		
		
			
	
	
	$optionList = array();
	$fullNames = array();
	$shortNames = array();
	$currentPrices = array();
	$priceChanges = array();
	
	
		$response = wp_remote_retrieve_body( wp_remote_get( 'https://appapi.kriptomat.io/public/prices' ) );	
	$responseData = json_decode( $response, true );	
	
	 if (isset($responseData['data']))
	{	
	    $data = $responseData['data'];
	    $count = count($data);
	   
		foreach($responseData['data'] as $currencyArray)
		{
			$optionList[] = $currencyArray['code'];
			$fullNames[$currencyArray['code']] = $currencyArray['name'];
			$shortNames[$currencyArray['code']] = strtoupper($currencyArray['ticker']);
			$currentPrices[$currencyArray['code']] = $currencyArray['price'];
			$priceChanges[$currencyArray['code']] = $currencyArray['change'];
		}	
	}
	
	$fiatList = array('EUR','GBP','USD');
	$fiatPrices = array();
	
	
	$response = wp_remote_retrieve_body( wp_remote_get( 'https://appapi.kriptomat.io/public/fiat-exchange-rates' ) );	
	$responseData = json_decode( $response, true );	

	
    if (isset($responseData['rates']))
	{		  
		$rates = $responseData['rates'];
	    $count = count($rates);		
		foreach ($responseData['rates'] as $key => $value)
		{
			if (in_array($key, $fiatList))
			{
				$fiatPrices[$key] = $value;
			}
			else
			{
				$fiatList[] = $key;
				$fiatPrices[$key] = $value;
			}
		}	
	}
	

	$cryptoChoices = array();
	$cryptoChoices[0] = get_option( 'kriptomatpricewidgets_option_tickerchoice1', '0');
	$cryptoChoices[1] = get_option( 'kriptomatpricewidgets_option_tickerchoice2', '0');
	$cryptoChoices[2] = get_option( 'kriptomatpricewidgets_option_tickerchoice3', '0');
	$cryptoChoices[3] = get_option( 'kriptomatpricewidgets_option_tickerchoice4', '0');
	$cryptoChoices[4] = get_option( 'kriptomatpricewidgets_option_tickerchoice5', '0');
	$cryptoChoices[5] = get_option( 'kriptomatpricewidgets_option_tickerchoice6', '0');
	$cryptoChoices[6] = get_option( 'kriptomatpricewidgets_option_tickerchoice7', '0');
	$cryptoChoices[7] = get_option( 'kriptomatpricewidgets_option_tickerchoice8', '0');
	$cryptoChoices[8] = get_option( 'kriptomatpricewidgets_option_tickerchoice9', '0');
	$cryptoChoices[9] = get_option( 'kriptomatpricewidgets_option_tickerchoice10', '0');
	$cryptoChoices[10] = get_option( 'kriptomatpricewidgets_option_tickerchoice11', '0');
	$cryptoChoices[11] = get_option( 'kriptomatpricewidgets_option_tickerchoice12', '0');
	$cryptoChoices[12] = get_option( 'kriptomatpricewidgets_option_tickerchoice13', '0');
	$cryptoChoices[13] = get_option( 'kriptomatpricewidgets_option_tickerchoice14', '0');

	
		$colourMarqueeBackground = "".get_option( 'kriptomatpricewidgets_option_colourMarqueeBackground', '0')."";
		$colourMarqueeText = "".get_option( 'kriptomatpricewidgets_option_colourMarqueeText', '0')."";		
		$fiatOption = "".get_option( 'kriptomatpricewidgets_option_fiat', '0')."";
		
$svgdown = '<svg class="kriptomatpricewidgets_arrow_down"  style="width: 8px;  color: #FF2626;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort-down" class="svg-inline--fa fa-sort-down fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41z"></path></svg>';
$svgup = '<svg class="kriptomatpricewidgets_arrow_up" style="width: 8px;  color: #00D315;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort-up" class="svg-inline--fa fa-sort-up fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M279 224H41c-21.4 0-32.1-25.9-17-41L143 64c9.4-9.4 24.6-9.4 33.9 0l119 119c15.2 15.1 4.5 41-16.9 41z"></path></svg>';
	
	$content = "
<div id='KriptomatWidgetMarquee'>

<style>

/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}



.kriptomatpricewidgets_coinContainer1 {
     position: relative;
    cursor: pointer;
	width: auto;
    height: 28px;
    font-size: 18px;
    line-height: 28px;
    padding: 0px 10px;
    border: 1px solid #".$colourMarqueeBackground.";
	background-color:  #".$colourMarqueeBackground.";
	float: left;
	margin-top: 9px;
}
.kriptomatpricewidgets_imageplacement {
	width: 18px;
	height: 30px; 
	margin-right: 8px; 
	float: left;
    padding-left: 5px;
}
.kriptomatpricewidgets_coinImage {
	width: 18px;
	margin-top: 5px;
	margin-right: 5px;
	max-width: 18px;
}
.kriptomatpricewidgets_optionName {
	float:left;
	width: auto;
	font-size: 16px;
	line-height: 30px;
	color: #".$colourMarqueeText."; 
    font-family: Rubik;
    font-style: normal;
	font-weight: normal;
	text-align: left;
}
.kriptomatpricewidgets_optionPrice {
	margin-left:5px; 
	float:left;
	width: auto;
	font-size: 16px;
	line-height: 30px;
	color: #".$colourMarqueeText."; 
    font-family: Rubik;
	font-weight: normal;
}
.kriptomatpricewidgets_optionEuro {	
	color: #".$colourMarqueeText."; 
	width: auto;
    font-size: 12px;
    line-height: 30px;
    font-family: Rubik;
    font-style: normal;
    font-weight: normal;
    opacity: 0.75;
}
.kriptomatpricewidgets_optionChange {
	margin-left:10px; 
	color:black;
	float:left;
	font-size: 16px;
	line-height: 30px;
	font-weight: normal;
	position: relative;
    padding-left: 11px;
    padding-right: 3px;
}
.kriptomatpricewidgets_arrow_down {	
    position: absolute;
    top: 7px;
    left: 0px;
}
.kriptomatpricewidgets_arrow_up {	
    position: absolute;
    top: 11px;
    left: 0px;
}


* {
	margin: 0px;
	padding: 0px;
}

.kriptomatpricewidgets_scroll_left {
	height: 50px;
    overflow: hidden;
    background: #".$colourMarqueeBackground.";
    color: #".$colourMarqueeText.";
    /*border: 1px solid #".$colourMarqueeBackground.";*/
    position: absolute;
	top: 0px;
	left: 0px;
	z-index: 99999;
	width: 100vw;
}



.kriptomatpricewidgets_scroll_left_content {
 position: absolute;
 width: 3500px;
 height: 100%;
 margin: 0;
 line-height: 50px;
 text-align: center;
 /* Starting position */
 /* transform:translateX(100%); */
 /* Apply animation to this element */
 animation: kriptomatpricewidgets_scroll_left 40s linear infinite;
}

.kriptomatpricewidgets_scroll_left_content:hover {
  
  animation-play-state: paused;
}

/* Move it (define the animation) */
@keyframes kriptomatpricewidgets_scroll_left {
 0%   {
 transform: translateX(100vw);		
 }
 100% {
 transform: translateX(-90%); 
 }
}
</style>	
	
	
	
	
<div class='kriptomatpricewidgets_scroll_left'>
	<div class='kriptomatpricewidgets_scroll_left_content'>";	
	for ($i=0; $i<count($cryptoChoices); $i++)
	{
		$content .= "<div id='".$cryptoChoices[$i]."container' class='kriptomatpricewidgets_coinContainer1'>";	
		$content .= "
			<div class='kriptomatpricewidgets_imageplacement'>
			<img  id='".$cryptoChoices[$i]."kriptomatpricewidgets_optionImage' src='". esc_url( plugin_dir_url( __FILE__ ) . 'images/'. $cryptoChoices[$i] ) .".svg' class='kriptomatpricewidgets_coinImage'>
					
			</div>
			<div class='kriptomatpricewidgets_optionName' id='".$cryptoChoices[$i]."kriptomatpricewidgets_optionName'>
				".$fullNames[$cryptoChoices[$i]]."
			</div>
			<div class='kriptomatpricewidgets_optionPrice' id='".$cryptoChoices[$i]."kriptomatpricewidgets_optionPrice'><span id='".$cryptoChoices[$i]."kriptomatpricewidgets_optionNumber'>";
				if (isset($currentPrices[$cryptoChoices[$i]])) { $content .= kriptomatpricewidgets_minimum_digits_required_internal($currentPrices[$cryptoChoices[$i]], $fiatPrices, $fiatOption); }			
				$content .= " </span><span class='kriptomatpricewidgets_optionEuro'>".$fiatOption."</span>
			</div>";	
			$pricechange = 1 - $priceChanges[$cryptoChoices[$i]];
			if ($priceChanges[$cryptoChoices[$i]] > 0){
				$content .= "<div class='kriptomatpricewidgets_optionChange'  id='".$cryptoChoices[$i]."kriptomatpricewidgets_optionChange1' style='color:#00D315; width:inline-block;'> ".$svgup." <span id='".$cryptoChoices[$i]."kriptomatpricewidgets_priceChangeNumber1'>".$priceChanges[$cryptoChoices[$i]]."</span>%</div>";
				$content .= "<div class='kriptomatpricewidgets_optionChange' id='".$cryptoChoices[$i]."kriptomatpricewidgets_optionChange2' style='color:#FF2626; display:none;'> ".$svgdown." <span id='".$cryptoChoices[$i]."kriptomatpricewidgets_priceChangeNumber2'>".$pricechange."</span>%</div>";
			} else { 
				$content .= "<div class='kriptomatpricewidgets_optionChange'  id='".$cryptoChoices[$i]."kriptomatpricewidgets_optionChange1' style='color:#00D315; display:none;'> ".$svgup." <span id='".$cryptoChoices[$i]."kriptomatpricewidgets_priceChangeNumber1'>".$priceChanges[$cryptoChoices[$i]]."</span>%</div>";
				$content .= "<div class='kriptomatpricewidgets_optionChange' id='".$cryptoChoices[$i]."kriptomatpricewidgets_optionChange2' style='color:#FF2626; display:inline-block;'> ".$svgdown." <span id='".$cryptoChoices[$i]."kriptomatpricewidgets_priceChangeNumber2'>".$pricechange."</span>%</div>";
			}		
		$content .= "</div>";
	}	
$content .= "</div></div>"; 
	
	
$content .= "</div>";
	
    return ("".$content."
	
	
        <script>
		var kriptomatpricewidgets_links_enabled = '".get_option( 'kriptomatpricewidgets_links_enabled', '0')."'; 
        var referralLink = '".get_option( 'kriptomatpricewidgets_option_name', '0')."'; 
		var fiatOption = '".get_option( 'kriptomatpricewidgets_option_fiat', '0')."';
        var cryptoChoices = [
		'".get_option( 'kriptomatpricewidgets_option_tickerchoice1', '0')."',
		'".get_option( 'kriptomatpricewidgets_option_tickerchoice2', '0')."',
		'".get_option( 'kriptomatpricewidgets_option_tickerchoice3', '0')."',
		'".get_option( 'kriptomatpricewidgets_option_tickerchoice4', '0')."',
		'".get_option( 'kriptomatpricewidgets_option_tickerchoice5', '0')."',
		'".get_option( 'kriptomatpricewidgets_option_tickerchoice6', '0')."',
		'".get_option( 'kriptomatpricewidgets_option_tickerchoice7', '0')."',
		'".get_option( 'kriptomatpricewidgets_option_tickerchoice8', '0')."',
		'".get_option( 'kriptomatpricewidgets_option_tickerchoice9', '0')."',
		'".get_option( 'kriptomatpricewidgets_option_tickerchoice10', '0')."',
		'".get_option( 'kriptomatpricewidgets_option_tickerchoice11', '0')."',
		'".get_option( 'kriptomatpricewidgets_option_tickerchoice12', '0')."',
		'".get_option( 'kriptomatpricewidgets_option_tickerchoice13', '0')."',
		'".get_option( 'kriptomatpricewidgets_option_tickerchoice14', '0')."'
		];		
        </script>
		
		
		
		<script type='text/javascript'>
		window.addEventListener('load', myInit, true); function myInit(){
			 kriptomatpricewidgets_wrappedCode();	
		}

		var kriptomatprices = [];
		var kriptomatchanges = [];
		var pricesloaded = false; 

		var fiatList = [];
		var fiatPrices = [];

		var optionList = [];
		var shortNames = [];
		var fullNames = [];


		function kriptomatpricewidgets_wrappedCode()
		{
			
			var ajaxurl = 'https://appapi.kriptomat.io/public/fiat-exchange-rates';
			jQuery.get(ajaxurl, function(response) {
				
					const obj = response.rates;
					Object.entries(obj).forEach(entry => {
					  const [key, value] = entry;					
						fiatList.push(key);			
						fiatPrices[key] = value;
					});
				
			});
			
		

			document.body.addEventListener( 'click', function ( event ) {		
				if(typeof referralLink === 'undefined')
				{
					referralLink = 'https://kriptomat.io';
				}		
				for (var i = 0; i < cryptoChoices.length; i++)
				{
					if ( event.srcElement.id == cryptoChoices[i] + 'kriptomatpricewidgets_optionPrice' || 
						 event.srcElement.id == cryptoChoices[i] + 'kriptomatpricewidgets_optionName' || 
						 event.srcElement.id == cryptoChoices[i] + 'kriptomatpricewidgets_optionImage' || 
						 event.srcElement.id == cryptoChoices[i] + 'kriptomatpricewidgets_optionChange1'	|| 
						 event.srcElement.id == cryptoChoices[i] + 'kriptomatpricewidgets_optionChange2'		 
						 ) {						
						
						
						if (kriptomatpricewidgets_links_enabled == 1)
						{
							if (referralLink.includes('kriptomat.io') || referralLink.includes('go2kriptomat.com'))
							{
								var win = window.open(referralLink, '_blank');
								win.focus();
							}	
							else
							{			
								var win = window.open('https://kriptomat.io', '_blank');
								win.focus();
							}
						}		
					}
				} 
			} );

			 var fetchingUpdate = false;
			 var intervalTicker = window.setInterval(function() {	
				if (fetchingUpdate == false)
				{			
					fetchingUpdate = true;	
					//console.log('fetchingUpdate');

					var ajaxurl = 'https://appapi.kriptomat.io/public/prices';
					jQuery.get(ajaxurl, function(response) {
						
						
							const obj = response.data;
							Object.keys(obj).forEach(key => {						
								optionList.push(key);			
								kriptomatprices[key] = obj[key].price;
								kriptomatchanges[key] = obj[key].change;
								shortNames[key] = obj[key].ticker.toUpperCase();
								fullNames[key] = obj[key].name;
							});		
							//console.log(optionList);	
							for (var i = 0; i < cryptoChoices.length; i++)
							{										
								//console.log(cryptoChoices[i] + ' - ' + kriptomatprices[cryptoChoices[i]]);	
								if (typeof kriptomatprices[cryptoChoices[i]] !== 'undefined')
								{
									var changenumber = kriptomatchanges[cryptoChoices[i]];
									if (changenumber < 0)
									{
										changenumber = 1 - changenumber;								
									}
									
									document.getElementById(cryptoChoices[i] + 'kriptomatpricewidgets_optionNumber').innerHTML = kriptomatpricewidgets_minimum_digits_required(kriptomatprices[cryptoChoices[i]]) + ' ';	
									document.getElementById(cryptoChoices[i] + 'kriptomatpricewidgets_priceChangeNumber1').innerHTML = changenumber.toLocaleString(undefined, {maximumFractionDigits:2});
									document.getElementById(cryptoChoices[i] + 'kriptomatpricewidgets_priceChangeNumber2').innerHTML = changenumber.toLocaleString(undefined, {maximumFractionDigits:2});							
									if (kriptomatchanges[cryptoChoices[i]] > 0)
									{
										document.getElementById(cryptoChoices[i] + 'kriptomatpricewidgets_optionChange1').style.display = 'inline-block';
										document.getElementById(cryptoChoices[i] + 'kriptomatpricewidgets_optionChange2').style.display = 'none';
									}
									else
									{
										document.getElementById(cryptoChoices[i] + 'kriptomatpricewidgets_optionChange1').style.display = 'none';
										document.getElementById(cryptoChoices[i] + 'kriptomatpricewidgets_optionChange2').style.display = 'inline-block';
									}
									
							
								}						
							}	

							fetchingUpdate = false;	
					});
					
					
			
				}
			},30000);



		}


	
		
function kriptomatpricewidgets_minimum_digits_required(number)
{ 
	//console.log(fiatPrices[fiatOption]);

	number = number * fiatPrices[fiatOption];
	if (number > 500)
	{
		//return Number(number).toFixed(0); 
		return number.toLocaleString(undefined, {maximumFractionDigits:2});
	}
	else
	{
		if (number > 0.1)
		{
			//return Number(number).toFixed(2); 
			return number.toLocaleString(undefined, {maximumFractionDigits:2});
		}
		else
		{
			if (number > 0.01)
			{
				//return Number(number).toFixed(3); 
				return number.toLocaleString(undefined, {maximumFractionDigits:3});
			}
			else
			{			
				if (number > 0.001)
				{
					//return Number(number).toFixed(4); 	
					return number.toLocaleString(undefined, {maximumFractionDigits:4});
				}
				else
				{						
					if (number > 0.0001)
					{
						//return Number(number).toFixed(5);
						return number.toLocaleString(undefined, {maximumFractionDigits:5});
					}
					else
					{											
						if (number > 0.00001)
						{
							//return Number(number).toFixed(6);
							return number.toLocaleString(undefined, {maximumFractionDigits:6});
						}
						else
						{																	
							if (number > 0.000001)
							{								
								//return Number(number).toFixed(7);
								return number.toLocaleString(undefined, {maximumFractionDigits:7});
							}
							else
							{																								
								if (number > 0.0000001)
								{
									//return Number(number).toFixed(8);
									return number.toLocaleString(undefined, {maximumFractionDigits:8});
								}
								else
								{
									//return Number(number).toFixed(9);
									return number.toLocaleString(undefined, {maximumFractionDigits:9});
								}
							}
						}
					}
				}
			
			
			
			
			}
		}
   

	}

}
		</script>
    ");
}
add_shortcode ('kriptomatMarquee', 'kriptomatMarquee');

function kriptomatpricewidgets_fetchAvailableCurrencies()
{
	global $optionList;
	global $fullNames;
	global $shortNames;
	global $currentPrices;
	global $priceChanges;
	
	
	
		$response = wp_remote_retrieve_body( wp_remote_get( 'https://appapi.kriptomat.io/public/prices' ) );	
	$responseData = json_decode( $response, true );	
	
    if (isset($responseData['data']))
	{		   
		$data = $responseData['data'];
	    $count = count($data);
		
	   	foreach($responseData['data'] as $currencyArray)
		{
			if (in_array($currencyArray['code'], $optionList))
			{
				$fullNames[$currencyArray['code']] = $currencyArray['name'];
				$shortNames[$currencyArray['code']] = strtoupper($currencyArray['ticker']);
				$currentPrices[$currencyArray['code']] = $currencyArray['price'];
				$priceChanges[$currencyArray['code']] = $currencyArray['change'];
			}
			else
			{
				$optionList[] = $currencyArray['code'];
				$fullNames[$currencyArray['code']] = $currencyArray['name'];
				$shortNames[$currencyArray['code']] = strtoupper($currencyArray['ticker']);
				$currentPrices[$currencyArray['code']] = $currencyArray['price'];
				$priceChanges[$currencyArray['code']] = $currencyArray['change'];
			}
		}	
	}	
}


function kriptomatpricewidgets_fetchAvailableFiat()
{
	global $fiatList;
	global $fiatPrices;
	
	
		$response = wp_remote_retrieve_body( wp_remote_get( 'https://appapi.kriptomat.io/public/fiat-exchange-rates' ) );	
	$responseData = json_decode( $response, true );	
	
    if (isset($responseData['rates']))
	{		   
		$rates = $responseData['rates'];
	    $count = count($rates);
		
		foreach ($responseData['rates'] as $key => $value)
		{
			if (in_array($key, $fiatList))
			{
				$fiatPrices[$key] = $value;
			}
			else
			{
				$fiatList[] = $key;
				$fiatPrices[$key] = $value;
			}
		}
	}	
}

  function kriptomatpricewidgets_minimum_digits_required($number)
    {
		global $fiatPrices;
		global $fiatOption;
		
		$number = $fiatPrices[$fiatOption] * $number;
        if ($number > 0.1)
		{
			return number_format($number, 2);
		}
		else
		{
			if ($number > 0.01)
			{
				return number_format($number, 3);
			}
			else
			{					
				if ($number > 0.001)
				{
					return number_format($number, 4);
				}
				else
				{						
					if ($number > 0.0001)
					{
						return number_format($number, 5);
					}
					else
					{											
						if ($number > 0.00001)
						{
							return number_format($number, 6);
						}
						else
						{																	
							if ($number > 0.000001)
							{
								return number_format($number, 7);
							}
							else
							{																								
								if ($number > 0.0000001)
								{
									return number_format($number, 8);
								}
								else
								{
									return number_format($number, 9);
								}
							}
						}
					}
				}
			}
		}
    }
	
	
?>