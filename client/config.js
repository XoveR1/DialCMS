var oConfig = oConfig || {};

oConfig.sSiteUrl = 'http://test/';

oConfig.init = function(aConfigData){
    aConfigData = aConfigData || [];
    for(var sItemIndex in aConfigData){
        this[sItemIndex] = aConfigData[sItemIndex];
    }
}