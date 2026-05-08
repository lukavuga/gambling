// Počakamo 10 sekund (10000 ms) in preusmerimo nazaj na index.php
// Ker je script.js naložen v game.php (v mapi PHP), se index nahaja eno mapo nazaj
setTimeout(function() {
    console.log("Preusmerjam...");
    window.location.href = '../index.php';
}, 10000);