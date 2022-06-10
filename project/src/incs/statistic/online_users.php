<?php
//const MAX_IDLE_TIME = 3;
function getOnlineUsers(){
    if ( $directory_handle = opendir( $_SERVER['DOCUMENT_ROOT']. "/src/incs/statistic/session") ) {
        $count = 0;
        while ( false !== ( $file = readdir( $directory_handle ) ) ) {
            if($file != '.' && $file != '..'){
                    $count++;
            } }
        closedir($directory_handle);
        return $count;
    } else {
        return false;
    }
}