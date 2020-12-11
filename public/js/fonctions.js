/**
 * Affiche une fenetre permettant d'imprimer le fichier mis dans l'URL
 * @param URL
 * @return void
 */
function printImg(url) {
    var win = window.open('');
    win.document.write('<img src="' + url + '" onload=window.print();window.close()" />');
    win.focus();
}

$(document).ready(function() {

});