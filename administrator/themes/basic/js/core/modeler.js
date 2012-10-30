var oModeler = oModeler || {};

oModeler.addViewModel = function(sViewModelName, oViewModel, bIsApplyModel){
    if(bIsApplyModel == undefined){
        bIsApplyModel = true;
    }
    this[sViewModelName] = oViewModel;
    if(bIsApplyModel){
        this.apply();
    }
    return this;
}

oModeler.apply = function(){
    ko.applyBindings(oModeler);
    return this;
}
