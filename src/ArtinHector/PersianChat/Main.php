<?php

namespace ArtinHector\PersianChat;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

class Main extends PluginBase implements Listener{

    public function onEnable() : void{
        $this->getServer()->getLogger()->info("[PersianChat] : Enable");
    }

    public function onChat(PlayerChatEvent $et){
		$chatpersian = $et->getMessage();
		$marr = mb_str_split($chatpersian);;
		$arr = [];
		if (!$this->checkWord($marr[0])){
		    return;
        }
		for ($i = count($marr);$i > 0; $i--){
		    $arr[] = $marr[$i - 1];
        }
		foreach ($arr as $num => $wo){
		    if (isset($arr[$num - 1])) if ($arr[$num - 1] != " ") {
                $arr[$num] = $this->getWord($wo);
                continue;
            }
		    if ($wo == "ه") $arr[$num] = 'ﻪ';
        }
		$fstring = implode("", $arr);
		$et->setMessage($fstring);
	}

	public function checkWord($word){
        $pwords = ["ض", "ص", "ث", "ق", "ف", "غ", "ع", "ه", "خ", "ح", "ج", "چ", "پ", "ش", "س", "ی", "ب", "ل", "ا", "ت", "ن", "م", "ک", "گ", "ک", "گ", "ظ", "ط", "ز", "ر", "ذ", "د", "ئ", "و"];
        if (in_array($word, $pwords)){
            return true;
        }
    }

    public function getWord($word){
        if ($this->checkWord($word)){
        switch ($word){
            case "ض":
                return "ﺿ";
            case "ص":
                return "ﺻ";
            case "ث":
                return "ﺛ";
            case "ق":
                return "ﻗ";
            case "ف":
                return "ﻓ";
            case "غ":
                return "ﻏ";
            case "ع":
                return "ﻋ";
            case "ه":
                return "ﻫ";
            case "خ":
                return "ﺧ";
            case "ح":
                return "ﺣ";
            case "ج":
                return "ﺟ";
            case "چ":
                return "ﭼ";
            case "پ":
                return "ﭘ";
            case "ش":
                return "ﺷ";
            case "ب":
                return "ﺑ";
            case "س":
                return "ﺳ";
            case "ی":
                return "ﯾ";
            case "ل":
                return "ﻟ";
            case "ا":
                return "ا";
            case "ت":
                return "ﺗ";
            case "ن":
                return "ﻧ";
            case "م":
                return "ﻣ";
            case "ک":
                return "ﻛ";
            case "گ":
                return "ﮔ";
            case "ظ":
                return "ظ";
            case "ط":
                return "ط";
            case "ز":
                return "ز";
            case "ئ":
                return "ئ";
            default:
                return $word;
        }
        }else{
            return $word;
        }
    }
    
    public function onDisable() : void {
      $this->getServer()->getLogger()->info("[PersianChat] : Disable");
    }
}
