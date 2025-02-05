import "./bootstrap";
import Alpine from 'alpinejs';
import Splide from '@splidejs/splide';
import Intersect from '@alpinejs/intersect';
import select2 from 'select2';
// import 'cooltipz-css';

import $ from "jquery";
select2();
Alpine.plugin(Intersect);

Alpine.start();

window.Alpine = Alpine;



window.$ = $;
// import { Select2 } from "select2"; // does nothing when uncommented
import 'select2'; // does nothing

$("#test").html("ok");

$(document).on("load",function() { // does nothing
    $(".js-example-basic-single").select2();
});


