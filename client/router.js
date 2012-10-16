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

oRouter.init = function(){
    $(window).hashchange(this._runRouting);
    this._runRouting(true);
}

oRouter._runRouting = function(bIsInit){
    bIsInit = bIsInit || false;
    var cleanHash = location.hash.substring(1).toLowerCase();
    if(cleanHash.length > 0){
        if(!/^[a-z0-9\/]+$/.test(cleanHash)){
            alert('ERROR_INCORRECT_URL');
        } else {
            cleanHash = cleanHash.replace(/[\/]{2,}/, '/');
            if(cleanHash[0] != '/'){
                cleanHash = '/' + cleanHash;
            }
            if(cleanHash[cleanHash.length - 1] != '/'){
                cleanHash += '/';
            }
            if(cleanHash != location.hash.substring(1)){
                location.hash = cleanHash;
                return;
            }
            oRouter._request(cleanHash, bIsInit);
        }
    }
}

oRouter._request = function(sUrl, bIsInit){
    bIsInit = bIsInit || false;
    //    $.ajax({
    //        url: sUrl, 
    //        dataTypeString: 'json', 
    //        success: this._response,
    //        error: function(jqXHR, textStatus, errorThrown){
    //            console.log(errorThrown.message);
    //            console.log(jqXHR);
    //        }
    //    });

    var oResponse = {
        sPageTitle : 'Test page title',
        sModelUrl : '/models/testModel.js',
        aUploadItems : [
        {
            sUrl: '/js/uploadTest1.js'
        },

        {
            sUrl: '/js/uploadTest2.js'
        },

        {
            sUrl: '/css/uploadTest1.css'
        }
        ],
        sViewHtml : '<h1>Hello from server!</h1>',
        bIsServerError : false,
        oNavigation : {
            oSiteTitle : {sLabel: 'SITE_NAME', sHref: '/'},
            aNavItems : [
                { sHref : '#/', sLabel : 'HOME_PAGE' },
                { sHref : '#/users/list/', sLabel : 'USERS_PAGE' },
                { sHref : '', sLabel : 'MENU_PAGE', bIsActive: true, aSubItems : [
                        {sHref : '#/menu/list/main/', sLabel : 'MAIN_MENU_PAGE', bIsActive: true},
                        {sHref : '#/menu/list/other1/', sLabel : 'OTHER1_MENU_PAGE'},
                        {sHref : '#/menu/list/other2/', sLabel : 'OTHER2_MENU_PAGE'},
                        {sHref : '#/menu/list/other3/', sLabel : 'OTHER3_MENU_PAGE'}
                ]},
                { sHref : 'http://some-site.com/', sLabel : 'OUT_SIDE_LINK', sTarget : '_blank' },
            ],
            oUserProfile : {sHref: '#/user/admin/', sLabel: 'HELLO_USER', sName: 'Admin'},
            oExit : {sHref: '#/user/exit/', sLabel: 'EXIT_LABEL'}
        },
        oLabelsData : {
            bIsDataInit: true,
            sSelectedLangCode: 'en-GB',
            aLanguages: [
                {sLangCode: 'en-GB', sLabel: 'ENGLISH'},
                {sLangCode: 'ru-RU', sLabel: 'RUSSIAN'},
            ],
            aLabels : {
                'en-GB' : [
                        {sKey : 'SITE_NAME', sValue : 'Dial CMS'},
                        {sKey : 'ENGLISH', sValue : 'English'},
                        {sKey : 'RUSSIAN', sValue : 'Russian'},
                        {sKey : 'HELLO_USER', sValue : 'Hello, {0}!'},
                        {sKey : 'EXIT_LABEL', sValue : 'Exit'},
                        {sKey : 'HOME_PAGE', sValue : 'Home'},
                        {sKey : 'EXIT_LINK', sValue : 'Exit'},
                        {sKey : 'USERS_PAGE', sValue : 'Users'},
                        {sKey : 'MENU_PAGE', sValue : 'Menues'},
                        {sKey : 'OUT_SIDE_LINK', sValue : 'Outside'}
                ],
                'ru-RU' : [
                        {sKey : 'SITE_NAME', sValue : 'Умная CMS'},
                        {sKey : 'ENGLISH', sValue : 'Английский'},
                        {sKey : 'RUSSIAN', sValue : 'Русский'},
                        {sKey : 'HELLO_USER', sValue : 'Привет, {0}!'},
                        {sKey : 'EXIT_LABEL', sValue : 'Выход'},
                        {sKey : 'HOME_PAGE', sValue : 'Главная'},
                        {sKey : 'EXIT_LINK', sValue : 'Выход'},
                        {sKey : 'USERS_PAGE', sValue : 'Пользователи'},
                        {sKey : 'MENU_PAGE', sValue : 'Менюшки'},
                        {sKey : 'OUT_SIDE_LINK', sValue : 'Внешка'}
                ]
            }
        }
    }
    this._response(oResponse);
    console.log("-> Request:" + sUrl);
}

oRouter._response = function(oJsonResponse){
    var oResponse = new Response(oJsonResponse);
    if(oJsonResponse.bIsServerError){
        var oServerError = new ServerError(oJsonResponse.sErrorType, oResponse);
    }
    oDocument.load(oResponse);
    console.log("<- Response.");
}


