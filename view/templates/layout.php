<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Xayona Website Template</title>
        <link rel="stylesheet" href="public/css/style.css" type="text/css" />
        <!--[if IE 7]>
                <link rel="stylesheet" href="css/ie7.css" type="text/css" />
        <![endif]-->
    </head>
    <body>
        <div class="page">
            <div class="header">
                    <a href="index.html" id="logo"><img src="public/images/logo.gif" alt=""/></a>
                    <ul>
                        <li><a href="<?= $_SERVER['PHP_SELF'] ?>">Home</a></li>
                            <li><a href="services">Services</a></li>
                            <li><a href="#">Order</a></li>
                            <li><a href="#">Gallery</a></li>
                    </ul>
            </div>
            <div class="body">
                <?php echo $content; ?>
            </div>
            <div class="footer">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Order</a></li>
                        <li><a href="#">Gallery</a></li>
                    </ul>
                    <p>&#169; Copyright &#169; 2011. Company name all rights reserved</p>
            </div>
        </div>
    </body>
</html>