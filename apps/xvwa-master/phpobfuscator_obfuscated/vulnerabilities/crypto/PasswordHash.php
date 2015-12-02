<?php
define('PBKDF2_HASH_ALGORITHM', 'sha256'); define('PBKDF2_ITERATIONS', 1000); define('PBKDF2_SALT_BYTE_SIZE', 24); define('PBKDF2_HASH_BYTE_SIZE', 24); define('HASH_SECTIONS', 4); define('HASH_ALGORITHM_INDEX', 0); define('HASH_ITERATION_INDEX', 1); define('HASH_SALT_INDEX', 2); define('HASH_PBKDF2_INDEX', 3); function create_hash($spc2ca96) { $spb61ca5 = base64_encode(mcrypt_create_iv(PBKDF2_SALT_BYTE_SIZE, MCRYPT_DEV_URANDOM)); return $spb61ca5 . ' : ' . base64_encode(pbkdf2(PBKDF2_HASH_ALGORITHM, $spc2ca96, $spb61ca5, PBKDF2_ITERATIONS, PBKDF2_HASH_BYTE_SIZE, true)); } function validate_password($spc2ca96, $spcc091e) { $sp7a5166 = explode(':', $spcc091e); if (count($sp7a5166) < HASH_SECTIONS) { return false; } $spcc9cbd = base64_decode($sp7a5166[HASH_PBKDF2_INDEX]); return slow_equals($spcc9cbd, pbkdf2($sp7a5166[HASH_ALGORITHM_INDEX], $spc2ca96, $sp7a5166[HASH_SALT_INDEX], (int) $sp7a5166[HASH_ITERATION_INDEX], strlen($spcc9cbd), true)); } function slow_equals($spda7027, $sp607ff1) { $sp2eafb2 = strlen($spda7027) ^ strlen($sp607ff1); for ($spc83c7f = 0; $spc83c7f < strlen($spda7027) && $spc83c7f < strlen($sp607ff1); $spc83c7f++) { $sp2eafb2 |= ord($spda7027[$spc83c7f]) ^ ord($sp607ff1[$spc83c7f]); } return $sp2eafb2 === 0; } function pbkdf2($sp9aa867, $spc2ca96, $spb61ca5, $spffdcfa, $sp0660b5, $sp70336e = false) { $sp9aa867 = strtolower($sp9aa867); if (!in_array($sp9aa867, hash_algos(), true)) { trigger_error('PBKDF2 ERROR: Invalid hash algorithm.', E_USER_ERROR); } if ($spffdcfa <= 0 || $sp0660b5 <= 0) { trigger_error('PBKDF2 ERROR: Invalid parameters.', E_USER_ERROR); } if (function_exists('hash_pbkdf2')) { if (!$sp70336e) { $sp0660b5 = $sp0660b5 * 2; } return hash_pbkdf2($sp9aa867, $spc2ca96, $spb61ca5, $spffdcfa, $sp0660b5, $sp70336e); } $spedf266 = strlen(hash($sp9aa867, '', true)); $sp8dcc5c = ceil($sp0660b5 / $spedf266); $sp35fa7e = ''; for ($spc83c7f = 1; $spc83c7f <= $sp8dcc5c; $spc83c7f++) { $sp98e909 = $spb61ca5 . pack('N', $spc83c7f); $sp98e909 = $spc30ee0 = hash_hmac($sp9aa867, $sp98e909, $spc2ca96, true); for ($sp071ab3 = 1; $sp071ab3 < $spffdcfa; $sp071ab3++) { $spc30ee0 ^= $sp98e909 = hash_hmac($sp9aa867, $sp98e909, $spc2ca96, true); } $sp35fa7e .= $spc30ee0; } if ($sp70336e) { return substr($sp35fa7e, 0, $sp0660b5); } else { return bin2hex(substr($sp35fa7e, 0, $sp0660b5)); } }