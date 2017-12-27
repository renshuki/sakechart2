<?php
// Include I18N support
require_once "locale.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <!-- CSS -->
        <link rel="stylesheet" href="stylesheets/default.css" type="text/css">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">

        <title><?php echo _('Title'); ?></title>
    </head>
    <body>
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
             <h4 class="modal-title"><?php echo _('Contact Us'); ?></h4>
        </div>
        <div class="modal-body">
            <div id="contact_form" class="row">
                <div class="col-12 col-sm-12 col-lg-12">
                    <!-- <h2>Tell Us What You Think...</h2>
                    <p>We appreciate any feedback about your overall experience on our site or how to make it even better.  Please fill in the below form with any comments and we will get back to you.</p> -->
                    <form role="form" id="feedbackForm">
                      <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="<?php echo _('Name'); ?>">
                        <span class="help-block" style="display: none;"><?php echo _('Name_validation'); ?></span>
                      </div>
                      <div class="form-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="<?php echo _('Email'); ?>">
                        <span class="help-block" style="display: none;"><?php echo _('Email_validation'); ?></span>
                      </div>
                      <div class="form-group">
                        <textarea rows="10" cols="100" class="form-control" id="message" name="message" placeholder="<?php echo _('Message'); ?>"></textarea>
                        <span class="help-block" style="display: none;"><?php echo _('Message_validation'); ?></span>
                      </div>
                      <img id="captcha" src="library/securimage/securimage_show.php" alt="CAPTCHA Image" />
                      <a href="#" onclick="document.getElementById('captcha').src = 'library/securimage/securimage_show.php?' + Math.random(); return false" class="btn btn-info btn-sm"><?php echo _('Reload Captcha'); ?></a><br/>
                      <div class="form-group" style="margin-top: 10px;">
                            <input type="text" class="form-control" name="captcha_code" id="captcha_code" placeholder="<?php echo _('Code_validation'); ?>" />
                            <span class="help-block" style="display: none;"><?php echo _('Code'); ?></span>
                      </div>
                      <span class="help-block" style="display: none;"><?php echo _('Code_validation'); ?></span>
                      <button type="submit" id="feedbackSubmit" class="btn btn-primary" style="display: block; margin-top: 10px;"><?php echo _('Send'); ?></button>
                    </form>
                </div><!--/span-->
            </div><!--/row-->
        </div>
        <!-- JS -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <script src="javascript/contact-form.js" type="text/javascript"></script>
    </body>
</html>