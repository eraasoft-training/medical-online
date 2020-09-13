<?php 

// prepares input (remove special chars and extra spaces)
function prepareInput(string $input): string
{
  return trim(htmlspecialchars($input));
}