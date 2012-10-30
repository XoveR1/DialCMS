var Response = function(oJsonResponse){
    this.sPageTitle = oJsonResponse.sPageTitle;
    this.sModelUrl = oJsonResponse.sModelUrl || null;    
    this.aUploadItems = oJsonResponse.aUploadItems;    
    this.sViewHtml = oJsonResponse.sViewHtml;  
    this.oNavigation = oJsonResponse.oNavigation || null;
    this.oLabelsData = oJsonResponse.oLabelsData || null;
}

const SERVER_ERROR_CODE = 'code';
const SERVER_ERROR_AUTH = 'auth';
const SERVER_ERROR_EXCEPTION = 'exception';

function ServerError(sType, oResponse){
    this.sType = sType;
    this.oResponse = oResponse || null;
    
    if(sType == SERVER_ERROR_CODE){
        
    } else if(sType == SERVER_ERROR_AUTH){
        
    } else if(sType == SERVER_ERROR_EXCEPTION){
        
    }
}

var oRouter = oRouter || {};

oRouter.sAjaxUrlDelimiter = '#';
oRouter.sAjaxUrlItemSeparator = '/';

oRouter.init = function(){
    $(window).hashchange(this._runRouting);
    this._runRouting(true);
}

oRouter.toUrl = function(mControllerOrArray, sActionId, aParams){
    if(mControllerOrArray && mControllerOrArray instanceof Array){
        sControllerId = mControllerOrArray[0];
        sActionId = mControllerOrArray[1];
        aParams = mControllerOrArray[2];
    } else if(mControllerOrArray){
        sControllerId = mControllerOrArray;
    }
    var sReturnUrl = this.sAjaxUrlDelimiter;
        if (sControllerId) {
            sReturnUrl += this.sAjaxUrlItemSeparator . sControllerId;
        }
        if (sControllerId && sActionId) {
            sReturnUrl += this.sAjaxUrlItemSeparator . sActionId;
            if (!(aParams instanceof Array)) {
                aParams = [aParams];
            }
            if (aParams.length > 0) {
               sReturnUrl += this.sAjaxUrlItemSeparator + 
                   aParams.join(this.sAjaxUrlItemSeparator);
            }
        }
        sReturnUrl += this.sAjaxUrlItemSeparator;
        return sReturnUrl.toLowerCase();
}

oRouter._runRouting = function(bIsInit){
    bIsInit = bIsInit || false;
    var oRequestParams = {};
    if(bIsInit){
        oRequestParams.bIsInit = true;
    }
    var sRequestUrl = location.hash.substring(1).toLowerCase();
    if(sRequestUrl.length > 0){
        if(!/^[a-z0-9\/]+$/.test(sRequestUrl)){
            alert('ERROR_INCORRECT_URL');
        } else {
            sRequestUrl = sRequestUrl.replace(/[\/]{2,}/, '/');
            if(sRequestUrl[0] != '/'){
                sRequestUrl = '/' + sRequestUrl;
            }
            if(sRequestUrl[sRequestUrl.length - 1] != '/'){
                sRequestUrl += '/';
            }
            if(sRequestUrl != location.hash.substring(1)){
                location.hash = sRequestUrl;
                return;
            }
            
        }
    } else {
        sRequestUrl = oConfig.sSiteUrl + oConfig.sInitUrl;
    }
    oRouter.Request(sRequestUrl, oRequestParams);
}

oRouter.Request = function(sUrl, oRequestParams){
    $.post(sUrl, oRequestParams, this._response, 'json')
    console.log("-> Request:" + sUrl + '; Request params : ');
    console.log(oRequestParams);
}

oRouter._response = function(oJsonResponse){
    var oResponse = new Response(oJsonResponse);
    if(oJsonResponse.bIsServerError){
        var oServerError = new ServerError(oJsonResponse.sErrorType, oResponse);
    }
    oDocument.load(oResponse);
    console.log("<- Response.");
}


