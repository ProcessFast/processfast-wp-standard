<?php

/*Script name:  check_wordpress_updates.php
# Version:      v1.04.160413
# Created on:   10/02/2014
# Author:       Willem D'Haese
# Purpose:      PHP script which check available updates on Wordpress site
# On GitHub:    https://github.com/willemdh/check_wordpress_update
# On OutsideIT: https://outsideit.net/check-wordpress-update
# Recent History:
#   05/03/16 => Inital creation, based on Kong Jin Jie's WP plugin
#   06/03/16 => Better output and logging
#   07/03/16 => Integrated version in output
#   12/03/16 => Fixed theme and ok output
#   13/04/16 => Cleanup for release, core testing
# Copyright:
# This program is free software: you can redistribute it and/or modify it
# under the terms of the GNU General Public License as published by the Free
# Software Foundation, either version 3 of the License, or (at your option)
# any later version. This program is distributed in the hope that it will be
# useful, but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General
# Public License for more details. You should have received a copy of the
# GNU General Public License along with this program.  If not, see
# <http://www.gnu.org/licenses/>.*/

$Verbose = 0;
$Status = 'UNKNOWN: ';
$CoreUpdateString = 'Unable to check for Wordpress updates.';

function WriteLog($Log, $Severity, $Msg) {
    global $Verbose;
    date_default_timezone_set('America/New_York');
    if ($Verbose == 1) {
        $DateTime = date('Y-m-d H:i:s');    
        $MicroTime = round(microtime(true) * 1000);
        list($MicroSec, $Sec) = explode(" ", microtime());
        $FullDateTime = date("Y-m-d H:i:s,",$Sec) . intval(round($MicroSec*1000)) . ' ';
        $fd = fopen($Log, 'a'); 
        $FullMessage = $FullDateTime . $Severity . ': ' . $Msg;
        fwrite($fd, $FullMessage . "\n");
        fclose($fd);
    }    
}

$bradServer = gethostbyname('atlprocessfast.dyndns.org');
$Allowed = array('127.0.0.1',$bradServer);
$FromIp = $_SERVER['REMOTE_ADDR'];
WriteLog('outsideit_Wp.log', 'Info', "Address: $FromIp");
if (! in_array($FromIp, $Allowed)) {
    echo "CRITICAL: IP $FromIp not allowed.";
    exit;
}
require_once('wp-load.php');
global $wp_version;
$core_updates = FALSE;
$plugin_updates = FALSE;
WriteLog('outsideit_Wp.log', 'Info', "Running wp_version_check");
wp_version_check();
WriteLog('outsideit_Wp.log', 'Info', "Running wp_update_plugins");
wp_update_plugins();
WriteLog('outsideit_Wp.log', 'Info', "Running wp_update_themes");
wp_update_themes();
$counts = array( 'core' => 0, 'plugins' => 0, 'themes' => 0 );
$CountStr = implode(",",$counts);
WriteLog('outsideit_Wp.log', 'Info', "Counts: $CountStr");
if ( false === ( $core = get_transient( 'update_core' ) ) ) {
    WriteLog('outsideit_Wp.log', 'Info', "Core transient equals false. Trying site...");
    if ( false === ( $core = get_site_transient( 'update_core' ) ) ) {
        WriteLog('outsideit_Wp.log', 'Info', "Core site transient also equals false.");
    }
    else {
        foreach ($core->updates as $core_update) {
            if ($core_update->current != $wp_version) {
                $counts['core'] = 1;
                $CoreUpdateString = 'Version: ' . $wp_version . ' (Needs update to ' . $core_update->current . ')';
            }
            else {
                $CoreUpdateString = 'Version: ' . $wp_version . ' (Up to date)';
            }
       }
    }
}
else {

}

if ( (false != ( $plugins = get_transient( 'update_plugins' ) ) ) || (false != ( $plugins = get_site_transient( 'update_plugins' ) ) )  ) {
    $update_plugins = get_site_transient( 'update_plugins' );
    $counts['plugins'] = count( $update_plugins->response );     
}
else {
	WriteLog('outsideit_Wp.log', 'Info', "Plugin transient equals false. Trying site...");
    if ( false === ( $plugins = get_site_transient( 'update_plugins' ) ) ) {
        WriteLog('outsideit_Wp.log', 'Info', "Plugin site transient also equals false.");
    }  
}

if ( (false != ( $themes = get_transient( 'update_themes' ) ) ) || (false != ( $themes = get_site_transient( 'update_themes' ) ) )  ) {
    $update_themes = get_site_transient( 'update_themes' );
    $counts['themes'] = count( $update_themes->response );  
}
else {
	WriteLog('outsideit_Wp.log', 'Info', "Plugin transient equals false. Trying site...");
    if ( false === ( $themes = get_site_transient( 'update_themes' ) ) ) {
        WriteLog('outsideit_Wp.log', 'Info', "Plugin site transient also equals false.");
    }  
}

// if ( false === ( $themes = get_transient( 'update_themes' ) ) ) {
//     WriteLog('outsideit_Wp.log', 'Info', "Theme transient equals false. Trying site...");
//     if ( false === ( $themes = get_site_transient( 'update_themes' ) ) ) {
//         WriteLog('outsideit_Wp.log', 'Info', "Theme site transient also equals false.");
//     }
//     else {
//         $counts['themes'] = count( $themes->response );
//     }
// }
// else {
// 
// }

if ($counts['core'] >= 1) {
    $Status = 'CRITICAL';
}
elseif ($counts['plugins'] >= 1 || $counts['themes'] >= 1 ) {
    $Status = 'WARNING';
}
elseif ($counts['plugins'] == 0 && $counts['themes'] == 0 && $counts['core'] == 0) {
    $Status = 'OK';
}
else {
    $Status = 'UNKNOWN';
}
if ($counts['plugins'] == 1) {
    $PluginsUpdateString = '1 plugin update available';
}
elseif ($counts['plugins'] >= 2) {
    $PluginsUpdateString = $counts['plugins'] . ' plugin updates available';
}
else {
    $PluginsUpdateString = 'no plugin updates available';
}
if ($counts['themes'] == 1) {
    $ThemesUpdateString = '1 theme update available';
}
elseif ($counts['themes'] >= 2) {
    $ThemesUpdateString = $counts['themes'] . ' theme updates available';
}
else {
    $ThemesUpdateString = 'no theme updates available';
}
$text = $Status . ': ' . $CoreUpdateString . ', ' . $PluginsUpdateString . ', ' . $ThemesUpdateString . '. ';
echo $text;
