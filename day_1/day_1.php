<?php

// $input = file_get_contents('temp_input.txt');
$input = file_get_contents('input.txt');

$lines = explode("\n", $input);

foreach ($lines as $row)
{
  foreach ($lines as $second_matching_row)
  {
    foreach ($lines as $third_matching_row)
    {
      if ($row == $second_matching_row || $second_matching_row == $third_matching_row || $row == $third_matching_row)
      {
        continue;
      }

      if ($row + $second_matching_row + $third_matching_row == 2020)
      {
        echo "$row $second_matching_row $third_matching_row " . ($row * $second_matching_row * $third_matching_row) . "\n";
      }
    }
  }
}