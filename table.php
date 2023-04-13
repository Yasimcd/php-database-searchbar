<?php
/**
 * @file table.php
 */

/**
 * @brief Displays a table header
 * @param $columns Array of table headings
 */
function PrintTableHeader($columns)
{
   $bgColor = "#b4cdcd"; // LightCyan3
   $fgColor = "#ffffff"; // White

   echo "<table border='1' cellpadding='5' cellspacing='0'>\n";
   echo "<tr bgcolor='$bgColor' style='color: $fgColor'>\n";

   foreach ($columns as $name) {
      echo "<th>$name</th>\n";
   }

   echo "</tr>\n";
}

/**
 * @brief Displays a table row
 * @param $id ID of the row
 * @param $row Array of table cells
 */
function PrintTableRow($id, $row)
{
   static $rowCount = 0;
   $fgColor = "#000000"; // Black

   if ($rowCount % 2) {
      $bgColor = "#d1eeee"; // LtCyan2
   } else {
      $bgColor = "#e0ffff"; // LtCyan
   }

   echo "<tr valign='top' bgcolor='$bgColor' style='color: $fgColor'>\n";

   foreach ($row as $key => $value) {
      if ($key === 'title') 
      {
         $file = "create.php";
         $title = $value;
         $cell = "<a href='$file?id=$id'>$title</a>";
      } 
      else {
         $cell = $value;
      }
      echo "<td>$cell</td>\n";
   }
   



   echo "<td><input type='button' name='delete' value='Delete?' onClick='confirmDelete($id,\"$key\");'/></td>\n";
   echo "</tr>\n";

   // prep for next function call
   $rowCount++;
}