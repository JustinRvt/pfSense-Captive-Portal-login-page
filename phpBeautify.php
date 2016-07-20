<!--
* === CSS VARIABLES ===
* === PHP FORM VALIDATION FOR HTML5 NON-CONVENIANT BROWSERS ===
-->
<?php
  /*
  ====== CSS COLOR VARIABLES ======
  */
  // General colors
  $white = "#fff";
  $mainColor = "#053879";
  $backgroundColor = $white;
  // Header colors
  $bordersColor = "#d40f0f";
  // Input styles
  $inputColor = "#6a7989";
  $inputBackgrounColor = "#f3eeee";
  $iconColor ="#ddd";
  // Icons colors
  $iconUserColor = $white;
  $iconLockColor = $white;
  // Checkbox color states
  $noColor = "#ff3a19";
  $yesColor = "#7fc6a6";
  // Continue button
  $continueButtonBackgroundColor = $mainColor;
  $continueButtonColor = $white;
  $continueButtonActiveColor = "#0195db";  // when active
  $continueButtonActiveColorBefore = $mainColor;   // when active
  //
  $termsVisitedLinkColor = "#7e0d61";
  /*
  ====== PAGE VARIABLES ======
  */
  $pageTitle = "Captive Portal";
  $logoUrl ="./captiveportal-logo.jpg";


  /*
  ====== FORM VALIDATION ======
  */
  // set empty variables
  $auth_userErr = $auth_passErr = $checkboxTermsErr = "";
  $auth_user = $auth_pass = $checkTerms = "";

  // if auth_user is empty display auth_userErr, else post auth_user
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (empty($_POST["auth_user"])){
      $auth_userErr = "Username required";
    } else {
      $auth_user = test_input($_POST["auth_user"]);
    }
  }

  // if auth_pass is empty display auth_passErr, else post auth_pass
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (empty($_POST["auth_pass"])){
      $auth_passErr = "Password required";
    } else {
      $auth_pass = test_input($_POST("auth_pass"));
    }
  }

  // if checkboxTerms is unchecked display checkboxTermsErr, else I accept
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (empty($_POST["checkboxTerms"])){
      $checkboxTermsErr = "You have to accept the terms";
    } else {
      $checkboxTerms = test_input($_POST("Iaccept"));
    }
  }

  // check data integrity
  function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  /*
  ====== TRANSLATION ======
  */

  $language=substr($_SERVER["HTTP_ACCEPT_LANGUAGE"], 0, 2);
  session_destroy();

  // Use isset to check variable
  if(!isset($_SESSION['language'])){
    // start the session now
    session_start();

    switch($language){

      case 'fr' :
        $_SESSION['language']='fr';
        break;

      case 'en' :
        $_SESSION['language']='en';
        break;
      /* another language ?
      case 'de' :
        $_SESSION['language']='de';
        break;
      */
      default:
        $_SESSION['language']='en';
        break;

    }
  }

  /*
  ===============================================================
  -------------------TRANSLATIONS HERE---------------------------
  ===============================================================
  */

  // isset again
  if(!isset($lang)){
    // We need to keep this in session
    session_start();

    // Use Superglobal $_SESSION['language'] to make decision
    switch ($_SESSION['language']) {
      case 'fr':
        $lang[pageTitle]='Portail Captif';
        $lang[mainTitle]='Bienvenue sur le portail captif pfSense'
        break;

        case 'en':
          $lang[pageTitle]='Captive Portal';
          $lang[mainTitle]='Welcome to the pfSense Captive Portal';
          break;
    }
  }

?>
