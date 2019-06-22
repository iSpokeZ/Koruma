<?php

/*
*   _  _____             _        ______
* (_)/ ____|           | |      |___  /
*  _| (___  _ __   ___ | | _____   / /
* | |\___ \| '_ \ / _ \| |/ / _ \ / /
* | |____) | |_) | (_) |   <  __// /__
* |_|_____/| .__/ \___/|_|\_\___/_____|
*          | |
*          |_|
*
* @Plugin Author - iSpokeZ
*
* @Plugin Language - Turkish
*
* @Plugin API - 3.8.4
*
* @Tüm Hakları Saklıdır.
*
* @Plugin Umut Yıldırım Tarafından Özel Olarak Kodlanmıştır.
*
*/

namespace iSpokeZ;

//Plugin
use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\Server;

//Event
use iSpokeZ\events\Event;
use pocketmine\event\Listener;

class Base extends PluginBase implements Listener {

  /**
  * @var $api
  */
  private static $api;

  /**
  * @return Base
  */

  public static function getAPI(): Base{
      return self::$api;
  }

  public function onLoad(){
      self::$api = $this;
  }

  public function onEnable(){
    $this->getLogger()->info("§7> §aKoruma Aktif [iSpokeZ]");
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->getServer()->getPluginManager()->registerEvents(new Event($this), $this);
  }

  public function onDisable(){
    $this->getLogger()->info("§7> §cDe-Aktif!");
  }
}
