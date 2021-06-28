<?php
function stockcolor($stock){

if ($stock > 9) {
                return "<div class=\" card-text m-auto rounded p-1 text-white bg-success\">En stock</div>";
            } else if ($stock >  0) {
                return "<div class=\" card-text m-auto rounded p-1 text-white bg-warning\">Plus que $stock articles en stock</div>";
            } else {
                return "<div class=\" card-text m-auto rounded p-1 text-white bg-danger\">Articles épuisé</div>";
            }       
}
?>