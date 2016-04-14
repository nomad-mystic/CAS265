/**
 * Created by endof on 4/7/2016.
 */


$(function() {

    window.onscroll = function(ev) {
       if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
           ga('send', 'event', 'Scrolling', 'Scrolled to the bottom of the page');
           console.log('GA Event');
       }
    };

    
});