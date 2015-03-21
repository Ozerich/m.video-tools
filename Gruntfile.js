module.exports = function (grunt) {

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        less: {
            build: {
                options: {
                    compress: true
                },
                files: {
                    "web/css/styles.min.css": "web/less/styles.less",
                    "web/css/styles.guest.min.css": "web/less/styles_noauth.less"
                }
            }
        },

        watch: {
            files: ["web/less/**", "web/less/*"],
            tasks: ["build"]
        }
    });

    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-watch');

    // Default task(s).
    grunt.registerTask('build', ['less:build']);
};