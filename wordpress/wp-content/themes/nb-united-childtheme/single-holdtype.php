<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

	<div id="primary" <?php astra_primary_class(); ?>>

<article>
  <form>
 <input type="button" value="Tilbage" onclick="history.back()">
</form>

  <h2 class="holdnavn"></h2>
<div class="kampprogram">
    <h3>Kampprogram</h3>
  <img class="img1" src="" alt="" />
</div>
<div class="traener">
  <h3>Træner</h3>
  <img class="img2" src="" alt="" />
</div>

  <div>
  <p class="tekst"></p>
  <h3 class="holdimg">Holdbillede</h3>
  <img class="img3" src="" alt="" />
  </div>
</article>
    <style>

button{
		font-weight:bold;
}
.img1, .img2 {
width: 50%;
  height: auto;
}
.tekst {
font-size: 20px;
color: #1B5929;
}
button:hover{
		color:green;
	font-weight:bold;
	background-color:white;
	border:solid 2px green;
}

button:focus{
	color:green;
	font-weight:bold;
	background-color:white;
	border:solid 2px green;
}
h2 .holdnavn {
      font-size: 45px;
    border-top: 5px solid #1B5929;
    margin-top: 5%;
    padding-top: 3%;
    width: 30%;
    margin-bottom: 1%;
}

article h3 {
  margin-bottom: 10px;
  margin-top: 10px;
}
.kampprogram {
  width: 50%;
  float: left;
}
.traener {
  width: 50%;
  float: right;
}
      </style>
	</div><!-- #primary -->

	<script>
    let holdtype;

		const url = "https://apmedia.dk/kea/nb-united/wordpress/wp-json/wp/v2/holdtype/"+<?php echo get_the_ID() ?>;

async function getJson() {
  const data = await fetch(url);
  holdtype = await data.json();
 console.log(holdtype);
  visHoldtype();
}

function visHoldtype() {
  document.querySelector("h2").innerHTML = holdtype.title.rendered;
  document.querySelector(".img1").src = holdtype.kampprogram.guid;
  document.querySelector(".img2").src = holdtype.holdets_stab.guid;
  document.querySelector(".tekst").innerHTML = holdtype.spillerliste;
  document.querySelector(".img3").src = holdtype.billede.guid;
}

getJson();

	</script>

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
