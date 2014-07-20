module.exports = function(grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        autoprefixer: {
            single: {
                flatten: true,
                src: 'css/styles.css',
                dest: 'css/styles.css'
            }
        },
        cssmin: {
            minify: {
                src: 'css/styles.css',
                dest: 'build/styles.min.css'
            }
        },
        sass: {
            dist: {
                options: {
                    style: 'compressed'
                },
                files: {
                    'css/styles.css': 'sass/styles.scss'
                }
            },
            dev: {
                options: {
                    style: 'expanded'
                },
                files: [{
                    expand: true,
                    cwd: 'sass/',
                    src: ['*.scss', '!_*.scss'],
                    dest: 'css/',
                    ext: '.css'
                }]
            }
        },
        uglify: {
            build: {
                files: [{
                    expand: true,
                    cwd: 'js',
                    src: '*.js',
                    dest: 'build',
                    ext: '.min.js'
                }]
            }
        },
        watch: {
            scripts: {
                files: [
                    'sass/**/*'
                ],
                tasks: ['sass:dev', 'autoprefixer'],
                options: {
                    spawn: false
                }
            }
        }
    });

    // Load tasks
    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');

    // Register tasks
    grunt.registerTask('default', 'List grunt tasks', function() {
        grunt.log.writeln('\n  grunt s     : watches for Sass changes and adds vendor prefixes\
                           \n  grunt build : minifies the JS and CSS');
    });

    grunt.registerTask('s', ['sass:dev', 'watch']);
    grunt.registerTask('build', ['cssmin', 'uglify']);
};