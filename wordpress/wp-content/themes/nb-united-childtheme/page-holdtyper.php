<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<template>
      <article>
        <h2></h2>
      </article>
    </template>

<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

	<div id="primary" <?php astra_primary_class(); ?>>
  <nav id="filtrering">
    <button data-holdtype="alle">Alle</button>
  </nav>
  <section class="holdtypecontainer">
  </section>
	</div><!-- #primary -->

	<script>
    let holdtyper;
    let categories;
    let filterHoldtype = "alle";

	const url = "https://apmedia.dk/kea/nb-united/wordpress/wp-json/wp/v2/holdtype?per_page=100";
    const catUrl = "https://apmedia.dk/kea/nb-united/wordpress/wp-json/wp/v2/categories";


async function getJson() {
  const data = await fetch(url);
  const catData = await fetch(catUrl);
  holdtyper = await data.json();
  categories = await catData.json();
 console.log(categories);
  visHoldtyper();
  opretKnapper();
}

function opretKnapper(){
  categories.forEach(cat => {document.querySelector("#filtrering").innerHTML += `<button class="filter" data-holdtype="${cat.id}">${cat.name}</button>`}
  )
  addEventListenersToButtons();
}

function addEventListenersToButtons(){
  document.querySelectorAll("#filtrering button").forEach(elm =>{
    elm.addEventListener("click", filtrering);
  })
}

function filtrering(){
filterHoldtype = this.dataset.holdtype;
console.log(filterHoldtype);

visHoldtyper();
}

function visHoldtyper() {
  let temp = document.querySelector("template");
  let container = document.querySelector(".holdtypecontainer");
  container.innerHTML = "";
  holdtyper.forEach((holdtype) => {
if(filterHoldtype == "alle" || holdtype.categories.includes(parseInt(filterHoldtype))){
      let klon = temp.cloneNode(true).content;
<<<<<<< HEAD
      klon.querySelector("h2").textContent = holdtype.title.rendered;    
=======
      klon.querySelector("h2").textContent = holdtype.title.rendered;
      klon.querySelector("img").src = holdtype.billede.guid;
    
>>>>>>> ca3d1f9327fbe251716fece4fd95e82347922eef
      // klon
      //   .querySelector("article")
      //   .addEventListener("click", () => {location.href = "restdb-single.html?id="+holdtype._id;});
          klon
        .querySelector("article")
        .addEventListener("click", () => {location.href = holdtype.link;});
      container.appendChild(klon);
}
  })

}

getJson();
	</script>

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
