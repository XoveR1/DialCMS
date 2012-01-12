$(document).ready(function(){

    // easings
    jQuery.extend( jQuery.easing,
    {
        easeOutQuad: function (x, t, b, c, d) {
            return -c *(t/=d)*(t-2) + b;
        },
        easeOutQuart: function (x, t, b, c, d) {
            return -c * ((t=t/d-1)*t*t*t - 1) + b;
        },
        easeInQuint: function (x, t, b, c, d) {
            return c*(t/=d)*t*t*t*t + b;
        },
        easeOutQuint: function (x, t, b, c, d) {
            return c*((t=t/d-1)*t*t*t*t + 1) + b;
        },
        easeInOutQuint: function (x, t, b, c, d) {
            if ((t/=d/2) < 1) return c/2*t*t*t*t*t + b;
            return c/2*((t-=2)*t*t*t*t + 2) + b;
        }
    });


    // field focus
    $(".field :text,.field :password,.field TEXTAREA").each(function(){
        var field = $(this).closest(".field");
        $(this).focus(function(){
            field.addClass("field_focus");
        });
        $(this).blur(function(){
            field.removeClass("field_focus");
        });
    });
	
	
    // isel
    if ($(".isel").length) {
        var isels = $(".isel"),
        drop = $('<div class="isel__pop"><ul class="isel__pop__i"></ul></div>').appendTo("body"),
        drop_i = $(".isel__pop__i", drop);


        isels.each(function(){
            var isel = $(this),
            items = $("OPTION", this),
            wrap = isel.wrap('<div class="field field_max field_sel"></div>').parent(),
            head = $('<a href="#" class="isel__head"><em>'+isel.val()+'</em><i></i></a>').appendTo(wrap);


            head.click(function(){
                if (wrap.hasClass("field_sel_open")) {
                    $(".isel__pop").hide();
                    $(".field_sel_open").removeClass("field_sel_open");
                }
                else {
                    $(".isel__pop").hide();
                    $(".field_sel_open").removeClass("field_sel_open");
                    wrap.addClass("field_sel_open");
                    drop_i.html("");

                    items.each(function(){
                        if ($(this).attr("selected") || this.selected) {
                            $('<li class="cur"><a href="#">'+$(this).text()+'</a></li>').appendTo(drop_i);
                        }
                        else {
                            $('<li><a href="#">'+$(this).text()+'</a></li>').appendTo(drop_i);
                        }					
                    });

                    $("A", drop_i).click(function(){
                        var li = $(this).closest("LI");
                        if (!li.hasClass("cur")) {
                            li.addClass("cur").siblings(".cur").removeClass("cur");
                            items.eq(li.prevAll().length).get(0).selected = true;
                            head.find("EM").text($(this).text());
                        }
                        $(".isel__pop").hide();
                        $(".field_sel_open").removeClass("field_sel_open");
                        return false;
                    });

                    drop.css({
                        left:0,
                        top:0
                    }).show().css({
                        left:wrap.offset().left - drop.offset().left,
                        top:wrap.offset().top + wrap.outerHeight() - drop.offset().top -1,
                        //paddingTop: wrap.outerHeight() + 5,
                        minWidth:wrap.width()
                    });
                    drop.css('z-index', 1005)

                }
                return false;
            });

        });

        $(document).click(function(){
            $(".isel__pop").hide();
            $(".field_sel_open").removeClass("field_sel_open");
        });
    } // isel
	
	
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
                $(".pop__bt_close", _dialog).click(function(){
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
                $(".pop__bt_close", _dialog).click(function(){
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
        changeMonth: true,
        changeYear: true,
        showOtherMonths: true,
        selectOtherMonths: true,
        beforeShow: waitDatepicker
    });               
	
    // data
    $(".data").each(function(){
        $("TABLE TR TD:first-child", this).addClass("td-first");
        $("TABLE TR TD:last-child", this).addClass("td-last");
        $("TABLE TR:odd", this).addClass("tr-odd");
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
	
}); // dom ready

// jQuery.Browser
(function($){
    $.browserTest=function(a,z){
        var u='unknown',x='X',m=function(r,h){
            for(var i=0;i<h.length;i=i+1){
                r=r.replace(h[i][0],h[i][1]);
            }
            return r;
        },c=function(i,a,b,c){
            var r={
                name:m((a.exec(i)||[u,u])[1],b)
            };
                
            r[r.name]=true;
            r.version=(c.exec(i)||[x,x,x,x])[3];
            if(r.name.match(/safari/)&&r.version>400){
                r.version='2.0';
            }
            if(r.name==='presto'){
                r.version=($.browser.version>9.27)?'futhark':'linear_b';
            }
            r.versionNumber=parseFloat(r.version,10)||0;
            r.versionX=(r.version!==x)?(r.version+'').substr(0,1):x;
            r.className=r.name+r.versionX;
            return r;
        };
        
        a=(a.match(/Opera|Navigator|Minefield|KHTML|Chrome/)?m(a,[[/(Firefox|MSIE|KHTML,\slike\sGecko|Konqueror)/,''],['Chrome Safari','Chrome'],['KHTML','Konqueror'],['Minefield','Firefox'],['Navigator','Netscape']]):a).toLowerCase();
        $.browser=$.extend((!z)?$.browser:{},c(a,/(camino|chrome|firefox|netscape|konqueror|lynx|msie|opera|safari)/,[],/(camino|chrome|firefox|netscape|netscape6|opera|version|konqueror|lynx|msie|safari)(\/|\s)([a-z0-9\.\+]*?)(\;|dev|rel|\s|$)/));
        $.layout=c(a,/(gecko|konqueror|msie|opera|webkit)/,[['konqueror','khtml'],['msie','trident'],['opera','presto']],/(applewebkit|rv|konqueror|msie)(\:|\/|\s)([a-z0-9\.]*?)(\;|\)|\s)/);
        $.os={
            name:(/(win|mac|linux|sunos|solaris|iphone)/.exec(navigator.platform.toLowerCase())||[u])[0].replace('sunos','solaris')
        };
            
        if(!z){
            $('html').addClass([$.os.name,$.browser.name,$.browser.className,$.layout.name,$.layout.className].join(' '));
        }
    };
    
    $.browserTest(navigator.userAgent);
})(jQuery);

function waitDatepicker(){
    var title = $(this).attr('title');
    $('.ui-datepicker').html('');
    $('.ui-datepicker').everyTime(10, 'timer', function() {
        if($(this).find('.ui-datepicker-header').length){
            $(this).prepend('<h3><i class="i16 i16_dp"></i>' + title + '</h3>');
            $(this).stopTime('timer');
            $(this).find('.ui-datepicker-prev').live('click' , function(){
                if($('.ui-datepicker h3').length){
                    $('.ui-datepicker h3').remove();
                }
                $('.ui-datepicker').prepend('<h3><i class="i16 i16_dp"></i>' + title + '</h3>');
            });
            $(this).find('.ui-datepicker-next').live('click' , function(){
                if($('.ui-datepicker h3').length)
                {
                    $('.ui-datepicker h3').remove();
                }
                $('.ui-datepicker').prepend('<h3><i class="i16 i16_dp"></i>' + title + '</h3>');
            })
        }
    }, 100);   
}