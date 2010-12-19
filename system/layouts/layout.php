<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>VM-Training - Your goal is our concern</title>
        <!-- <link rel="shortcut icon" href="/favicon.ico"> -->

        <link href="/public/stylesheets/base.css" media="screen,print" rel="stylesheet" type="text/css" />

        <script src="/public/js/prototype.js" type="text/javascript"></script>
        <script src="/public/js/scriptaculous.js" type="text/javascript"></script>
        <script src="/public/js/application.js" type="text/javascript"></script>

        <meta name="language" content="de" />
        <meta name="copyright" content="Lukas Elmer, 2010" />
        <meta name="audience" content="alle" />
        <meta name="description" content="VM-Training - Your goal is our concern - Trainingsberatung" />
        <meta name="keywords" content="Fitness, Trainingsberatung, VM-Training, Your goal is our concern" />
        <meta name="robots" content="index,follow" />
        <meta http-equiv="content-language" content="de" />
        <meta name="author" content="Lukas Elmer" />
        <meta name="rating" content="General" />

        <meta name="DC.Description" content="VM-Training - Your goal is our concern - Trainingsberatung" />
        <meta name="DC.Subject" content="Fitness, Trainingsberatung, VM-Training, Your goal is our concern" />
        <meta name="DC.Creator" content="Lukas Elmer" />

    </head>
    <body>
        <div class="base-outer">
            <div class="base-inner">
                <div class="header">
                    <div class="header-top">
                        <div class="language-selection"><a href="/?ln=de">Deutsch</a> | <a href="/?ln=en">English</a></div>
                    </div>
                    <div class="navi-outer"><div class="navi"><ul class="navi-ul">
                                <? navi_link("Home", 'home') ?>
                                <? navi_link($_REQUEST['ln'] == 'de' ? "Über Uns" : "About Us", 'ueber_uns') ?>
                                <? navi_link($_REQUEST['ln'] == 'de' ? "Angebot" : "Offer", 'angebot') ?>
                                <? navi_link("Location", 'location') ?>
                                <? navi_link($_REQUEST['ln'] == 'de' ? "Refernzen und Erfahrungsberichte" : "References", 'referenzen') ?>
                                <? navi_link($_REQUEST['ln'] == 'de' ? "Kontakt" : "Contact", 'kontakt') ?>
                                <? navi_link($_REQUEST['ln'] == 'de' ? "Preise" : "Price", 'preise') ?>
                            </ul>
                            <? clearer(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="main-content">
                        <div class="main-content-inner">
                        <? global $content; ?>
                        <? clearer(); ?>
                                <div><? echo $content; ?></div>
                    </div>
                </div>
            </div>
            <div class="footer">
                <div class="inner">
                    <div class="inner2">
                        <small><b>
                                webdesign &amp; development by Lukas Elmer &amp; Christina Heidt
                            </b></small>
                    </div>
                </div>
            </div>

        </div>
    </body>
</html>