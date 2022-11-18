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
        <img class="pic" src="" alt="" />
        <div>
        <h2></h2>
        <p class="tekst1"></p>
        <p class="tekst2"></p>
        </div>
      </article>

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
      document.querySelector(".pic").src = holdtype.billede.guid;
      document.querySelector(".tekst1").textContent = holdtype.beskrivelse;
      document.querySelector(".tekst2").textContent = holdtype.indmeldelse_og_kontigent;

}

getJson();

	</script>

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
