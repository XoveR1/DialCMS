var oLabel = oLabel || {};

oLabel.aLablesList = {};
oLabel.aObLablesList = {};

oLabel.init = function(oLabelsData){
    this.sSelectedLangCode = oLabelsData.sSelectedLangCode || 
        this.sSelectedLangCode || 'en-GB';
    this.aAvailableLanguages = ko.observableArray(oLabelsData.aLanguages);
    this.oSelectedLanguage = ko.observable(this.searchLanguage('sLangCode', this.sSelectedLangCode));
}

oLabel.loadLables = function(oLabelsData, bIsApplyModel){
    if(oLabelsData.bIsDataInit){
        this.init(oLabelsData);
    }
    for(var sLangCode in oLabelsData.aLabels){
        if(!this.aLablesList[sLangCode]){
            this.aLablesList[sLangCode] = {};
        }
        for(var iLabelIndex in oLabelsData.aLabels[sLangCode]){
            var oLabelData = oLabelsData.aLabels[sLangCode][iLabelIndex];
            this.aLablesList[sLangCode][oLabelData.sKey] = 
                oLabelData.sValue;
        }
    }
    this.selectLanguage();
    oModeler.addViewModel('oLabel', oLabel, bIsApplyModel);
}

oLabel.T = function(sLabelKey){
    if(typeof(sLabelKey) == "function"){
        sLabelKey = sLabelKey();
    }
    var sLabelString = sLabelKey;
    if(this.aObLablesList[sLabelKey]){
        sLabelString = this.aObLablesList[sLabelKey]();
        aLabelParts = sLabelString.split(/{[0-9]+}/);
        if(aLabelParts.length > 1){
            sLabelString = aLabelParts[0];
            for(var iPartIndex = 1; iPartIndex < aLabelParts.length; iPartIndex++){
                sLabelString += arguments[iPartIndex] + aLabelParts[iPartIndex];
            }
        }
    }
    return sLabelString;
}

oLabel.searchLanguage = function(sField, sValue){
    for(var iLangIndex in oLabel.aAvailableLanguages()){
        if(oLabel.aAvailableLanguages()[iLangIndex][sField] == sValue){
            return oLabel.aAvailableLanguages()[iLangIndex];
        }
    }
    return null;
}

oLabel.selectLanguage = function(){
    if(this.sLangCode == oLabel.sSelectedLangCode){
        return;
    }
    var sSelectedLang = this.sLangCode || oLabel.sSelectedLangCode;
    for(var sLabelKey in oLabel.aLablesList[sSelectedLang]){
        var sLabelValue = oLabel.aLablesList[sSelectedLang][sLabelKey];
        if(!oLabel.aObLablesList[sLabelKey]){
            oLabel.aObLablesList[sLabelKey] = ko.observable(sLabelValue);
        } else {
            oLabel.aObLablesList[sLabelKey](sLabelValue);
        }
    }
    oLabel.oSelectedLanguage(oLabel.searchLanguage('sLangCode', sSelectedLang));
    oLabel.sSelectedLangCode = sSelectedLang;
}