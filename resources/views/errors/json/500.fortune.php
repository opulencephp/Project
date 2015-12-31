<?php
$__errorCode = 500;
$__errorMessages = [$__exception->getMessage()];

while ($__exception = $__exception->getPrevious()) {
    $__errorMessages[] = $__exception->getMessage();
}

$__errorMessage = implode("\n", $__errorMessages);
?>
<% include("errors/json/Error", compact("__errorCode", "__errorMessage")) %>