<?php

function cleanFilename($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   $string = strtolower($string);
   return preg_replace('/[^\.A-Za-z0-9\-]/', '', $string); // Removes special chars.
}