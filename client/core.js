var oCore = oCore || {};

oCore.init = function(aUploadItems){
    oPreLoader.init().start();
    document.body.onload = function(){
        oLoader.init(aUploadItems, function(){
            oConfig.init();
            oDocument.init({
                sContentContainer : '.container-fluid .span12 div:first'
            });
            oRouter.init();
            oPreLoader.stop();
        });
    }
}


