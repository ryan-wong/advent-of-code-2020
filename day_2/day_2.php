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
  $min = $times_parts[0];
  $max = $times_parts[1];
  $letter = str_replace(':', '', $letter_raw);
  $hash_map = [];
  for ($i=0; $i < strlen($password) ; $i++)
  {
    if (array_key_exists($password[$i], $hash_map))
    {
      $hash_map[$password[$i]] = $hash_map[$password[$i]] + 1;
    }
    else
    {
      $hash_map[$password[$i]] = 1;
    }
  }

  if (array_key_exists($letter, $hash_map) &&
  $hash_map[$letter] >= $min &&
  $hash_map[$letter] <= $max)
  {
    $valid_password++;
  }
  else
  {
    echo "Failed $line\n";
  }
}
$total = count($lines);
echo "Total Valid = $valid_password / $total\n";