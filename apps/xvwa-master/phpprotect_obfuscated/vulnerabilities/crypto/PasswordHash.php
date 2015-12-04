<?php



define("PBKDF2_HASH_ALGORITHM", "sha256");
define("PBKDF2_ITERATIONS", 1000);
define("PBKDF2_SALT_BYTE_SIZE", 24);
define("PBKDF2_HASH_BYTE_SIZE", 24);

define("HASH_SECTIONS", 4);
define("HASH_ALGORITHM_INDEX", 0);
define("HASH_ITERATION_INDEX", 1);
define("HASH_SALT_INDEX", 2);
define("HASH_PBKDF2_INDEX", 3);

function create_hash($Vi5zlimgwgwc)
{
    
    $V0xblofnsuo3 = base64_encode(mcrypt_create_iv(PBKDF2_SALT_BYTE_SIZE, MCRYPT_DEV_URANDOM));
    return  $V0xblofnsuo3 . " : " . 
        base64_encode(pbkdf2(
            PBKDF2_HASH_ALGORITHM,
            $Vi5zlimgwgwc,
            $V0xblofnsuo3,
            PBKDF2_ITERATIONS,
            PBKDF2_HASH_BYTE_SIZE,
            true
        ));
}

function validate_password($Vi5zlimgwgwc, $Vkquguiamni0)
{
    $Vgid132nc4mp = explode(":", $Vkquguiamni0);
    if(count($Vgid132nc4mp) < HASH_SECTIONS)
       return false; 
    $Vbsiong0xivs = base64_decode($Vgid132nc4mp[HASH_PBKDF2_INDEX]);
    return slow_equals(
        $Vbsiong0xivs,
        pbkdf2(
            $Vgid132nc4mp[HASH_ALGORITHM_INDEX],
            $Vi5zlimgwgwc,
            $Vgid132nc4mp[HASH_SALT_INDEX],
            (int)$Vgid132nc4mp[HASH_ITERATION_INDEX],
            strlen($Vbsiong0xivs),
            true
        )
    );
}


function slow_equals($Vk5gde0byujz, $Vkxzhjkxbjvx)
{
    $Vfnn044uqywy = strlen($Vk5gde0byujz) ^ strlen($Vkxzhjkxbjvx);
    for($Vh3cz3bzejsf = 0; $Vh3cz3bzejsf < strlen($Vk5gde0byujz) && $Vh3cz3bzejsf < strlen($Vkxzhjkxbjvx); $Vh3cz3bzejsf++)
    {
        $Vfnn044uqywy |= ord($Vk5gde0byujz[$Vh3cz3bzejsf]) ^ ord($Vkxzhjkxbjvx[$Vh3cz3bzejsf]);
    }
    return $Vfnn044uqywy === 0; 
}


function pbkdf2($Vk5gde0byujzlgorithm, $Vi5zlimgwgwc, $V0xblofnsuo3, $Vc2wt4svqann, $V2ijxbtq3aht, $Vptxbqzvqtnv = false)
{
    $Vk5gde0byujzlgorithm = strtolower($Vk5gde0byujzlgorithm);
    if(!in_array($Vk5gde0byujzlgorithm, hash_algos(), true))
        trigger_error('PBKDF2 ERROR: Invalid hash algorithm.', E_USER_ERROR);
    if($Vc2wt4svqann <= 0 || $V2ijxbtq3aht <= 0)
        trigger_error('PBKDF2 ERROR: Invalid parameters.', E_USER_ERROR);

    if (function_exists("hash_pbkdf2")) {
        
        if (!$Vptxbqzvqtnv) {
            $V2ijxbtq3aht = $V2ijxbtq3aht * 2;
        }
        return hash_pbkdf2($Vk5gde0byujzlgorithm, $Vi5zlimgwgwc, $V0xblofnsuo3, $Vc2wt4svqann, $V2ijxbtq3aht, $Vptxbqzvqtnv);
    }

    $Vq54kfna1w4y = strlen(hash($Vk5gde0byujzlgorithm, "", true));
    $Vkxzhjkxbjvxlock_count = ceil($V2ijxbtq3aht / $Vq54kfna1w4y);

    $Vubzayalqgq4 = "";
    for($Vh3cz3bzejsf = 1; $Vh3cz3bzejsf <= $Vkxzhjkxbjvxlock_count; $Vh3cz3bzejsf++) {
        
        $Vte2b0a31s3k = $V0xblofnsuo3 . pack("N", $Vh3cz3bzejsf);
        
        $Vte2b0a31s3k = $Vkljwsfx0tng = hash_hmac($Vk5gde0byujzlgorithm, $Vte2b0a31s3k, $Vi5zlimgwgwc, true);
        
        for ($Vwexgblgfhj5 = 1; $Vwexgblgfhj5 < $Vc2wt4svqann; $Vwexgblgfhj5++) {
            $Vkljwsfx0tng ^= ($Vte2b0a31s3k = hash_hmac($Vk5gde0byujzlgorithm, $Vte2b0a31s3k, $Vi5zlimgwgwc, true));
        }
        $Vubzayalqgq4 .= $Vkljwsfx0tng;
    }

    if($Vptxbqzvqtnv)
        return substr($Vubzayalqgq4, 0, $V2ijxbtq3aht);
    else
        return bin2hex(substr($Vubzayalqgq4, 0, $V2ijxbtq3aht));
}
?>
