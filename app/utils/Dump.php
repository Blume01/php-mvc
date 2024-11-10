<?php

namespace App\Utils;

use ReflectionObject;

class Dump
{
  public function dd(...$vars)
  {
    echo "<style>
        body { background-color: #282C34; color: #ABB2BF; font-family: monospace; font-size: 14px; }
        .dd-output { background-color: #282C34; padding: 20px; border-radius: 5px; color: #ABB2BF; }
        .dd-key { color: #E06C75; font-weight: bold; }
        .dd-type { color: #61AFEF; }
        .dd-string { color: #98C379; }
        .dd-int, .dd-float { color: #D19A66; }
        .dd-bool { color: #56B6C2; }
        .dd-null { color: #6A737D; font-style: italic; }
        .dd-array, .dd-object { color: #E5C07B; font-weight: bold; }
        .dd-classname { color: #E06C75; font-weight: bold; }
        .dd-expand { color: #ABB2BF; }
        .dd-indent { margin-left: 20px; }
        .dd-bracket { color: #56B6C2; }
    </style>";

    echo "<div class='dd-output'>";
    foreach ($vars as $var) {
      $this->dumpVar($var);
      echo "<br>";
    }
    echo "</div>";
    exit(1);
  }

  public function dumpVar($var, &$seen = [], $indent = 0)
  {
    static $objectCounter = 1;
    $space = str_repeat("&nbsp;", $indent * 4);

    if (is_object($var) || is_array($var)) {
      if (in_array($var, $seen, true)) {
        echo "{$space}<span class='dd-expand'>*RECURSION*</span><br>";
        return;
      }
      $seen[] = $var;
    }

    if (is_null($var)) {
      echo "<span class='dd-null'>NULL</span><br>";
    } elseif (is_bool($var)) {
      $val = $var ? 'true' : 'false';
      echo "<span class='dd-bool'>bool</span> <span class='dd-bool'>{$val}</span><br>";
    } elseif (is_string($var)) {
      $displayString = strlen($var) > 30 ? substr($var, 0, 30) . '…' : $var;
      echo "<span class='dd-type'>string</span>(" . strlen($var) . ") <span class='dd-string'>\"{$displayString}\"</span><br>";
    } elseif (is_int($var)) {
      echo "<span class='dd-type'>int</span> <span class='dd-int'>{$var}</span><br>";
    } elseif (is_float($var)) {
      echo "<span class='dd-type'>float</span> <span class='dd-float'>{$var}</span><br>";
    } elseif (is_array($var)) {
      echo "<span class='dd-array'>array</span>(" . count($var) . ") <span class='dd-bracket'>[</span><br>";
      foreach ($var as $key => $value) {
        echo "{$space}&nbsp;&nbsp;<span class='dd-key'>[{$key}]</span> => ";
        $this->dumpVar($value, $seen, $indent + 1);
      }
      echo "{$space}<span class='dd-bracket'>]</span><br>";
    } elseif (is_object($var)) {
      $class = get_class($var);
      $id = $objectCounter++;
      echo "<span class='dd-classname'>{$class}</span> <span class='dd-object'>#{$id}</span> <span class='dd-bracket'>{</span><br>";

      $reflection = new ReflectionObject($var);
      $properties = $reflection->getProperties();

      $propCount = 0;
      foreach ($properties as $property) {
        $property->setAccessible(true);

        $visibility = '';
        if ($property->isPrivate()) {
          $visibility = 'private';
        } elseif ($property->isProtected()) {
          $visibility = 'protected';
        } elseif ($property->isPublic()) {
          $visibility = 'public';
        }

        $propName = $property->getName();
        $propValue = $property->getValue($var);
        echo "{$space}&nbsp;&nbsp;<span class='dd-key'>{$visibility} {$propName}</span>: ";
        $this->dumpVar($propValue, $seen, $indent + 1);

        if (++$propCount > 3) {
          echo "{$space}&nbsp;&nbsp;<span class='dd-expand'>…</span><br>";
          break;
        }
      }
      echo "{$space}<span class='dd-bracket'>}</span><br>";
    } elseif (is_resource($var)) {
      $type = get_resource_type($var);
      echo "{$space}<span class='dd-type'>resource</span>({$type})<br>";
    } else {
      echo "{$space}<span class='dd-type'>" . gettype($var) . "</span> {$var}<br>";
    }
  }
}
