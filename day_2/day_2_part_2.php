<?php

$input = file_get_contents('input.txt');

$lines = explode("\n", $input);
$valid_password = 0;
foreach ($lines as $line)
{
  $parts = explode(" ", $line);
  $times_raw = $parts[0];
  $letter_raw = $parts[1];
  $password = $parts[2];
  $times_parts = explode('-', $times_raw);
  $min = $times_parts[0] - 1;
  $max = $times_parts[1] - 1;
  $letter = str_replace(':', '', $letter_raw);

  $letter_1 = $password[$min];
  $letter_2 = $password[$max];
  if (($letter_1 == $letter && $letter_2 != $letter) ||
      ($letter_2 == $letter && $letter_1 != $letter))
  {
    echo "Valid password $line {$min} {$max} {$letter_1} {$letter_2} Correct: {$letter}\n";
    $valid_password++;
  }
}

$total = count($lines);
echo "Total Valid = $valid_password / $total\n";