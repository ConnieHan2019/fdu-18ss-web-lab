<?php

    function outputOrderRow($file, $title, $quantity, $price) {

        echo "<tr>";
       echo "<th><img src="."images/books/tinysquare/".$file."></th>";
              echo "<th class="."mdl-data-table__cell--non-numeric"."><p>".$title."</p></th>";
              echo"<th><p>".$quantity."</p></th>";
              echo"<th><p>".$price."</p></th>";
              echo"<th><p>".$quantity*$price."</p></th>";

        echo "</tr>";
    }
?>