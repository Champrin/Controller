<?php

namespace Controller;


use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\config;
use Controller\Commands\Commands;
use Controller\Listeners\Listeners;
use pocketmine\utils\TextFormat as C;


class Main extends PluginBase
{
    public $PZ;
    public $Message;
    public $Admins;

	public function onEnable()
    {
        ini_set('date.timezone','Asia/Chongqing');
        date_default_timezone_set('Asia/Chongqing');
        $this->getServer()->getPluginManager()->registerEvents(new Listeners($this),$this);
        $this->getCommand("ct")->setExecutor(new Commands($this),$this);

		@mkdir($this->getDataFolder(),0777,true);
        $this->Admins = new Config($this->getDataFolder()."Admins.yml",Config::YAML,array());
        $this->PZ = new Config($this->getDataFolder()."Config.yml",Config::YAML,array(
            "禁止水流动"=>true,
            "禁止岩浆流动"=>true,
            "进入返回主城"=>true,

            "禁止使用物品展示框"=>true,
            "禁止使用物品展示框worlds"=>[],

            "禁止TNT爆炸"=>true,
            "禁止TNT爆炸worlds"=>[],

            "禁止创造PVP"=>true,
            "禁止创造PVPworlds"=>[],

            "禁止出生点PVP"=>true,
            "禁止出生点PVPworlds"=>[],

            "禁止使用大箱子"=>true,
            "禁止使用大箱子worlds"=>[],

            "禁止创造丢物品"=>true,
            "禁止创造丢物品worlds"=>[],

            "禁止创造使用箱子"=>true,
            "禁止创造使用箱子worlds"=>[],

            "死亡不掉落"=>true,
            "死亡不掉落worlds"=>[],

            "禁用饥饿度"=>true,
            "禁用饥饿度worlds"=>[],
        ));
        $this->Admins = new Config($this->getDataFolder()."Admins.yml",Config::YAML,array());
        $this->Message = new Config($this->getDataFolder()."Message.yml",Config::YAML,array(
            "禁止创造PVP"=>"§b{§eController§b} §a服务器已开启禁止创造模式PVP!",
            "进入返回主城"=>"§b{§eController§b} §6服务器已开启进服返回主城，已将您传送回主城！",
            "禁止使用物品展示框"=>"§b{§eController§b} §e服务器已开启禁止使用物品展示框!",
            "禁止创造丢物品"=>"§b{§eController§b} §a服务器已开启创造模式禁止丢弃物品！",
            "禁止使用大箱子"=>"§b{§eController§b} §a不行！ 服务器已开启禁用大箱子！",
            "禁止出生点PVP"=>"§b{§eController§b} §a服务器已开启出生点禁止PVP!",
            "禁止创造使用箱子"=>"§b{§eController§b} §a服务器已开启创造禁止使用箱子类!",
            "死亡不掉落"=>"§b{§eController§b} §a服务器已开启死亡不掉落，现已归还物品！",
        ));
    }
    public function falseworldtype($s)
    {
        $s->sendMessage(C::RED .       "注意！您的type输入错误,请查看以下内容,再输入");
        $s->sendMessage(C::GREEN .     "type: [tnt]禁止tnt爆炸、[cz]禁止创造pvp、[je]饥饿模式");
        $s->sendMessage(C::GREEN .     "      [csd]禁止出生点pvp、[dxz]禁用大箱子、[czw]禁止创造丢弃物品");
        $s->sendMessage(C::GREEN .     "      [sw]死亡不掉落、[wk]禁用展示框、[czdxz]禁止创造使用箱子");
    }
    public function worldtype($s)
    {
        $s->sendMessage(C::RED .       "您未输入type,请查看以下内容,再输入");
        $s->sendMessage(C::GREEN .     "type: [tnt]禁止tnt爆炸、[cz]禁止创造pvp、[je]饥饿模式");
        $s->sendMessage(C::GREEN .     "      [csd]禁止出生点pvp、[dxz]禁用大箱子、[czw]禁止创造丢弃物品");
        $s->sendMessage(C::GREEN .     "      [sw]死亡不掉落、[wk]禁用展示框、[czdxz]禁止创造使用箱子");
    }
    public function help($s)
    {
        $s->sendMessage(C::GOLD .      "================================§b{§eController§b}§6=====================================");
        $s->sendMessage(C::WHITE .     "/ct addadmins 玩家名                §c添加管理员(§a仅限在后台输入)");
        $s->sendMessage(C::WHITE .     "/ct deladmins 玩家名                §c删除管理员(§a仅限在后台输入)");
        $s->sendMessage(C::WHITE .     "/ct help                            §c查看帮助");
        $s->sendMessage(C::WHITE .     "/ct reload                          §c重载配置文件");
        $s->sendMessage(C::WHITE .     "/ct jrs max/min 人数                §c设置假人数上限/下限");
        $s->sendMessage(C::WHITE .     "/ct addworlds [worldtype] 世界名    §c设置某功能开启的世界");
        $s->sendMessage(C::WHITE .     "/ct delworlds [worldtype] 世界名    §c删除某功能开启的世界");
        $s->sendMessage(C::WHITE .     "/ct true [type]                     §c开启某个功能");
        $s->sendMessage(C::WHITE .     "/ct false [type]                    §c关闭某个功能");
        $s->sendMessage(C::GREEN .     "type:");
        $s->sendMessage(C::GREEN .     "    [s]禁止水流动、[yj]禁止岩浆流动、[tnt]禁止tnt爆炸、[cz]禁止创造pvp、");
        $s->sendMessage(C::GREEN .     "    [csd]禁止出生点pvp、[dxz]禁用大箱子、[czw]禁止创造丢弃物品");
        $s->sendMessage(C::GREEN .     "    [sw]死亡不掉落、[zc]进入服务器返回主城、[wk]禁用展示框、");
        $s->sendMessage(C::GREEN .     "    [je]饥饿模式、[czdxz]禁止创造使用箱子");
        $s->sendMessage(C::YELLOW .    "worldtype:");
        $s->sendMessage(C::YELLOW .    "   [tnt]禁止tnt爆炸、[cz]禁止创造pvp、[je]饥饿模式");
        $s->sendMessage(C::YELLOW .    "   [csd]禁止出生点pvp、[dxz]禁用大箱子、[czw]禁止创造丢弃物品");
        $s->sendMessage(C::YELLOW .    "   [sw]死亡不掉落、[wk]禁用展示框、[czdxz]禁止创造使用箱子");
    }
    public function type($s)
    {
        $s->sendMessage(C::RED .       "您未输入type,请查看以下内容,再输入");
        $s->sendMessage(C::GREEN .     "type: [s]禁止水流动、[yj]禁止岩浆流动、[tnt]禁止tnt爆炸、[cz]禁止创造pvp、");
        $s->sendMessage(C::GREEN .     "      [csd]禁止出生点pvp、[dxz]禁用大箱子、[czw]禁止创造丢弃物品");
        $s->sendMessage(C::GREEN .     "      [sw]死亡不掉落、[zc]进入服务器返回主城、[wk]禁用展示框、");
        $s->sendMessage(C::GREEN .     "      [je]饥饿模式、[czdxz]禁止创造使用箱子");
    }
    public function falsetype($s)
    {
        $s->sendMessage(C::RED .       "注意！您的type输入错误,请查看以下内容,再输入");
        $s->sendMessage(C::GREEN .     "type: [s]禁止水流动、[yj]禁止岩浆流动、[tnt]禁止tnt爆炸、[cz]禁止创造pvp、");
        $s->sendMessage(C::GREEN .     "      [csd]禁止出生点pvp、[dxz]禁用大箱子、[czw]禁止创造丢弃物品");
        $s->sendMessage(C::GREEN .     "      [sw]死亡不掉落、[zc]进入服务器返回主城、[wk]禁用展示框、");
        $s->sendMessage(C::GREEN .     "      [je]饥饿模式、[czdxz]禁止创造使用箱子");
    }
}
