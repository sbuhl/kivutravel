import $ from 'jquery';
import whatInput from 'what-input';

window.$ = $;

import Foundation from 'foundation-sites';
// If you want to pick and choose which modules to include, comment out the above and uncomment
// the line below
//import './lib/foundation-explicit-pieces';
$(document).foundation();

$(document).ready(function($){
        
    $('#exampleModal1').foundation('open');
    // if( $('.reveal').length === 0){
    //     $( ".reveal-overlay" ).css( "display", "none" );
    // }

    // Add all testimonies
    $.getJSON('https://codepen.io/SebastienCerrer/pen/YOBREQ.js')
    .done(function(response) {
        var testyList = '';
        $.each(response, function(index, testy ) {
            testyList += "<div class='card-user-profile'><div class='card-section'><p class='card-user-profile-status'>";
            testyList += testy.comment + "</p><p class='card-user-profile-name'>";
            testyList += testy.author + "</p><p class='card-user-profile-info'>";
            testyList += testy.origin + "</p></div></div>";
        });
        $('#testy').html(testyList);
    });

    // Add one testimony randomly 
    var $boxComment = $('#boxComment');
    $.getJSON('https://codepen.io/SebastienCerrer/pen/YOBREQ.js', function(response) {
        // var max = Object.keys(response).length;
        // They prefer to have the testimony of 2018 only
        var max = 11;
        var randomNumber = randomNumberFromRange(0, max);
        function randomNumberFromRange(min,max)
        {
            return Math.floor(Math.random()*(max-min+1)+min);
        }
        var testyIndiv = '';
        testyIndiv += "<div class='englobe'><h5 class='full-width-testimonial-text'>";
        testyIndiv += response[randomNumber].comment + "</h5><p class='full-width-testimonial-source'>";
        testyIndiv += response[randomNumber].author + "</p><span class='full-width-testimonial-source-context'>";
        testyIndiv += response[randomNumber].origin + "</span></div>";
        $boxComment.html(testyIndiv);
    });


});





