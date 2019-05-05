$(document).ready(function() {

    //wait until user see the button to hide it (ux purposes)
    setTimeout(function(){ 
       $(".frm-wrapper").addClass("hidden-tilt"); 
       $(".button-frame").toggleClass("frame-size");
    }, 2200);

    //toggle css class to show/hide the button
    $( ".mini-btnmv" ).on( "click", function() {
        $(".frm-wrapper").toggleClass("hidden-tilt");
        $(".button-frame").toggleClass("frame-size");
    });
    
    //optional transition
        $(".animsition").animsition({
        inClass: 'fade-in',
        outClass: 'fade-out',
        inDuration: 1500,
        outDuration: 800,
        linkElement: '.anlinkate',
        // e.g. linkElement: 'a:not([target="_blank"]):not([href^="#"])'
        loading: true,
        loadingParentElement: 'body', //animsition wrapper element
        loadingClass: 'animsition-loading',
        loadingInner: '', // e.g '<img src="loading.svg" />'
        timeout: false,
        timeoutCountdown: 5000,
        onLoadEvent: true,
        browser: [ 'animation-duration', '-webkit-animation-duration'],
        // "browser" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
        // The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
        overlay : false,
        overlayClass : 'animsition-overlay-slide',
        overlayParentElement : 'body',
        transition: function(url){ window.location.href = url; }
    });


    $(".animsition-overlay").animsition({
        inClass: 'overlay-slide-in-bottom',
        outClass: 'overlay-slide-out-bottom',
        inDuration: 1900,
        outDuration: 1200,
        linkElement: '.anlinkate',
        // e.g. linkElement: 'a:not([target="_blank"]):not([href^="#"])'
        loading: true,
        loadingParentElement: 'body', //animsition wrapper element
        loadingClass: 'animsition-loading',
        loadingInner: '', // e.g '<img src="loading.svg" />'
        timeout: false,
        timeoutCountdown: 5000,
        onLoadEvent: true,
        browser: [ 'animation-duration', '-webkit-animation-duration'],
        // "browser" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
        // The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
        overlay : true,
        overlayClass : 'animsition-overlay-slide',
        overlayParentElement : 'body',
        transition: function(url){ window.location.href = url; }
    });
   
				
});


//getting title from iframe
function onLoadHandler() {
var x;         

//get the iframe object
var iframe = document.getElementById('mainFrame');
//cross browser solution to get the iframe document
//of the iframe
//var objectEl = iframe.contentDocument.getElementById("fw1");

var iframeDocument = iframe.contentDocument || iframe.contentWindow.document;

     //if the document is not undefined
    if (iframeDocument) {
       //do something with the frames dom
       //get the content of the title tag from the iframe
       x = iframeDocument.getElementsByTagName("title")[0].innerHTML;
    }    
    document.getElementById("metaTitle").innerHTML = x;    
}