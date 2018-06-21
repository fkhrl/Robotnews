jQuery(document).ready(function () {
	
	//add form
	  jQuery('body').append('<!-- site Settings--><div id="site_settings"> <a href="#" class="tgl"></a><h3 class="style_title">Choose Your Style</h3><form name="site_settings"><div class="form_row"><label class="texted">Slider Variants:</label><select onchange="location = this.options[this.selectedIndex].value;"><option value="index.html" >Slider 1</option><option value="slider2.html" >Slider 2</option><option value="slider3.html" >Slider 3</option></select><label  class="marker slider_marker">Slider</label></div><div class="form_row menu_style"><label for="menu_style" class="texted">Menu style:</label><select id="menu_style" name="menu_style" size="1"><option value="1" >Menu Style 1</option><option value="2" >Menu Style 2</option></select><label for="menu_style" class="marker menu_marker">Menu Style 1</label></div><div class="form_row less_ind switcher_row"><label class="texted">Background:</label><div class="switch_box"> <a href="#" class="boxed">Boxed</a> <a href="#" class="stretched">Stretched</a><div class="switcher"><a href="#"></a></div></div></div><div class="form_row body_patterns"><label class="texted">Background patterns:</label><ul class="bg_patterns"><li class="pattern1 current"><a href="#"><span></span></a></li><li class="pattern2"><a href="#"><span></span></a></li><li class="pattern3"><a href="#"><span></span></a></li><li class="pattern4"><a href="#"><span></span></a></li><li class="pattern5"><a href="#"><span></span></a></li><li class="pattern6"><a href="#"><span></span></a></li></ul></div></form></div><!-- /site Settings-->')
	
	
    // ================== Customize site ========================= 
	
    function switchBox(box) {
        "use strict";
        var toStyle = arguments[1] ? arguments[1] : '';
        var important = arguments[2] ? arguments[2] : false;
        var switcher = box.find('a').eq(0);
        var left = parseInt(switcher.css('left'), 10);
        var newStyle = left < 5 ? 'boxed pattern-1' : 'wide';
        if (toStyle === '' || important || newStyle === toStyle) {
            if (toStyle === '') {
                toStyle = newStyle;
            }
            var right = box.width() - switcher.width() + 2;
            if (toStyle === 'wide') {
                switcher.animate({
                    left: -2
                }, 200);
            } else {
                switcher.animate({
                    left: right
                }, 200);
            }
            jQuery.cookie('background_style', toStyle, {
                expires: 365,
                path: '/'
            });
            jQuery(document).find('body').removeClass(toStyle === 'boxed pattern-1' ? 'wide' : 'boxed pattern-1').addClass(toStyle);
        }
        return newStyle;
    }
	
    // Background style
    jQuery("#site_settings .switcher a").draggable({
        axis: 'x',
        containment: 'parent',
        stop: function () {
            var left = parseInt(jQuery(this).css('left'), 10);
            var curStyle = left < 5 ? 'wide' : 'boxed pattern-1';
            switchBox(jQuery(this).parent(), curStyle, true);
        }
    });
    jQuery("#site_settings .switcher").click(function (e) {
        switchBox(jQuery(this));
        e.preventDefault();
        return false;
    });
    jQuery("#site_settings .switch_box .boxed").click(function (e) {

        switchBox(jQuery('#site_settings .switcher'), 'boxed');
        e.preventDefault();
        return false;
    });
    jQuery("#site_settings .switch_box .stretched").click(function (e) {

        switchBox(jQuery('#site_settings .switcher'), 'wide');
        e.preventDefault();
        return false;
    });
    // Background patterns
    jQuery('#site_settings .bg_patterns a').click(function (e) {

        jQuery(this).parent().parent().find('li').removeClass('current');
        var li = jQuery(this).parent().addClass('current');
        var val = li.index() + 1;
        jQuery.cookie('pattern_style', val, {
            expires: 365,
            path: '/'
        });
        jQuery(document).find('body').removeClass('pattern-1 pattern-2 pattern-3 pattern-4 pattern-5 pattern-6').addClass('pattern-' + val);
        e.preventDefault();
        return false;
    });
    // Menu style
	if (jQuery.cookie("menu_style") == 2 ){
		jQuery('.headStyleMenu').addClass('navigation-style-2');
		}
    jQuery('#site_settings #menu_style').change(function () {
        var val = jQuery(this).val();
        var marker = jQuery(this).parent().find('.menu_marker');
        var text = marker.html();
        marker.html(text.substr(0, text.length - 1) + val);
        jQuery.cookie('menu_style', val, {
            expires: 365,
            path: '/'
        });
        jQuery(document).find('.headStyleMenu').removeClass('navigation-style-' + (val === '1' ? '2' : '1')).addClass('navigation-style-' + (val === '1' ? '1' : '2'));
    });

    jQuery('#site_settings .tgl').click(function (e) {
        if (jQuery(this).parent().hasClass('vis')) {
            jQuery(this).parent().animate({
                'right': '-183'
            }).removeClass('vis');
        } else {
            jQuery(this).parent().animate({
                'right': '0'
            }, 400).addClass('vis');
        }
        e.preventDefault();
    });
	
	
    // ================== /Customize site ========================= 

	
	
});

