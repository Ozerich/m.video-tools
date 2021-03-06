var LetterHelper = {
    GetId: function () {
        return parseInt($('#letter_id').val());
    },

    UpdateContructorPositions: function ($constructor) {
        var $blocks = $constructor.find('.block-container').not('.block-big-container.new-block-container');

        $constructor.find('.block-small-container').css('clear', 'none').removeClass('block-right');

        var new_in_pair = false;

        for (var i = 0; i < $blocks.length - 1; i++) {
            var pair = [$($blocks.get(i)), $($blocks.get(i + 1))];

            if (pair[0].hasClass('block-small-container') && pair[1].hasClass('block-small-container')) {
                pair[0].css('clear', 'both');
                pair[1].addClass('block-right');
                i++;

                if (pair[0].hasClass('new-block-container') || pair[1].hasClass('new-block-container')) {
                    new_in_pair = true;
                }
            }
        }

        if (new_in_pair == false) {
            $constructor.find('.block-small-container.new-block-container').css('clear', 'both');
        }
    },

    UpdatePreview: function () {
        $('.viewer-container .loader').show();
        $('.viewer-container .viewer-container-inner').hide();
        $('.viewer-container iframe').get(0).contentWindow.location.reload(true);
    }
};

$(function () {
    $('.nav-tabs a').click(function () {
        $(this).tab('show');
        return false;
    });


    $('.viewer-container iframe').on('load', function () {
        $('.viewer-container .loader').hide();
        $('.viewer-container .viewer-container-inner').show().find('.iframe-container').height($(this).get(0).contentWindow.document.body.scrollHeight);
    });

    $('.viewer-container .btn-send-preview').on('click', function () {
        var email = $('.viewer-container .email-container input').val();

        if (email.length == 0) {
            alert('Введите e-mail');
        }

        var $btn = $(this);

        $btn.prop('disabled', true).text('Отправка...');

        $.post('/email/ajax/SendPreview', {id: LetterHelper.GetId(), email: email}, function () {
            alert('Рассылка отправлена');
            $btn.prop('disabled', false).text('Отправить');
        });

        return false;
    });


    $('.btn-download').on('click', function () {
        var $btn = $(this);
        var request = {id: LetterHelper.GetId(), regions: []};

        $('.regions-container .regions input:checked').each(function () {
            request.regions.push($(this).attr('name'));
        });

        $('.zip-link').hide();
        $btn.prop('disabled', true).text('Создание архива...');

        $.post('/email/ajax/download', request, function (response) {
            $btn.prop('disabled', false).text('Скачать');
            $('.zip-link').attr('href', response).show();
        });


        return false;
    });

    $('.zip-link').on('click', function () {
        $(this).hide();
        return true;
    });
});


$.fn.BlockConstructor = function (options) {

    var $constructor = $(this);

    LetterHelper.UpdateContructorPositions($constructor);

    $constructor.on('click', '.block-container .btn-open-form', function () {
        var $block = $(this).parents('.block-container');
        $block.find('.block-preview-container').hide();
        $block.find('.form-container').show();

        LetterHelper.UpdateContructorPositions($constructor);

        return false;
    });

    $constructor.find('.form-container .param-type input').on('change', function () {
        var $form_container = $(this).parents('.form-container');

        var val = $form_container.find('.param-type input:checked').val();
        $form_container.find('.param-container').hide();
        $form_container.find('.param-' + val + '-container').show();
    });

    $constructor.find('.form-container .param-banner-type input').on('change', function () {
        var $param_container = $(this).parents('.param-container');

        var val = $param_container.find('.param-banner-type input:checked').val();
        $param_container.find('.param-banner-container').hide();
        $param_container.find('.param-banner-' + val + '-container').show();
    });

    $constructor.on('click', '.form-container .form-buttons .btn-cancel', function () {
        var $block = $(this).parents('.block-container');
        $block.find('.block-preview-container').show();
        $block.find('.form-container').hide();


        return false;
    });

    $constructor.on('click', '.block-container .btn-delete-block', function () {
        if (!confirm('Вы уверены что хотите удалить блок?')) {
            return false;
        }

        $.post('/email/ajax/delete_block', {
            id: $(this).parents('.block-container').data('block-id'),
            type: $constructor.hasClass('constructor-content-container') ? 'catalog' : 'block'
        }, function () {
            LetterHelper.UpdatePreview();
        });

        $(this).parents('.block-container').slideDown(function () {
            $(this).remove();
        });

        return false;
    });

    $constructor.on('click', '.form-container .form-buttons .btn-submit', function () {
        var $form = $(this).parents('.block-container');

        var data = {};

        $form.find('.param-container:visible :input').each(function () {
            if ($(this).attr('name')) {
                data[$(this).attr('name')] = $(this).val();
            }
        });

        var request = {
            id: $form.data('block-id') || null,
            position: options.position,
            letter_id: LetterHelper.GetId(),
            type: $form.find('.param-type input:checked').val(),
            data: data,
            columns: $form.hasClass('block-small-container') ? 1 : 2
        };

        if (request.type == 'banner' && $form.find('.param-banner-type input:checked').val() == 'areas') {
            request.banner_areas = [];

            $form.find('.param-banner-areas-container li').each(function () {
                request.banner_areas.push({
                    coords: $(this).data('coords'),
                    url: $(this).data('url'),
                    utm_content: $(this).data('utm_content'),
                    alt: $(this).data('alt')
                });
            });
        }

        if (request.type == 'product' && $form.find('.param-product-url .param-multi:visible').length) {
            request.image_areas = [];
            $form.find('.param-product-url .param-multi li').not('.new-link-container').each(function () {
                request.image_areas.push({
                    coords: $(this).find('.input-coords').val().replace('[', '').replace(']', '').replace(';', ','),
                    url: $(this).find('.input-url').val().trim(),
                    utm_content: $(this).find('.input-utm_content').val().trim()
                });
            });
        }


        $form.find('.block-loader').show();

        $.post('/email/ajax/submit_block', request, function (data) {
            $form.find('.block-loader').hide();

            data = jQuery.parseJSON(data);

            if (data.success) {
                $form.find('.block-preview-container').show();
                $form.find('.form-container').hide();

                var block = $(data.block);

                if (request.id == null) {
                    if (request.position == 'catalog') {
                        $(data.block).insertBefore($constructor.find('.block-small-container.new-block-container'));
                    }
                    else {
                        $constructor.find('.blocks').append(block);
                    }
                }
                else {
                    $form.replaceWith(block);
                }

                block.BlockConstructor();

                LetterHelper.UpdatePreview();
            }
            else {

            }

            LetterHelper.UpdateContructorPositions($constructor);
        });

        return false;
    });


    $constructor.find('.param-product-container').each(function () {
        var $container = $(this);

        $container.find('.param-file-name input').on('change', function () {
            $.post('/email/ajax/get_image_url', {
                letter_id: LetterHelper.GetId(),
                filename: $(this).val()
            }, function (url) {
                $container.find('.param-product-url img').attr('src', url);
            });
            return false;
        });


        var $url_container = $container.find('.param-product-url');

        var scene = $url_container.find('img').imgAreaSelect({
            instance: true,
            handles: true,
            onSelectStart: function () {
                if ($url_container.find('.link-form-container:visible').length === 0)
                    $url_container.find('.new-link-container').show();
            },
            onSelectChange: function (img, selection) {
                $url_container.find('.link-form-container:visible').find('.input-coords').val('[' + selection.x1 + ',' + selection.y1 + ';' + (selection.x1 + selection.width) + ',' + (selection.y1 + selection.height) + ']');
            }
        });

        $url_container.find('.param-header > a').on('click', function () {
            var $block = $(this).parents('.param');

            if ($(this).data('mode') == 'single') {
                $block.find('.param-header label').text('Код товара (или ссылка):');
                $(this).text('Несколько ссылок');
                $(this).data('mode', 'multi');
                $block.find('.param-content .param-single').show();
                $block.find('.param-content .param-multi').hide();
                scene.cancelSelection();
                $url_container.find('.new-link-container').hide();
            }
            else {
                $block.find('.param-header label').text('Несколько ссылок:');
                $(this).text('Одна ссылка');
                $(this).data('mode', 'single');
                $block.find('.param-content .param-single').hide();
                $block.find('.param-content .param-multi').show();
            }

            return false;
        });

        $url_container.on('click', '.link-form-container .btn-cancel', function () {
            var $row = $(this).parents('li');

            if ($row.hasClass('new-link-container')) {
                $row.hide();
            }
            else {
                $row.find('.link-form-container').hide();
                $row.find('.link-preview-container').show();
            }
            scene.cancelSelection();

            $url_container.find('li').not('.new-link-container').show();

            return false;
        });

        $url_container.on('click', '.link-form-container .btn-save', function () {

            var $row = $(this).parents('li');

            if ($row.hasClass('new-link-container')) {
                $row = $row.hide().clone().show().removeClass('new-link-container').appendTo($row.parent());
            }

            $row.find('.link-form-container').hide();
            $row.find('.link-preview-container').show();
            $row.find('.link-preview-container span').text($row.find('.input-url').val());

            $url_container.find('li').not('.new-link-container').show();

            scene.cancelSelection();
            return false;
        });

        $url_container.find('ul').on('click', '.btn-delete', function () {
            $(this).parents('li').remove();
            return false;
        });

        $url_container.find('ul').on('click', '.btn-edit', function () {
            var $row = $(this).parents('li');

            $url_container.find('li').hide();
            $row.show();

            $row.find('.link-preview-container').hide();
            $row.find('.link-form-container').show();

            var coords = $row.find('.input-coords').val().replace('[', '').replace(']', '').replace(';', ',').split(',');

            scene.setSelection(+coords[0], +coords[1], +coords[2], +coords[3], false);
            scene.setOptions({show: true});
            scene.update();

            return false;
        });
    });


    $constructor.find('.param-banner-areas-container').each(function () {
        var $container = $(this);

        var $form_container = $container.find('.banner-form-container');

        var scene = $container.find('img').imgAreaSelect({
            instance: true,
            handles: true,
            onSelectStart: function () {
                $form_container.show();
                if (!$form_container.data('elem')) {
                    $form_container.find('.btn-submit').text('Добавить');
                    $form_container.find('.input-url').val('');
                    $form_container.find('.input-utm_content').val('');
                }
            },
            onSelectChange: function (img, selection) {
                $form_container.find('.input-coords').val('[' + selection.x1 + ',' + selection.y1 + ';' + (selection.x1 + selection.width) + ',' + (selection.y1 + selection.height) + ']');
            }
        });

        $container.find('.btn-cancel').on('click', function () {
            $form_container.hide();
            scene.cancelSelection();
            $form_container.data('elem', null);
            return false;
        });

        $container.find('.btn-submit').on('click', function () {

            var url = $form_container.find('.input-url').val();
            var utm_content = $form_container.find('.input-utm_content').val();
            var alt = $form_container.find('.input-alt').val();
            var coords = $form_container.find('.input-coords').val().replace('[', '').replace(']', '').replace(';', ',');

            var html = '<li data-alt="'+alt+'" data-coords="' + coords + '" data-url="' + url + '" data-utm_content="' + utm_content + '">' +
                '<a target="_blank" href="' + url + '">' + url + '</a>' +
                '<div class="actions">' +
                '<a href="#" class="glyphicon glyphicon-wrench btn-edit"></a> ' +
                '<a href="#" class="glyphicon glyphicon-trash btn-delete"></a>' +
                '</div></li>';

            if ($form_container.data('elem')) {
                $form_container.data('elem').replaceWith(html);
                $form_container.data('elem', null);
            }
            else {
                $container.find('ul').append(html);
            }

            $form_container.hide();
            scene.cancelSelection();

            return false;
        });

        $container.find('ul').on('click', '.btn-edit', function () {
            var $item = $(this).parents('li');
            $form_container.data('elem', $item).show().find('.btn-submit').text('Сохранить');

            $form_container.find('.input-url').val($item.data('url'));
            $form_container.find('.input-utm_content').val($item.data('utm_content'));
            $form_container.find('.input-coords').val($item.data('coords'));
            $form_container.find('.input-alt').val($item.data('alt'));

            var coords = $item.data('coords').split(',');

            scene.setSelection(+coords[0], +coords[1], +coords[2], +coords[3], false);
            scene.setOptions({show: true});
            scene.update();

            return false;
        });

        $container.find('ul').on('click', '.btn-delete', function () {
            $(this).parents('li').remove();
            return false;
        });

    });

};