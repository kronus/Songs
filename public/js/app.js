/**
 * Created by tam3 on 11/25/14.
 */
var songApp = angular.module('songApp', ['mainCtrl', 'songService', 'SharedServices'], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
})
    .run(function($http,CSRF_TOKEN){
        $http.defaults.headers.common['csrf_token'] = CSRF_TOKEN;
    });