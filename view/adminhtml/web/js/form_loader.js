define([
    'jquery',
    'uiComponent',
    'uiRegistry',
    'ko'
], function ($, Component, registry, ko) {
    'use strict';


    return Component.extend({
        defaults: {
            template: 'MageDesk_Geliver/form',
            width: ko.observable(''),
            height: ko.observable(''),
            length: ko.observable(''),
            weight: ko.observable(''),
            offers: ko.observableArray([]),
            is_shipped: ko.observable(false),
            label_url: ko.observable('')
        },

        getOffer: function (elem) {
        },

        updateOffer: function (elem) {
        },

        initialize: function () {
            var self = this;
            this._super();
        },

    });
});
