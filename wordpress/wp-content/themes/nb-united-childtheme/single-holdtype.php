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
  <h2 class="holdnavn"></h2>
<div class="kampprogram">
    <h3>Kampprogram</h3>
  <img class="img1" src="" alt="" />
</div>
<div class="traener">
  <h3>Trænere</h3>
  <img class="img2" src="" alt="" />
</div>

  <div>
  <p class="tekst"></p>
  <h3 class="holdimg">Holdet</h3>
  <img class="img3" src="" alt="" />
  </div>
</article>
    <style>
article h3 {
  margin-bottom: 10px;
  margin-top: 10px;
}

.holdnavn {
  margin-bottom: 10px;
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
  document.querySelector("h2").textContent = holdtype.title.rendered;
  document.querySelector(".img1").src = holdtype.kampprogram.guid;
  document.querySelector(".img2").src = holdtype.holdets_stab.guid;
  document.querySelector(".tekst").textContent = holdtype.spillerliste;
  document.querySelector(".img3").src = holdtype.billede.guid;
}

getJson();

	</script>

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
