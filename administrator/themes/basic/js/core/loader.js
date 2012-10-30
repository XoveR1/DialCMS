function UploadItem(sItemUrl, iItemSize){
    this.sItemUrl = sItemUrl;
    this.iItemSize = iItemSize || 0;
}

function ScriptItem(sHref, sType, sId){
    if(!window.iScriptInc){
        window.iScriptInc = 0;
    }
    this.sHref = sHref;
    this.sType = sType || 'core';
    this.sId = sId || this.sType + '_script_' + window.iScriptInc;
    this.iScriptIndex = window.iScriptInc;
    this.oDomLink = null;
    window.iScriptInc++;
}

function StyleItem(sHref, sType, sId){
    if(!window.iStyleInc){
        window.iStyleInc = 0;
    }
    this.sHref = sHref;
    this.sType = sType || 'core';
    this.sId = sId || this.sType + '_style_' + window.iStyleInc;
    this.iStyleIndex = window.iStyleInc;
    this.oDomLink = null;
    window.iStyleInc++;
}

var oLoader = oLoader || {};

oLoader.aScripts = {};
oLoader.aStyles = {};

oLoader.init = function(ojQueryUploadItem, cUploadFinished){
    this.cUploadFinished = cUploadFinished || null;
    this.uploadItems(ojQueryUploadItem, 'core');
}

oLoader.start = function(aUploadItems){
    this.uploadItems(aUploadItems, 'core');
}

oLoader.uploadStyle = function(oUploadItem, sUploadType){
    var oStyleItem = null;
    if(!this.aStyles[oUploadItem.sItemUrl]){
        oStyleItem = new StyleItem(oUploadItem.sItemUrl, sUploadType);
        var oStyleTag = document.createElement('link');
        oStyleTag.setAttribute('rel', 'stylesheet');
        oStyleTag.setAttribute('href', oUploadItem.sItemUrl);
        oStyleTag.setAttribute('id', oStyleItem.sId);
        oStyleItem.oDomLink = oStyleTag;
        document.head.appendChild(oStyleTag);
        this.aStyles[oUploadItem.sItemUrl] = oStyleItem;
    } else {
        oStyleItem = this.aStyles[oUploadItem.sItemUrl];
    }
    return oStyleItem;
}

oLoader.uploadScript = function(oUploadItem, sUploadType){
    var oScriptItem = null;
    if(!this.aScripts[oUploadItem.sItemUrl]){
        oScriptItem = new ScriptItem(oUploadItem.sItemUrl, sUploadType);
        var oScriptTag = document.createElement('script');
        oScriptTag.setAttribute('type', 'text/javascript');
        oScriptTag.setAttribute('src', oUploadItem.sItemUrl);
        oScriptTag.setAttribute('id', oScriptItem.sId);
        oScriptItem.oDomLink = oScriptTag;
        document.body.appendChild(oScriptTag);
        oScriptTag.addEventListener('load', this._loadFinished, false);
        this.aScripts[oUploadItem.sItemUrl] = oScriptItem;
    } else {
        oScriptItem = aScripts[oUploadItem.sItemUrl];
    }
    return oScriptItem;
}

oLoader.uploadItems = function(aUploadItems, sUploadType){
    var type = typeof aUploadItems;
    if(!(aUploadItems instanceof Array)){
        aUploadItems = [aUploadItems];
    }
    for(var iItemKey in aUploadItems){
        var sItemUrl = aUploadItems[iItemKey].sUrl;
        var iItemSize = aUploadItems[iItemKey].iSize || 0;
        var oUploadItem = new UploadItem(sItemUrl, iItemSize);
        this.upload(oUploadItem, sUploadType);
    }
}

oLoader.upload = function(oUploadItem, sUploadType){
    sUploadType = sUploadType || 'core';
    if(oUploadItem.sItemUrl.indexOf('.css') != -1){
        this.uploadStyle(oUploadItem, sUploadType);
    } else if(oUploadItem.sItemUrl.indexOf('.js') != -1){
        this.uploadScript(oUploadItem, sUploadType);
    }
}

oLoader._loadFinished = function(){
    var oLoader = window.oLoader;
    oLoader.iScriptLoadCounter = oLoader.iScriptLoadCounter || 0;
    if(oLoader.iScriptLoadCounter == Object.keys(oLoader.aScripts).length - 1){
        if(oLoader.cUploadFinished){
            oLoader.cUploadFinished();
        }
    }
    oLoader.iScriptLoadCounter++;
}
