<!DOCTYPE html>
<html lang="en">
  <head>
    <title>How to Integrate Google “No CAPTCHA reCAPTCHA” on Your Website</title>
  </head>
  <body>
    <?php
    // grab recaptcha library
    require_once "recaptchalib.php";
    // your secret key
    $secret = "6LegjSkUAAAAAAgRnYC138vQd8hWgNCMLJVEn5ZE";
    // empty response
    $response = null;
    // check secret key
    $reCaptcha = new ReCaptcha($secret);
    // if submitted check response
    
    if(!empty($_POST))
    {
        $captcha = $_POST["g-recaptcha-response"];
        if ($captcha) {
            $response = $reCaptcha->verifyResponse($_SERVER["REMOTE_ADDR"], $_POST["g-recaptcha-response"]);
        }
    }
    ?>
    <?php
        if ($response != null && $response->success) {
            echo "Hi " . $_POST["name"] . " (" . $_POST["email"] . "), thanks for submitting the form!";
        } else {
    ?>
    <form action="" method="post">
 
      <label for="name" id="name">Name:</label>
      <input name="name" required><br />
 
      <label for="email" id="name">Email:</label>
      <input name="email" type="email" required><br />
 
      <div class="g-recaptcha" id="g-recaptcha" name="g-recaptcha" data-sitekey="6LegjSkUAAAAANCn9gCm3rgdIHnlIwM2C9aYdSiz" data-theme="dark"></div>
      <input type="submit" value="Submit" />
 
    </form>
    <?php } ?>
    <!--js-->
    <script src='https://www.google.com/recaptcha/api.js?hl=es'></script>
  </body>
</html>