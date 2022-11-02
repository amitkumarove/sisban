<?php
/**
 * Fash Velocity Minify plugin webhook set yp for CI/CD clearing of cache on deployment
 */

add_action( 'template_redirect', function(){
    if($fvmUrl = get_query_var('lp_fvm_clear')){
        echo lp_clear_fvm_and_all_caches();

        die();
    }
});

add_action( 'init', function(){
    add_rewrite_endpoint( 'lp_fvm_clear', EP_ROOT );
} );

add_filter( 'request', function($vars=[]){
    if(isset ( $vars['lp_fvm_clear'] ) && empty ( $vars['lp_fvm_clear'] )){
        $vars['lp_fvm_clear'] = 'default';
    }
    return $vars;
});

/**
 * Call the FVM clear cache function
 * @return false|string Status string
 */
function lp_clear_fvm_and_all_caches() {
    if(function_exists('fvm_purge_all')) {
        fvm_purge_all(); # purge all
        $others = fvm_purge_others(); # purge third party caches
        $notice = array('All caches from FVM have been purged!', strip_tags($others, '<strong>'));
        $notice = array_filter($notice);
        $notice = json_encode($notice); # encode
        return $notice;
    }
    return 'FVM not available';
}
