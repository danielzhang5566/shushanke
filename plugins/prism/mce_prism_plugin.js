(function($) {
    tinymce.create('tinymce.plugins.specs_code_plugin', {
        init: function(editor, url) {
            editor.addButton('specs_code_plugin', {
                title: "插入代码", //    鼠标放在按钮上时的提示文字
                image: url + '/code_button.png', //    按钮图标
                cmd: 'tdsk_command' //    点击时执行的方法
            });
            editor.addCommand('tdsk_command', function() {
                editor.windowManager.open(
                    {
                        title: "插入代码", //    对话框的标题
                        file: url + '/mce_prism_plugin.htm', //    放置对话框内容的HTML文件
                        width: 500, //    对话框宽度
                        height: 400, //    对话框高度
                        inline: 1 //    Whether to use modal dialog instead of separate browser window.
                    }
                );
            });
        }
    });
    tinymce.PluginManager.add('specs_code_plugin', tinymce.plugins.specs_code_plugin);
})(jQuery);