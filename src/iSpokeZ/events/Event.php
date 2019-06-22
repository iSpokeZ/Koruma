<?php

namespace iSpokeZ\events;

//Plugin
use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\Server;
use iSpokeZ\Base;
use pocketmine\utils\TextFormat as C;

//Event
use iSpokeZ\events\Event;
use pocketmine\event\Listener;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\event\player\PlayerDropItemEvent;

class Event implements Listener {

  private $plugin;

  public function __construct(Base $plugin){
    $this->plugin = $plugin;
  }

  public function break(BlockBreakEvent $event){
    $oyuncu = $event->getPlayer();

    if($oyuncu->hasPermission("blokkirma.event")){
      $event->setCancelled(false);
    }else{
      $event->setCancelled(true);
    }
    return true;
  }

    public function place(BlockPlaceEvent $event){
      $oyuncu = $event->getPlayer();

      if($oyuncu->hasPermission("blokkoyma.event")){
        $event->setCancelled(false);
      }else{
        $event->setCancelled(true);
      }
    }

      public function drop(PlayerDropItemEvent $event){
        $oyuncu = $event->getPlayer();

        if($oyuncu->hasPermission("esyaatma.event")){
          $event->setCancelled(false);
        }else{
          $oyuncu->sendPopup(C::RED . "Eşya Atamazsın");
          $event->setCancelled(true);
        }
    }
}
