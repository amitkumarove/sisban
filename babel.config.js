module.exports = {
    "presets": [
        [
            "@babel/preset-env",
            {
                "modules": false,
                "useBuiltIns": "entry",
                "targets": {
                    "browsers": [
                        "> 0.5%",
                        "last 5 versions",
                        "not ie <= 10"
                    ]
                }
            }
        ]
    ],
    "plugins": [
        [
            "@babel/plugin-proposal-decorators",
            {
                "legacy": true
            }
        ],
        "@babel/plugin-proposal-class-properties",
        "@babel/plugin-transform-runtime",
        "@babel/plugin-transform-classes",
        "@babel/plugin-syntax-dynamic-import",
        "@babel/plugin-proposal-json-strings",
        "@babel/plugin-proposal-function-sent",
        "@babel/plugin-proposal-export-namespace-from",
        "@babel/plugin-proposal-throw-expressions",
        "@babel/plugin-proposal-export-default-from"

    ],
    env: {
        test: {
            presets: [
                '@babel/preset-env',
            ],
            plugins: [
                '@babel/plugin-proposal-class-properties',
                'transform-es2015-modules-commonjs',
                'babel-plugin-dynamic-import-node',
            ],
        },
    },
};
