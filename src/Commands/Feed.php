<?php
    
namespace Tinajero\EssentialsPE\Commands;

use Tinajero\EssentialsPE\Main;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use pocketmine\event\Listener;

use pocketmine\player\Player;

use pocketmine\item\VanillaItems;
use pocketmine\world\Position;
use pocketmine\Server;
use pocketmine\player\GameMode;
use pocketmine\utils\Config;

class Feed extends Command{
    
    private Main $main;
    
    public function __construct(Main $main){
        $this->main = $main;
        parent::__construct("feed", "Feed yourseld.", "/feed", []);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args) : bool{
        if (!$sender->hasPermission("ess.feed")){
            $sender->sendMessage("[Essentials]> " . "No permission");
        } else {
           	if($sender->getHungerManager()->getHealth() === 20){
            	$sender->sendMessage("[Essentials]> " . "You are already fed");
            	return true;
        	} else {
                $sender->getHungerManager()->setFood(20);
                $sender->sendMessage("[Essentials]> " . "You have been fed");
        	}
        }
    }
}