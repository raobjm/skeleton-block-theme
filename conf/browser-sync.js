const dotenv = require('dotenv');
const browserSync = require('browser-sync').create();

const conf = dotenv.config({
    path: 'conf/.env'
}).parsed;

browserSync.init({
    proxy: conf.PROXY,
    files: "build",
    port: 8000,
    ui: {
        port: 8001
    }
});

