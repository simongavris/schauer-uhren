page.includeCSS.mattigschauer_style = EXT:rm_mattigschauer/Resources/Public/Css/style.css
page.includeJSFooter.mattigschauer = EXT:rm_mattigschauer/Resources/Public/Js/script.js


plugin.tx_rmmattigschauer_msproducts {
    view {
        templateRootPaths.0 = EXT:rm_mattigschauer/Resources/Private/Templates/
        templateRootPaths.1 = {$plugin.tx_rmmattigschauer_msproducts.view.templateRootPath}
        partialRootPaths.0 = EXT:rm_mattigschauer/Resources/Private/Partials/
        partialRootPaths.1 = {$plugin.tx_rmmattigschauer_msproducts.view.partialRootPath}
        layoutRootPaths.0 = EXT:rm_mattigschauer/Resources/Private/Layouts/
        layoutRootPaths.1 = {$plugin.tx_rmmattigschauer_msproducts.view.layoutRootPath}
    }
    persistence {
        storagePid = {$plugin.tx_rmmattigschauer_msproducts.persistence.storagePid}
        #recursive = 1
    }
    features {
        #skipDefaultArguments = 1
        # if set to 1, the enable fields are ignored in BE context
        ignoreAllEnableFieldsInBe = 0
        # Should be on by default, but can be disabled if all action in the plugin are uncached
        requireCHashArgumentForActionArguments = 1
    }
    mvc {
        #callDefaultActionIfActionCantBeResolved = 1
    }
}


// PAGE object for Ajax call:
ajax_api = PAGE
ajax_api {
    typeNum = 427590
 
    config {
        disableAllHeaderCode = 1
        additionalHeaders = Content-type:application/html
        xhtml_cleaning = 0
        debug = 0
        no_cache = 1
        admPanel = 0
    }
 
    10 < tt_content.list.20.rmmattigschauer_ajaxfunc
	#10 < tt_content.list.20.msproducts_ajax
}

# these classes are only used in auto-generated templates
plugin.tx_rmmattigschauer._CSS_DEFAULT_STYLE (
    textarea.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    input.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    .tx-rm-mattigschauer table {
        border-collapse:separate;
        border-spacing:10px;
    }

    .tx-rm-mattigschauer table th {
        font-weight:bold;
    }

    .tx-rm-mattigschauer table td {
        vertical-align:top;
    }

    .typo3-messages .message-error {
        color:red;
    }

    .typo3-messages .message-ok {
        color:green;
    }
)
