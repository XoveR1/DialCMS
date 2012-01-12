$(function(){
    $('select').selectmenu({
        style:'dropdown'
    });
    
    // Save old login
//    var oldLogin = $('#login').attr('value');
//    // Save old password
//    var oldPassword = $('#password').attr('value');
    // Show sialog event
//    $('.simpledialog').simpleDialog({
//        open: function () {
//            $('input[type="checkbox"]').checkbox();
//            // Clear focuced login
//            $('#login').focus(function(){
//                if($(this).attr('value') == oldLogin) {
//                    $(this).attr('value', '');
//                }
//            });
//            // Restore login value if need
//            $('#login').blur(function(){
//                if($(this).attr('value') == '') {
//                    $(this).attr('value', oldLogin);
//                };
//            });
//            // Change password type if no error
//            if(!$('#password').hasClass('error')){
//                $('#password').prop('type', 'text');
//            }
//            // Clear focuced password 
//            $('#password').focus(function(){
//                if($(this).attr('value') == oldPassword) {
//                    $(this).attr('value', '');
//                }
//                $(this).prop('type', 'password');
//            });
//            // Restore password value if need
//            $('#password').blur(function(){
//                if($(this).attr('value') == '') {
//                    $(this).attr('value', oldPassword);
//                    $(this).prop('type', 'text');
//                };
//            });
//        },
//        closeSelector: '.cancel_link',
//        showCloseLabel: false
//    });


// dialog
    if ($(".pop").length) {

        $(".pop").dialog({
            resizable:false,
            modal:true,
            width:360,
            autoOpen:false,
            show:'fade',
            hide:'fade',
            open: function(){
                if (!$.browser.msie) {
                    $('.ui-widget-overlay').hide().fadeIn();
                }
            },
            close: function(){
                if (!$.browser.msie) {
                    $('.ui-widget-overlay').show().fadeOut();
                }
            },
            create: function(event, ui){
                var _dialog = $(this);
   
                // example dialog button
                $(".close", _dialog).click(function(){
                    _dialog.dialog("close");
                })
            }
        });
   
        // example dialog open
        $(".bt-xl").click(function(){
            $(".pop").dialog("open");
        });
	
    } // dialog
        
    // Slate view settings dialog
    if ($(".popSS").length) {

        $(".popSS").dialog({
            resizable:false,
            modal:true,
            width:420,
            autoOpen:false,
            show:'fade',
            hide:'fade',
            open: function(){
                if (!$.browser.msie) {
                    $('.ui-widget-overlay').hide().fadeIn();
                }
            },
            close: function(){
                if (!$.browser.msie) {
                    $('.ui-widget-overlay').show().fadeOut();
                }
            },
            create: function(event, ui){
                var _dialog = $(this);
                                
                // example dialog button
                $(".close", _dialog).click(function(){
                    _dialog.dialog("close");
                })
            }
        });
   
        // example dialog open
        $("#w-1").click(function(){
            $(".popSS").dialog("open");
        });
	
    } // Slate view settings dialog
        
    // Edit Project Properties dialog
    if ($(".popPP").length) {

        $(".popPP").dialog({
            resizable:false,
            modal:true,
            width:615,
            autoOpen:false,
            show:'fade',
            hide:'fade',
            open: function(){
                if (!$.browser.msie) {
                    $('.ui-widget-overlay').hide().fadeIn();
                }
            },
            close: function(){
                if (!$.browser.msie) {
                    $('.ui-widget-overlay').show().fadeOut();
                }
            },
            create: function(event, ui){
                var _dialog = $(this);
                                
                // example dialog button
                $(".pop__bt_close", _dialog).click(function(){
                    _dialog.dialog("close");
                })
            }
        });
   
        // example dialog open
        $("#w-2").click(function(){
            $(".popPP").dialog("open");
        });
	
    } // Edit Project Properties dialog
        
    // Slate Version Details dialog
    if ($(".popVD").length) {

        $(".popVD").dialog({
            resizable:false,
            modal:true,
            width:440,
            autoOpen:false,
            show:'fade',
            hide:'fade',
            open: function(){
                if (!$.browser.msie) {
                    $('.ui-widget-overlay').hide().fadeIn();
                }
            },
            close: function(){
                if (!$.browser.msie) {
                    $('.ui-widget-overlay').show().fadeOut();
                }
            },
            create: function(event, ui){
                var _dialog = $(this);
                                
                // example dialog button
                $(".bt-l", _dialog).click(function(){
                    _dialog.dialog("close");
                })
            }
        });
   
        // example dialog open
        $("#w-3").click(function(){
            $(".popVD").dialog("open");
        });
	
    } // Slate Version Details dialog
        
    // Export Slate dialog
    if ($(".popES").length) {

        $(".popES").dialog({
            resizable:false,
            modal:true,
            width:520,
            autoOpen:false,
            show:'fade',
            hide:'fade',
            open: function(){
                //vertiacalScroll();
                if(!$("#tree").hasClass('treeview')){
                    $("#tree").treeview(); 
                }
                if (!$.browser.msie) {
                    $('.ui-widget-overlay').hide().fadeIn();
                }
            },
            close: function(){
                if (!$.browser.msie) {
                    $('.ui-widget-overlay').show().fadeOut();
                }
            },
            create: function(event, ui){
                var _dialog = $(this);
                                
                // example dialog button
                $(".pop__bt_close", _dialog).click(function(){
                    _dialog.dialog("close");
                })
            }
        });
   
        // example dialog open
        $("#w-4").click(function(){
            $(".popES").dialog("open");
        });
	
    } // Export Slate dialog
    
    // Assign Employee to Project dialog
    if ($(".popAE").length) {

        $(".popAE").dialog({
            resizable:false,
            modal:true,
            width:800,
            autoOpen:false,
            show:'fade',
            hide:'fade',
            open: function(){
                if (!$.browser.msie) {
                    $('.ui-widget-overlay').hide().fadeIn();
                }
            },
            close: function(){
                if (!$.browser.msie) {
                    $('.ui-widget-overlay').show().fadeOut();
                }
            },
            create: function(event, ui){
                var _dialog = $(this);
                                
                // example dialog button
                $(".pop__bt_close", _dialog).click(function(){
                    _dialog.dialog("close");
                })
            }
        });
   
        // example dialog open
        $("#w-5").click(function(){
            $(".popAE").dialog("open");
        });
	
    } // Assign Employee to Project dialog
	
    $('.datepicker').datepicker({
        showOn: "button",
        buttonImage: "images/date-ico.png",
        buttonImageOnly: true,
        showOtherMonths: true,
        selectOtherMonths: true
    });               

    $('input[type="checkbox"]').checkbox();
    $('input[type="radio"]').radiobutton();
    $('select.combobox').combobox({
        create:  function(){
            var placeholder = $(this).find('option[value=""]').text();
            var input = $(this).parent().find('.ui-autocomplete-input');
            input.attr('placeholder', placeholder);
        }
    });
    
    //Sortable table
    $('.sortable').tablesorter({ 
        headers: {
            0: {
                sorter: false
            }
        }
    });
    $('.sortable th').click(function(){
        $('.sortable tbody tr').removeClass('selectable');
        var counter = 1;
        $('.sortable tbody tr').each(function(){
            if(counter % 2 == 0){
                $(this).addClass('selectable');
            }
            counter++;
        });
    });

});