function isImageOk(img) {
    if (!img.complete) {
        return false;
    }
    else if (typeof img.naturalWidth != "undefined" && img.naturalWidth == 0) {
        return false;
    }
    return true;
}

var images_loaded = {};

var active_page;
var active_page_id;

var active_item_id;

var $preview_image;

var $page_panel;

var $page_panel_max_pos;


var scene;

var $dimensions = {
    x: null,
    y: null,
    w: null,
    h: null
};

function preview(img, selection) {
    var scaleX = 140 / (selection.width || 1);
    var scaleY = 140 / (selection.height || 1);

    $preview_image.css({
        width: Math.round(scaleX * img.width()) + 'px',
        height: Math.round(scaleY * img.height()) + 'px',
        marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px',
        marginTop: '-' + Math.round(scaleY * selection.y1) + 'px'
    });
}

function dimensions(selection) {
    $dimensions.h.val(selection.height);
    $dimensions.w.val(selection.width);
    $dimensions.x.val(selection.x1);
    $dimensions.y.val(selection.y1);
}

function setSelection(x, y, width, height) {
    x = +x;
    y = +y;
    width = +width;
    height = +height;

    var selection = {
        x1: x,
        x2: x + width,
        y1: y,
        y2: y + height,
        width: width,
        height: height
    };
    scene.setSelection(selection.x1, selection.y1, selection.x2, selection.y2, false);
    scene.setOptions({show: true});
    scene.update();

    preview($('#scene'), selection);
    dimensions(selection);
}

$('.hidden-img-container img').each(function () {
    var num = $(this).data('num');
    if (isImageOk($(this).get(0))) {
        images_loaded[num] = 1;
    } else {
        $(this).on('load', function () {
            var num = $(this).data('num');
            images_loaded[num] = 1;
            if (active_page == num) {
                $loader.hide();
            }
        });
    }
});


function updateItemsZIndex(){
	var count = $('.image-container .image-item:visible').length;
	
	$('.image-container .image-item:visible').each(function(){
		$(this).css('z-index', 100 + $(this).data('pos'));
	});
}

$(function () {

    scene = $('#scene').imgAreaSelect({
        instance: true,
        handles: true,
        onSelectStart: function () {
            $page_panel.find('input[type=text]').val('');
            active_item_id = 0;
			
			page_panel_max_pos = $('.image-item:visible').length + 1;
			$page_panel.find('input.param-pos').val(page_panel_max_pos);
			
            $page_panel.find('.action-delete').hide();
            $page_panel.show();
        },
        onSelectChange: function (img, selection) {
            preview($(img), selection);
            dimensions(selection);
        }
    });
	
    $page_panel = $('#page_panel');
	
	$page_panel.find('.param-pos .glyphicon-arrow-up').on('click', function(){
	
		var val = +$page_panel.find('.param-pos input[type=text]').val();
		if(val === page_panel_max_pos){
			return false;
		}
		$page_panel.find('.param-pos input[type=text]').val(val + 1);
		
		return false;	
	});
	
	
	$page_panel.find('.param-pos .glyphicon-arrow-down').on('click', function(){
		var val = +$page_panel.find('.param-pos input[type=text]').val();
		if(val === 1){
			return false;
		}
		$page_panel.find('.param-pos input[type=text]').val(val - 1);
		return false;
	});
	
	$('body').on('click', '.imgareaselect-outer', function(){
		$page_panel.hide();
		return false;
	});


    $preview_image = $page_panel.find('.preview-image');

    $dimensions.y = $page_panel.find('.param-y');
    $dimensions.w = $page_panel.find('.param-w');
    $dimensions.h = $page_panel.find('.param-h');
    $dimensions.x = $page_panel.find('.param-x');

    for (var i in $dimensions) {
        $dimensions[i].on('keyup', function () {
            setSelection($dimensions.x.val(), $dimensions.y.val(), $dimensions.width.val(), $dimensions.height.val());
        });
    }


    var $loader = $('.image-container').find('.loader');


    $('.pagination a').on('click', function () {
        var num = $(this).data('num');
        if ($(this).parents('li').hasClass('active'))return false;
        active_page = num;
        active_page_id = $(this).data('id');

        $('.image-container .image-item').hide();
        $('.image-container .image-item[data-page=' + active_page_id + ']').show();

        var $img = $('.hidden-img-container img[data-num=' + num + ']');

        $loader.hide();
        if (!(num in images_loaded)) {
            $loader.show();
        }

        var src = $img.attr('src');
        $('#scene').attr('src', src);
        $preview_image.attr('src', src);

        $('.pagination li').removeClass('active');
        $(this).parents('li').addClass('active');

        scene.cancelSelection();
		updateItemsZIndex();

        return false;
    });


    $loader.show();
    $(window).on('load', function () {
        $loader.hide();
        if ($('#open_page').length) {
            $('.pagination a[data-id="' + $('#open_page').val() + '"]').trigger('click');
        }
        else {
            $('.pagination a[data-num="1"]').trigger('click');
        }
    });


    $page_panel.find('.action-cancel').on('click', function () {
        $page_panel.hide();
        scene.cancelSelection();
        return false;
    });

    $page_panel.find('.action-delete').on('click', function () {
        if (!confirm('Вы уверены что хотите удалить блок?'))return;
        $.get('/pages/delete_item/' + active_item_id);
		
		var $item = $('.image-container').find('.image-item[data-id=' + active_item_id + ']');
		var pos = +$item.data('pos');
        $item.remove();
		
		$('.image-container .image-item:visible').each(function(){
			if(+$(this).data('pos') > pos){
				$(this).data('pos', +$(this).data('pos') - 1);
			}
		});
		
		updateItemsZIndex();
		
        $page_panel.hide();
        scene.cancelSelection();
        return false;
    });

    $page_panel.find('.action-save').on('click', function () {

        var request = {
            page_id: active_page_id,
            x: +$page_panel.find('.param-x').val(),
            y: +$page_panel.find('.param-y').val(),
            width: +$page_panel.find('.param-w').val(),
            height: +$page_panel.find('.param-h').val(),
            url: $page_panel.find('.param-url').val(),
            alt: $page_panel.find('.param-alt').val(),
            pos: +$page_panel.find('input.param-pos').val()
        };

        var $page_item;

        if (active_item_id) {
            request['id'] = active_item_id;
            $page_item = $('.image-container').find('.image-item[data-id=' + active_item_id + ']');
        }
        else {
            $page_item = $('<div class="image-item"></div>');
            $page_item.appendTo($('.image-wrapper'));
        }

				
		var old_pos = +$page_item.data('pos');
		var new_pos = +request.pos;
		
        $page_item.attr('title', request.url);
        $page_item.attr('data-page', request.page_id);
        $page_item.data('x', request.x);
        $page_item.data('y', request.y);
        $page_item.data('width', request.width);
        $page_item.data('height', request.height);
        $page_item.data('url', request.url);
        $page_item.data('alt', request.alt);


        $page_item.css({
            left: (request.x - 1) + 'px',
            top: (request.y - 1) + 'px',
            width: (request.width + 1) + 'px',
            height: (request.height + 1) + 'px'
        });

        (function ($page_item) {
            $.post('/pages/item', request, function (id) {
                $page_item.attr('data-id', id);
            });
        })($page_item);
		
		
		if(old_pos != new_pos){
			$('.image-container .image-item:visible').each(function(){
				var pos = +$(this).data('pos');
				
				if(new_pos > old_pos && pos > old_pos && pos <= new_pos){
					$(this).data('pos', pos - 1);
				}
				else if(new_pos < old_pos && pos >= new_pos && pos < old_pos){
					$(this).data('pos', pos + 1);
				}
			});
		}
		
		$page_item.data('pos', request.pos);
		
		updateItemsZIndex();
		
        $page_panel.hide();
        scene.cancelSelection();

        return false;
    });


    $('.image-container').on('click', '.image-item', function () {
        setSelection($(this).data('x'), $(this).data('y'), $(this).data('width'), $(this).data('height'));

        active_item_id = $(this).data('id');
        page_panel_max_pos = $('.image-item:visible').length;

        $page_panel.find('.param-url').val($(this).data('url'));
        $page_panel.find('.param-alt').val($(this).data('alt'));
        $page_panel.find('input.param-pos').val($(this).data('pos'));

        $page_panel.find('.action-delete').show();
        $page_panel.show();
        return false;
    });

});