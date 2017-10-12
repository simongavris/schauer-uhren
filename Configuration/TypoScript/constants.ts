
plugin.tx_rmmattigschauer_msproducts {
    view {
        # cat=plugin.tx_rmmattigschauer_msproducts/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:rm_mattigschauer/Resources/Private/Templates/
        # cat=plugin.tx_rmmattigschauer_msproducts/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:rm_mattigschauer/Resources/Private/Partials/
        # cat=plugin.tx_rmmattigschauer_msproducts/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:rm_mattigschauer/Resources/Private/Layouts/
    }
    persistence {
        # cat=plugin.tx_rmmattigschauer_msproducts//a; type=string; label=Default storage PID
        storagePid =
    }
}
