<?php
/**
 * Notif
 * @package lib-notif-pusher
 * @version 0.0.1
 */

namespace LibNotifPusher\Library;

use \Pusher\Pusher;

class Notif
{

    private static $pusher = null;

    private static function buildPusher(){
        $conf = \Mim::$app->config->libNotifPusher;

        $add_conf = $conf->options ?? [];
        $add_conf['cluster'] = $conf->cluster;
        if(!isset($add_conf['encrypted']))
            $add_conf['encrypted'] = true;
        
        self::$pusher = new Pusher(
            $conf->key,
            $conf->secret,
            $conf->id,
            $add_conf
        );

        return true;
    }

    static function __callStatic($name, $args) {
        if(!self::$pusher){
            if(!self::buildPusher())
                return false;
        }

        self::$pusher->trigger($args[0], $args[1], $args[2]);
        // return call_user_func_array([self::$pusher, $name], $args);
    }
}