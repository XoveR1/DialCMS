var oCore = oCore || {};

oCore.init = function(sjQueryUrl, ijQuerySize, jUploadItems, jConfig){
    oPreLoader.init().start();
    document.body.onload = function(){
        ojQueryUploadItem = {
            sUrl : sjQueryUrl, 
            iSize: ijQuerySize
        };
        oLoader.init(ojQueryUploadItem, function(){
            oLoader.cUploadFinished = function(){
                oConfig.init($.parseJSON(jConfig));
                oDocument.init(oConfig.oDocumentConfig);
                oRouter.init();
                oPreLoader.stop();
                oLoader.cUploadFinished = undefined;
            }
            oLoader.start($.parseJSON(jUploadItems));
        });
    }
}


