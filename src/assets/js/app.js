import $ from 'jquery';
import whatInput from 'what-input';

window.$ = $;

import Foundation from 'foundation-sites';
// If you want to pick and choose which modules to include, comment out the above and uncomment
// the line below
//import './lib/foundation-explicit-pieces';

$(document).ready(function(){
    $.getJSON('https://codepen.io/SebastienCerrer/pen/YOBREQ.js')
    .done( function(response) {
        var testyList = '';
        $.each(response, function(index, testy ) {
        testyList += "<div class='card-user-profile'><div class='card-section'><p class='card-user-profile-status'>";
        testyList += testy.comment + "</p><p class='card-user-profile-name'>";
        testyList += testy.author + "</p><p class='card-user-profile-info'>";
        testyList += testy.origin + "</p></div></div>";
        });
        $('#testy').html(testyList);
    })
});


$(document).foundation();

