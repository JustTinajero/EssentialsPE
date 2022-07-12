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

class GMC extends Command{
    
    private Main $main;
    
    public function __construct(Main $main){
        $this->main = $main;
        parent::__construct("gmc", "Change your gamemode to survival.", "/gmc", []);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args) : bool{
        if (!$sender->hasPermission("ess.gmc")){
            $sender->sendMessage("[Essentials]> " . "No permission");
        } else {
           	if($sender->getGamemode() === GameMode::CREATIVE()){
            	$sender->sendMessage("[Essentials]> " . "You are already in creative");
            	return true;
        	} else {
                $sender->setGamemode(GameMode::CREATIVE());
                $sender->sendMessage("[Essentials]> " . "You are in creative now");
        	}
        }
    }
}