<?php

namespace DP;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByChildEntityEvent;
use pocketmine\event\player\PlayerDeathEvent;

class Main extends PluginBase implements Listener{

public function onEnable(){

$this->getServer()->getLogger()->info(TextFormat::BLUE."[DeathPopups]Plugin Enabled!");
$this->getServer()->getPluginManager()->registerEvents($this,$this);
}

public function onDeath(PlayerDeathEvent $ev){
$p=$ev->getEntity();
if($ev instance of EntityDamageByEntityEvent){
$killer = $ev->getEntity()->getLastDamageCause()->getDamager();
if($ev instanceof Player){
foreach($this->getServer()->getOnlinePlayers() as $pl){
 $pl->sendTip($killer->getName()."-=-".$p->getName()); 
}
}
}
}
if($ev instance of EntityDamageByChildEntityEvent){
$killer = $ev->getEntity()->getLastDamageCause()->getDamager();
if($ev instanceof Player){
$killer->sendPopup("You sho".$p->getName()."!!!!");
}
}
}
}
