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
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onDeath(PlayerDeathEvent $ev){
        $p = $ev->getEntity();
        if ($ev instanceof EntityDamageByEntityEvent) {
            $killer = $ev->getEntity()->getLastDamageCause();
        }
        if ($ev instanceof Player) {
            foreach ($this->getServer()->getOnlinePlayers() as $pl) {
                $pl->sendTip($killer->getName() . "-=-" . $p->getName());
            }
        }
        if ($ev instanceof EntityDamageByChildEntityEvent) {
            $killer = $ev->getEntity()->getLastDamageCause();
        }
        if ($ev instanceof Player) {
            $killer->sendPopup("You showed" . $p->getName() . "!!!!");
        }
    }
}

// Was never @YaBoiLewis 's formatting. Was @YaBoiSavion or SavionTheLegendZzz's. Don't ask @YaBoiLewis why it was like that.
