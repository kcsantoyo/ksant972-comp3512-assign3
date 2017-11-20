<?php  
function generatetableRow($title, $data)
    {
    $markup = "<tr>
    <td class='mdl-data-table__cell--non-numeric'><strong>".$title."</strong></td>
    <td class='mdl-data-table__cell--non-numeric'>".$data."</td> 
    </tr>";
    return $markup;
    }
?>