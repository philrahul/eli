<?php

function whmbp_login_logo() { ?>
  <style type="text/css">
    #login h1 a, .login h1 a {
    background-image: url(<?php echo get_template_directory_uri(); ?>/_images/logo-white.svg);
    height:75px;
    width:250px;
    background-size: 250px 75px;
    background-repeat: no-repeat;
    padding-bottom: 0;
    }
    body {
      color:#0E322A !important;
      background: rgb(133,189,73) !important;
      background: linear-gradient(90deg, rgba(133,189,73,1) 0%, rgba(32,133,128,1) 100%) !important;
    }
    .login #login_error, .login .message, .login .success {
      border-left:0 !important;
      box-shadow:none !important;
  }
  .login #backtoblog a, .login #nav a, a.privacy-policy-link {
  color:#ffffff !important;
    }
  .login #backtoblog a:hover, .login #nav a:hover, a.privacy-policy-link:hover {
    color:#ffffff !important;
    text-decoration: underline !important;
  }
  .wp-core-ui .button-primary {
    background:#50A144 !important;
    border-color:#50A144 !important;
  }
  .wp-core-ui .button-primary:hover{
    background:#0E322A !important;
    border-color:#0E322A !important;
  }
  input[type=checkbox]:focus, input[type=color]:focus, input[type=date]:focus, input[type=datetime-local]:focus, input[type=datetime]:focus, input[type=email]:focus, input[type=month]:focus, input[type=number]:focus, input[type=password]:focus, input[type=radio]:focus, input[type=search]:focus, input[type=tel]:focus, input[type=text]:focus, input[type=time]:focus, input[type=url]:focus, input[type=week]:focus, select:focus, textarea:focus,.wp-core-ui .button-secondary:focus, .wp-core-ui .button.focus, .wp-core-ui .button:focus {
    border:1px solid #50A144 !important;
    box-shadow: none !important;
    outline: none !important;
  }

  </style>
  <?php }
  add_action( 'login_enqueue_scripts', 'whmbp_login_logo' );

function whmbp_login_logo_url() {
  return home_url();
}
add_filter( 'login_headerurl', 'whmbp_login_logo_url' );

add_filter( 'login_headertext', 'whmbp_customize_login_headertext' );
function whmbp_customize_login_headertext( $headertext ) {
  $headertext = get_bloginfo( 'name' ) . ' Login';
  return $headertext;
}
