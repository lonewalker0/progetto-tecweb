<?php
include('phputilities/PageBuilder.php');

$breadcrumb = 'Location';
$breadcrumblen = 'en'; 
$title = 'Location | TechnoLum250'; 
$keyword = 'Festival, Techno, Lum250, Location, Posto, Dove, Mappa, Indirizzo, Come arrivare';
$description = 'Scopri la location del festival TechnoLum250, dove si svolgerà e come raggiungerla.'; 

$main = "
<div id='location-container'>

    <h1>Location</h1>

        <div id='location-contenuto'>

            <iframe id='map' src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.272301496815!2d11.883541114487894!3d45.40848241412682!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x477eda5872f993f3%3A0xf2694de3ecf7350e!2sAule%20Luzzatti!5e0!3m2!1sit!2sit!4v1704207798526!5m2!1sit!2sit'>
            </iframe>

            <div id='testo-location'>
                <h2 id='h2-location'>Dove si svolge il technoLum250 Festival?</h2>
                <p>Il festival si svolge nel cuore della zona universitaria di Padova, più precisamente nel Dipartimento di Matematica. Indirizzo:</p>
                <p id='indirizzo'>Via Luigi Luzzatti, 35121 Padova PD</p>
            </div>

        </div>

</div>
";

echo PageBuilder::buildPage($breadcrumb, $breadcrumblen, $title ,$keyword, $description, $main);
?>
