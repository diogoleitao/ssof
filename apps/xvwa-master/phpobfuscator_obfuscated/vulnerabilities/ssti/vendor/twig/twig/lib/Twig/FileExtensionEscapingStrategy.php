<?php
class Twig_FileExtensionEscapingStrategy { public static function guess($sp79b407) { if (!preg_match('{\\.(js|css|txt)(?:\\.[^/\\\\]+)?$}', $sp79b407, $sp3832c1)) { return 'html'; } switch ($sp3832c1[1]) { case 'js': return 'js'; case 'css': return 'css'; case 'txt': return false; } } }