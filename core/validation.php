<?php 

// checks if input is required/not
function isRequired($input): bool
{
  return (! empty($input));
}

// checks if input is string/not
function isString($input): bool
{
  return (gettype($input) == 'string');
}

// checks if input is email/not
function isEmail($input): bool 
{
  return filter_var($input, FILTER_VALIDATE_EMAIL);
}