(function($, window) {
    $.fn.extend({
        docLink: function(params) {
            var conf = {};
            $.extend(conf, params);

            return $(this).each(function() {
                // plugin start
                // console.log('docLink');
                // $(this).css('color', '#f00');

                // var target = $(this).data('group-id').replace(/\\/g, '/').toLowerCase();
                var namespace = $(this).val();
                // target = namespace.replace(/\\/g, '/').toLowerCase();
                // console.log('Target: ' + target);
                console.log('Namespace: ' + namespace);

                // var text = $(this).parent().find('span.name').text();
                // var link = '<a href=""><i class="icon-info-circle"></i> ' + text + '</a>';
                // $(this).parent().find('span.name').html(link);

                var link = '<i class="icon-info-circle"></i> ';
                $(this).parent().find('span.name').prepend(link);
                $(this).parent().find('span.name > i').click(function () {

                    var uri = '/single-doc/' + encodeURIComponent(namespace);
                    window.open(uri);







                    // alert('doku');
                    event.preventDefault();
                    return false;
                });
            });
        }
    });

    $(function() {
        // console.log('startup');
        // $('body').docLink();
        // $('#cms-component-list li.group').css('color', '#f00');
        // $('#cms-component-list li.group').docLink();
        $('#cms-component-list li.group [data-inspector-class]').docLink();
    });
})(jQuery, window);
