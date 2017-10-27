#Controller------管理插件
作者Spiderman 转载请标注作者 
<br>禁止倒卖修改作者名

##功能介绍

    禁止水流动
    禁止岩浆流动
    进入返回主城
    禁止使用物品展示框 
    禁止TNT爆炸
    禁止创造PVP
    禁止出生点PVP
    禁止使用大箱子
    禁止创造丢物品
    禁止创造使用箱子
    死亡不掉落
    禁用饥饿度
        
##配置文件介绍 
    
    
###Message.yml  这个配置文件是自定义提示信息

    禁止创造PVP: §b{§eController§b} §a服务器已开启禁止创造模式PVP!
    进入返回主城: §b{§eController§b} §6服务器已开启进服返回主城，已将您传送回主城！
    禁止使用物品展示框: §b{§eController§b} §e服务器已开启禁止使用物品展示框!
    禁止创造丢物品: §b{§eController§b} §a服务器已开启创造模式禁止丢弃物品！
    禁止使用大箱子: §b{§eController§b} §a不行！ 服务器已开启禁用大箱子！
    禁止出生点PVP: §b{§eController§b} §a服务器已开启出生点禁止PVP!
    禁止创造使用箱子: §b{§eController§b} §a服务器已开启创造禁止使用箱子类!
    死亡不掉落: §b{§eController§b} §a服务器已开启死亡不掉落，现已归还物品！


###Admins.yml
    请在这个配置文件按
    - LBW
    - PPD
    如上添加管理员
    
###Config.yml

/
<br>true是开启功能,false是关闭功能
<br>-------------------分界线--------------------
<br>世界添加请按以下
<br>- world
<br>- pve
<br>如上添加开启世界
<br>-------------------分界线--------------------
<br>如果要关闭该功能,直接false和".....worlds"不理就可以了<br>/
    
    禁止水流动: true
    禁止岩浆流动: true
    进入返回主城: true
    禁止使用物品展示框: true
    禁止使用物品展示框worlds: [] 
    禁止TNT爆炸: true
    禁止TNT爆炸worlds: []
    禁止创造PVP: true
    禁止创造PVPworlds: []
    禁止出生点PVP: true
    禁止出生点PVPworlds: []
    禁止使用大箱子: true
    禁止使用大箱子worlds: []
    禁止创造丢物品: true
    禁止创造丢物品worlds: []
    禁止创造使用箱子: true
    禁止创造使用箱子worlds: []
    死亡不掉落: true
    死亡不掉落worlds: []
    禁用饥饿度: true
    禁用饥饿度worlds: []
    


##指令介绍
    
    /ct addadmins 玩家名                添加管理员(§a仅限在后台输入)
    /ct deladmins 玩家名                删除管理员(§a仅限在后台输入)
    /ct help                            查看帮助
    /ct reload                          重载配置文件
    /ct addworlds [worldtype] 世界名    设置某功能开启的世界
    /ct delworlds [worldtype] 世界名    删除某功能开启的世界
    /ct true [type]                     开启某个功能
    /ct false [type]                    关闭某个功能
    type:
        [s]禁止水流动、[yj]禁止岩浆流动、[tnt]禁止tnt爆炸、[cz]禁止创造pvp
        [csd]禁止出生点pvp、[dxz]禁用大箱子、[czw]禁止创造丢弃物品
        [sw]死亡不掉落、[zc]进入服务器返回主城、[wk]禁用展示框
        [je]饥饿模式、[czdxz]禁止创造使用箱子
    worldtype:
       [tnt]禁止tnt爆炸、[cz]禁止创造pvp、[je]饥饿模式      
       [csd]禁止出生点pvp、[dxz]禁用大箱子、[czw]禁止创造丢弃物品       
       [sw]死亡不掉落、[wk]禁用展示框、[czdxz]禁止创造使用箱子       
       [csd]禁止出生点pvp、[dxz]禁用大箱子、[czw]禁止创造丢弃物品     
       [sw]死亡不掉落、[wk]禁用展示框、[czdxz]禁止创造使用箱子
