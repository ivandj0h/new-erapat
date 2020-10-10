        /* 
        * -----------------------------------------------------------------------------------
        * DEFAULT SETTINGS
        * TINYMCE PLUGIN
        * -----------------------------------------------------------------------------------
        */

        tinymce.init({
            selector: "#default",
            height: 400,
            forced_root_block: "",
            force_br_newlines: true,
            force_p_newlines: false,
            theme: "modern",
            plugins: [
                "autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern imagetools codesample toc",
            ],
            toolbar1: "undo redo | insert | styleselect table | bold italic | hr alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media ",
            toolbar2: "print preview | forecolor backcolor emoticons | fontselect | fontsizeselect | codesample code fullscreen",
            templates: [{
                    title: "Test template 1",
                    content: "",
                },
                {
                    title: "Test template 2",
                    content: "",
                },
            ],
            content_css: [
                "//fonts.googleapis.com/css?family=Lato:300,300i,400,400i",
                "//www.tinymce.com/css/codepen.min.css",
            ],
            setup: function(ed) {
                ed.on("change", function(e) {
                    console.log("the content " + ed.getContent());
                    $("textarea").text(ed.getContent());
                });
            },
        });


        /* 
        * -----------------------------------------------------------------------------------
        * CONTEXT FORMS SETTINGS
        * TINYMCE PLUGIN
        * -----------------------------------------------------------------------------------
        */

       tinymce.init({
        selector: 'textarea#context-form',
        height: 300,
        setup: function (editor) {
          var isAnchorElement = function (node) {
            return node.nodeName.toLowerCase() === 'a' && node.href;
          };
      
          var getAnchorElement = function () {
            var node = editor.selection.getNode();
            return isAnchorElement(node) ? node : null;
          };
      
          editor.ui.registry.addContextForm('link-form', {
            launch: {
              type: 'contextformtogglebutton',
              icon: 'link'
            },
            label: 'Link',
            predicate: isAnchorElement,
            initValue: function () {
              var elm = getAnchorElement();
              return !!elm ? elm.href : '';
            },
            commands: [
              {
                type: 'contextformtogglebutton',
                icon: 'link',
                tooltip: 'Link',
                primary: true,
                onSetup: function (buttonApi) {
                  buttonApi.setActive(!!getAnchorElement());
                  var nodeChangeHandler = function () {
                    buttonApi.setActive(!editor.readonly && !!getAnchorElement());
                  };
                  editor.on('nodechange', nodeChangeHandler);
                  return function () {
                    editor.off('nodechange', nodeChangeHandler);
                  }
                },
                onAction: function (formApi) {
                  var value = formApi.getValue();
                  console.log('Save link clicked with value: ' + value);
                  formApi.hide();
                }
              },
              {
                type: 'contextformtogglebutton',
                icon: 'unlink',
                tooltip: 'Remove link',
                active: false,
                onAction: function (formApi) {
                  console.log('Remove link clicked');
                  formApi.hide();
                }
              }
            ]
          });
        },
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
      });
      
      