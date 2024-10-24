/* ============================================================
 * Form Layouts
 * Form layout options available in Pages
 * For DEMO purposes only. Extract what you need.
 * ============================================================ */
(function($) {

    'use strict';

    $(document).ready(function() {

        // Validation method for budget, profit, revenue fields
        $.validator.addMethod("usd", function(value, element) {
            return this.optional(element) || /^(\$?)(\d{1,3}(\,\d{3})*|(\d+))(\.\d{2})?$/.test(value);
        }, "Please specify a valid dollar amount");

        $('#start-date, #end-date').datepicker();

        $('#image-uplaod').validate();
        $("#update-info").validate();
        $("#update-password").validate();

    });

})(window.jQuery);
