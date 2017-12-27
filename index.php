<?php
// Include I18N support
require_once "locale.php";
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <!-- CSS -->
        <link rel="stylesheet" href="stylesheets/default.css" type="text/css">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css" rel="stylesheet">
        <!-- JS -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <script src="javascripts/html2canvas.js" type="text/javascript"></script>
        <script src="javascripts/blob.js" type="text/javascript"></script>
        <script src="javascripts/canvas-toBlob.js" type="text/javascript"></script>
        <script src="javascripts/filesaver.js" type="text/javascript"></script>
        <script src="javascripts/script.js" type="text/javascript"></script>

        <title><?php echo _('Title'); ?></title>
    </head>
    <body>
        <div id="lang">
            <a href="index.php?lang=ja_JP.utf8" alt="JP"><div class="flagicons" id="jpflag"></div></a>
            <a href="index.php?lang=en_US.utf8" alt="EN"><div class="flagicons" id="enflag"></div></a>
            <a href="index.php?lang=fr_FR.utf8" alt="FR"><div class="flagicons" id="frflag"></div></a>
        </div>
        <div id="chooser">
            <h3><?php echo _('Settings'); ?></h3>
            <form method="post" action="index.php">
                <fieldset class="well the-fieldset">
                    <legend class="the-legend"><?php echo _('Data'); ?></legend>
                    <label for="shudo"><?php echo _('Alcohol degree'); ?></label>
                    <input type="text" class="form-control input-sm" id="shudo" value="0" size="5">
                    <label for="sando"><?php echo _('Acidity'); ?></label>
                    <input type="text" class="form-control input-sm" id="sando" value="1.5" size="5">
                </fieldset>
                <fieldset class="well the-fieldset">
                    <legend class="the-legend"><?php echo _('Colors'); ?></legend>
                    <label for="areabg"><?php echo _('Colors area display'); ?></label>
                    <input type="checkbox" id="areabg" value="areabg"><br />
                    <label for="marker_color"><?php echo _('Marker'); ?></label>
                    <select id="marker_color">
                        <option value="blue"><?php echo _('Blue'); ?></option>
                        <option value="green"><?php echo _('Green'); ?></option>
                        <option value="red" selected><?php echo _('Red'); ?></option>
                        <option value="pink"><?php echo _('Pink'); ?></option>
                    </select>           
                </fieldset>
                <fieldset class="well the-fieldset">
                    <legend class="the-legend"><?php echo _('Download'); ?></legend>
                    <input type="button" class="btn" id="dlpng" download="nihonshu_chart.png" value="PNG">
                </fieldset>
            </form>  
            <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#basicModal" id="contact"><?php echo _('Contact Us'); ?></a>
            <button type="button" class="btn btn-warning" id="donation" data-container="body" data-toggle="popover" data-placement="left"><i class="glyphicon glyphicon-heart"> <?php echo _('Donate');?></i></button>
            <div id="popover_content_wrapper" style="display: none">
                <address>
                    ### Put your address here ###
                </address>
            </div>
        </div>
        <div id="grid_container">       
            <div id="gridup">
                <h3><?php echo _('Alcohol degree x Acidity Graph'); ?></h3>
            </div>
            <div id="gridleft">
                <div id="gridleft_title">
                    <h3><?php echo _('Acidity'); ?></h3>
                </div>
                <div style="position: relative;height: 150px;">
                    <span style="position: absolute;top: 0;right: 0;width: 100px; text-align: right;">(2.5<?php echo _('Or more'); ?>)<br/>2.5</span>
                </div>
                <div style="position: relative;height: 200px;">
                    <span style="position: absolute;top: 50%;right: 0;width: 100px; text-align: right;">1.5</span>
                </div>
                <div style="position: relative;height: 150px;">
                    <span style="position: absolute;bottom: 0;right: 0;width: 100px; text-align: right;">0.5<br/>(0.5<?php echo _('Or less'); ?>)</span>
                </div>
            </div>
            <div id="grid">
                <span id="mark"></span>
                <div class="saketype" id="amai"><?php echo _('Sweet'); ?></div>
                <div class="saketype" id="karai"><?php echo _('Dry'); ?></div>
                <div class="saketype" id="awa"><?php echo _('Soft'); ?></div>
                <div class="saketype" id="koi"><?php echo _('Rich'); ?></div>
            </div>
            <div id="gridbottom">
                <div style="float: left;width: 10%;text-align: left;">20</div>
                <div style="float: right;width: 10%;text-align: right;">-20</div>
                <div style="margin: auto;text-align: center;">0</div>
                <div style="float:left;width:19%;text-align: left;">(20<?php echo _('Or more'); ?>)</div>
                <div style="float:right;width:19%;text-align: right;">(-20<?php echo _('Or less'); ?>)</div>
                <div id="gridbottom_title">
                    <h3><?php echo _('Alcohol degree'); ?></h3>
                </div>
            </div>
        </div>
        <div id="color_container" style="display: none;">
            <h3><?php echo _('Tastes'); ?></h3>
            <div id="karai_color" class="color_legend"><?php echo _('Rich and Dry'); ?></div>
            <div id="koi_color" class="color_legend"><?php echo _('Rich and Sweet'); ?></div>
            <div id="amai_color" class="color_legend"><?php echo _('Soft and Sweet'); ?></div>
            <div id="awa_color" class="color_legend"><?php echo _('Soft and Dry'); ?></div>     
        </div>
        <!-- Contact Form -->
        <div class="modal fade" id="basicModal" data-remote="<?php if (isset($_GET['lang'])) echo htmlspecialchars('mail_template.php?lang='.$_GET['lang']); else echo 'mail_template.php'; ?>" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                </div>
            </div>
        </div>
    </body>
</html>