<?php
declare(strict_types=1);
 
namespace ChampOfGames\Rules;
 
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use jojoe77777\FormAPI\SimpleForm;
 
class Main extends PluginBase{
 
    public function onEnable() : void{
        $this->saveResource("config.yml");
    }
 
    public function openHelpUI($player) { // ACHTUNG: hier ist $player nicht $sender
        $form = new SimpleForm(function (Player $player, int $data = null){
 
            $result = $data;
            if($result === null){
                return true;
            }
            switch($result){
                case 0:
                    break;
            }
 
        });
 
        $form->setTitle($this->getConfig()->get("Title"));
        $form->setContent($this->getConfig()->get("Content"));
        $form->addButton($this->getConfig()->get("Button"));
        $form->sendToPlayer($player); // Hier $player! Weil oben auch $player als Spieler definiert wurde!
        return $form;
    }
 
    public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool{
        switch($command->getName()){
            case "rules":
                $sender->sendMessage("");
                if($sender instanceof Player) {
                    $this->openHelpUI($sender);
                }
                return true;
            default:
                return false;
        }
    }
 
    public function onDisable() : void{
        $this->getLogger()->Plugin.yml (rules)("Bye");
    }
}
