var oPreLoader = oPreLoader || {};

oPreLoader.init = function(){
    this.oPreLoaderBlock = document.getElementById('preloaderBlock');
    this.oPreloaderBar = document.getElementById('preloaderBar');
    return this;
}

oPreLoader.start = function(){
    if(this.oPreLoaderBlock){
        this.oPreLoaderBlock.style.display = 'block';
        this.progress(0);
    }
    return this;
}

oPreLoader.stop = function(){
    if(this.oPreLoaderBlock){
        this.progress(100);
        this.oPreLoaderBlock.style.display = 'none';
    }
    return this;
}

oPreLoader.progress = function(iPercents){
    if(iPercents < 0){
        iPercents = 0;
    }
    if(iPercents > 100){
        iPercents = 100;
    }
    this.oPreloaderBar.style.width = iPercents + '%';
    return this;
}

var oDocument = oDocument || {};

oDocument.oNavigation = {};

oDocument.init = function(oDocumentConfig){
    oDocumentConfig = oDocumentConfig || {};
    this.oContent = $(oDocumentConfig.sContentSelector || 'body div:first');
    this.sModelPlace = oDocumentConfig.sModelPlace || 'script:last';
    this.sEmptyTitle = oDocumentConfig.sEmptyTitle || '';
    if(!$('title').length){
        $('head').prepend('<title>' + this.sEmptyTitle + '</title>');
    }
    return this;
}

oDocument.loadTitle = function(sTitle){
    this.sPageTitle = sTitle;
    $('title').text(sTitle);
    return this;
}

oDocument.loadModel = function(sModelUrl, bIsRemoveOld){
    if(this.oModelScript && bIsRemoveOld){
        $(this.oModelScriptLink).remove();
    }
    if(sModelUrl != ''){
        var oUploadItem = new UploadItem(sModelUrl);
        this.oModelScriptLink = oLoader.uploadScript(oUploadItem, 'app');
    }
    return this;
}

oDocument.loadPageElements = function(aUploadItems){
    oLoader.uploadItems(aUploadItems, 'app');
    return this;
}

oDocument.loadViewHtml = function(sViewHtml){
    this.oContent.html(sViewHtml);
    return this;
}

var NavNote = function (sName, aNodes, sHref){
    this.sName = ko.observable(sName);
    this.sHref = ko.observable(sHref || '');
    this.aNodes = ko.observableArray(aNodes); 
    this.bIsSubItems = ko.observable(aNodes.length > 0);
}

oDocument.loadNavigation = function(oNavigationData){
    this.oNavigation.oSiteTitle = ko.observable(oNavigationData.oSiteTitle);
    this.oNavigation.oUserProfile = ko.observable(oNavigationData.oUserProfile);
    this.oNavigation.oExit = ko.observable(oNavigationData.oExit);
    var getSubNodes = function(aItems){
        var aNodesList = [];
        for(var iIndex in aItems){
            var aSubNodes = [];
            var oItem = aItems[iIndex];
            if(oItem.aSubItems){
                aSubNodes = getSubNodes(oItem.aSubItems);
            }
            var oNavNote = new NavNote(oItem.sLabel, aSubNodes, oItem.sHref);
            aNodesList.push(oNavNote);
        }
        return aNodesList;
    }
    this.oNavigation.oMainNavRoot = new NavNote('root', getSubNodes(oNavigationData.aNavItems));
    oModeler.addViewModel('oNavigation', this.oNavigation, false);
}

oDocument.load = function(oResponse){
    this.loadTitle(oResponse.sPageTitle || '');
    if(oResponse.oLabelsData){
        oLabel.loadLables(oResponse.oLabelsData, false);
    }
    if(oResponse.oNavigation){
        this.loadNavigation(oResponse.oNavigation);
    }
    if(oResponse.aUploadItems){
        this.loadPageElements(oResponse.aUploadItems);
    }
    this.loadViewHtml(oResponse.sViewHtml);
    this.loadModel(oResponse.sModelUrl);
    oModeler.apply();
    return this;
}