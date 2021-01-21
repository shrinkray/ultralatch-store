module.exports = {

    preset: [require('cssnano-preset-advanced'), {discardComments: false}],

    plugins: [
        'autoprefixer', { remove: false }
    ]
};
