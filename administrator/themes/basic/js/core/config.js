var oConfig = oConfig || {};

oConfig.sSiteUrl = undefined;
oConfig.sInitUrl = undefined;
oConfig.bIsDebugMode = undefined;
oConfig.oDocumentConfig = {
    sContentSelector : undefined,
    sModelPlaceSelector : undefined,
    sEmptyTitle : undefined
};

oConfig.init = function(aConfigData){
    aConfigData = aConfigData || [];
    for(var sItemIndex in aConfigData){
        this[sItemIndex] = aConfigData[sItemIndex];
    }
}