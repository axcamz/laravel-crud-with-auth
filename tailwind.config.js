module.exports = {
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
      ],purge: [],
    darkMode: false, // or 'media' or 'class'
    theme: {
        fontFamily: {
            sans: ['Poppins', 'sans-serif']
        },
        extend: {
            transitionProperty: {
                'height': 'height',
                'spacing': 'margin, padding',
                'max-height': 'max-height',
            }
        },
    },
    variants: {
        transform: ['hover', 'responsive'],
        rotate: ['group-hover'],
        display: ['group-hover', 'responsive'],
        overflow: ['group-hover', 'responsive'],
        height: ['group-hover', 'responsive'],
        maxHeight: ['group-hover', 'responsive'],
        scale: ['group-hover'],
    },
    plugins: [],
}
