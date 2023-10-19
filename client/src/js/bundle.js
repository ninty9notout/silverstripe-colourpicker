import jQuery from 'jquery';

jQuery.noConflict();

jQuery.entwine('ss', $ => {
    $('input.colour-picker-field').entwine({
        onmatch() {
            this._super();

            let {
                palette,
            } = this.data();

            if (Array.isArray(palette) === false) {
                palette = [];
            }

            this.minicolors({
                swatches: palette,
            });
        },

        onunmatch() {
            this._super();

            this.minicolors('destroy');
        }
    });
});
