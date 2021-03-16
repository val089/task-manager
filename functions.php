<?php

function genarateId($length) {
    $bytes = random_bytes($length);
    $id = bin2hex($bytes);
    return $id;
}