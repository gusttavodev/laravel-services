const path = require('path');

module.exports = {
    resolve: {
        alias: {
            '@': path.resolve('resources/js'),
            '@Components': path.resolve('resources/js/Components'),
            '@Pages': path.resolve('resources/js/Pages'),
            '@Establishment': path.resolve('resources/js/Pages/Establishment'),
        },
    },
};
