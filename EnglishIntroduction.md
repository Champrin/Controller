
### The following contents are from youdao translation, which may not be correct, please understand
# Controller--- management plug-in

    The author, Spiderman, is reprinted with the author
    It is forbidden to sell and modify the author's name
  
## Function introduction

    Inhibit water flow
    Inhibit magmatic flow
    Go back to the main city
    Do not use display boxes
    No TNT explosion
    PVP is prohibited
    Ban the birth point PVP
    Large boxes are prohibited
    Don't create lost items
    Use of boxes is prohibited
    Death won't drop
    Disabling hunger
    Profile introduction
  
## The Message. Yml configuration file is a custom prompt Message

    Ban on creating PVP: § b {§ eController § b} § a server are forbidden to create open mode PVP!
    Into downtown return: § b {§ eController § b} § 6 server has opened into downtown take back, have given you to send back to the city!
    It is prohibited to use items display box: § b {§ eController § b} § e server are banning the use of open items display box!
    It is prohibited to create throw goods: § b {§ eController § b} § a server is open to create model prohibitions discarded items!
    Banning the use of large box: § b {§ eController § b} § a no! The server has started to disable the big box!
    Ban birth point PVP: § b {§ eController § b} § a server has PVP on birth point off!
    Prohibited to create use case: § b {§ eController § b} § server is open to create a class of banning the use of box!
    Death sticktite: § b {§ eController § b} § a server is open death sticktite, has now returned items!
  
## Admins. Yml

    Please click on this profile
    - LBW
    - PPD
    Add an administrator as above
  
## The Config. Yml

    /
    True is the open function, false is the shutdown function
    -------------------- -------------------- -------------------- -------------------- --------------------
    Please click below to add the world
    - the world
    - pve
    Add the open world as above
    -------------------- -------------------- -------------------- -------------------- --------------------
    If you want to close this feature, direct false and "... The world will do
    /
    
    No water flow: true
    No lava flow: true
    Enter return main city: true
    Object display box: true
    No objects display box: []
    No TNT explosion: true
    No TNT explosion: []
    Create PVP: true
    Prohibition of creation of PVPworlds: []
    No birth point PVP: true
    Prohibit birth point PVPworlds: []
    Large box: true
    Use of large box worlds: []
    Don't create lost objects: true
    Don't create lost objects: []
    Do not create use cases: true
    No use of box worlds: []
    Death doesn't drop: true
    Death does not drop worlds: []
    Disabling hunger: true
    Disable hunger worlds: []
  
## Instruction is introduced

    Add the administrator/ct addadmins player's name (§ a limited input in the background)
    / ct deladmins player name Delete the administrator (§ a limited input in the background)
    /ct help for help
    /ct reload reload configuration file
    /ct addworlds [worldtype] world name setting up the world of a function
    /ct delworlds [worldtype] world name deletes a functioning world
    /ct true [type] opens a function
    /ct false [type] closes a function
    Type:
    [s] banning water flow, [yj] banning lava flow, [TNT] banning TNT explosion, [cz] banning creation of PVP
    [CSD] banning birth point PVP, [DXZ] banning large boxes, [CZW] prohibiting creation of discarded items
    [sw] death does not drop, [zc] enters the server to return to main city, [wk] disable display box
    [je] the hunger mode, [CZDXZ] banned the creation of the use of boxes
    Worldtype:
    [TNT] ban TNT explosion and [cz] ban the creation of PVP, [je] starvation mode
    [CSD] banning birth point PVP, [DXZ] banning large boxes, [CZW] prohibiting creation of discarded items
    [sw] death does not drop, [wk] disable display box, [CZDXZ] ban creation of box
    [CSD] banning birth point PVP, [DXZ] banning large boxes, [CZW] prohibiting creation of discarded items
    [sw] death does not drop, [wk] disable display box, [CZDXZ] ban creation of box
