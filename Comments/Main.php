<?php

    namespace IdnoPlugins\Comments {
        class Main extends \Idno\Common\Plugin {
            function registerPages() {
                \Idno\Core\site()->addPageHandler('/comment/edit/?', '\IdnoPlugins\Comments\Pages\Edit');
                
                \Idno\Core\site()->template()->extendTemplate('content/end','forms/comments');
            }
        }
    }
