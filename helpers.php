<?php

/**
 * Get a sanitized value from $GET
 */
function getValueFromGET($index = null) {
    if (isset($_GET[$index])) {
        return htmlentities($_GET[$index], ENT_QUOTES, "UTF-8");
    } else {
        return "";
    }
}

?>
