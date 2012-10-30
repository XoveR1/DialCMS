<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <!-- ko with: oNavigation -->
            <a class="brand" data-bind="text : oLabel.T(oSiteTitle().sLabel), attr: {href : oSiteTitle().sHref}"></a>
            <div class="nav-collapse collapse">

                <ul class="nav pull-right">
                    <li class="divider-vertical"></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
                            <span data-bind="text: oLabel.T(oLabel.oSelectedLanguage().sLabel)"></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu" data-bind="foreach: oLabel.aAvailableLanguages">
                            <li class="dropdown">
                                <a href="#" data-bind="text: oLabel.T(sLabel), click: oLabel.selectLanguage"></a>
                            </li>
                        </ul>
                    </li>
                    <li class="divider-vertical"></li>
                    <li class="active">
                        <a data-bind="attr: {href: oUserProfile().sHref}"> 
                            <i class="icon-user icon-white"></i>
                            <span data-bind="text: oLabel.T(oUserProfile().sLabel, oUserProfile().sName)"></span>                                    
                        </a>
                    </li>
                    <li class="divider-vertical"></li>
                    <li>
                        <a data-bind="attr: {href: oExit().sHref}">
                            <i class="icon-remove icon-white"></i>
                            <span data-bind="text: oLabel.T(oExit().sLabel)"></span>   
                        </a>
                    </li>
                </ul>

                <ul class="nav" data-bind="template: { name: 'nodeTmpl', foreach: oMainNavRoot.aNodes }"></ul>

                <script id="nodeTmpl" type="text/html">
                    <li class="dropdown" >
                        <!-- ko if: bIsSubItems -->
                        <a class="dropdown-toggle" data-bind="attr: {href : sHref}" data-toggle="dropdown" >
                            <span data-bind="text: oLabel.T(sName)"></span>
                            <b class="caret"></b>
                        </a>
                        <!-- /ko -->

                        <!-- ko ifnot: bIsSubItems -->
                        <a data-bind="text: oLabel.T(sName), attr: {href : sHref}"></a>
                        <!-- /ko -->

                        <!-- ko if: bIsSubItems -->
                        <ul class="dropdown-menu" data-bind="template: { name: 'nodeTmpl', foreach: aNodes }"></ul>
                        <!-- /ko -->
                    </li>
                    </script>

                </div>
                <!-- /ko -->
            </div>
        </div>
    </div>
