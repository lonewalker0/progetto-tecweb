<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="keywords" content="Festival, Techno, Shop, Prevendite, Concerti, Lum250, Artisti, Merch">
        <meta name="description" content="Pagina dedicata al festival Techno Lum250">
        <title>TechnoLum Festival</title>
        <link rel="icon" href="logo_nuovo_favicon.png" type="image/png">
        <link rel="stylesheet" href="csswebsite.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <script src="function.js"></script>
        <!-- QUESTA è LA PARTE DEL HEADER DEL FESTIVAL-->
        <header>
            <div class="hamburger" onmouseleave="hideMenu()">
                <div id="hamburger-head" class="fa fa-solid fa-bars fa-4x unrotate-ham" onmouseenter="showMenu()"></div>             
                <nav id="menu-header" class="menù is-invisible" role="navigation" aria-label="navigazione menù" >
                    <ul class="menù-ul">
                        <li class="li-hover" lang="en"><a href="index.php" tabindex="1" lang="en">Home</a></li>
                        <li class="sottomenù-li " lang="en" aria-haspopup="true" aria-expanded="false">Festival
                            <ul class="sottomenù-ul">
                                <li class="li-sottomenu li-hover"><a href="chisiamo.php" tabindex="2" >Chi siamo</a></li>
                                <li class="li-sottomenu li-hover"><a href="location.php" lang="en" tabindex="3">Location</a></li>
                                <li class="li-sottomenu li-hover "><a href="storia.php" tabindex="4">Storia del <span lang="en">Festival</span></a></li>
                            </ul>                    
                        </li>
                        <li class="sottomenù2-li" lang="en" aria-haspopup="true" aria-expanded="false" tabindex="0">Shop
                            <ul class="sottomenù2-ul">
                                <li class="li-sottomenu li-hover"><a href="merch.php" lang="en" tabindex="5"><abbr title="Merchandise">Merch</abbr></a></li>
                                <li class="li-sottomenu li-hover"><a href="prevendite.php" tabindex="6">Prevendite</a></li>
                            </ul>
                        </li>
                        <li class="li-hover"><a href="faq.php" lang="en" tabindex="7"><abbr title="Frequently Asked Questions">FAQ</abbr></a></li>
                        <li class="li-hover"><a href="#" lang="en" tabindex="8">Account</a></li>
                    </ul>
                </nav>
            </div>                           
            <a class="logo" href="index.php"><img id="img-logo" src="logo_nuovo_2.png" alt="TechnoLum Festival" class="LogoInnerImage" ></a>
            <div class="social-icon-header">
                <div class="facebook-logo"><a href="#"><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></a></div>
                <div class="instagram-logo"><a href="#"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a></div>
                <div class="spotify-logo"><a href="#"><i class="fa fa-spotify fa-2x" aria-hidden="true"></i></a></div>
                <div class="twitter-logo"><a href="#"><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></a></div>
            </div>
        </header>
        <nav class="breadcrumb" role="none" aria-label="Ti trovi nella sezione:">
            <p>Ti trovi in: <span lang="en">Account</span></p>
        </nav>
        <!-- QUESTA è LA PARTE DELL'ACCOUNT DEL FESTIVAL-->
        <!-- QUESTA è LA PARTE DEL FOOTER DEL FESTIVAL-->
        <footer>
            <div class="social-icon-footer">
                <div class="facebook-logo"><a href="#"><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></a></div>
                <div class="instagram-logo"><a href="#"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a></div>
                <div class="spotify-logo"><a href="#"><i class="fa fa-spotify fa-2x" aria-hidden="true"></i></a></div>
                <div class="twitter-logo"><a href="#"><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></a></div>
            </div>
            <div class="termini-condizioni"><a href="#" >Termini e Condizioni</a></div>
            <div class="privacy-policy"><a href="#">Privacy Policy</a></div>
            <p>
                TELE RADIO <span lang="en">CITY</span> -- P.IVA 0099455028X
            </p>
        </footer>
    </body>
</html>

